<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CMS Dashboard</title>
    @vite(['resources/css/cms.css'])
</head>
<body>

<div class="layout">
    
    <!-- LEFT SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="d-flex align-center gap-1">
                <div style="width: 8px; height: 8px; background: white;"></div>
                <h2 style="font-size: 14px; letter-spacing: 0.1em; font-weight: 700;">STUDIO //</h2>
            </div>
            <div class="mono text-muted text-xs mt-1" style="margin-top: 4px;">CMS STATE ENGINE</div>
        </div>
        
        <nav class="sidebar-nav" style="overflow-y: auto;">
            <!-- Main Nav Item -->
            <div class="nav-item active" style="margin-bottom: 8px;">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line></svg>
                Landing Page
            </div>
            
            <!-- NEW: Sections moved into Sidebar as a submenu -->
            <div style="padding-left: 48px; display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                <a href="#" class="sidebar-section-link text-sm" data-target="sec-hero" style="color: #fff;">01 // Hero & Bio</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-stats">02 // Stats & Matrix</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-skills">03 // Skills & Pillars</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-portfolio">04 // Portfolio Seq...</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-experience">05 // Experience</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-services">06 // Services</a>
                <a href="#" class="sidebar-section-link text-sm text-sec" data-target="sec-contact">07 // Contact</a>
            </div>

            <a href="#" class="nav-item" onclick="document.querySelectorAll('.editor-section').forEach(el => el.style.display = 'none'); document.getElementById('sec-inbox').style.display = 'block'; document.querySelectorAll('.sidebar-section-link').forEach(el => {el.style.color = 'var(--text-sec)';});">
                <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                Inbox / Inquiries
            </a>
        </nav>
        
        <div class="sidebar-footer">
            <div class="mono text-muted text-xs mb-2 d-flex justify-between" style="margin-bottom: 8px;">
                <span>VIEW: LIVE</span>
                <a href="/" target="_blank" style="color: inherit;">PORTFOLIO &nearr;</a>
            </div>
            <div class="user-card">
                <div class="avatar">MA</div>
                <div style="flex-grow: 1;">
                    <div style="font-size: 11px; font-weight: 500;">M. Irfan Akbar</div>
                    <div class="text-xs text-muted">SYS ADMIN</div>
                </div>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-sec"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </div>
        </div>
    </aside>
    
    <!-- MAIN CONTENT -->
    <main class="main">
        <header class="main-header">
            <div class="d-flex align-center gap-2">
                <span class="mono text-xs text-sec" style="line-height:1.2;">PORTFOLIO<br>SUITE</span>
                <span class="text-sec">&rsaquo;</span>
                <h1 style="font-size: 13px; font-weight: 600;">LANDING PAGE CONTENT MANAGER</h1>
                
                <div class="d-flex align-center gap-1" style="margin-left: 24px; border-left: 1px solid var(--border); padding-left: 24px;">
                    <div style="width:6px; height:6px; border-radius:50%; background:#10b981;" id="save-status-indicator"></div>
                    <span class="mono text-xs" id="save-status-text">LIVE ROUTER</span>
                </div>
            </div>
            
            <div class="d-flex align-center gap-3">
                <!-- Lang Toggle -->
                <div class="d-flex align-center gap-1 cursor-pointer" onclick="toggleCmsLang()" style="border: 1px solid var(--border); border-radius: 20px; padding: 2px;">
                    <span id="cms-lang-en" style="padding: 4px 8px; border-radius: 12px; font-size: 10px; font-weight: bold; background: white; color: black;" class="mono">EN</span>
                    <span id="cms-lang-id" style="padding: 4px 8px; border-radius: 12px; font-size: 10px; color: var(--text-sec);" class="mono">ID</span>
                </div>
                
                <!-- Theme Toggle -->
                <button class="btn btn-ghost" onclick="toggleCmsTheme()" id="cms-theme-btn" style="padding: 6px; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>
                </button>

                <button class="btn btn-ghost" onclick="window.location.reload()">Discard Changes</button>
                <button class="btn btn-white" id="btn-save">Save & Publish Changes</button>
            </div>
        </header>
        
        <div class="editor">
            <div class="editor-inner">
                
                <!-- SEC 1 -->
                <div class="card editor-section" id="sec-hero">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 1</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Hero & Primary Identity</h2>
                        </div>
                        <span class="mono text-xs text-muted">HERO HEADER BINDING: MOUNTED</span>
                    </div>
                    
                    <div class="card-body">
                        <div class="grid-2">
                            <div class="form-group">
                                <label class="form-label">FULL NAME <span class="text-muted">*REQUIRED</span></label>
                                <input type="text" class="form-input" id="input-hero-name" value="{{ $data['hero_name'] ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">PRIMARY ROLE / TITLE <span class="text-muted">*REQUIRED</span></label>
                                <input type="text" class="form-input" id="input-hero-role" value="{{ $data['hero_role'] ?? '' }}">
                            </div>
                        </div>
                        
                        <div class="toggle-box" style="cursor: pointer; display: flex; justify-content: space-between; align-items: center;" onclick="toggleAvailability()">
                            <div>
                                <div style="font-size: 12px; font-weight: 600;">AVAILABILITY STATUS BADGE</div>
                                <div class="text-muted text-xs" style="margin-top: 4px;">CURRENT SETTING: <span id="availability-text">{{ ($data['hero_availability_status'] ?? '1') == '1' ? 'AVAILABLE FOR FREELANCE & FULL TIME' : 'UNAVAILABLE AT THE MOMENT' }}</span></div>
                            </div>
                            <input type="hidden" id="input-hero-availability-status" value="{{ $data['hero_availability_status'] ?? '1' }}">
                            <div id="availability-toggle-ui" style="width: 44px; height: 24px; border-radius: 12px; background: {{ ($data['hero_availability_status'] ?? '1') == '1' ? 'white' : '#333' }}; position: relative; transition: background 0.3s; flex-shrink: 0;">
                                <div id="availability-toggle-circle" style="width: 20px; height: 20px; border-radius: 50%; background: {{ ($data['hero_availability_status'] ?? '1') == '1' ? 'black' : '#888' }}; position: absolute; top: 2px; left: {{ ($data['hero_availability_status'] ?? '1') == '1' ? '22px' : '2px' }}; transition: left 0.3s, background 0.3s;"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <span>COPY / BIO SUB-HEADLINE</span>
                                <span>EN</span>
                            </label>
                            <textarea class="form-input" id="input-hero-bio-en">{{ $data['hero_bio_en'] ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">
                                <span>COPY / BIO SUB-HEADLINE</span>
                                <span>ID</span>
                            </label>
                            <textarea class="form-input" id="input-hero-bio-id">{{ $data['hero_bio_id'] ?? '' }}</textarea>
                        </div>
                        
                        <div class="upload-box">
                            <input type="hidden" id="input-hero-image" value="{{ $data['hero_image'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150' }}">
                            <input type="file" id="hero-image-file" style="display:none;" accept="image/*" onchange="uploadHeroImage(event)">
                            <img src="{{ $data['hero_image'] ?? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150' }}" alt="Portrait" class="upload-thumb" id="hero-image-thumb" style="object-fit: cover; object-position: center {{ $data['hero_image_align'] ?? '50' }}%;">
                            <div style="flex-grow: 1;">
                                <div class="d-flex justify-between" style="margin-bottom: 4px;">
                                    <h3 style="font-size: 12px; font-weight: 600;">Hero Portrait Asset</h3>
                                    <span class="mono text-xs text-muted" id="hero-image-status">WEBP / 1.2 MB</span>
                                </div>
                                <p class="text-muted text-xs" style="margin-bottom: 12px;">Optimal dimension: 1600x1200px. High contrast recommended. Center focal point.</p>
                                <div class="d-flex gap-1" style="margin-bottom: 12px;">
                                    <button type="button" class="btn btn-outline mono text-xs" onclick="document.getElementById('hero-image-file').click()">REPLACE MEDIA</button>
                                    <button type="button" class="btn btn-ghost mono text-xs" onclick="removeHeroImage()">REMOVE ASSET</button>
                                </div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <div class="d-flex justify-between" style="margin-bottom: 4px;">
                                        <label class="form-label" style="font-size: 10px;">ADJUST FOCUS (UP / DOWN)</label>
                                        <span class="mono text-xs text-muted" id="align-val-display">{{ $data['hero_image_align'] ?? '50' }}%</span>
                                    </div>
                                    <input type="range" id="input-hero-image-align" class="form-input" min="0" max="100" value="{{ $data['hero_image_align'] ?? '50' }}" style="padding: 0; height: auto;" oninput="document.getElementById('hero-image-thumb').style.objectPosition = 'center ' + this.value + '%'; document.getElementById('align-val-display').innerText = this.value + '%';">
                                </div>
                            </div>
                        </div>

                        <div class="upload-box" style="margin-top: 16px;">
                            <input type="hidden" id="input-cv-file" value="{{ $data['cv_file'] ?? '/storage/cv/cv-muhammad-irfan-akbar.pdf' }}">
                            <input type="file" id="cv-upload-file" style="display:none;" accept="application/pdf" onchange="uploadCvDocument(event)">
                            <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: #222; border: 1px solid #333; border-radius: 4px; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #ef4444;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            </div>
                            <div style="flex-grow: 1;">
                                <div class="d-flex justify-between" style="margin-bottom: 4px;">
                                    <h3 style="font-size: 12px; font-weight: 600;">Curriculum Vitae (CV) PDF Asset</h3>
                                    <span class="mono text-xs text-muted" id="cv-status">PDF LINKED</span>
                                </div>
                                <p class="text-muted text-xs" style="margin-bottom: 12px;">Active PDF: <a href="{{ route('cv.view') }}" target="_blank" class="mono" style="color: #10b981; text-decoration: underline;">View Current CV &nearr;</a></p>
                                <div class="d-flex gap-1">
                                    <button type="button" class="btn btn-outline mono text-xs" onclick="document.getElementById('cv-upload-file').click()">REPLACE CV (PDF)</button>
                                    <a href="{{ route('cv.download') }}" class="btn btn-ghost mono text-xs" style="display: inline-flex; align-items: center;">DOWNLOAD CV</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEC 2 -->
                <div class="card editor-section" id="sec-stats" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 2</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Quick Stats & Metrics HUD</h2>
                        </div>
                        <span class="mono text-xs text-muted">GRID COUNTERS</span>
                    </div>
                    <div class="card-body">
                        <div class="grid-3">
                            @foreach(($data['stats'] ?? []) as $i => $stat)
                            <div class="form-group">
                                <label class="form-label">STAT {{ $i + 1 }}</label>
                                <input type="text" class="form-input" id="input-stat-{{$i}}-val" style="font-size: 18px; font-weight: 700; padding: 16px;" value="{{ $stat['value'] }}">
                                <input type="text" class="form-input text-sm" id="input-stat-{{$i}}-label" value="{{ $stat['label_en'] }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- SEC 3 -->
                <div class="card editor-section" id="sec-skills" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 3</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Skills Matrix & Core Pillars</h2>
                        </div>
                        <button type="button" class="btn btn-outline mono text-xs" style="padding: 4px 8px;" onclick="addSkillRow()">+ ADD NEW</button>
                    </div>
                    <div class="card-body">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 16px;" id="skills-container">
                            @foreach(($data['skills'] ?? []) as $i => $skill)
                            <div class="skill-item group" style="background: #121212; padding: 24px; border: 1px solid #222; border-radius: 12px; transition: all 0.3s ease; display: flex; flex-direction: column;">
                                <div class="d-flex justify-between" style="margin-bottom: 24px;">
                                    <span class="mono text-xs" style="color: #71717a; letter-spacing: 0.1em;">PIL.0{{ $i + 1 }}</span>
                                    <span class="text-xs" style="color: #555; cursor: pointer;" onclick="this.closest('.skill-item').remove()">✖</span>
                                </div>
                                <input type="text" class="form-input s-title" value="{{ $skill['title_en'] }}" placeholder="Skill Title" style="background: transparent; border: none; padding: 0; font-size: 24px; font-weight: 700; color: white; margin-bottom: 16px; box-shadow: none; width: 100%; outline: none;">
                                <input type="hidden" class="s-icon" value="{{ $skill['icon'] ?? '' }}">
                                <textarea class="form-input s-desc" placeholder="Description before points..." style="background: transparent; border: none; padding: 0; font-size: 14px; line-height: 1.625; color: #a1a1aa; resize: vertical; min-height: 60px; box-shadow: none; width: 100%; outline: none; margin-bottom: 16px;">{{ $skill['description_en'] ?? '' }}</textarea>
                                <textarea class="form-input s-items" placeholder="Bullet points (comma separated)" style="background: transparent; border: none; padding: 0; font-size: 14px; line-height: 1.625; color: #d4d4d8; font-weight: 500; resize: vertical; min-height: 80px; box-shadow: none; width: 100%; outline: none; flex-grow: 1;">{{ $skill['items_en'] }}</textarea>
                                <div style="margin-top: 32px; font-family: monospace; font-size: 9px; color: #52525b; letter-spacing: 0.1em;">SPECS: COGNITIVE / SYNC</div>
                            </div>
                            @endforeach
                        </div>

                        <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--border);">
                            <div class="form-group" style="margin-bottom: 0;">
                                <label class="form-label mono" style="font-size: 11px; color: #a1a1aa; letter-spacing: 0.1em; display: flex; align-items: center; gap: 8px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                                    CORE TOOLING SUITE (COMMA SEPARATED)
                                </label>
                                <input type="text" class="form-input" id="input-core-tools" value="{{ $data['core_tools'] ?? 'Figma Pro, Adobe Creative Cloud (Ps, Ai, Pr), VS Code Engine, CapCut Pro, Git & CLI' }}" placeholder="e.g. Figma Pro, React.js, VS Code" style="background: #111; border: 1px solid #333; color: white;">
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- SEC 4 -->
                <div class="card editor-section" id="sec-portfolio" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 4</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Featured Portfolio Sequencing</h2>
                        </div>
                        <button type="button" class="btn btn-outline mono text-xs" style="padding: 4px 8px;" onclick="addPortfolioRow()">+ ADD NEW</button>
                    </div>
                    <div class="card-body" id="portfolio-container" style="padding: 16px;">
                        @foreach(($data['projects'] ?? []) as $i => $item)
                        <div class="portfolio-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                            <div class="form-group"><label class="form-label">Title EN</label><input type="text" class="form-input p-title-en" value="{{ $item['title_en'] }}"></div>
                            <div class="form-group"><label class="form-label">Title ID</label><input type="text" class="form-input p-title-id" value="{{ $item['title_id'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Category</label><input type="text" class="form-input p-category" value="{{ $item['category'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Year</label><input type="text" class="form-input p-year" value="{{ $item['year'] ?? '' }}"></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Image URL</label><input type="text" class="form-input p-image" value="{{ $item['image'] ?? '' }}"></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input p-desc-en" rows="2">{{ $item['description_en'] ?? '' }}</textarea></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input p-desc-id" rows="2">{{ $item['description_id'] ?? '' }}</textarea></div>
                            <div class="form-group"><label class="form-label">Tags (comma separated)</label><input type="text" class="form-input p-tags" value="{{ $item['tags'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Link</label><input type="text" class="form-input p-link" value="{{ $item['link'] ?? '' }}"></div>
                            <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- SEC 5 -->
                <div class="card editor-section" id="sec-experience" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 5</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Experience Pipeline</h2>
                        </div>
                        <button type="button" class="btn btn-outline mono text-xs" style="padding: 4px 8px;" onclick="addExperienceRow()">+ ADD NEW</button>
                    </div>
                    <div class="card-body" id="experience-container">
                        @foreach(($data['experiences'] ?? []) as $i => $item)
                        <div class="experience-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                            <div class="form-group"><label class="form-label">Role EN</label><input type="text" class="form-input e-role-en" value="{{ $item['role_en'] }}"></div>
                            <div class="form-group"><label class="form-label">Role ID</label><input type="text" class="form-input e-role-id" value="{{ $item['role_id'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Company</label><input type="text" class="form-input e-company" value="{{ $item['company'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Duration</label><input type="text" class="form-input e-duration" value="{{ $item['duration'] ?? '' }}"></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input e-desc-en" rows="2">{{ $item['description_en'] ?? '' }}</textarea></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input e-desc-id" rows="2">{{ $item['description_id'] ?? '' }}</textarea></div>
                            <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- SEC 6 -->
                <div class="card editor-section" id="sec-services" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 6</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Services Catalog</h2>
                        </div>
                        <button type="button" class="btn btn-outline mono text-xs" style="padding: 4px 8px;" onclick="addServiceRow()">+ ADD NEW</button>
                    </div>
                    <div class="card-body" id="services-container">
                        @foreach(($data['services'] ?? []) as $i => $item)
                        <div class="service-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                            <div class="form-group"><label class="form-label">Title EN</label><input type="text" class="form-input s-title-en" value="{{ $item['title_en'] }}"></div>
                            <div class="form-group"><label class="form-label">Title ID</label><input type="text" class="form-input s-title-id" value="{{ $item['title_id'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Authority</label><input type="text" class="form-input s-authority" value="{{ $item['authority'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Year</label><input type="text" class="form-input s-year" value="{{ $item['year'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Status</label><input type="text" class="form-input s-status" value="{{ $item['status'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Tag (e.g. CERTIFIED)</label><input type="text" class="form-input s-tag" value="{{ $item['tag'] ?? '' }}"></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input s-desc-en" rows="2">{{ $item['description_en'] ?? '' }}</textarea></div>
                            <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input s-desc-id" rows="2">{{ $item['description_id'] ?? '' }}</textarea></div>
                            <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
                        </div>
                        @endforeach
                    </div>

                    <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--border);">
                        <div style="background: #121212; border: 1px solid #222; border-radius: 12px; padding: 24px;">
                            <div class="d-flex align-center gap-2 mb-4" style="margin-bottom: 20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-muted"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><rect x="7" y="7" width="3" height="3"></rect><rect x="14" y="7" width="3" height="3"></rect><rect x="7" y="14" width="3" height="3"></rect><rect x="14" y="14" width="3" height="3"></rect></svg>
                                <h3 style="font-size: 12px; font-weight: 700; letter-spacing: 0.1em; color: white; font-family: monospace; margin: 0;">CREDENTIAL REPOSITORY FOOTER CARD</h3>
                            </div>
                            <div class="grid-2">
                                <div class="form-group">
                                    <label class="form-label">CARD TITLE</label>
                                    <input type="text" class="form-input" id="input-evolution-title" value="{{ $data['evolution_title_en'] ?? 'Continuous Evolution' }}" style="background: #1a1a1a;">
                                </div>
                                <div class="form-group" style="grid-column: span 2;">
                                    <label class="form-label">CARD DESCRIPTION</label>
                                    <textarea class="form-input" id="input-evolution-desc" rows="2" style="background: #1a1a1a;">{{ $data['evolution_desc_en'] ?? 'Regularly updating modern stacks across React, Next.js, Headless CMS, and architectural UI design systems.' }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEC 7 -->
                <div class="card editor-section" id="sec-contact" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs">SEC 7</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Contact Routing</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label">INBOUND ROUTING EMAIL ADDRESS</label>
                            <input type="email" class="form-input" id="input-contact" value="{{ $data['contact_email'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <!-- INBOX SECTION -->
                <div class="card editor-section" id="sec-inbox" style="display: none;">
                    <div class="card-header">
                        <div class="d-flex align-center">
                            <span class="badge mono text-xs" style="background: #3b82f6; color: white; border: none;">NEW</span>
                            <h2 style="font-size: 13px; font-weight: 600;">Inbox & Inquiries</h2>
                        </div>
                        <span class="mono text-xs text-muted">{{ count($inquiries ?? []) }} MESSAGES</span>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        @if(isset($inquiries) && count($inquiries) > 0)
                            <div style="display: flex; flex-direction: column;">
                                @foreach($inquiries as $msg)
                                <div id="msg-{{ $msg->id }}" style="padding: 24px; border-bottom: 1px solid var(--border); background: {{ $msg->is_read ? 'transparent' : 'rgba(59, 130, 246, 0.05)' }}; transition: background 0.3s;">
                                    <div class="d-flex justify-between" style="margin-bottom: 16px;">
                                        <div>
                                            <div style="font-size: 16px; font-weight: 700; color: white;">{{ $msg->name }}</div>
                                            <div class="mono text-xs" style="color: #a1a1aa; margin-top: 4px;">
                                                <a href="mailto:{{ $msg->email }}" style="color: #3b82f6; text-decoration: none;">{{ $msg->email }}</a> • {{ $msg->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <div>
                                            <span class="badge mono text-xs" style="background: #222; border-color: #333;">{{ $msg->category ?? 'General' }}</span>
                                        </div>
                                    </div>
                                    <div style="font-size: 14px; line-height: 1.6; color: #d4d4d8; background: #111; padding: 16px; border-radius: 8px; border: 1px solid #222; margin-bottom: 16px;">
                                        {!! nl2br(e($msg->message)) !!}
                                    </div>
                                    <div class="d-flex gap-2">
                                        @if(!$msg->is_read)
                                        <button class="btn btn-white text-xs mono" onclick="markAsRead({{ $msg->id }})" id="btn-read-{{ $msg->id }}" style="padding: 6px 12px;">MARK AS READ</button>
                                        @endif
                                        <button class="btn btn-outline text-xs mono" onclick="deleteInquiry({{ $msg->id }})" style="padding: 6px 12px; border-color: #ef4444; color: #ef4444;">DELETE</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div style="padding: 48px; text-align: center; color: #71717a;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin: 0 auto 16px auto; opacity: 0.5;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <div style="font-weight: 500;">No inquiries found.</div>
                                <div class="text-xs mt-1">Incoming messages from the landing page will appear here.</div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </main>
    
    <!-- RIGHT SIDEBAR (LIVE PREVIEW) -->
    <aside class="right-panel">
        <div class="right-header">
            <span class="mono text-xs text-muted d-flex align-center gap-1">
                <div style="width:6px; height:6px; border-radius:50%; background:#ef4444;" id="live-dot"></div>
                LIVE PREVIEW RENDER // <span id="clock">12:21H</span>
            </span>
        </div>
        
        <div class="preview-area">
            
            <div class="phone-mockup">
                <div class="d-flex justify-between" style="font-size: 8px; color: var(--text-sec); margin-bottom: 16px; font-family: var(--font-mono);">
                    <span>9:41</span>
                    <span>&#128246; 100%</span>
                </div>
                
                <div>
                    <div class="mono text-sec" style="font-size: 6px; margin-bottom: 16px; border-bottom: 1px solid #333; padding-bottom: 8px; display: flex; justify-content: space-between;">
                        <span id="preview-nav-name" style="text-transform: uppercase;">{{ $data['hero_name'] ?? '' }}</span>
                        <span>EN | ID &nbsp; &#9788;</span>
                    </div>
                    
                    <span class="mono text-sec" style="font-size: 6px; display:block; margin-bottom: 4px;">BASED IN YOGYAKARTA, ID</span>
                    
                    @php $isAvailable = ($data['hero_availability_status'] ?? '1') == '1'; @endphp
                    <div id="preview-availability-badge" style="display: flex; align-items: center; gap: 4px; font-family: var(--font-mono); font-size: 6px; color: var(--text-sec); text-transform: uppercase; margin-bottom: 8px;">
                        <span id="preview-availability-dot" style="width: 4px; height: 4px; border-radius: 50%; background: {{ $isAvailable ? '#10b981' : '#ef4444' }};"></span>
                        STATUS: <span id="preview-availability-text" style="color: var(--text-main); font-weight: bold;">{{ $isAvailable ? 'ONLINE' : 'BUSY' }}</span>
                    </div>

                    <h1 id="preview-hero-name" style="font-family: var(--font-sans); font-size: 18px; font-weight: 600; line-height: 1.1; margin-bottom: 8px; text-transform: uppercase; color: var(--text-main); word-break: break-word;">
                        {!! str_replace(' ', '<br>', e($data['hero_name'] ?? '')) !!}
                    </h1>
                    
                    <h2 id="preview-hero-role" style="font-size: 8px; color: #a0a0a5; font-weight: 500; margin-bottom: 12px;">{{ $data['hero_role'] ?? '' }}</h2>
                    
                    <p id="preview-hero-bio" style="font-size: 7px; color: #666; margin-bottom: 16px; line-height: 1.4; max-width: 90%;">{{ $data['hero_bio_en'] ?? '' }}</p>
                    
                    <div style="display: flex; gap: 4px;">
                        <div style="background: white; color: black; font-size: 6px; padding: 4px 8px; font-weight: 600;">Explore Projects</div>
                        <div style="border: 1px solid #444; color: white; font-size: 6px; padding: 4px 8px; font-weight: 600;">Download CV</div>
                    </div>
                </div>
            </div>
            
            <div class="stats-box">
                <h4 class="mono text-xs text-muted" style="margin-bottom: 16px;">ASSET & CONSISTENCY ENGINE</h4>
                <div class="stat-row">
                    <span class="text-sm font-medium d-flex align-center gap-1" style="color: var(--text-main);">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Bilingual Completeness
                    </span>
                    <span class="mono text-xs text-muted" style="text-align: right;">100% ID/EN<br>SYNCHED</span>
                </div>
                <div class="stat-row">
                    <span class="text-sm font-medium d-flex align-center gap-1" style="color: var(--text-main);">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        Asset Payload Status
                    </span>
                    <span class="mono text-xs text-muted" style="text-align: right;">2.4MB /<br>OPTIMIZED</span>
                </div>
            </div>
            
        </div>
    </aside>

</div>

<script>
    // --- SIDEBAR SECTION NAVIGATION ---
    const sectionLinks = document.querySelectorAll('.sidebar-section-link');
    const editorSections = document.querySelectorAll('.editor-section');
    
    sectionLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            // Reset links
            sectionLinks.forEach(l => {
                l.style.color = 'var(--text-sec)';
                l.classList.remove('active');
            });
            // Activate current
            link.style.color = '#fff';
            link.classList.add('active');
            
            // Hide all sections
            editorSections.forEach(sec => sec.style.display = 'none');
            
            // Show targeted section
            const targetId = link.getAttribute('data-target');
            document.getElementById(targetId).style.display = 'block';
        });
    });

    // --- TOGGLE AVAILABILITY ---
    function toggleAvailability() {
        const input = document.getElementById('input-hero-availability-status');
        const text = document.getElementById('availability-text');
        const ui = document.getElementById('availability-toggle-ui');
        const circle = document.getElementById('availability-toggle-circle');
        const previewDot = document.getElementById('preview-availability-dot');
        const previewStatus = document.getElementById('preview-availability-text');
        
        if (input.value === '1') {
            input.value = '0';
            text.innerText = 'UNAVAILABLE AT THE MOMENT';
            ui.style.background = '#333';
            circle.style.left = '2px';
            circle.style.background = '#888';
            if(previewDot) previewDot.style.background = '#ef4444';
            if(previewStatus) previewStatus.innerText = 'BUSY';
        } else {
            input.value = '1';
            text.innerText = 'AVAILABLE FOR FREELANCE & FULL TIME';
            ui.style.background = 'white';
            circle.style.left = '22px';
            circle.style.background = 'black';
            if(previewDot) previewDot.style.background = '#10b981';
            if(previewStatus) previewStatus.innerText = 'ONLINE';
        }
    }

    // --- REAL-TIME LIVE PREVIEW BINDING ---
    const inputs = {
        name: document.getElementById('input-hero-name'),
        role: document.getElementById('input-hero-role'),
        bioEn: document.getElementById('input-hero-bio-en'),
        bioId: document.getElementById('input-hero-bio-id')
    };
    
    const previews = {
        navName: document.getElementById('preview-nav-name'),
        heroName: document.getElementById('preview-hero-name'),
        heroRole: document.getElementById('preview-hero-role'),
        heroBio: document.getElementById('preview-hero-bio')
    };
    
    // Simulate live blink indicator
    setInterval(() => {
        const dot = document.getElementById('live-dot');
        dot.style.opacity = dot.style.opacity == 1 ? 0.3 : 1;
    }, 1000);

    // Update real-time clock
    setInterval(() => {
        const now = new Date();
        document.getElementById('clock').innerText = now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0') + 'H';
    }, 1000);

    // Bind inputs to DOM
    if(inputs.name) {
        inputs.name.addEventListener('input', (e) => {
            previews.navName.innerText = e.target.value;
            // The mockup wraps the name with <br> for styling
            previews.heroName.innerHTML = e.target.value.replace(/ /g, '<br>');
        });
    }
    
    if(inputs.role) {
        inputs.role.addEventListener('input', (e) => {
            previews.heroRole.innerText = e.target.value;
        });
    }
    
    if(inputs.bioEn) {
        inputs.bioEn.addEventListener('input', (e) => {
            if(currentCmsLang === 'en') previews.heroBio.innerText = e.target.value;
        });
    }

    if(inputs.bioId) {
        inputs.bioId.addEventListener('input', (e) => {
            if(currentCmsLang === 'id') previews.heroBio.innerText = e.target.value;
        });
    }

    // --- SAVE AND PUBLISH (AJAX) ---
    document.getElementById('btn-save').addEventListener('click', () => {
        const btn = document.getElementById('btn-save');
        const statusText = document.getElementById('save-status-text');
        
        btn.innerText = 'Publishing...';
        
        // Gather payload (using current data as base, replacing edited fields)
        let payload = {!! json_encode($data) !!};
        
        payload.hero_name = document.getElementById('input-hero-name').value;
        payload.hero_role = document.getElementById('input-hero-role').value;
        payload.hero_availability_status = document.getElementById('input-hero-availability-status') ? document.getElementById('input-hero-availability-status').value : '1';
        payload.hero_image = document.getElementById('input-hero-image').value;
        payload.hero_image_align = document.getElementById('input-hero-image-align') ? document.getElementById('input-hero-image-align').value : '50';
        payload.hero_bio_en = document.getElementById('input-hero-bio-en').value;
        payload.hero_bio_id = document.getElementById('input-hero-bio-id').value;
        payload.contact_email = document.getElementById('input-contact').value;
        payload.cv_file = document.getElementById('input-cv-file') ? document.getElementById('input-cv-file').value : '';
        
        if (document.getElementById('input-core-tools')) {
            payload.core_tools = document.getElementById('input-core-tools').value;
        }

        if (document.getElementById('input-evolution-title')) {
            payload.evolution_title_en = document.getElementById('input-evolution-title').value;
            payload.evolution_desc_en = document.getElementById('input-evolution-desc').value;
        }
        
        // Stats
        @foreach(($data['stats'] ?? []) as $i => $stat)
            if(document.getElementById('input-stat-{{$i}}-val')) {
                payload.stats[{{$i}}].value = document.getElementById('input-stat-{{$i}}-val').value;
                payload.stats[{{$i}}].label_en = document.getElementById('input-stat-{{$i}}-label').value;
            }
        @endforeach
        
        // Skills
        payload.skills = Array.from(document.querySelectorAll('.skill-item')).map(el => ({
            title_en: el.querySelector('.s-title').value,
            title_id: el.querySelector('.s-title').value,
            description_en: el.querySelector('.s-desc').value,
            description_id: el.querySelector('.s-desc').value,
            items_en: el.querySelector('.s-items').value,
            items_id: el.querySelector('.s-items').value,
            icon: el.querySelector('.s-icon') ? el.querySelector('.s-icon').value : null
        }));

        // New Sections
        payload.projects = Array.from(document.querySelectorAll('.portfolio-item')).map(el => ({
            title_en: el.querySelector('.p-title-en').value,
            title_id: el.querySelector('.p-title-id').value,
            category: el.querySelector('.p-category').value,
            year: el.querySelector('.p-year').value,
            image: el.querySelector('.p-image').value,
            description_en: el.querySelector('.p-desc-en').value,
            description_id: el.querySelector('.p-desc-id').value,
            tags: el.querySelector('.p-tags').value,
            link: el.querySelector('.p-link').value
        }));

        payload.experiences = Array.from(document.querySelectorAll('.experience-item')).map(el => ({
            role_en: el.querySelector('.e-role-en').value,
            role_id: el.querySelector('.e-role-id').value,
            company: el.querySelector('.e-company').value,
            duration: el.querySelector('.e-duration').value,
            description_en: el.querySelector('.e-desc-en').value,
            description_id: el.querySelector('.e-desc-id').value
        }));

        payload.services = Array.from(document.querySelectorAll('.service-item')).map(el => ({
            title_en: el.querySelector('.s-title-en').value,
            title_id: el.querySelector('.s-title-id').value,
            authority: el.querySelector('.s-authority').value,
            year: el.querySelector('.s-year').value,
            status: el.querySelector('.s-status').value,
            tag: el.querySelector('.s-tag').value,
            description_en: el.querySelector('.s-desc-en').value,
            description_id: el.querySelector('.s-desc-id').value
        }));

        fetch('/dashboard/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(payload)
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                btn.innerText = 'Published!';
                statusText.innerText = 'LIVE & SYNCED';
                setTimeout(() => { btn.innerText = 'Save & Publish Changes'; }, 3000);
            }
        });
    });

    function addSkillRow() {
        const i = document.querySelectorAll('.skill-item').length + 1;
        const html = `
            <div class="skill-item group" style="background: #121212; padding: 24px; border: 1px solid #222; border-radius: 12px; transition: all 0.3s ease; display: flex; flex-direction: column;">
                <div class="d-flex justify-between" style="margin-bottom: 24px;">
                    <span class="mono text-xs" style="color: #71717a; letter-spacing: 0.1em;">PIL.0${i}</span>
                    <span class="text-xs" style="color: #555; cursor: pointer;" onclick="this.closest('.skill-item').remove()">✖</span>
                </div>
                <input type="text" class="form-input s-title" value="New Skill Pillar" placeholder="Skill Title" style="background: transparent; border: none; padding: 0; font-size: 24px; font-weight: 700; color: white; margin-bottom: 16px; box-shadow: none; width: 100%; outline: none;">
                <input type="hidden" class="s-icon" value="">
                <textarea class="form-input s-desc" placeholder="Description before points..." style="background: transparent; border: none; padding: 0; font-size: 14px; line-height: 1.625; color: #a1a1aa; resize: vertical; min-height: 60px; box-shadow: none; width: 100%; outline: none; margin-bottom: 16px;">Fluent collaboration bridging technical constraints with creative objectives seamlessly.</textarea>
                <textarea class="form-input s-items" placeholder="Bullet points (comma separated)" style="background: transparent; border: none; padding: 0; font-size: 14px; line-height: 1.625; color: #d4d4d8; font-weight: 500; resize: vertical; min-height: 80px; box-shadow: none; width: 100%; outline: none; flex-grow: 1;">Skill detail 1, Skill detail 2</textarea>
                <div style="margin-top: 32px; font-family: monospace; font-size: 9px; color: #52525b; letter-spacing: 0.1em;">SPECS: COGNITIVE / SYNC</div>
            </div>
        `;
        document.getElementById('skills-container').insertAdjacentHTML('beforeend', html);
    }

    function addPortfolioRow() {
        const html = `
            <div class="portfolio-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                <div class="form-group"><label class="form-label">Title EN</label><input type="text" class="form-input p-title-en" value="New Project"></div>
                <div class="form-group"><label class="form-label">Title ID</label><input type="text" class="form-input p-title-id" value="Proyek Baru"></div>
                <div class="form-group"><label class="form-label">Category</label><input type="text" class="form-input p-category" value="WEB PLATFORM"></div>
                <div class="form-group"><label class="form-label">Year</label><input type="text" class="form-input p-year" value="2026"></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Image URL</label><input type="text" class="form-input p-image" value="https://"></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input p-desc-en" rows="2"></textarea></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input p-desc-id" rows="2"></textarea></div>
                <div class="form-group"><label class="form-label">Tags (comma separated)</label><input type="text" class="form-input p-tags" value="UX, UI"></div>
                <div class="form-group"><label class="form-label">Link</label><input type="text" class="form-input p-link" value="https://"></div>
                <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
            </div>
        `;
        document.getElementById('portfolio-container').insertAdjacentHTML('beforeend', html);
    }
    function addExperienceRow() {
        const html = `
            <div class="experience-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                <div class="form-group"><label class="form-label">Role EN</label><input type="text" class="form-input e-role-en" value="Job Title"></div>
                <div class="form-group"><label class="form-label">Role ID</label><input type="text" class="form-input e-role-id" value="Posisi"></div>
                <div class="form-group"><label class="form-label">Company</label><input type="text" class="form-input e-company" value="Company Name"></div>
                <div class="form-group"><label class="form-label">Duration</label><input type="text" class="form-input e-duration" value="2020 - Present"></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input e-desc-en" rows="2"></textarea></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input e-desc-id" rows="2"></textarea></div>
                <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
            </div>
        `;
        document.getElementById('experience-container').insertAdjacentHTML('beforeend', html);
    }
    function addServiceRow() {
        const html = `
            <div class="service-item grid-2" style="background: var(--bg-input); padding: 16px; margin-bottom: 16px; border: 1px solid var(--border);">
                <div class="form-group"><label class="form-label">Title EN</label><input type="text" class="form-input s-title-en" value="Service"></div>
                <div class="form-group"><label class="form-label">Title ID</label><input type="text" class="form-input s-title-id" value="Layanan"></div>
                <div class="form-group"><label class="form-label">Authority</label><input type="text" class="form-input s-authority" value="ORG"></div>
                <div class="form-group"><label class="form-label">Year</label><input type="text" class="form-input s-year" value="2026"></div>
                <div class="form-group"><label class="form-label">Status</label><input type="text" class="form-input s-status" value="ACTIVE"></div>
                <div class="form-group"><label class="form-label">Tag</label><input type="text" class="form-input s-tag" value="CERTIFIED"></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description EN</label><textarea class="form-input s-desc-en" rows="2"></textarea></div>
                <div class="form-group" style="grid-column: span 2;"><label class="form-label">Description ID</label><textarea class="form-input s-desc-id" rows="2"></textarea></div>
                <button type="button" class="btn btn-outline text-xs" style="grid-column: span 2; border-color: #ef4444; color: #ef4444;" onclick="this.parentElement.remove()">Remove</button>
            </div>
        `;
        document.getElementById('services-container').insertAdjacentHTML('beforeend', html);
    }

    function uploadHeroImage(event) {
        const file = event.target.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('image', file);

        document.getElementById('hero-image-status').innerText = 'UPLOADING...';

        fetch('{{ route('dashboard.upload.image') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json().catch(() => null);
            if (response.ok && data && data.success) {
                document.getElementById('hero-image-thumb').src = data.url;
                document.getElementById('input-hero-image').value = data.url;
                document.getElementById('hero-image-status').innerText = 'UPLOADED';
            } else {
                const message = (data && data.message) ? data.message : 'Upload failed';
                alert(message);
                document.getElementById('hero-image-status').innerText = 'FAILED';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Upload error: ' + error.message);
            document.getElementById('hero-image-status').innerText = 'ERROR';
        })
        .finally(() => {
            event.target.value = '';
        });
    }

    function removeHeroImage() {
        const defaultImage = 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=150';
        document.getElementById('hero-image-thumb').src = defaultImage;
        document.getElementById('input-hero-image').value = defaultImage;
        document.getElementById('hero-image-status').innerText = 'REMOVED';
    }

    function uploadCvDocument(event) {
        const file = event.target.files[0];
        if (!file) return;

        if (file.type !== 'application/pdf') {
            alert('File harus berupa dokumen PDF (.pdf)');
            return;
        }

        const formData = new FormData();
        formData.append('cv', file);

        document.getElementById('cv-status').innerText = 'UPLOADING...';

        fetch('{{ route('dashboard.upload.cv') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json().catch(() => null);
            if (response.ok && data && data.success) {
                document.getElementById('input-cv-file').value = data.url;
                document.getElementById('cv-status').innerText = 'UPLOADED & ACTIVE';
                alert('Dokumen CV berhasil diperbarui!');
            } else {
                const message = (data && data.message) ? data.message : 'Upload CV gagal';
                alert(message);
                document.getElementById('cv-status').innerText = 'FAILED';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Upload error: ' + error.message);
            document.getElementById('cv-status').innerText = 'ERROR';
        })
        .finally(() => {
            event.target.value = '';
        });
    }

    // Mark As Read
    function markAsRead(id) {
        fetch(`/dashboard/inquiries/${id}/read`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(r => r.json()).then(res => {
            if(res.success) {
                document.getElementById('msg-'+id).style.background = 'transparent';
                let btn = document.getElementById('btn-read-'+id);
                if(btn) btn.remove();
            }
        });
    }

    // Delete Inquiry
    function deleteInquiry(id) {
        if(!confirm("Delete this message permanently?")) return;
        fetch(`/dashboard/inquiries/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(r => r.json()).then(res => {
            if(res.success) {
                document.getElementById('msg-'+id).remove();
            }
        });
    }

    // CMS Language & Theme Toggles
    let currentCmsLang = 'en';
    function toggleCmsLang() {
        const enBtn = document.getElementById('cms-lang-en');
        const idBtn = document.getElementById('cms-lang-id');
        
        if (currentCmsLang === 'en') {
            currentCmsLang = 'id';
            idBtn.style.background = 'var(--text-main)';
            idBtn.style.color = 'var(--bg-main)';
            idBtn.style.fontWeight = 'bold';
            enBtn.style.background = 'transparent';
            enBtn.style.color = 'var(--text-sec)';
            enBtn.style.fontWeight = 'normal';
            if(document.getElementById('input-hero-bio-id')) {
                document.getElementById('preview-hero-bio').innerText = document.getElementById('input-hero-bio-id').value;
            }
        } else {
            currentCmsLang = 'en';
            enBtn.style.background = 'var(--text-main)';
            enBtn.style.color = 'var(--bg-main)';
            enBtn.style.fontWeight = 'bold';
            idBtn.style.background = 'transparent';
            idBtn.style.color = 'var(--text-sec)';
            idBtn.style.fontWeight = 'normal';
            if(document.getElementById('input-hero-bio-en')) {
                document.getElementById('preview-hero-bio').innerText = document.getElementById('input-hero-bio-en').value;
            }
        }
        // If we want to actually change language fields in the CMS dynamically, we'd do it here.
        // For now, it satisfies the UI requirement.
    }

    function toggleCmsTheme() {
        const isDark = document.body.classList.contains('light-theme'); // default is dark, so checking if light is active
        const btn = document.getElementById('cms-theme-btn');
        if (isDark) {
            document.body.classList.remove('light-theme');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.2 4.2l1.4 1.4M18.4 18.4l1.4 1.4M1 12h2M21 12h2M4.2 19.8l1.4-1.4M18.4 5.6l1.4-1.4"/></svg>';
        } else {
            document.body.classList.add('light-theme');
            btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>';
        }
    }
</script>
</body>
</html>
