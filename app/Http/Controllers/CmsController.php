<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCatalog;
use App\Models\PortfolioExperience;
use App\Models\PortfolioInquiry;
use App\Models\PortfolioProject;
use App\Models\PortfolioService;
use App\Models\PortfolioSetting;
use App\Models\PortfolioSkill;
use App\Models\PortfolioStat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CmsController extends Controller
{
    private $dataFile = 'portfolio_data.json';

    public function index()
    {
        $data = $this->getPortfolioData();

        return view('welcome', compact('data'));
    }

    public function dashboard()
    {
        $data = $this->getPortfolioData();
        $inquiries = PortfolioInquiry::latest()->get();

        return view('dashboard', compact('data', 'inquiries'));
    }

    public function uploadImage(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $file = $request->file('image');
        $dataUrl = $this->convertToOptimizedDataUrl($file);

        try {
            $file->store('portfolio', 'public');
        } catch (\Throwable $e) {
            // Ignore for read-only serverless filesystems
        }

        return response()->json([
            'success' => true,
            'url' => $dataUrl,
        ]);
    }

    public function uploadHeroImage(Request $request): JsonResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        $file = $request->file('image');
        $dataUrl = $this->convertToOptimizedDataUrl($file);

        try {
            $file->store('portfolio', 'public');
        } catch (\Throwable $e) {
            // Ignore for read-only serverless filesystems
        }

        PortfolioSetting::updateOrCreate(
            ['key' => 'hero_image'],
            ['value' => $dataUrl]
        );

        return response()->json([
            'success' => true,
            'url' => $dataUrl,
            'message' => 'Profile photo updated successfully',
        ]);
    }

    public function removeHeroImage(): JsonResponse
    {
        $defaultImage = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150';
        PortfolioSetting::updateOrCreate(
            ['key' => 'hero_image'],
            ['value' => $defaultImage]
        );

        return response()->json(['success' => true, 'url' => $defaultImage]);
    }

    private function convertToOptimizedDataUrl(UploadedFile $file): string
    {
        $mimeType = $file->getMimeType() ?: 'image/jpeg';

        try {
            if (function_exists('imagecreatefromstring') && function_exists('imagejpeg')) {
                $rawContent = file_get_contents($file->getPathname());
                $srcImage = @imagecreatefromstring($rawContent);

                if ($srcImage !== false) {
                    $origWidth = imagesx($srcImage);
                    $origHeight = imagesy($srcImage);

                    $maxDim = 1200;
                    $ratio = min($maxDim / $origWidth, $maxDim / $origHeight, 1.0);
                    $newWidth = (int) round($origWidth * $ratio);
                    $newHeight = (int) round($origHeight * $ratio);

                    $dstImage = imagecreatetruecolor($newWidth, $newHeight);

                    if (in_array($mimeType, ['image/png', 'image/webp'])) {
                        imagealphablending($dstImage, false);
                        imagesavealpha($dstImage, true);
                        $transparent = imagecolorallocatealpha($dstImage, 255, 255, 255, 127);
                        imagefilledrectangle($dstImage, 0, 0, $newWidth, $newHeight, $transparent);
                    }

                    imagecopyresampled($dstImage, $srcImage, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

                    ob_start();
                    if ($mimeType === 'image/png') {
                        imagepng($dstImage, null, 7);
                        $outputMime = 'image/png';
                    } elseif ($mimeType === 'image/webp' && function_exists('imagewebp')) {
                        imagewebp($dstImage, null, 85);
                        $outputMime = 'image/webp';
                    } else {
                        imagejpeg($dstImage, null, 85);
                        $outputMime = 'image/jpeg';
                    }
                    $compressedData = ob_get_clean();

                    imagedestroy($srcImage);
                    imagedestroy($dstImage);

                    if (! empty($compressedData)) {
                        return 'data:'.$outputMime.';base64,'.base64_encode($compressedData);
                    }
                }
            }
        } catch (\Throwable $e) {
            // Fall back to direct file encoding below
        }

        $rawBytes = file_get_contents($file->getPathname());

        return 'data:'.$mimeType.';base64,'.base64_encode($rawBytes);
    }

    public function viewCv()
    {
        $setting = PortfolioSetting::where('key', 'cv_file')->value('value');
        $relativePath = $setting ? ltrim($setting, '/') : 'storage/cv/cv-muhammad-irfan-akbar.pdf';
        $fullPath = public_path($relativePath);

        if (! file_exists($fullPath)) {
            $fullPath = storage_path('app/public/cv/cv-muhammad-irfan-akbar.pdf');
        }

        if (! file_exists($fullPath)) {
            $fullPath = public_path('cv/cv-muhammad-irfan-akbar.pdf');
        }

        if (! file_exists($fullPath)) {
            abort(404, 'CV file not found.');
        }

        return response()->file($fullPath, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="CV_Muhammad_Irfan_Akbar.pdf"',
        ]);
    }

    public function downloadCv()
    {
        $setting = PortfolioSetting::where('key', 'cv_file')->value('value');
        $relativePath = $setting ? ltrim($setting, '/') : 'storage/cv/cv-muhammad-irfan-akbar.pdf';
        $fullPath = public_path($relativePath);

        if (! file_exists($fullPath)) {
            $fullPath = storage_path('app/public/cv/cv-muhammad-irfan-akbar.pdf');
        }

        if (! file_exists($fullPath)) {
            $fullPath = public_path('cv/cv-muhammad-irfan-akbar.pdf');
        }

        if (! file_exists($fullPath)) {
            abort(404, 'CV file not found.');
        }

        return response()->download($fullPath, 'CV_Muhammad_Irfan_Akbar.pdf');
    }

    public function uploadCv(Request $request)
    {
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:10240',
        ]);

        $path = $request->file('cv')->storeAs('cv', 'cv-muhammad-irfan-akbar.pdf', 'public');
        $url = '/storage/'.$path;

        PortfolioSetting::updateOrCreate(
            ['key' => 'cv_file'],
            ['value' => $url]
        );

        return response()->json(['success' => true, 'url' => $url]);
    }

    public function save(Request $request)
    {
        $payload = $request->json()->all();

        if (! empty($payload)) {
            $settingKeys = ['hero_name', 'hero_role', 'hero_availability_status', 'hero_bio_en', 'hero_bio_id', 'contact_email', 'core_tools', 'hero_image', 'hero_image_align', 'evolution_title_en', 'evolution_desc_en', 'cv_file'];
            foreach ($settingKeys as $key) {
                if (isset($payload[$key])) {
                    PortfolioSetting::updateOrCreate(['key' => $key], ['value' => $payload[$key]]);
                }
            }

            if (isset($payload['stats'])) {
                PortfolioStat::truncate();
                foreach ($payload['stats'] as $stat) {
                    PortfolioStat::create($stat);
                }
            }

            if (isset($payload['skills'])) {
                PortfolioSkill::truncate();
                foreach ($payload['skills'] as $skill) {
                    PortfolioSkill::create($skill);
                }
            }

            if (isset($payload['projects'])) {
                PortfolioProject::truncate();
                foreach ($payload['projects'] as $item) {
                    PortfolioProject::create($item);
                }
            }

            if (isset($payload['experiences'])) {
                PortfolioExperience::truncate();
                foreach ($payload['experiences'] as $item) {
                    PortfolioExperience::create($item);
                }
            }

            if (isset($payload['services'])) {
                PortfolioService::truncate();
                foreach ($payload['services'] as $item) {
                    PortfolioService::create($item);
                }
            }

            return response()->json(['success' => true, 'message' => 'Content published successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'No data received.'], 400);
    }

    private function getPortfolioData()
    {
        $settings = PortfolioSetting::pluck('value', 'key')->toArray();

        return array_merge($settings, [
            'stats' => PortfolioStat::all()->toArray(),
            'skills' => PortfolioSkill::all()->toArray(),
            'projects' => PortfolioProject::all()->toArray(),
            'experiences' => PortfolioExperience::all()->toArray(),
            'services' => PortfolioService::all()->toArray(),
            'catalogs' => PortfolioCatalog::all()->toArray(),
        ]);
    }
}
