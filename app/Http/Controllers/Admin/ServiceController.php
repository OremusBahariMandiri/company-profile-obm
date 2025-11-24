<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->get();

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get list of FontAwesome icons for services
        $iconOptions = $this->getServiceIcons();
        $colorOptions = $this->getColorOptions();

        return view('admin.services.create', compact('iconOptions', 'colorOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:50',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $iconOptions = $this->getServiceIcons();
        $colorOptions = $this->getColorOptions();

        return view('admin.services.edit', compact('service', 'iconOptions', 'colorOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:100',
            'color' => 'required|string|max:50',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    /**
     * Get predefined service icons
     */
    private function getServiceIcons()
    {
        return [
            // Maritime & Shipping Icons
            'fa-ship' => 'Ship (Kapal)',
            'fa-anchor' => 'Anchor (Jangkar)',
            'fa-water' => 'Water (Air)',
            'fa-compass' => 'Compass (Kompas)',

            // Logistics & Supply Icons
            'fa-box' => 'Box (Kotak)',
            'fa-boxes' => 'Boxes (Kotak-kotak)',
            'fa-truck' => 'Truck (Truk)',
            'fa-dolly' => 'Dolly (Kereta Dorong)',
            'fa-pallet' => 'Pallet',

            // Medical & Emergency Icons
            'fa-ambulance' => 'Ambulance (Ambulans)',
            'fa-heartbeat' => 'Heartbeat (Detak Jantung)',
            'fa-hospital' => 'Hospital (Rumah Sakit)',
            'fa-first-aid' => 'First Aid (Pertolongan Pertama)',
            'fa-user-md' => 'Doctor (Dokter)',

            // Crew & People Icons
            'fa-users' => 'Users (Pengguna)',
            'fa-user-tie' => 'Business User (Pengguna Bisnis)',
            'fa-hard-hat' => 'Worker (Pekerja)',
            'fa-id-card' => 'ID Card (Kartu Identitas)',
            'fa-passport' => 'Passport (Paspor)',

            // Technical & Tools Icons
            'fa-tools' => 'Tools (Alat)',
            'fa-wrench' => 'Wrench (Kunci Pas)',
            'fa-cog' => 'Settings (Pengaturan)',
            'fa-clipboard-check' => 'Checklist',
            'fa-file-alt' => 'Document (Dokumen)',

            // Communication & Service Icons
            'fa-headset' => 'Customer Service',
            'fa-phone' => 'Phone (Telepon)',
            'fa-envelope' => 'Email',
            'fa-comments' => 'Comments (Komentar)',
            'fa-handshake' => 'Handshake (Jabat Tangan)',

            // Business & Professional Icons
            'fa-briefcase' => 'Briefcase (Tas Kerja)',
            'fa-building' => 'Building (Gedung)',
            'fa-chart-line' => 'Chart (Grafik)',
            'fa-trophy' => 'Trophy (Trofi)',
            'fa-star' => 'Star (Bintang)',

            // Transportation Icons
            'fa-helicopter' => 'Helicopter',
            'fa-plane' => 'Plane (Pesawat)',
            'fa-car' => 'Car (Mobil)',
            'fa-route' => 'Route (Rute)',

            // Security & Safety Icons
            'fa-shield-alt' => 'Shield (Perisai)',
            'fa-lock' => 'Lock (Kunci)',
            'fa-eye' => 'Eye (Mata)',
            'fa-exclamation-triangle' => 'Warning (Peringatan)',

            // Time & Schedule Icons
            'fa-clock' => 'Clock (Jam)',
            'fa-calendar' => 'Calendar (Kalender)',
            'fa-stopwatch' => 'Stopwatch',

            // Location & Navigation Icons
            'fa-map-marker-alt' => 'Location (Lokasi)',
            'fa-globe' => 'Globe (Dunia)',
            'fa-map' => 'Map (Peta)',
        ];
    }

    /**
     * Get predefined color options
     */
    private function getColorOptions()
    {
        return [
            'red' => 'Merah (Red)',
            'blue' => 'Biru (Blue)',
            'green' => 'Hijau (Green)',
            'orange' => 'Oranye (Orange)',
            'purple' => 'Ungu (Purple)',
            'yellow' => 'Kuning (Yellow)',
            'teal' => 'Teal',
            'pink' => 'Pink',
            'indigo' => 'Indigo',
            'cyan' => 'Cyan',
            'gray' => 'Abu-abu (Gray)',
            'dark' => 'Gelap (Dark)',
        ];
    }
}
