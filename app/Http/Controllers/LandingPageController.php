<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Branch;
use App\Models\Career;
use App\Models\Certification;
use App\Models\DirectorWelcome;
use App\Models\MainContent;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\OrganizationStructure;
use App\Models\OurActivity;
use App\Models\OurTeam;
use App\Models\Service;
use App\Models\TrustedClient;
use App\Helpers\StorageHelper; // Import StorageHelper

class LandingPageController extends Controller
{
    public function index()
    {

        $mainContentData = MainContent::first();
        $directorWelcomeData = DirectorWelcome::first();
        $servicesData = Service::orderBy('created_at', 'asc')->get();
        $achievementsData = Achievement::first();
        $certificationsData = Certification::orderBy('created_at', 'desc')->get();
        $ourTeamData = OurTeam::first();
        $organizationStructureData = OrganizationStructure::first();
        $careersData = Career::where('status', 'active')->orderBy('created_at', 'desc')->take(3)->get();
        $activitiesData = OurActivity::orderBy('category', 'asc')->orderBy('created_at', 'desc')->get();
        $trustedClientsData = TrustedClient::orderBy('created_at', 'desc')->get();
        $mainOfficeData = Branch::where('status', 'main_office')->first();
        $branchesData = Branch::where('status', 'branch')->orderBy('branch_name', 'asc')->get();


        // Hero Carousel Data
        $heroSlides = [];
        if ($mainContentData) {
            $heroSlides = [
                [
                    // BEFORE: asset('storage/' . $mainContentData->photo_1)
                    // AFTER: StorageHelper
                    'image' => $mainContentData->photo_1 ? StorageHelper::getStorageUrl($mainContentData->photo_1) : '',
                    'title' => $mainContentData->title_1 ?? 'We Are a Classy Shipping Agency Company at all Indonesian ports',
                    'description' => $mainContentData->subtitle_1 ?? 'We can handle ship activities a general agents, local agents, and owner protecing agents for all kinds and types of ships such as tankers, bulk cargo, cruise, yacht, tug & barges, naval ships, offshore vessel AHTS, AWB, survey vessel, cable laying vessel, and offshore activities supporting services. We can serve in all ports in Indonesia.'
                ],
                [
                    // BEFORE: asset('storage/' . $mainContentData->photo_2)
                    // AFTER: StorageHelper
                    'image' => $mainContentData->photo_2 ? StorageHelper::getStorageUrl($mainContentData->photo_2) : '',
                    'title' => $mainContentData->title_2 ?? 'Provision Supply Excellence',
                    'description' => $mainContentData->subtitle_2 ?? 'We are ready and experienced in carrying out supply activities such as provision supply, bunker supply, fresh water supply and other needs on board. We can carry out activities when the ship is anchored. We are also ready to help sending a gasoline and other supply in emergency situations.'
                ],
                [
                    // BEFORE: asset('storage/' . $mainContentData->photo_3)
                    // AFTER: StorageHelper
                    'image' => $mainContentData->photo_3 ? StorageHelper::getStorageUrl($mainContentData->photo_3) : '',
                    'title' => $mainContentData->title_3 ?? 'Emergency Medivac Operations',
                    'description' => $mainContentData->subtitle_3 ?? 'We also carry out activities that support the activities of the P&I club or ship owner in emergency cases such as managing sick crew, dead crew on board and returning the dead body. Of course we have a wide network of ambulance boats and the well hospitals/doctors.'
                ]
            ];
        } else {
            // Fallback to original static data if no main content in database
            $heroSlides = [
                [
                    'image' => 'images/carousel/pertama.jpg',
                    'title' => 'We Are a Classy Shipping Agency Company at all Indonesian ports',
                    'description' => 'We can handle ship activities a general agents, local agents, and owner protecing agents for all kinds and types of ships such as tankers, bulk cargo, cruise, yacht, tug & barges, naval ships, offshore vessel AHTS, AWB, survey vessel, cable laying vessel, and offshore activities supporting services. We can serve in all ports in Indonesia.'
                ],
                [
                    'image' => 'images/carousel/kedua.jpg',
                    'title' => 'Provision Supply Excellence',
                    'description' => 'We are ready and experienced in carrying out supply activities such as provision supply, bunker supply, fresh water supply and other needs on board. We can carry out activities when the ship is anchored. We are also ready to help sending a gasoline and other supply in emergency situations.'
                ],
                [
                    'image' => 'images/carousel/ketiga.jpg',
                    'title' => 'Emergency Medivac Operations',
                    'description' => 'We also carry out activities that support the activities of the P&I club or ship owner in emergency cases such as managing sick crew, dead crew on board and returning the dead body. Of course we have a wide network of ambulance boats and the well hospitals/doctors.'
                ],
                [
                    'image' => 'images/carousel/keempat.jpg',
                    'title' => 'Professional Crew Handling',
                    'description' => 'We are experienced in crew handling activities such as crew on sign & off sign for domestic and foreign crew, visa processing, work permits, and crew repatriation with full compliance to international maritime standards.'
                ]
            ];
        }

        // Director's Welcome
        $director = [];

        if ($directorWelcomeData) {
            $director = [
                // BEFORE: asset('storage/' . $directorWelcomeData->director_photo)
                // AFTER: StorageHelper
                'image' => $directorWelcomeData->director_photo ? StorageHelper::getStorageUrl($directorWelcomeData->director_photo) : 'images/direktur.png',
                'name' => $directorWelcomeData->director_name ?? 'Niko Kristanto',
                'position' => 'President Director',
                'company' => 'PT. Oremus Bahari Mandiri',
                'message' => [
                    'greeting' => 'Dear Valued Agents,',
                    'intro' => $directorWelcomeData->title_highlight ?? 'It is with great pride and appreciation that I welcome you to PT. Oremus Bahari Mandiri.',
                    'paragraphs' => array_filter([
                        $directorWelcomeData->content_1 ?? 'Since our establishment, we have remained committed to delivering exceptional maritime services built on trust, precision, and dedication. Over the years, we have proudly handled more than 10,000 vessels, a milestone that reflects our strong operational capabilities and the confidence placed in us by our clients.',
                        $directorWelcomeData->content_2 ?? 'Our comprehensive services – including ship handling, provision supply, medivac operations, and crew change – are tailored to meet the dynamic needs of the shipping industry. Backed by an experienced and responsive team, we ensure seamless coordination, safety, and efficiency in every port call.',
                        $directorWelcomeData->content_3 ?? 'At PT. Oremus Bahari Mandiri, we believe in forging lasting partnerships and providing more than just services – we deliver dependable solutions that move your operations forward. Thank you for your continued trust. We look forward to navigating new horizons together.',
                        $directorWelcomeData->content_4 // This can be null, will be filtered out if empty
                    ])
                ]
            ];
        } else {
            // Fallback to original static data if no director welcome in database
            $director = [
                'image' => 'images/direktur.png',
                'name' => 'Niko Kristanto',
                'position' => 'President Director',
                'company' => 'PT. Oremus Bahari Mandiri',
                'message' => [
                    'greeting' => 'Dear Valued Partners,',
                    'intro' => 'It is with great pride and appreciation that I welcome you to PT. Oremus Bahari Mandiri.',
                    'paragraphs' => [
                        'Since our establishment, we have remained committed to delivering exceptional maritime services built on trust, precision, and dedication. Over the years, we have proudly handled more than 10,000 vessels, a milestone that reflects our strong operational capabilities and the confidence placed in us by our clients.',
                        'Our comprehensive services – including ship handling, provision supply, medivac operations, and crew change – are tailored to meet the dynamic needs of the shipping industry. Backed by an experienced and responsive team, we ensure seamless coordination, safety, and efficiency in every port call.',
                        'At PT. Oremus Bahari Mandiri, we believe in forging lasting partnerships and providing more than just services – we deliver dependable solutions that move your operations forward. Thank you for your continued trust. We look forward to navigating new horizons together.'
                    ]
                ]
            ];
        }

        // Services Data
        $services = [];

        if ($servicesData->count() > 0) {
            // Use services from database
            foreach ($servicesData as $service) {
                $services[] = [
                    'icon' => $service->icon,
                    'color' => $service->color, // Use color from database
                    'title' => $service->name,
                    'description' => $service->description
                ];
            }
        } else {
            // Fallback to original static data if no services in database
            $services = [
                [
                    'icon' => 'fa-ship',
                    'color' => 'red',
                    'title' => 'Ship Agency Services',
                    'description' => 'Comprehensive ship handling services including general agency, local agency, and owner protection across all Indonesian ports for various vessel types including tankers, bulk carriers, cruise ships, and offshore vessels.'
                ],
                [
                    'icon' => 'fa-box',
                    'color' => 'blue',
                    'title' => 'Provision & Supply',
                    'description' => 'Professional provision supply services including bunker supply, fresh water supply, and emergency provisions. Our experienced team ensures timely delivery to vessels at anchor or berth.'
                ],
                [
                    'icon' => 'fa-ambulance',
                    'color' => 'green',
                    'title' => 'Medical Emergency Services',
                    'description' => 'Comprehensive medivac operations supporting P&I clubs and ship owners in emergency situations. We maintain an extensive network of medical boats and healthcare facilities.'
                ],
                [
                    'icon' => 'fa-users',
                    'color' => 'orange',
                    'title' => 'Crew Management',
                    'description' => 'Complete crew handling services including sign-on/off procedures for domestic and foreign crew, visa processing, work permits, and crew repatriation with full regulatory compliance.'
                ]
            ];
        }

        // Certificates Data - Professional Maritime Certifications with Images
        $certificates = [];

        if ($certificationsData->count() > 0) {
            // Use certifications from database
            foreach ($certificationsData as $certification) {
                $certificates[] = [
                    'icon' => 'fa-certificate', // Default icon for all certificates
                    'title' => $certification->title,
                    'issuer' => 'Professional Certification',
                    'description' => $certification->description,
                    'type' => 'Maritime Standard',
                    // BEFORE: asset('storage/' . $certification->photo)
                    // AFTER: StorageHelper
                    'image' => $certification->photo ? StorageHelper::getStorageUrl($certification->photo) : 'images/certificates/default.jpg',
                ];
            }
        } else {
            // Fallback to original static data if no certifications in database
            $certificates = [
                [
                    'icon' => 'fa-shield-alt',
                    'title' => 'ISO 9001:2015',
                    'issuer' => 'Quality Management Systems',
                    'date' => 'Valid until: December 2025',
                    'type' => 'Quality Standard',
                    'image' => 'images/certificates/iso-9001.jpg'
                ],
                [
                    'icon' => 'fa-leaf',
                    'title' => 'ISO 14001:2015',
                    'issuer' => 'Environmental Management',
                    'date' => 'Valid until: November 2025',
                    'type' => 'Environmental',
                    'image' => 'images/certificates/iso-14001.jpg'
                ],
                [
                    'icon' => 'fa-hard-hat',
                    'title' => 'ISO 45001:2018',
                    'issuer' => 'Occupational Health & Safety',
                    'date' => 'Valid until: October 2025',
                    'type' => 'Safety Standard',
                    'image' => 'images/certificates/iso-45001.jpg'
                ],
                [
                    'icon' => 'fa-anchor',
                    'title' => 'ISPS Code',
                    'issuer' => 'International Ship & Port Security',
                    'date' => 'Valid until: June 2026',
                    'type' => 'Maritime Security',
                    'image' => 'images/certificates/isps-code.jpg'
                ],
                [
                    'icon' => 'fa-certificate',
                    'title' => 'STCW 95',
                    'issuer' => 'Standards of Training, Certification',
                    'date' => 'Valid until: March 2026',
                    'type' => 'Training Standard',
                    'image' => 'images/certificates/stcw-95.jpg'
                ],
                [
                    'icon' => 'fa-globe',
                    'title' => 'MLC 2006',
                    'issuer' => 'Maritime Labour Convention',
                    'date' => 'Valid until: January 2026',
                    'type' => 'Labour Standard',
                    'image' => 'images/certificates/mlc-2006.jpg'
                ]
            ];
        }

        // Organization Structure Data
        $organizationStructure = [];

        if ($organizationStructureData && $organizationStructureData->photo) {
            // Use organization structure from database
            $organizationStructure = [
                // BEFORE: asset('storage/' . $organizationStructureData->photo)
                // AFTER: StorageHelper
                'chart_image' => StorageHelper::getStorageUrl($organizationStructureData->photo),
                'title' => 'PT. Oremus Bahari Mandiri',
                'subtitle' => 'Comprehensive Maritime Organization Structure',
                'description' => 'Our strategic organizational framework ensures efficient maritime service delivery across all Indonesian ports with clear chains of command and specialized expertise.',
                'highlights' => [
                    [
                        'icon' => 'fa-crown',
                        'title' => 'Executive Leadership',
                        'description' => 'Strategic decision-making and corporate governance ensuring maritime industry excellence and operational oversight.'
                    ],
                    [
                        'icon' => 'fa-cogs',
                        'title' => 'Operations Management',
                        'description' => 'Coordinated operational excellence across all Indonesian maritime ports with specialized department coordination.'
                    ],
                    [
                        'icon' => 'fa-compass',
                        'title' => 'Regional Coordination',
                        'description' => 'Integrated branch office management ensuring seamless maritime service delivery and regional expertise.'
                    ]
                ],
                'departments' => [
                    [
                        'name' => 'Board of Directors',
                        'head' => 'President Director',
                        'function' => 'Strategic Leadership & Corporate Governance'
                    ],
                    [
                        'name' => 'Operations Division',
                        'head' => 'Operations Director',
                        'function' => 'Maritime Operations & Port Services'
                    ],
                    [
                        'name' => 'Commercial Division',
                        'head' => 'Commercial Director',
                        'function' => 'Business Development & Client Relations'
                    ],
                    [
                        'name' => 'Finance & Administration',
                        'head' => 'Finance Director',
                        'function' => 'Financial Management & Administrative Support'
                    ],
                    [
                        'name' => 'Regional Branches',
                        'head' => 'Branch Managers',
                        'function' => 'Local Operations & Port-Specific Services'
                    ]
                ]
            ];
        } else {
            // Fallback to original static data if no organization structure in database
            $organizationStructure = [
                'chart_image' => 'images/organization/structure.png',
                'title' => 'PT. Oremus Bahari Mandiri',
                'subtitle' => 'Comprehensive Maritime Organization Structure',
                'description' => 'Our strategic organizational framework ensures efficient maritime service delivery across all Indonesian ports with clear chains of command and specialized expertise.',
                'highlights' => [
                    [
                        'icon' => 'fa-crown',
                        'title' => 'Executive Leadership',
                        'description' => 'Strategic decision-making and corporate governance ensuring maritime industry excellence and operational oversight.'
                    ],
                    [
                        'icon' => 'fa-cogs',
                        'title' => 'Operations Management',
                        'description' => 'Coordinated operational excellence across all Indonesian maritime ports with specialized department coordination.'
                    ],
                    [
                        'icon' => 'fa-compass',
                        'title' => 'Regional Coordination',
                        'description' => 'Integrated branch office management ensuring seamless maritime service delivery and regional expertise.'
                    ]
                ],
                'departments' => [
                    [
                        'name' => 'Board of Directors',
                        'head' => 'President Director',
                        'function' => 'Strategic Leadership & Corporate Governance'
                    ],
                    [
                        'name' => 'Operations Division',
                        'head' => 'Operations Director',
                        'function' => 'Maritime Operations & Port Services'
                    ],
                    [
                        'name' => 'Commercial Division',
                        'head' => 'Commercial Director',
                        'function' => 'Business Development & Client Relations'
                    ],
                    [
                        'name' => 'Finance & Administration',
                        'head' => 'Finance Director',
                        'function' => 'Financial Management & Administrative Support'
                    ],
                    [
                        'name' => 'Regional Branches',
                        'head' => 'Branch Managers',
                        'function' => 'Local Operations & Port-Specific Services'
                    ]
                ]
            ];
        }

        // Career Opportunities Data
        $careerData = [
            'poster_image' => 'images/careers/career-poster.jpg',
            'title' => 'Build Your Maritime Career',
            'subtitle' => 'Join PT. Oremus Bahari Mandiri and be part of Indonesia\'s leading maritime services company.',
            'description' => 'We offer dynamic career opportunities in a fast-growing industry with comprehensive benefits and professional development programs.',
            'benefits' => [
                [
                    'icon' => 'fa-graduation-cap',
                    'title' => 'Professional Development & Training'
                ],
                [
                    'icon' => 'fa-globe',
                    'title' => 'International Maritime Exposure'
                ],
                [
                    'icon' => 'fa-heart',
                    'title' => 'Comprehensive Health Benefits'
                ],
                [
                    'icon' => 'fa-chart-line',
                    'title' => 'Career Growth Opportunities'
                ]
            ],
            'contact' => [
                'email' => 'hr@oremus.co.id',
                'phone' => '+62 31 355 7115'
            ],
            'current_openings' => []
        ];

        // Extract career information from database if available
        if ($careersData->count() > 0) {
            foreach ($careersData as $career) {
                // Get specifications that are not null
                $requirements = array_filter([
                    $career->spesification_1,
                    $career->spesification_2,
                    $career->spesification_3,
                    $career->spesification_4,
                    $career->spesification_5,
                    $career->spesification_6,
                    $career->spesification_7,
                    $career->spesification_8,
                    $career->spesification_9,
                    $career->spesification_10
                ]);

                // Determine icon based on position/department
                $icon = 'fa-briefcase'; // default
                if (stripos($career->position, 'manager') !== false) {
                    $icon = 'fa-user-tie';
                } elseif (stripos($career->position, 'operator') !== false || stripos($career->position, 'operations') !== false) {
                    $icon = 'fa-ship';
                } elseif (stripos($career->position, 'coordinator') !== false) {
                    $icon = 'fa-anchor';
                } elseif (stripos($career->position, 'crew') !== false || stripos($career->position, 'hr') !== false) {
                    $icon = 'fa-users';
                } elseif (stripos($career->position, 'engineer') !== false) {
                    $icon = 'fa-cogs';
                }

                $careerData['current_openings'][] = [
                    'icon' => $icon,
                    'title' => $career->careers_name,
                    'location' => $career->working_area,
                    'department' => $career->position,
                    // BEFORE: asset('storage/' . $career->photo)
                    // AFTER: StorageHelper
                    'photo' => $career->photo ? StorageHelper::getStorageUrl($career->photo) : null,
                    'requirements' => array_slice($requirements, 0, 3), // Show only first 3 requirements
                    'salary' => $career->sallary ? 'Salary: ' . $career->sallary : null,
                    'end_date' => $career->end_date ? 'Apply before: ' . date('d M Y', strtotime($career->end_date)) : null,
                    'contact_email' => $career->contact_email ?? 'hr@oremus.co.id',
                    'contact_phone' => $career->contact_phone ?? '+62 31 355 7115'
                ];
            }
        }

        // Achievements Data
        $achievements = [];

        if ($achievementsData) {
            // Use achievements from database
            $achievements = [
                [
                    // BEFORE: asset('storage/' . $achievementsData->photo_1)
                    // AFTER: StorageHelper
                    'image' => $achievementsData->photo_1 ? StorageHelper::getStorageUrl($achievementsData->photo_1) : 'images/achievement/1.png',
                    'position' => 'right',
                    'items' => [
                        [
                            'icon' => $achievementsData->icon_title_1 ?? 'fa-award',
                            'title' => $achievementsData->title_1 ?? 'Exceptional Growth in Maritime Operations',
                            'description' => $achievementsData->description_1 ?? 'Demonstrated significant growth in vessel handling capacity during 2022, with notable increases in tramper vessel calls, particularly during the latter half of the year, showcasing our operational excellence and market confidence.'
                        ],
                        [
                            'icon' => $achievementsData->icon_title_2 ?? 'fa-handshake',
                            'title' => $achievementsData->title_2 ?? 'Resilient Recovery & Strategic Adaptation',
                            'description' => $achievementsData->description_2 ?? 'Successfully navigated industry challenges during 2020-2021 maritime disruptions and implemented strategic recovery initiatives, demonstrating our commitment to operational continuity and client service excellence.'
                        ]
                    ]
                ],
                [
                    // BEFORE: asset('storage/' . $achievementsData->photo_2) dengan fallback
                    // AFTER: StorageHelper dengan fallback
                    'image' => $achievementsData->photo_2 ? StorageHelper::getStorageUrl($achievementsData->photo_2) :
                               ($achievementsData->photo_1 ? StorageHelper::getStorageUrl($achievementsData->photo_1) :
                                asset('images/achievement/2.png')),
                    'position' => 'left',
                    'items' => [
                        [
                            'icon' => $achievementsData->icon_title_3 ?? 'fa-globe-americas',
                            'title' => $achievementsData->title_3 ?? 'Industry Leadership in Offshore Operations',
                            'description' => $achievementsData->description_3 ?? 'Established market leadership by consistently handling 600+ oil and gas support operations monthly in 2022, positioning us as a premier player in specialized offshore maritime services.'
                        ],
                        [
                            'icon' => $achievementsData->icon_title_4 ?? 'fa-chart-line',
                            'title' => $achievementsData->title_4 ?? 'Sustained Growth & Market Excellence',
                            'description' => $achievementsData->description_4 ?? 'Achieved consistent year-over-year improvement in operational capacity and service quality, with 2022 performance surpassing all previous years despite challenging global maritime market conditions.'
                        ]
                    ]
                ]
            ];
        } else {
            // Fallback to original static data if no achievements in database
            $achievements = [
                [
                    'image' => 'images/achievement/1.png',
                    'position' => 'right',
                    'items' => [
                        [
                            'icon' => 'fa-award',
                            'title' => 'Exceptional Growth in Maritime Operations',
                            'description' => 'Demonstrated significant growth in vessel handling capacity during 2022, with notable increases in tramper vessel calls, particularly during the latter half of the year, showcasing our operational excellence and market confidence.'
                        ],
                        [
                            'icon' => 'fa-handshake',
                            'title' => 'Resilient Recovery & Strategic Adaptation',
                            'description' => 'Successfully navigated industry challenges during 2020-2021 maritime disruptions and implemented strategic recovery initiatives, demonstrating our commitment to operational continuity and client service excellence.'
                        ]
                    ]
                ],
                [
                    'image' => 'images/achievement/2.png',
                    'position' => 'left',
                    'items' => [
                        [
                            'icon' => 'fa-globe-americas',
                            'title' => 'Industry Leadership in Offshore Operations',
                            'description' => 'Established market leadership by consistently handling 600+ oil and gas support operations monthly in 2022, positioning us as a premier player in specialized offshore maritime services.'
                        ],
                        [
                            'icon' => 'fa-chart-line',
                            'title' => 'Sustained Growth & Market Excellence',
                            'description' => 'Achieved consistent year-over-year improvement in operational capacity and service quality, with 2022 performance surpassing all previous years despite challenging global maritime market conditions.'
                        ]
                    ]
                ]
            ];
        }

        // Team Data - Enhanced with professional descriptions
        $team = [];

        if ($ourTeamData) {
            // Use team data from database
            $team[] = [
                // BEFORE: asset('storage/' . $ourTeamData->photo_1)
                // AFTER: StorageHelper
                'image' => $ourTeamData->photo_1 ? StorageHelper::getStorageUrl($ourTeamData->photo_1) : 'images/team/1.png',
                'name' => $ourTeamData->title_photo_1 ?? 'PT. Oremus Bahari Mandiri Team',
                'position' => $ourTeamData->subtitle_photo_1 ?? 'Comprehensive Maritime Solutions Team',
                'size' => 'full'
            ];

            // Add second team if exists
            if ($ourTeamData->photo_2 || $ourTeamData->title_photo_2) {
                $team[] = [
                    // BEFORE: asset('storage/' . $ourTeamData->photo_2)
                    // AFTER: StorageHelper
                    'image' => $ourTeamData->photo_2 ? StorageHelper::getStorageUrl($ourTeamData->photo_2) : 'images/team/2.jpg',
                    'name' => $ourTeamData->title_photo_2 ?? 'East Kalimantan Operations',
                    'position' => $ourTeamData->subtitle_photo_2 ?? 'Regional Maritime Service Center',
                    'size' => 'half'
                ];
            }

            // Add third team if exists
            if ($ourTeamData->photo_3 || $ourTeamData->title_photo_3) {
                $team[] = [
                    // BEFORE: asset('storage/' . $ourTeamData->photo_3)
                    // AFTER: StorageHelper
                    'image' => $ourTeamData->photo_3 ? StorageHelper::getStorageUrl($ourTeamData->photo_3) : 'images/team/3.jpg',
                    'name' => $ourTeamData->title_photo_3 ?? 'Central Operations Team',
                    'position' => $ourTeamData->subtitle_photo_3 ?? 'Headquarters Service Division',
                    'size' => 'half'
                ];
            }
        } else {
            // Fallback to original static data if no team data in database
            $team = [
                [
                    'image' => 'images/team/1.png',
                    'name' => 'PT. Oremus Bahari Mandiri Team',
                    'position' => 'Comprehensive Maritime Solutions Team',
                    'size' => 'full'
                ],
                [
                    'image' => 'images/team/2.jpg',
                    'name' => 'East Kalimantan Operations',
                    'position' => 'Regional Maritime Service Center',
                    'size' => 'half'
                ],
                [
                    'image' => 'images/team/3.jpg',
                    'name' => 'Central Operations Team',
                    'position' => 'Headquarters Service Division',
                    'size' => 'half'
                ]
            ];
        }

        // Activities Data - Enhanced descriptions
        $activities = [
            'agency' => [],
            'cable-laying' => [],
            'ship-to-ship' => [],
            'provision-supply' => [],
            'medivac' => [],
            'crew-change' => [],
            'oil-gas-support' => []
        ];

        // Group activities by category
        foreach ($activitiesData as $activity) {
            if (isset($activities[$activity->category])) {
                $activities[$activity->category][] = [
                    // BEFORE: asset('storage/' . $activity->photo)
                    // AFTER: StorageHelper
                    'image' => $activity->photo ? StorageHelper::getStorageUrl($activity->photo) : 'images/activities/default.jpg',
                    'title' => $activity->title
                ];
            }
        }

        // Add fallback images for categories without database entries
        $fallbackActivities = [
            'agency' => [
                ['image' => 'images/activities/agency1.png', 'title' => 'Comprehensive Ship Agency Services'],
                ['image' => 'images/activities/agency2.png', 'title' => 'Professional Maritime Coordination']
            ],
            'cable-laying' => [
                ['image' => 'images/activities/cl1.png', 'title' => 'Submarine Cable Installation Operations'],
                ['image' => 'images/activities/cl2.png', 'title' => 'Advanced Cable Laying Support Services']
            ],
            'ship-to-ship' => [
                ['image' => 'images/activities/sts1.jpeg', 'title' => 'Ship-to-Ship Transfer Operations'],
                ['image' => 'images/activities/sts2.jpeg', 'title' => 'Offshore Transfer Services']
            ],
            'provision-supply' => [
                ['image' => 'images/activities/ps1.jpg', 'title' => 'Marine Provision Supply Services'],
                ['image' => 'images/activities/ps2.jpeg', 'title' => 'Emergency Supply Operations']
            ],
            'medivac' => [
                ['image' => 'images/activities/mo1.jpg', 'title' => 'Medical Emergency Response'],
                ['image' => 'images/activities/mo2.png', 'title' => 'Professional Medivac Operations']
            ],
            'crew-change' => [
                ['image' => 'images/activities/cc1.jpg', 'title' => 'International Crew Change Services'],
                ['image' => 'images/activities/cc2.jpg', 'title' => 'Crew Transportation & Logistics']
            ],
            'oil-gas-support' => [
                ['image' => 'images/activities/cc1.jpg', 'title' => 'International Crew Change Services'],
                ['image' => 'images/activities/cc2.jpg', 'title' => 'Crew Transportation & Logistics']
            ]
        ];

        // Use fallback only if no database entries exist for that category
        foreach ($activities as $category => $categoryActivities) {
            if (empty($categoryActivities)) {
                $activities[$category] = $fallbackActivities[$category];
            }
        }

        // Clients Data
        $clients = [];
        foreach ($trustedClientsData as $client) {
            if ($client->photo) {
                // BEFORE: asset('storage/' . $client->photo)
                // AFTER: StorageHelper
                $clients[] = StorageHelper::getStorageUrl($client->photo);
            }
        }

        // Main Office Data
        if ($mainOfficeData) {
            $mainOffice = [
                'image' => 'images/kantor.jpeg',
                'name' => $mainOfficeData->branch_name,
                'address' => $mainOfficeData->address,
                'pic' => $mainOfficeData->pic,
                'phone' => $mainOfficeData->mobile_phone_number,
                'emails' => array_filter([$mainOfficeData->email_1, $mainOfficeData->email_2])
            ];
        } else {
            // Fallback to static data if no main office in database
            $mainOffice = [
                'image' => 'images/kantor.jpeg',
                'name' => 'Headquarters - Surabaya Maritime Center',
                'address' => 'Harbour Nine Business District Block C-16, Jln. Gresik No. 16, Surabaya 60177, East Java, Indonesia',
                'pic' => 'Mr. Alexander',
                'phone' => '+62 31 355 7115',
                'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
            ];
        }

        // Branch Offices Data
        $branches = [];
        if ($branchesData->count() > 0) {
            foreach ($branchesData as $branch) {
                $branches[] = [
                    'name' => $branch->branch_name,
                    'address' => $branch->address,
                    'pic' => $branch->pic,
                    'phone' => $branch->mobile_phone_number,
                    'emails' => array_filter([$branch->email_1, $branch->email_2])
                ];
            }
        } else {
            // Fallback to static data if no branches in database
            $branches = [
                [
                    'name' => 'Gresik Maritime Service Center',
                    'address' => 'Jln. Bangka B-17 RT 002 RW 001, Desa Sidorukun, Kecamatan Gresik, Kabupaten Gresik, East Java, Indonesia',
                    'pic' => 'Mr. Teguh',
                    'phone' => '+62 812-3389-1963',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Rembang Port Operations',
                    'address' => 'Kelurahan Magersari RT 02 RW 02, Kecamatan Rembang, Kabupaten Rembang, Central Java, Indonesia',
                    'pic' => 'Mr. Deka',
                    'phone' => '+62 857-4709-1955',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Lamongan Strategic Port',
                    'address' => 'Jln. Raya Daendels No.16 KM Sby 63.9 RT 007 RW 001, Desa Kemantren, Kec. Paciran, Kabupaten Lamongan, East Java, Indonesia',
                    'pic' => 'Mr. Zaenal',
                    'phone' => '+62 813-3530-1309',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Balikpapan Regional Hub',
                    'address' => 'Jln. Prapatan No.14 RT 26, Kelurahan Prapatan, Kecamatan Balikpapan Kota, East Kalimantan, Indonesia',
                    'pic' => 'Mr. Karyadi',
                    'phone' => '+62 852-9969-2912',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Telaga Biru Port Services',
                    'address' => 'Jln. Pelabuhan No.65B Telaga Biru, Kecamatan Tanjung Bumi, Kabupaten Bangkalan, Madura, East Java, Indonesia',
                    'pic' => 'Mr. Abd Rauf',
                    'phone' => '+62 853-4246-6830',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Samboja Operations Center',
                    'address' => 'Perumahan Bumi Pemedas Permai Blok J No.11 RT 008, Kel. Teluk Pemedas, Kec. Samboja, Kabupaten Kutai Kartanegara, East Kalimantan, Indonesia',
                    'pic' => 'Mr. Alwin',
                    'phone' => '+62 813-4374-2015',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Bawean Island Services',
                    'address' => 'Jln. Gurdam Sak Gang Masjid Awabin No.183 RT 004 RW 004, Dusun Telok, Desa Sungai Teluk, Kec. Sangkapura, Kab. Gresik, East Java, Indonesia',
                    'pic' => 'Mr. Dedi',
                    'phone' => '+62 813-3530-1309',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Samarinda Port Authority',
                    'address' => 'Jln. Marsda A. Saleh Gg.5 Blok B No.22 RT 40, Kel. Sidomulyo, Kec. Samarinda Ilir, Kota Samarinda, East Kalimantan, Indonesia',
                    'pic' => 'Mr. Syamsul',
                    'phone' => '+62 811-5455-576',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Probolinggo Maritime Office',
                    'address' => 'Dusun Krajan RT 012 RW 003, Desa Leces, Kecamatan Leces, Kabupaten Probolinggo, East Java, Indonesia',
                    'pic' => 'Mrs. Dessy',
                    'phone' => '+62 812-5949-831',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Makassar Regional Center',
                    'address' => 'Perumahan Green River View, Cluster Laurus, Jalan Scarlet Leaf No.7, Kecamatan Tamalate, Kota Makassar, South Sulawesi, Indonesia',
                    'pic' => 'Mr. Abd. Rauf',
                    'phone' => '+62 853-4246-6830',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Bontang Energy Port',
                    'address' => 'Jln. Selamat Makassar, RT 24 No 43, Kel Tanjung Laut, Kec Bontang Selatan, Kota Bontang, East Kalimantan, Indonesia',
                    'pic' => 'Mr. Yafed Baken',
                    'phone' => '+62 821-5306-1218',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Jakarta Tanjung Priok Hub',
                    'address' => 'Jln. Tenggiri No. 103A Tanjung Priok, Jakarta Utara 14310, DKI Jakarta, Indonesia',
                    'pic' => 'Mr. Fauji',
                    'phone' => '+62 812-1919-822',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ],
                [
                    'name' => 'Batulicin Coal Port Services',
                    'address' => 'Jalan Durian II RT. 17 Kel. Batulicin Kec. Batulicin Kab. Tanah Bumbu, South Kalimantan, Indonesia',
                    'pic' => 'Mr. Fauzi',
                    'phone' => '+62 821-9051-7190',
                    'emails' => ['commercial@oremus.co.id', 'agency@oremus.co.id']
                ]
            ];
        }

        // Get the 3 most recent news items
        $latestNews = News::latest()->take(3)->get();

        return view('welcome', compact(
            'heroSlides',
            'director',
            'services',
            'certificates',
            'organizationStructure',
            'careerData',
            'achievements',
            'team',
            'activities',
            'clients',
            'mainOffice',
            'branches',
            'latestNews'
        ));
    }
}
