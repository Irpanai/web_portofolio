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
use Illuminate\Http\Request;

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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $path = $request->file('image')->store('portfolio', 'public');
        $url = '/storage/'.$path;

        return response()->json(['success' => true, 'url' => $url]);
    }

    public function uploadHeroImage(Request $request)
    {
        return $this->uploadImage($request);
    }

    public function removeHeroImage()
    {
        $defaultImage = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150';
        PortfolioSetting::updateOrCreate(
            ['key' => 'hero_image'],
            ['value' => $defaultImage]
        );

        return response()->json(['success' => true, 'url' => $defaultImage]);
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
