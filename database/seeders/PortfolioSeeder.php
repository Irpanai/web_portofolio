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

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Settings
        $settings = [
            'hero_name' => 'MUHAMMAD IRFAN AKBAR',
            'hero_role' => 'Senior Graphic Designer & Full-Stack Web Developer.',
            'hero_availability_status' => 'AVAILABLE FOR Q3/Q4',
            'hero_bio_en' => 'Constructing exact, architectural, and brutalist digital products.',
            'hero_bio_id' => 'Membangun produk digital yang presisi, arsitektural, dan bergaya brutalis.',
            'contact_email' => 'irfan@example.com',
            'core_tools' => 'Figma Pro, Adobe Creative Cloud (Ps, Ai, Pr), VS Code Engine, CapCut Pro, Git & CLI',
        ];

        foreach ($settings as $key => $value) {
            PortfolioSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 2. Stats
        PortfolioStat::truncate();
        $stats = [
            ['label_en' => 'YEARS OF EXPERTISE', 'label_id' => 'TAHUN KEAHLIAN', 'value' => '05+'],
            ['label_en' => 'SHIPPED DIGITAL ASSETS', 'label_id' => 'ASET DIGITAL SELESAI', 'value' => '42'],
            ['label_en' => 'WORLDWIDE CLIENTS', 'label_id' => 'KLIEN GLOBAL', 'value' => '18'],
        ];
        foreach ($stats as $stat) {
            PortfolioStat::create($stat);
        }

        // 3. Skills
        PortfolioSkill::truncate();
        $skills = [
            [
                'title_en' => 'Communication',
                'title_id' => 'Komunikasi',
                'description_en' => 'Fluent collaboration bridging technical constraints with creative objectives seamlessly.',
                'description_id' => 'Kolaborasi lancar yang menjembatani batasan teknis dengan tujuan kreatif secara mulus.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>',
                'items_en' => 'Bahasa Indonesia (Native), English (Professional), Cross-functional Teamwork, Client Pitches & Presentation',
                'items_id' => 'Bahasa Indonesia (Asli), Inggris (Profesional), Kerja Tim Lintas Fungsi, Presentasi Klien',
            ],
            [
                'title_en' => 'Creative Design',
                'title_id' => 'Desain Kreatif',
                'description_en' => 'High-impact visual communication founded on Swiss principles and typographic hierarchy.',
                'description_id' => 'Komunikasi visual berdampak tinggi yang didasarkan pada prinsip desain Swiss dan hierarki tipografi.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.58 7.58"></path><circle cx="11" cy="11" r="2"></circle></svg>',
                'items_en' => 'Graphic & Editorial Design, Brand Identity Systems, Motion Graphics & Video, Micro-Typography Layouts',
                'items_id' => 'Desain Grafis & Editorial, Sistem Identitas Merek, Grafik Gerak & Video, Tata Letak Mikro-Tipografi',
            ],
            [
                'title_en' => 'Tech & Engineering',
                'title_id' => 'Teknologi & Rekayasa',
                'description_en' => 'Robust modern frontend engineering focused on lightning speed and atomic component models.',
                'description_id' => 'Rekayasa frontend modern yang tangguh berfokus pada kecepatan super dan model komponen atomik.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>',
                'items_en' => 'Frontend Web Dev (HTML5/ES6), Tailwind CSS Architecture, React.js & Next.js Ecosystem, Headless & Custom CMS',
                'items_id' => 'Pengembangan Web Frontend (HTML5/ES6), Arsitektur Tailwind CSS, Ekosistem React.js & Next.js, CMS Headless & Kustom',
            ],
            [
                'title_en' => 'Problem Solving',
                'title_id' => 'Pemecahan Masalah',
                'description_en' => 'User-centered discovery transforming ambiguous problems into frictionless workflows.',
                'description_id' => 'Penemuan yang berpusat pada pengguna, mengubah masalah ambigu menjadi alur kerja tanpa hambatan.',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><rect x="16" y="3" width="6" height="6"></rect><rect x="2" y="3" width="6" height="6"></rect><rect x="9" y="15" width="6" height="6"></rect><path d="M5 9v3h14V9"></path><path d="M12 12v3"></path></svg>',
                'items_en' => 'Product Thinking & Discovery, UI/UX Architecture & Flows, Scalable Design Systems, Heuristic Usability Audits',
                'items_id' => 'Pemikiran Produk & Penemuan, Arsitektur UI/UX & Alur Kerja, Sistem Desain Terukur, Audit Kebergunaan Heuristik',
            ],
        ];
        foreach ($skills as $skill) {
            PortfolioSkill::create($skill);
        }

        // 4. Projects
        PortfolioProject::truncate();
        $projects = [
            [
                'title_en' => 'BENGKENG',
                'title_id' => 'BENGKENG',
                'description_en' => 'On-demand mobile mechanic service platform bridging vehicle breakdowns with certified technicians in real-time. Features geo-tracking, booking engine, and custom design tokens.',
                'description_id' => 'Platform layanan mekanik seluler sesuai permintaan yang menjembatani kerusakan kendaraan dengan teknisi bersertifikat secara real-time. Menampilkan pelacakan geo, mesin pemesanan, dan token desain khusus.',
                'image' => 'https://images.unsplash.com/photo-1618761714954-0b8cd0026356?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => '#',
                'category' => 'MOBILE APP ARCHITECTURE',
                'year' => '2024',
                'tags' => 'Figma, Mobile UI',
                'top_label' => 'ID: PRJ-01 // UI/UX',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
            ],
            [
                'title_en' => 'CerdasSampah.id',
                'title_id' => 'CerdasSampah.id',
                'description_en' => 'Educational web platform and citizen portal for urban waste segregation and sustainable recycling campaigns, equipped with real-time drop point tracking and analytics.',
                'description_id' => 'Platform web pendidikan dan portal warga untuk pemisahan sampah perkotaan dan kampanye daur ulang berkelanjutan, dilengkapi dengan pelacakan dan analitik titik jatuh waktu nyata.',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => '#',
                'category' => 'WEB PLATFORM & CMS',
                'year' => '2024',
                'tags' => 'Tailwind, React',
                'top_label' => 'ID: PRJ-02 // WEB PLATFORM',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
            ],
            [
                'title_en' => 'MANGKUPLIBDJ',
                'title_id' => 'MANGKUPLIBDJ',
                'description_en' => 'Comprehensive creative identity, custom typography, apparel graphics, and packaging guidelines for an underground urban music and youth lifestyle collective.',
                'description_id' => 'Identitas kreatif komprehensif, tipografi khusus, grafis pakaian, dan panduan pengemasan untuk kolektif musik urban dan gaya hidup anak muda bawah tanah.',
                'image' => 'https://images.unsplash.com/photo-1558655146-d09347e92766?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => '#',
                'category' => 'MERCHANDISE & VISUAL ID',
                'year' => '2023',
                'tags' => 'Branding, Print',
                'top_label' => 'ID: PRJ-03 // BRAND IDENTITY',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>',
            ],
            [
                'title_en' => 'Polibanverse',
                'title_id' => 'Polibanverse',
                'description_en' => 'Immersive virtual campus exploration gateway providing 3D facility previews, department directories, and real-time student activity radar for Politeknik Negeri Banjarmasin.',
                'description_id' => 'Gerbang eksplorasi kampus virtual imersif yang menyediakan pratinjau fasilitas 3D, direktori departemen, dan radar aktivitas siswa waktu nyata untuk Politeknik Negeri Banjarmasin.',
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'link' => '#',
                'category' => 'INTERACTIVE VIRTUAL CAMPUS',
                'year' => '2023 - 2024',
                'tags' => 'Three.js, WebDev',
                'top_label' => 'ID: PRJ-04 // INTERACTIVE WEB',
                'action_icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>',
            ],
        ];
        foreach ($projects as $project) {
            PortfolioProject::create($project);
        }

        // 5. Experiences
        PortfolioExperience::truncate();
        $experiences = [
            [
                'role_en' => 'Research & Development Coordinator',
                'role_id' => 'Koordinator Riset & Pengembangan',
                'company' => 'LPM Lensa Poliban (Campus Press & Media)',
                'duration' => '2023 - PRESENT',
                'description_en' => 'Directed digital media evolution, oversaw full editorial visual identity transformation, and architected modern publication workflows resulting in +85% digital readership engagement.',
                'description_id' => 'Mengarahkan evolusi media digital, mengawasi transformasi identitas visual editorial penuh, dan merancang alur kerja publikasi modern yang menghasilkan +85% keterlibatan pembaca digital.',
            ],
            [
                'role_en' => 'Product Development Intern',
                'role_id' => 'Magang Pengembangan Produk',
                'company' => 'PT VIA Digital Nusantara',
                'duration' => '2023',
                'description_en' => 'Collaborated directly with engineering teams to formulate frontend components, maintain design tokens in Figma, and build responsive modular landing systems.',
                'description_id' => 'Berkolaborasi langsung dengan tim teknik untuk merumuskan komponen frontend, memelihara token desain di Figma, dan membangun sistem pendaratan modular yang responsif.',
            ],
            [
                'role_en' => 'Senior Editor & Graphic Designer',
                'role_id' => 'Editor Senior & Desainer Grafis',
                'company' => 'Independent Practice & Agency Contracts',
                'duration' => '2021 - 2023',
                'description_en' => 'Executed brand asset guidelines, promotional campaign posters, video editing reels, and commercial identity suites for over 30 regional corporate and independent clients.',
                'description_id' => 'Mengeksekusi pedoman aset merek, poster kampanye promosi, gulungan pengeditan video, dan suite identitas komersial untuk lebih dari 30 klien korporat dan independen regional.',
            ],
        ];
        foreach ($experiences as $experience) {
            PortfolioExperience::create($experience);
        }

        // 6. Services (Accreditations)
        PortfolioService::truncate();
        $services = [
            [
                'title_en' => 'Junior Web Developer',
                'title_id' => 'Pengembang Web Junior',
                'description_en' => 'National standard professional competency certification covering HTML5, CSS3, JavaScript engines, web security best practices, and database connectivity.',
                'description_id' => 'Sertifikasi kompetensi profesional standar nasional yang mencakup HTML5, CSS3, mesin JavaScript, praktik terbaik keamanan web, dan konektivitas basis data.',
                'tag' => 'BNSP INDONESIA CERTIFIED',
                'year' => 'REG. 2024',
                'authority' => 'BNSP RI',
                'status' => 'VALID',
            ],
            [
                'title_en' => 'Multimedia Specialist Level II',
                'title_id' => 'Spesialis Multimedia Tingkat II',
                'description_en' => 'Certified proficiency in high-end raster and vector design production, commercial asset workflows, digital typography, and video timeline editing standards.',
                'description_id' => 'Kemahiran bersertifikat dalam produksi desain raster dan vektor kelas atas, alur kerja aset komersial, tipografi digital, dan standar pengeditan garis waktu video.',
                'tag' => 'BNSP INDONESIA CERTIFIED',
                'year' => 'REG. 2023',
                'authority' => 'LSP TELEMATIKA',
                'status' => 'VALID',
            ],
        ];
        foreach ($services as $service) {
            PortfolioService::create($service);
        }

        // 7. Catalogs (Services)
        PortfolioCatalog::truncate();
        $catalogs = [
            [
                'title_en' => 'Graphic & Brand Identity',
                'title_id' => 'Grafis & Identitas Merek',
                'description_en' => 'Logomarks, design tokens, brand books, print layouts, and cohesive visual identities.',
                'description_id' => 'Tanda logo, token desain, buku merek, tata letak cetak, dan identitas visual yang kohesif.',
            ],
            [
                'title_en' => 'Web Development & Jamstack',
                'title_id' => 'Pengembangan Web & Jamstack',
                'description_en' => 'High-performance modern web apps built with Tailwind, clean semantic HTML, and React.',
                'description_id' => 'Aplikasi web modern berperforma tinggi yang dibangun dengan Tailwind, HTML semantik yang bersih, dan React.',
            ],
            [
                'title_en' => 'UI/UX System Architecture',
                'title_id' => 'Arsitektur Sistem UI/UX',
                'description_en' => 'User journey mapping, wireframing, high-fidelity prototypes, and design system libraries in Figma.',
                'description_id' => 'Pemetaan perjalanan pengguna, kerangka gambar, prototipe fidelitas tinggi, dan pustaka sistem desain di Figma.',
            ],
            [
                'title_en' => 'Creative Direction & Editorial',
                'title_id' => 'Arahan Kreatif & Editorial',
                'description_en' => 'Art direction for publications, promotional campaigns, editorial storytelling, and content strategy.',
                'description_id' => 'Arahan seni untuk publikasi, kampanye promosi, penyampaian cerita editorial, dan strategi konten.',
            ],
        ];
        foreach ($catalogs as $catalog) {
            PortfolioCatalog::create($catalog);
        }
    }
}
