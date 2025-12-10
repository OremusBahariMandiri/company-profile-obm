@extends('layouts.app')

@section('content')
    <!-- Hero Carousel Section - Dynamic -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" id="home">
        <div class="carousel-inner">
            @if (isset($heroSlides) && count($heroSlides) > 0)
                @foreach ($heroSlides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                        style="background-image: url('{{ asset($slide['image']) }}');">
                        <div class="carousel-overlay">
                            <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                                <h1>{{ $slide['title'] }}</h1>
                                <p>{{ $slide['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Fallback carousel slides -->
                <div class="carousel-item active"
                    style="background-image: url('{{ asset('images/carousel/pertama.jpg') }}');">
                    <div class="carousel-overlay">
                        <div class="carousel-content" data-aos="fade-up" data-aos-delay="200">
                            <h1>We Are a Classy Shipping Agency Company at all Indonesian ports</h1>
                            <p>We can handle ship activities a general agents, local agents, and owner protecing agents for
                                all kinds and types of ships such as tankers, bulk cargo, cruise, yacht, tug & barges, naval
                                ships, offshore vessel AHTS, AWB, survey vessel, cable laying vessel, and offshore
                                activities supporting services. We can serve in all ports in Indonesia.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Animated Waves -->
        <div class="wave-animation">
            <div class="wave wave-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="wave wave-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Director's Welcome Section - Dynamic -->
    <section class="director-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="100" data-aos-offset="300"
                    data-aos-once="false">
                    <div class="position-relative" style="transform: scaleX(-1);">
                        <img src="{{ asset($director['image'] ?? 'images/direktur.png') }}" alt="Director"
                            class="img-fluid director-img">
                        <i class="fas fa-quote-left quote-icon"></i>
                    </div>
                </div>
                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200" data-aos-offset="300" data-aos-once="false">
                    <h2 class="section-title mb-4 text-center">
                        {{ $director['message']['greeting'] ?? 'Dear Valued Agents,' }}</h2>
                    <p class="lead mb-4" style="color: var(--dark-blue); font-weight: 500;">
                        {{ $director['message']['intro'] ?? 'It is with great pride and appreciation that I welcome you to PT. Oremus Bahari Mandiri.' }}
                    </p>

                    @if (isset($director['message']['paragraphs']) && count($director['message']['paragraphs']) > 0)
                        @foreach ($director['message']['paragraphs'] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    @else
                        <p>Since our establishment, we have remained committed to delivering exceptional maritime services
                            built on trust, precision, and dedication. Over the years, we have proudly handled more than
                            10,000 vessels, a milestone that reflects our strong operational capabilities and the confidence
                            placed in us by our clients.</p>
                        <p>Our comprehensive services – including ship handling, provision supply, medivac operations, and
                            crew change – are tailored to meet the dynamic needs of the shipping industry. Backed by an
                            experienced and responsive team, we ensure seamless coordination, safety, and efficiency in
                            every port call.</p>
                        <p>At PT. Oremus Bahari Mandiri, we believe in forging lasting partnerships and providing more than
                            just services – we deliver dependable solutions that move your operations forward. Thank you for
                            your continued trust. We look forward to navigating new horizons together.</p>
                    @endif

                    <div class="mt-4">
                        <p class="mb-2" style="font-weight: 600; color: var(--dark-blue);">
                            {{ $director['name'] ?? 'Niko Kristanto' }}</p>
                        <p class="mb-0" style="color: var(--ocean-green);">
                            {{ $director['position'] ?? 'President Director' }}</p>
                        <p class="mb-0" style="color: var(--ocean-blue);">
                            {{ $director['company'] ?? 'PT. Oremus Bahari Mandiri' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Dynamic -->
    <section class="section" style="background-color: #f8f9fa;" id="services">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Services</h2>
            </div>
            <div class="row">
                @if (isset($services) && count($services) > 0)
                    @foreach ($services as $index => $service)
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="service-card text-center p-4">
                                <div class="service-icon"
                                    style="background-color: {{ $service['color'] }}; margin-top:5px">
                                    <i class="fas {{ $service['icon'] }}"></i>
                                </div>
                                <h4 class="mb-3" style="color: var(--dark-blue);">{{ $service['title'] }}</h4>
                                <p>{{ $service['description'] }}</p>
                                <a href="#contact" class="btn mt-3"
                                    style="background-color: var(--dark-blue); color: white;">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback services -->
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-card text-center p-4">
                            <div class="service-icon" style="background-color: red; margin-top:5px">
                                <i class="fas fa-ship"></i>
                            </div>
                            <h4 class="mb-3" style="color: var(--dark-blue);">Ship Agency Services</h4>
                            <p>Comprehensive ship handling services including general agency, local agency, and owner
                                protection across all Indonesian ports for various vessel types.</p>
                            <a href="#contact" class="btn mt-3"
                                style="background-color: var(--dark-blue); color: white;">Learn More</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Achievements Section - Dynamic -->
    <section class="section achievement-section" id="achievements">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Achievements</h2>
                <p class="lead">Milestones that define our commitment to excellence</p>
            </div>

            @if (isset($achievements) && count($achievements) > 0)
                @foreach ($achievements as $index => $achievement)
                    <div class="row align-items-center {{ !$loop->last ? 'mb-5' : '' }}">
                        @if ($achievement['position'] === 'right')
                            <!-- Content Column (Image Right Layout) -->
                            <div class="col-lg-6 order-lg-1 order-2" data-aos="fade-right" data-aos-delay="200">
                                <div class="achievement-content">
                                    @foreach ($achievement['items'] as $item)
                                        <div class="achievement-item">
                                            <div class="achievement-icon">
                                                <i class="fas {{ $item['icon'] }}"></i>
                                            </div>
                                            <h3 style="color: var(--dark-white);">{{ $item['title'] }}</h3>
                                            <p>{{ $item['description'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Image Column (Right) -->
                            <div class="col-lg-6 order-lg-2 order-1 mb-4 mb-lg-0" data-aos="fade-left"
                                data-aos-delay="300">
                                <div class="achievement-img">
                                    <img src="{{ $achievement['image'] }}" alt="Achievement {{ $index + 1 }}"
                                        class="img-fluid" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        @else
                            <!-- Image Column (Left) -->
                            <div class="col-lg-6 order-lg-1 order-1 mb-4 mb-lg-0" data-aos="fade-right"
                                data-aos-delay="200">
                                <div class="achievement-img">
                                    <img src="{{ $achievement['image'] }}" alt="Achievement {{ $index + 1 }}"
                                        class="img-fluid" style="width: 100%; height: auto;">
                                </div>
                            </div>
                            <!-- Content Column (Image Left Layout) -->
                            <div class="col-lg-6 order-lg-2 order-2" data-aos="fade-left" data-aos-delay="300">
                                <div class="achievement-content">
                                    @foreach ($achievement['items'] as $item)
                                        <div class="achievement-item">
                                            <div class="achievement-icon">
                                                <i class="fas {{ $item['icon'] }}"></i>
                                            </div>
                                            <h3 style="color: var(--white);">{{ $item['title'] }}</h3>
                                            <p>{{ $item['description'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            @else
                <!-- Fallback when no achievements data -->
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="achievement-placeholder py-5">
                            <i class="fas fa-trophy"
                                style="font-size: 4rem; color: var(--ocean-green); opacity: 0.3; margin-bottom: 2rem;"></i>
                            <h4 style="color: var(--dark-blue); margin-bottom: 1rem;">Achievements Coming Soon</h4>
                            <p class="text-muted">Our latest achievements and milestones will be featured here.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Certificates Section - Dynamic -->
    <section class="section certificates-section" id="certificates">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Professional Certifications</h2>
                <p class="lead">Accredited standards that demonstrate our commitment to excellence</p>
            </div>

            <div class="row">
                @if (isset($certificates) && count($certificates) > 0)
                    @foreach ($certificates as $index => $certificate)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up"
                            data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="certificate-card">
                                <div class="certificate-image">
                                    <img src="{{ $certificate['image'] }}" alt="{{ $certificate['title'] }}"
                                        class="img-fluid">
                                    <div class="certificate-overlay">
                                        <div class="certificate-icon">
                                            <i class="fas {{ $certificate['icon'] }}"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="certificate-content">
                                    <h4>{{ $certificate['title'] }}</h4>
                                    <h6 class="certificate-issuer">{{ $certificate['issuer'] }}</h6>
                                    <p class="certificate-date">{{ $certificate['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Default certificates if no data from controller -->
                    <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="certificate-card">
                            <div class="certificate-image">
                                <img src="{{ asset('images/certificates/iso-9001.jpg') }}" alt="ISO 9001:2015"
                                    class="img-fluid">
                                <div class="certificate-overlay">
                                    <div class="certificate-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="certificate-content">
                                <h4>ISO 9001:2015</h4>
                                <h6 class="certificate-issuer">Quality Management Systems</h6>
                                <p class="certificate-date">Valid until: December 2025</p>
                                <span class="certificate-type">Quality Standard</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- News Section - Already Dynamic -->
    <section class="section news-section" id="news">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Latest News</h2>
                <p class="lead">Stay updated with our recent activities and maritime industry insights</p>
            </div>

            <div class="news-container">
                @foreach ($latestNews as $news)
                    <div class="news-card">
                        <div class="news-image">
                            <img src="{{ \App\Helpers\StorageHelper::getStorageUrl($news->image) }}"
                                alt="{{ $news->title }}">
                            <div class="news-date">
                                <span class="day">{{ \Carbon\Carbon::parse($news->created_at)->format('d') }}</span>
                                <span class="month">{{ \Carbon\Carbon::parse($news->created_at)->format('M') }}</span>
                            </div>
                        </div>
                        <div class="news-content">
                            <div class="news-topic">{{ $news->topic }}</div>
                            <h3 class="news-title">{{ $news->title }}</h3>
                            <p class="news-excerpt">{{ Str::limit(strip_tags($news->news), 120) }}</p>
                            <a href="{{ route('publicnews.show', $news->id) }}" class="news-read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

                <div class="view-all-news">
                    <a href="{{ route('publicnews.index') }}" class="view-all-btn">View All News <i
                            class="fas fa-external-link-alt"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section - Dynamic -->
    <section class="section team-section" id="team">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Team</h2>
                <p class="lead">Meet the experts behind our exceptional services</p>
            </div>

            <div class="row">
                @if (isset($team) && count($team) > 0)
                    @foreach ($team as $index => $member)
                        <div class="@if ($member['size'] === 'full') col-12 mb-5 @else col-md-6 @endif"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="team-member">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}"
                                    class="img-fluid team-img">
                                <div class="team-info">
                                    <h4>{{ $member['name'] }}</h4>
                                    <p>{{ $member['position'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback team -->
                    <div class="col-12 mb-5" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member">
                            <img src="{{ asset('images/team/1.png') }}" alt="Team" class="img-fluid team-img">
                            <div class="team-info">
                                <h4>PT. Oremus Bahari Mandiri Team</h4>
                                <p>Comprehensive Maritime Solutions Team</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Organization Structure Section - Already Dynamic -->
    <section class="section organization-section" id="organization">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Organization Structure</h2>
                <p class="lead">
                    {{ $organizationStructure['description'] ?? 'Our strategic organizational framework for maritime excellence' }}
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="organization-chart-container">
                        <div class="organization-background">
                            <img src="{{ $organizationStructure['chart_image'] ?? asset('images/organization/structure.png') }}"
                                alt="Organization Structure" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Careers Section - Already Dynamic -->
    <section class="section careers-section" id="careers">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Join Our Maritime Family</h2>
                <p class="lead">
                    {{ $careerData['subtitle'] ?? 'Explore exciting career opportunities in maritime excellence' }}</p>
            </div>

            <!-- Current Job Openings -->
            <div class="row">
                @if (isset($careerData['current_openings']) && count($careerData['current_openings']) > 0)
                    @foreach ($careerData['current_openings'] as $index => $job)
                        <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up"
                            data-aos-delay="{{ ($index + 5) * 100 }}">
                            <div class="job-card">
                                @if (isset($job['photo']) && $job['photo'])
                                    <div class="job-photo">
                                        <img src="{{ $job['photo'] }}" alt="{{ $job['title'] }}" class="job-image">
                                        <div class="job-photo-overlay">
                                            <i class="fas {{ $job['icon'] }} job-icon-overlay"></i>
                                        </div>
                                    </div>
                                @endif
                                <div class="job-header">
                                    @if (!isset($job['photo']) || !$job['photo'])
                                        <i class="fas {{ $job['icon'] }} job-icon"></i>
                                    @endif
                                    <h5>{{ $job['title'] }}</h5>
                                    <span class="job-location">{{ $job['location'] }}</span>
                                    @if (isset($job['department']))
                                        <div class="mt-2">
                                            <small class="text-muted">Department: {{ $job['department'] }}</small>
                                        </div>
                                    @endif
                                    @if (isset($job['salary']) && $job['salary'])
                                        <div class="mt-1">
                                            <small class="text-success">{{ $job['salary'] }}</small>
                                        </div>
                                    @endif
                                    @if (isset($job['end_date']) && $job['end_date'])
                                        <div class="mt-1">
                                            <small class="text-warning">{{ $job['end_date'] }}</small>
                                        </div>
                                    @endif
                                </div>
                                @if (isset($job['requirements']) && count($job['requirements']) > 0)
                                    <div class="job-requirements">
                                        <h6 style="color: var(--dark-blue); margin-bottom: 10px;">Requirements:</h6>
                                        <ul>
                                            @foreach ($job['requirements'] as $requirement)
                                                <li>{{ $requirement }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="job-actions mt-3">
                                    <a href="mailto:{{ $job['contact_email'] }}"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        <i class="fas fa-envelope me-1"></i> Apply
                                    </a>
                                    @if (isset($job['contact_phone']))
                                        <a href="tel:{{ str_replace(['+', ' ', '-'], '', $job['contact_phone']) }}"
                                            class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-phone me-1"></i> Call
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- No careers available message -->
                    <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                        <div class="no-careers-container text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-briefcase"
                                    style="font-size: 4rem; color: var(--ocean-green); opacity: 0.3;"></i>
                            </div>
                            <h5 class="mb-3" style="color: var(--dark-blue);">No Current Openings</h5>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Activities Section - Already Dynamic -->
    <section class="section activities-section" id="activities">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Activities</h2>
            </div>

            <!-- Activity Categories Tabs -->
            <ul class="nav nav-pills justify-content-center activity-tabs mb-5" id="activitiesTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="agency-tab" data-bs-toggle="pill" data-bs-target="#agency"
                        type="button" role="tab" aria-controls="agency" aria-selected="true">Agency</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cable-laying-tab" data-bs-toggle="pill" data-bs-target="#cable-laying"
                        type="button" role="tab" aria-controls="cable-laying" aria-selected="false">Cable
                        Laying</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ship-to-ship-tab" data-bs-toggle="pill" data-bs-target="#ship-to-ship"
                        type="button" role="tab" aria-controls="ship-to-ship" aria-selected="false">Ship to
                        Ship</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="provision-supply-tab" data-bs-toggle="pill"
                        data-bs-target="#provision-supply" type="button" role="tab"
                        aria-controls="provision-supply" aria-selected="false">Provision Supply</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="medivac-tab" data-bs-toggle="pill" data-bs-target="#medivac"
                        type="button" role="tab" aria-controls="medivac" aria-selected="false">Medivac
                        Operation</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="crew-change-tab" data-bs-toggle="pill" data-bs-target="#crew-change"
                        type="button" role="tab" aria-controls="crew-change" aria-selected="false">Crew
                        Change</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="oil-gas-support-tab" data-bs-toggle="pill"
                        data-bs-target="#oil-&-gas-support" type="button" role="tab"
                        aria-controls="oil-&-gas-support" aria-selected="false">Oil & Gas Support</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="activitiesTabContent">
                @foreach (['agency', 'cable-laying', 'ship-to-ship', 'provision-supply', 'medivac', 'crew-change'] as $index => $category)
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="{{ $category }}"
                        role="tabpanel" aria-labelledby="{{ $category }}-tab">
                        <div class="activity-gallery">
                            @if (isset($activities[$category]) && count($activities[$category]) > 0)
                                @foreach ($activities[$category] as $activityIndex => $activity)
                                    <div class="gallery-item" data-aos="fade-up"
                                        data-aos-delay="{{ ($activityIndex + 1) * 100 }}">
                                        <img src="{{ $activity['image'] }}" alt="{{ $activity['title'] }}"
                                            class="gallery-img">
                                        <div class="gallery-overlay">
                                            <h5>{{ $activity['title'] }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center py-5">
                                    <div class="empty-category">
                                        <i class="fas fa-image text-muted mb-3"
                                            style="font-size: 4rem; opacity: 0.3;"></i>
                                        <h5 class="text-muted">No {{ ucfirst(str_replace('-', ' ', $category)) }}
                                            Activities</h5>
                                        <p class="text-muted">Activities for this category will appear here when added.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Clients Section - Already Dynamic -->
    <section class="section clients-section" id="clients">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Trusted Clients</h2>
                <p class="lead">Partnering with leading maritime companies globally</p>
            </div>

            <div class="clients-carousel" data-aos="fade-up" data-aos-delay="200">
                @forelse($clients as $index => $clientLogo)
                    <div class="client-logo">
                        <img src="{{ $clientLogo }}" alt="Client {{ $index + 1 }}" class="img-fluid">
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No client logos available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Map Section with Branch Offices - Already Dynamic -->
    <section class="section" id="location">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Branch Offices</h2>
                <p class="lead">Find us at strategic maritime hubs around Indonesia</p>
            </div>

            <!-- Map Container -->
            <div class="row mb-5">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">
                    <div class="map-container" id="map"></div>
                </div>
            </div>

            <!-- Main Office Section - Dynamic from Database -->
            @if ($mainOffice)
                <div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-body p-0">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <img src="{{ $mainOffice['image'] }}" alt="{{ $mainOffice['name'] }}"
                                            class="img-fluid h-100 w-100" style="object-fit: cover; max-height: 300px;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="p-4 p-md-5">
                                            <h3 class="mb-3" style="color: var(--dark-blue);">
                                                <i class="fas fa-building me-2" style="color: var(--ocean-green);"></i>
                                                {{ $mainOffice['name'] }}
                                            </h3>
                                            <div class="contact-item mb-3">
                                                <i class="fas fa-map-marker-alt me-2"
                                                    style="color: var(--ocean-green);"></i>
                                                <span>{{ $mainOffice['address'] }}</span>
                                            </div>
                                            <div class="contact-item mb-3">
                                                <i class="fas fa-user me-2" style="color: var(--ocean-green);"></i>
                                                <span>{{ $mainOffice['pic'] }} (PIC)</span>
                                            </div>
                                            <div class="contact-item mb-3">
                                                <i class="fas fa-phone me-2" style="color: var(--ocean-green);"></i>
                                                <span>{{ $mainOffice['phone'] }}</span>
                                            </div>
                                            @foreach ($mainOffice['emails'] as $email)
                                                <div class="contact-item {{ $loop->last ? '' : 'mb-3' }}">
                                                    <i class="fas fa-envelope me-2"
                                                        style="color: var(--ocean-green);"></i>
                                                    <span>{{ $email }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Branch Offices Title -->
            @if (count($branches) > 0)
                <div class="row mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="col-12">
                        <h3 class="text-center" style="color: var(--dark-blue);">Our Branch Offices</h3>
                    </div>
                </div>

                <!-- Branch Offices Information - Dynamic from Database -->
                <div class="row" data-aos="fade-up" data-aos-delay="300">
                    @foreach ($branches as $branch)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="branch-card">
                                <h5>
                                    <i class="fas fa-anchor me-2" style="color: var(--ocean-green);"></i>
                                    {{ $branch['name'] }}
                                </h5>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>{{ $branch['address'] }}</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-user"></i>
                                    <span>{{ $branch['pic'] }} (PIC)</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>{{ $branch['phone'] }}</span>
                                </div>
                                @foreach ($branch['emails'] as $email)
                                    <div class="contact-item">
                                        <i class="fas fa-envelope"></i>
                                        <span>{{ $email }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- If no branches in database, show message or fallback -->
            @if (count($branches) === 0 && !$mainOffice)
                <div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Branch information is being updated.</strong> Please check back later for our office
                            locations.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Contact CTA Section -->
    <section class="section"
        style="background-color: var(--dark-blue); color: white; position: relative; overflow: hidden;" id="contact">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8" data-aos="fade-up">
                    <h2 class="mb-4" style="font-weight: 700;">Ready to Experience Excellence in Maritime Services?</h2>
                    <p class="lead mb-5">Contact our team today to discuss how we can support your maritime operations</p>
                </div>
            </div>
        </div>

        <!-- Animated Waves -->
        <div class="wave-animation" style="opacity: 0.2;">
            <div class="wave wave-1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
            <div class="wave wave-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        class="shape-fill"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-wave">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
        <div class="container">
            <div class="row">
                <!-- Company Logo & Description -->
                <div class="col-lg-4 col-md-6 mb-5">
                    <img src="{{ asset('images/logo.png') }}" alt="Ship Agency Logo" class="mb-4"
                        style="height: 60px;">
                    <p>PT. Oremus Bahari Mandiri is your trusted partner in maritime logistics and ship agency services. We
                        deliver excellence in every aspect of maritime operations across Indonesian ports.</p>
                    <div class="social-icons mt-4">
                        <a href="https://www.facebook.com/p/PT-Oremus-Bahari-Mandiri-100047025746073/"
                            aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/company/pt-oremus-bahari-mandiri/" aria-label="LinkedIn"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/oremusbaharimandiri/" aria-label="Instagram"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Main Office -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4><i class="fas fa-building me-2"></i>Main Office</h4>
                    <ul class="footer-contact list-unstyled">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $mainOffice['address'] ?? 'Harbour Nine Business District Block C-16. Jln. Gresik no 16, Surabaya 60177' }}</span>
                        </li>
                        <li>
                            <i class="fas fa-user"></i>
                            <span>{{ $mainOffice['pic'] ?? 'Mr. Alexander' }} (PIC)</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <span>{{ $mainOffice['phone'] ?? '0313557115' }} (Office)</span>
                        </li>
                        @if (isset($mainOffice['emails']))
                            @foreach ($mainOffice['emails'] as $email)
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <span>{{ $email }}</span>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>commercial@oremus.co.id</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>agency@oremus.co.id</span>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Our Services -->
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4><i class="fas fa-cogs me-2"></i>Our Services</h4>
                    <ul class="footer-links list-unstyled">
                        <li><a href="#services"><i class="fas fa-ship me-2"></i>Ship Handling</a></li>
                        <li><a href="#services"><i class="fas fa-box me-2"></i>Provision Supply</a></li>
                        <li><a href="#services"><i class="fas fa-ambulance me-2"></i>Medivac Operation</a></li>
                        <li><a href="#services"><i class="fas fa-users me-2"></i>Crew Handling</a></li>
                        <li><a href="#activities"><i class="fas fa-anchor me-2"></i>Cable Laying</a></li>
                        <li><a href="#activities"><i class="fas fa-exchange-alt me-2"></i>Ship to Ship</a></li>
                    </ul>
                </div>

                <!-- Branch Offices -->
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4><i class="fas fa-map-marked-alt me-2"></i>Branch</h4>
                    <ul class="footer-links list-unstyled">
                        @if (isset($branches) && count($branches) > 0)
                            @foreach (array_slice($branches, 0, 13) as $branch)
                                <li>
                                    <a href="#location">
                                        <i class="fas fa-anchor me-2"></i>
                                        <strong>{{ $branch['name'] }}</strong><br>
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <!-- Fallback branches -->
                            <li><a href="#location"><i class="fas fa-anchor me-2"></i><strong>Surabaya</strong><br></a>
                            </li>
                            <li><a href="#location"><i class="fas fa-anchor me-2"></i><strong>Gresik</strong><br></a></li>
                            <li><a href="#location"><i class="fas fa-anchor me-2"></i><strong>Rembang</strong><br></a>
                            </li>
                            <li><a href="#location"><i class="fas fa-anchor me-2"></i><strong>Lamongan</strong><br></a>
                            </li>
                            <li><a href="#location"><i class="fas fa-anchor me-2"></i><strong>Balikpapan</strong><br></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; 2025 PT. Oremus Bahari Mandiri. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0">
                            <a href="#" style="color: var(--ocean-green); text-decoration: none;">Privacy Policy</a>
                            |
                            <a href="#" style="color: var(--ocean-green); text-decoration: none;">Terms of
                                Service</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Chat Widget -->
    <div class="whatsapp-widget">
        <div class="whatsapp-chat-box">
            <div class="chat-header">
                <div class="chat-header-info">
                    <div class="chat-header-avatar">
                        <img src="{{ asset('images/logoonly.jpeg') }}" alt="OBM Assistant">
                    </div>
                    <div>
                        <h5 class="chat-header-title">OBM Assistant</h5>
                        <p class="chat-header-status">Online | Typically replies instantly</p>
                    </div>
                </div>
                <div class="chat-header-close">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="chat-body" id="chat-messages">
                <div class="message message-received">
                    <div>👋 Hello! Welcome to PT. Oremus Bahari Mandiri. How can I assist you today?</div>
                    <div class="message-time">Now</div>
                </div>
                <div class="quick-replies">
                    <button class="quick-reply-button">Services</button>
                    <button class="quick-reply-button">Contact Info</button>
                    <button class="quick-reply-button">Ports Coverage</button>
                    <button class="quick-reply-button">Talk to Agent</button>
                </div>
            </div>
            <div class="chat-footer">
                <textarea class="chat-input" placeholder="Type a message..." rows="1"></textarea>
                <div class="chat-send">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </div>
        </div>

        <div class="whatsapp-button">
            <i class="fab fa-whatsapp"></i>
            <div class="notification-badge">1</div>
        </div>
    </div>

    <!-- Ship Animation -->
    <div class="ship-container">
        <svg width="120" height="60" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M416 320H96C43.06 320 0 363.06 0 416V480H512V416C512 363.06 468.94 320 416 320Z" fill="#0A3D62" />
            <path d="M512 416V480H0V416C0 363.06 43.06 320 96 320H416C468.94 320 512 363.06 512 416Z" fill="#0A3D62" />
            <path d="M400 192H240V96H400V192Z" fill="#3AB795" />
            <path d="M400 96H240V64C240 46.33 254.33 32 272 32H368C385.67 32 400 46.33 400 64V96Z" fill="#A8D8FF" />
            <path d="M400 192V416H240V192H400Z" fill="#0A3D62" />
            <path
                d="M272 160C276.418 160 280 156.418 280 152C280 147.582 276.418 144 272 144C267.582 144 264 147.582 264 152C264 156.418 267.582 160 272 160Z"
                fill="white" />
            <path
                d="M336 160C340.418 160 344 156.418 344 152C344 147.582 340.418 144 336 144C331.582 144 328 147.582 328 152C328 156.418 331.582 160 336 160Z"
                fill="white" />
        </svg>
    </div>

    <style>
        /* Additional CSS for empty state */
        .empty-category {
            padding: 3rem 2rem;
            border-radius: 15px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 2px dashed #dee2e6;
        }

        .activity-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            justify-items: center;
        }

        @media (max-width: 768px) {
            .activity-gallery {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .empty-category {
                padding: 2rem 1rem;
            }
        }
    </style>
@endsection
