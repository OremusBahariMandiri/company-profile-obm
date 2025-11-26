<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Helpers\StorageHelper; // Import StorageHelper

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $achievements = Achievement::all();
        $canAdd = $achievements->count() < 3;

        return view('admin.achievements.index', compact('achievements', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingCount = Achievement::count();

        if ($existingCount >= 3) {
            return redirect()->route('achievements.index')
                ->with('error', 'Maximum 3 achievement items allowed.');
        }

        $iconOptions = $this->getAchievementIcons();

        return view('admin.achievements.create', compact('iconOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingCount = Achievement::count();

        if ($existingCount >= 3) {
            return redirect()->route('achievements.index')
                ->with('error', 'Maximum 3 achievement items allowed.');
        }

        $request->validate([
            'icon_title_1' => 'required|string|max:100',
            'title_1' => 'required|string|max:255',
            'description_1' => 'required|string',
            'icon_title_2' => 'required|string|max:100',
            'title_2' => 'required|string|max:255',
            'description_2' => 'required|string',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'icon_title_3' => 'required|string|max:100',
            'title_3' => 'required|string|max:255',
            'description_3' => 'required|string',
            'icon_title_4' => 'required|string|max:100',
            'title_4' => 'required|string|max:255',
            'description_4' => 'required|string',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo_1')) {
            // BEFORE: $data['photo_1'] = $request->file('photo_1')->store('achievements', 'public');
            // AFTER:
            $data['photo_1'] = StorageHelper::storeFile($request->file('photo_1'), 'achievements');
        }

        if ($request->hasFile('photo_2')) {
            // BEFORE: $data['photo_2'] = $request->file('photo_2')->store('achievements', 'public');
            // AFTER:
            $data['photo_2'] = StorageHelper::storeFile($request->file('photo_2'), 'achievements');
        }

        Achievement::create($data);

        return redirect()->route('achievements.index')
            ->with('success', 'Achievement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievement $achievement)
    {
        return view('admin.achievements.show', compact('achievement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievement $achievement)
    {
        $iconOptions = $this->getAchievementIcons();

        return view('admin.achievements.edit', compact('achievement', 'iconOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'icon_title_1' => 'required|string|max:100',
            'title_1' => 'required|string|max:255',
            'description_1' => 'required|string',
            'icon_title_2' => 'required|string|max:100',
            'title_2' => 'required|string|max:255',
            'description_2' => 'required|string',
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'icon_title_3' => 'required|string|max:100',
            'title_3' => 'required|string|max:255',
            'description_3' => 'required|string',
            'icon_title_4' => 'required|string|max:100',
            'title_4' => 'required|string|max:255',
            'description_4' => 'required|string',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo_1')) {
            // Delete old photo
            if ($achievement->photo_1) {
                // BEFORE: Storage::disk('public')->delete($achievement->photo_1);
                // AFTER:
                StorageHelper::deleteFile($achievement->photo_1);
            }
            // BEFORE: $data['photo_1'] = $request->file('photo_1')->store('achievements', 'public');
            // AFTER:
            $data['photo_1'] = StorageHelper::storeFile($request->file('photo_1'), 'achievements');
        }

        if ($request->hasFile('photo_2')) {
            // Delete old photo
            if ($achievement->photo_2) {
                // BEFORE: Storage::disk('public')->delete($achievement->photo_2);
                // AFTER:
                StorageHelper::deleteFile($achievement->photo_2);
            }
            // BEFORE: $data['photo_2'] = $request->file('photo_2')->store('achievements', 'public');
            // AFTER:
            $data['photo_2'] = StorageHelper::storeFile($request->file('photo_2'), 'achievements');
        }

        $achievement->update($data);

        return redirect()->route('achievements.index')
            ->with('success', 'Achievement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievement $achievement)
    {
        // Delete associated photo - UPDATED SECTION
        if ($achievement->photo_1) {
            // BEFORE: Storage::disk('public')->delete($achievement->photo_1);
            // AFTER:
            StorageHelper::deleteFile($achievement->photo_1);
        }

        if ($achievement->photo_2) {
            // BEFORE: Storage::disk('public')->delete($achievement->photo_2);
            // AFTER:
            StorageHelper::deleteFile($achievement->photo_2);
        }

        $achievement->delete();

        return redirect()->route('achievements.index')
            ->with('success', 'Achievement deleted successfully.');
    }

    /**
     * Get predefined achievement icons
     */
    private function getAchievementIcons()
    {
        return [
            // Achievement & Success Icons
            'fa-trophy' => 'Trophy (Trofi)',
            'fa-award' => 'Award (Penghargaan)',
            'fa-medal' => 'Medal (Medali)',
            'fa-star' => 'Star (Bintang)',
            'fa-crown' => 'Crown (Mahkota)',
            'fa-certificate' => 'Certificate (Sertifikat)',
            'fa-ribbon' => 'Ribbon (Pita)',
            'fa-gem' => 'Gem (Permata)',

            // Business & Growth Icons
            'fa-chart-line' => 'Growth Chart (Grafik Pertumbuhan)',
            'fa-chart-bar' => 'Bar Chart (Grafik Batang)',
            'fa-trending-up' => 'Trending Up (Naik Trend)',
            'fa-bullseye' => 'Target (Sasaran)',
            'fa-rocket' => 'Rocket (Roket)',
            'fa-arrow-up' => 'Arrow Up (Panah Naik)',
            'fa-thumbs-up' => 'Thumbs Up (Jempol)',
            'fa-check-circle' => 'Check Circle (Lingkaran Centang)',

            // Teamwork & Partnership Icons
            'fa-handshake' => 'Handshake (Jabat Tangan)',
            'fa-users' => 'Team (Tim)',
            'fa-hands-helping' => 'Helping Hands (Tangan Membantu)',
            'fa-people-carry' => 'People Carry (Orang Membawa)',
            'fa-user-friends' => 'Friends (Teman)',
            'fa-heart' => 'Heart (Hati)',

            // Global & International Icons
            'fa-globe-americas' => 'Globe Americas (Dunia Amerika)',
            'fa-globe-asia' => 'Globe Asia (Dunia Asia)',
            'fa-globe-europe' => 'Globe Europe (Dunia Eropa)',
            'fa-globe' => 'Globe (Dunia)',
            'fa-earth-americas' => 'Earth Americas (Bumi Amerika)',
            'fa-world' => 'World (Dunia)',
            'fa-map-marked-alt' => 'Map Marked (Peta Bertanda)',

            // Innovation & Technology Icons
            'fa-lightbulb' => 'Lightbulb (Bola Lampu)',
            'fa-cog' => 'Settings (Pengaturan)',
            'fa-microchip' => 'Microchip',
            'fa-laptop-code' => 'Laptop Code (Kode Laptop)',
            'fa-brain' => 'Brain (Otak)',
            'fa-atom' => 'Atom',
            'fa-dna' => 'DNA',

            // Quality & Excellence Icons
            'fa-shield-alt' => 'Shield (Perisai)',
            'fa-balance-scale' => 'Balance Scale (Timbangan)',
            'fa-fingerprint' => 'Fingerprint (Sidik Jari)',
            'fa-stamp' => 'Stamp (Stempel)',
            'fa-eye' => 'Eye (Mata)',
            'fa-search-plus' => 'Search Plus (Pencarian Plus)',

            // Environmental & Sustainability Icons
            'fa-leaf' => 'Leaf (Daun)',
            'fa-tree' => 'Tree (Pohon)',
            'fa-seedling' => 'Seedling (Bibit)',
            'fa-recycle' => 'Recycle (Daur Ulang)',
            'fa-solar-panel' => 'Solar Panel',
            'fa-wind' => 'Wind (Angin)',
            'fa-water' => 'Water (Air)',

            // Time & Efficiency Icons
            'fa-clock' => 'Clock (Jam)',
            'fa-stopwatch' => 'Stopwatch',
            'fa-hourglass-half' => 'Hourglass (Jam Pasir)',
            'fa-calendar-check' => 'Calendar Check (Kalender Centang)',
            'fa-history' => 'History (Sejarah)',

            // Communication & Service Icons
            'fa-comments' => 'Comments (Komentar)',
            'fa-phone' => 'Phone (Telepon)',
            'fa-headset' => 'Customer Service',
            'fa-envelope' => 'Email',
            'fa-bullhorn' => 'Announcement (Pengumuman)',
            'fa-broadcast-tower' => 'Broadcast Tower (Menara Siaran)',

            // Financial & Business Icons
            'fa-dollar-sign' => 'Dollar Sign',
            'fa-coins' => 'Coins (Koin)',
            'fa-piggy-bank' => 'Piggy Bank (Celengan)',
            'fa-briefcase' => 'Briefcase (Tas Kerja)',
            'fa-building' => 'Building (Gedung)',
            'fa-industry' => 'Industry (Industri)',

            // Maritime & Shipping Specific Icons
            'fa-ship' => 'Ship (Kapal)',
            'fa-anchor' => 'Anchor (Jangkar)',
            'fa-compass' => 'Compass (Kompas)',
            'fa-life-ring' => 'Life Ring (Pelampung)',
        ];
    }
}