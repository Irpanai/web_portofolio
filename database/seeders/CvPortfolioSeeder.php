<?php

namespace Database\Seeders;

use App\Models\PortfolioCatalog;
use App\Models\PortfolioExperience;
use App\Models\PortfolioProject;
use App\Models\PortfolioService;
use App\Models\PortfolioSetting;
use App\Models\PortfolioSkill;
use App\Models\PortfolioStat;
use Illuminate\Database\Seeder;

class CvPortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Preserve current hero image and alignment if already uploaded
        $existingHeroImage = PortfolioSetting::where('key', 'hero_image')->value('value');
        if ($existingHeroImage && str_starts_with($existingHeroImage, 'http://localhost')) {
            $parsed = parse_url($existingHeroImage, PHP_URL_PATH);
            if ($parsed) {
                $existingHeroImage = $parsed;
            }
        }
        if (! $existingHeroImage) {
            $uploadedSample = 'storage/portfolio/PhshLusI283ZzJZ5HfJXgEAGeP5Jk6FDeexNMcv0.jpg';
            $existingHeroImage = file_exists(public_path($uploadedSample))
                ? '/'.$uploadedSample
                : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150';
        }

        $existingHeroAlign = PortfolioSetting::where('key', 'hero_image_align')->value('value') ?: '14';

        // 1. Settings from CV
        $settings = [
            'hero_name' => 'MUHAMMAD IRFAN AKBAR',
            'hero_role' => 'Full-Stack Web Developer & Software Engineer',
            'hero_availability_status' => '1',
            'hero_bio_en' => 'Smart City Information Systems graduate with comprehensive expertise in Software Engineering, web & mobile app development. Experienced in architecting robust digital solutions with Laravel, React, Flutter, Python, and IoT systems.',
            'hero_bio_id' => 'Lulusan D4 Sistem Informasi Kota Cerdas dengan keahlian komprehensif di bidang rekayasa perangkat lunak (Software Engineering) dan pengembangan aplikasi web maupun mobile menggunakan framework Laravel, React, Flutter, Python, dan IoT.',
            'contact_email' => 'muhammad.irfnak@gmail.com',
            'cv_file' => '/storage/cv/cv-muhammad-irfan-akbar.pdf',
            'core_tools' => 'PHP (Laravel), JavaScript (React.js), Python (Flask), Flutter & Dart, MySQL, Tailwind CSS, RESTful API, Git & GitHub, ESP32 IoT, Figma',
            'hero_image' => $existingHeroImage,
            'hero_image_align' => $existingHeroAlign,
            'evolution_title_en' => 'Continuous Evolution & Accreditations',
            'evolution_desc_en' => 'Winner of national competitions (Juara 2 KMIPN VII 2025 UI/UX E-Gov, Juara 2 KOMVAS Banjarmasin, Juara 1 KTI & UI/UX iTech Poliban). Certified by BNSP in Software Programming, Web Development, and Multimedia.',
        ];

        foreach ($settings as $key => $value) {
            PortfolioSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 2. Stats from CV
        PortfolioStat::truncate();
        $stats = [
            ['value' => '3.90', 'label_en' => 'ACADEMIC GPA (CUM LAUDE)', 'label_id' => 'IPK KELULUSAN (3.90/4.00)'],
            ['value' => '05+', 'label_en' => 'COMPETITION AWARDS WON', 'label_id' => 'PENGHARGAAN & JUARA LOMBA'],
            ['value' => '03', 'label_en' => 'NATIONAL BNSP/LSP CERTS', 'label_id' => 'SERTIFIKASI KOMPETENSI BNSP'],
        ];
        foreach ($stats as $stat) {
            PortfolioStat::create($stat);
        }

        // 3. Skills from CV
        PortfolioSkill::truncate();
        $skills = [
            [
                'title_en' => 'Programming & Frameworks',
                'title_id' => 'Pemrograman & Framework',
                'description_en' => 'Production-ready backend and frontend development adhering to clean OOP and MVC architecture.',
                'description_id' => 'Pengembangan web dan backend siap produksi dengan arsitektur bersih berbasis OOP dan MVC.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
                'items_en' => 'PHP (Laravel), JavaScript (React.js, ES6+), Python (Flask), Tailwind CSS, HTML5 & Modern CSS',
                'items_id' => 'PHP (Laravel), JavaScript (React.js, ES6+), Python (Flask), Tailwind CSS, HTML5 & Modern CSS',
            ],
            [
                'title_en' => 'Mobile Development & IoT',
                'title_id' => 'Pengembangan Mobile & IoT',
                'description_en' => 'Cross-platform mobile applications with Flutter and hardware integration with ESP32 microcontrollers.',
                'description_id' => 'Aplikasi mobile lintas platform dengan Flutter dan integrasi perangkat keras sensor via mikrokontroler ESP32.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg>',
                'items_en' => 'Flutter & Dart, Android Studio, ESP32 Microcontrollers, IoT Sensors (pH, NPK), Fuzzy Mamdani Logic',
                'items_id' => 'Flutter & Dart, Android Studio, Mikrokontroler ESP32, Sensor IoT (pH, NPK), Logika Fuzzy Mamdani',
            ],
            [
                'title_en' => 'Database, API & DevOps',
                'title_id' => 'Basis Data, API & DevOps',
                'description_en' => 'Relational database schema modeling, secure RESTful APIs, geospatial mapping, and automated version control.',
                'description_id' => 'Perancangan skema basis data relasional, RESTful API aman, pemetaan geografis GIS, dan kontrol versi otomatis.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
                'items_en' => 'MySQL, RESTful API Architecture, JSON Integration, Leaflet JS (GIS), Git & GitHub, CI/CD',
                'items_id' => 'MySQL, Arsitektur RESTful API, Integrasi JSON, Leaflet JS (GIS), Git & GitHub, CI/CD',
            ],
            [
                'title_en' => 'UI/UX & Multimedia Design',
                'title_id' => 'Desain UI/UX & Multimedia',
                'description_en' => 'High-impact visual communication, interactive Figma prototypes, precision UI slicing, and multimedia editing.',
                'description_id' => 'Komunikasi visual berdampak tinggi, prototipe interaktif Figma, slicing UI presisi, dan editing multimedia.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.58 7.58"></path><circle cx="11" cy="11" r="2"></circle></svg>',
                'items_en' => 'Figma, Wireframing & UI Slicing, Design Systems, Adobe Photoshop, Premiere Pro, Canva',
                'items_id' => 'Figma, Wireframing & Slicing UI, Design Systems, Adobe Photoshop, Premiere Pro, Canva',
            ],
        ];
        foreach ($skills as $skill) {
            PortfolioSkill::create($skill);
        }

        // 4. Projects from CV
        PortfolioProject::truncate();
        $projects = [
            [
                'title_en' => 'KSPSS Intira Syariah Mobile',
                'title_id' => 'KSPSS Intira Syariah Mobile',
                'description_en' => 'Secure Islamic financial cooperative mobile application. Contributed to responsive UI slicing, authentication API integration, transaction history ledger, and high-security customer data management.',
                'description_id' => 'Aplikasi mobile koperasi keuangan syariah KSPSS Intira Syariah. Berfokus pada slicing UI, penyelesaian bug, integrasi API autentikasi, serta pengembangan fitur riwayat transaksi keuangan dan pengelolaan data nasabah dengan keamanan tinggi.',
                'image' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://github.com/Irpanai',
                'category' => 'MOBILE APPLICATION & FINTECH',
                'year' => '2025 - 2026',
                'tags' => 'Flutter, Dart, REST API',
                'top_label' => 'ID: PRJ-01 // MOBILE FINTECH',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
            ],
            [
                'title_en' => 'ViaSpace Intern Management',
                'title_id' => 'ViaSpace Platform Magang',
                'description_en' => 'Web-based internship attendance and daily logbook management system featuring automated WhatsApp notification integration, audit trails, and multi-user administration.',
                'description_id' => 'Platform manajemen kehadiran dan logbook magang berbasis web yang dilengkapi dengan integrasi notifikasi WhatsApp otomatis, jejak audit, dan administrasi multi-pengguna.',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://github.com/Irpanai',
                'category' => 'WEB PLATFORM & AUTOMATION',
                'year' => '2025 - 2026',
                'tags' => 'Laravel, MySQL, WhatsApp API, Tailwind',
                'top_label' => 'ID: PRJ-02 // WEB PLATFORM',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
            ],
            [
                'title_en' => 'Huma - Smart Agriculture Expert System',
                'title_id' => 'Huma - Sistem Pakar Pertanian & IoT',
                'description_en' => 'Agriculture expert system and monitoring platform implementing Fuzzy Mamdani decision logic, Flask microservices, Laravel backend, and Flutter mobile app with real-time ESP32 soil pH and NPK hardware sensors.',
                'description_id' => 'Aplikasi web dan mobile sistem pakar pertanian menggunakan logika Fuzzy Mamdani, arsitektur microservices Flask, Laravel, dan Flutter. Terintegrasi dengan perangkat keras IoT (sensor pH tanah, NPK) menggunakan mikrokontroler ESP32.',
                'image' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ff?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://github.com/Irpanai',
                'category' => 'AI, EXPERT SYSTEM & IOT',
                'year' => '2025 - 2026',
                'tags' => 'Laravel, Flask, Flutter, ESP32 IoT, Python',
                'top_label' => 'ID: PRJ-03 // AI & IOT SYSTEM',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>',
            ],
            [
                'title_en' => 'CerdasSampah',
                'title_id' => 'CerdasSampah',
                'description_en' => 'Integrated urban environmental management platform featuring real-time waste scanning, geospatial GIS mapping using Leaflet JS, gamified citizen education flows, and municipal governance reporting.',
                'description_id' => 'Platform manajemen lingkungan berbasis web dengan fitur scanning sampah, pemetaan geografis (GIS) menggunakan Leaflet JS, alur antarmuka gamifikasi, dan sistem pelaporan tata kelola lingkungan terintegrasi.',
                'image' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => 'https://github.com/Irpanai',
                'category' => 'GIS & SUSTAINABILITY PLATFORM',
                'year' => '2025 - 2026',
                'tags' => 'Laravel, React, Leaflet JS, UI/UX',
                'top_label' => 'ID: PRJ-04 // GIS & WEB PLATFORM',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
            ],
        ];
        foreach ($projects as $project) {
            PortfolioProject::create($project);
        }

        // 5. Experiences from CV
        PortfolioExperience::truncate();
        $experiences = [
            [
                'role_en' => 'Software Engineer & IT Developer',
                'role_id' => 'Software Engineer & IT Developer',
                'company' => 'PT Via Digital Indonesia',
                'duration' => '2025 - 2026',
                'description_en' => 'Contributed to KSPSS Intira Syariah mobile app development (UI slicing, API integration, transaction records, customer data security). Built the ViaSpace internship attendance web platform with automated WhatsApp notifications, and managed company IT systems.',
                'description_id' => 'Berkontribusi dalam pengembangan aplikasi mobile KSPSS Intira Syariah (slicing UI, integrasi API, fitur riwayat transaksi keuangan & pengelolaan data nasabah). Merancang platform web ViaSpace dengan notifikasi WhatsApp otomatis, serta memelihara infrastruktur TI perusahaan.',
            ],
            [
                'role_en' => 'Full-Stack Developer (Applied Projects)',
                'role_id' => 'Full-Stack Developer (Proyek Terapan)',
                'company' => 'Politeknik Negeri Banjarmasin',
                'duration' => '2024 - 2026',
                'description_en' => 'Engineered Huma agricultural expert system using Fuzzy Mamdani, Flask microservices, Laravel, Flutter, and ESP32 IoT sensors. Developed CerdasSampah environmental platform with GIS Leaflet mapping and automated municipal reporting.',
                'description_id' => 'Mengembangkan Huma (Sistem Pakar Pertanian dengan Fuzzy Mamdani, microservices Flask, Laravel, Flutter, & IoT ESP32) serta platform CerdasSampah dengan pemetaan spasial GIS Leaflet JS.',
            ],
            [
                'role_en' => 'UI/UX Designer (Internship)',
                'role_id' => 'Desainer UI/UX (Magang)',
                'company' => 'PT Via Digital Indonesia',
                'duration' => '2025',
                'description_en' => 'Designed intuitive UI/UX and interactive experiences for the CerdasSampah educational platform. Implemented gamification flows to enhance user retention and engagement in sustainable waste management.',
                'description_id' => 'Merancang antarmuka pengguna (UI/UX) dan pengalaman interaktif platform CerdasSampah, serta mengembangkan alur berbasis gamifikasi untuk meningkatkan keterlibatan pengguna dalam edukasi lingkungan.',
            ],
            [
                'role_en' => 'Head of Research & Development / Publications',
                'role_id' => 'Koordinator Litbang & Anggota Penerbitan',
                'company' => 'Lembaga Pers Mahasiswa (LPM) Lensa Poliban',
                'duration' => '2023 - 2025',
                'description_en' => 'Structured divisional work programs, led student aspirational media publications, and modernized digital editorial visual design and campus communication channels.',
                'description_id' => 'Bertanggung jawab merancang rangkaian program kerja divisi litbang, mengelola penerbitan media informasi aspirasi mahasiswa melalui desain grafis dan alur komunikasi digital kampus.',
            ],
        ];
        foreach ($experiences as $experience) {
            PortfolioExperience::create($experience);
        }

        // 6. Services (Certifications & Accreditations) from CV
        PortfolioService::truncate();
        $services = [
            [
                'title_en' => 'Certified Software Programmer',
                'title_id' => 'Kompetensi Skema Pemrogram (Programmer)',
                'description_en' => 'Nationally accredited competency certification in software engineering, programming logic, code standards, and application development.',
                'description_id' => 'Sertifikasi kompetensi bidang pengembangan perangkat lunak melalui Uji Kompetensi Skema Pemrogram (Programmer) berstandar nasional.',
                'tag' => 'LSP POLIBAN / BNSP RI',
                'year' => '2026',
                'authority' => 'LSP POLIBAN',
                'status' => 'VERIFIED',
            ],
            [
                'title_en' => 'Junior Web Developer Competency',
                'title_id' => 'Kompetensi Junior Web Developer',
                'description_en' => 'Certified professional competence in Programming and Software Development by Badan Nasional Sertifikasi Profesi (BNSP).',
                'description_id' => 'Kompeten pada bidang Programming and Software Development dengan kualifikasi Junior Web Developer atas nama Badan Nasional Sertifikasi Profesi (BNSP).',
                'tag' => 'BNSP INDONESIA CERTIFIED',
                'year' => '2024',
                'authority' => 'BNSP Media Informatika',
                'status' => 'VERIFIED',
            ],
            [
                'title_en' => 'Multimedia Specialist Level II KKNI',
                'title_id' => 'Kompetensi Keahlian Multimedia',
                'description_en' => 'Certified competency in multimedia asset production, graphic design, digital layouts, and media engineering standards under KKNI Level II.',
                'description_id' => 'Kompeten pada bidang Multimedia Skills Competence dengan skema sertifikasi Level II KKNI dari Badan Nasional Sertifikasi Profesi (BNSP).',
                'tag' => 'BNSP INDONESIA CERTIFIED',
                'year' => '2022',
                'authority' => 'BNSP SMKN 2 Banjarmasin',
                'status' => 'VERIFIED',
            ],
        ];
        foreach ($services as $service) {
            PortfolioService::create($service);
        }

        // 7. Catalogs (Services Offered)
        PortfolioCatalog::truncate();
        $catalogs = [
            [
                'title_en' => 'Full-Stack Web Development',
                'title_id' => 'Pengembangan Web Full-Stack',
                'description_en' => 'Robust, high-performance web applications built with Laravel, React.js, Tailwind CSS, clean RESTful APIs, and relational MySQL architecture.',
                'description_id' => 'Aplikasi web tangguh dan berkinerja tinggi yang dibangun menggunakan Laravel, React.js, Tailwind CSS, RESTful API bersih, dan basis data MySQL.',
            ],
            [
                'title_en' => 'Mobile App Engineering',
                'title_id' => 'Rekayasa Aplikasi Mobile',
                'description_en' => 'Cross-platform Android & iOS solutions crafted with Flutter and Dart, featuring secure state management and real-time backend synchronization.',
                'description_id' => 'Solusi aplikasi mobile lintas platform (Android & iOS) dengan Flutter & Dart, manajemen state aman, dan sinkronisasi backend real-time.',
            ],
            [
                'title_en' => 'UI/UX Architecture & Prototyping',
                'title_id' => 'Arsitektur UI/UX & Prototyping',
                'description_en' => 'Human-centered UI/UX design, interactive Figma prototypes, component design systems, and pixel-perfect front-end UI slicing.',
                'description_id' => 'Desain antarmuka berpusat pada pengguna, prototipe interaktif di Figma, sistem desain komponen, dan slicing UI presisi tinggi.',
            ],
            [
                'title_en' => 'IoT & Applied AI Integration',
                'title_id' => 'Integrasi IoT & AI Terapan',
                'description_en' => 'Hardware IoT integration using ESP32 microcontrollers and intelligent decision algorithms (Fuzzy Mamdani, YOLO computer vision).',
                'description_id' => 'Integrasi perangkat keras IoT dengan mikrokontroler ESP32 serta penerapan algoritma cerdas (Fuzzy Mamdani dan computer vision YOLO).',
            ],
        ];
        foreach ($catalogs as $catalog) {
            PortfolioCatalog::create($catalog);
        }
    }
}
