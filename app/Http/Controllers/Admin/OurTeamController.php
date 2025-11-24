<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurTeam;
use Illuminate\Support\Facades\Storage;

class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = OurTeam::all();
        $canAdd = $teams->count() < 1; // Only allow 1 team configuration

        return view('admin.our-team.index', compact('teams', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingCount = OurTeam::count();

        if ($existingCount >= 1) {
            return redirect()->route('our-team.index')
                ->with('error', 'Hanya boleh ada 1 konfigurasi tim. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        return view('admin.our-team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingCount = OurTeam::count();

        if ($existingCount >= 1) {
            return redirect()->route('our-team.index')
                ->with('error', 'Hanya boleh ada 1 konfigurasi tim. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        $request->validate([
            'title_photo_1' => 'required|string|max:255',
            'subtitle_photo_1' => 'required|string|max:255',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_photo_2' => 'nullable|string|max:255',
            'subtitle_photo_2' => 'nullable|string|max:255',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_photo_3' => 'nullable|string|max:255',
            'subtitle_photo_3' => 'nullable|string|max:255',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo uploads
        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = $request->file('photo_1')->store('team', 'public');
        }

        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = $request->file('photo_2')->store('team', 'public');
        }

        if ($request->hasFile('photo_3')) {
            $data['photo_3'] = $request->file('photo_3')->store('team', 'public');
        }

        OurTeam::create($data);

        return redirect()->route('our-team.index')
            ->with('success', 'Konfigurasi tim berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurTeam $ourTeam)
    {
        return view('admin.our-team.show', compact('ourTeam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeam $ourTeam)
    {
        return view('admin.our-team.edit', compact('ourTeam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurTeam $ourTeam)
    {
        $request->validate([
            'title_photo_1' => 'required|string|max:255',
            'subtitle_photo_1' => 'required|string|max:255',
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_photo_2' => 'nullable|string|max:255',
            'subtitle_photo_2' => 'nullable|string|max:255',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_photo_3' => 'nullable|string|max:255',
            'subtitle_photo_3' => 'nullable|string|max:255',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo uploads
        if ($request->hasFile('photo_1')) {
            // Delete old photo
            if ($ourTeam->photo_1) {
                Storage::disk('public')->delete($ourTeam->photo_1);
            }
            $data['photo_1'] = $request->file('photo_1')->store('team', 'public');
        }

        if ($request->hasFile('photo_2')) {
            // Delete old photo
            if ($ourTeam->photo_2) {
                Storage::disk('public')->delete($ourTeam->photo_2);
            }
            $data['photo_2'] = $request->file('photo_2')->store('team', 'public');
        }

        if ($request->hasFile('photo_3')) {
            // Delete old photo
            if ($ourTeam->photo_3) {
                Storage::disk('public')->delete($ourTeam->photo_3);
            }
            $data['photo_3'] = $request->file('photo_3')->store('team', 'public');
        }

        $ourTeam->update($data);

        return redirect()->route('our-team.index')
            ->with('success', 'Konfigurasi tim berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurTeam $ourTeam)
    {
        // Delete associated photos
        if ($ourTeam->photo_1) {
            Storage::disk('public')->delete($ourTeam->photo_1);
        }
        if ($ourTeam->photo_2) {
            Storage::disk('public')->delete($ourTeam->photo_2);
        }
        if ($ourTeam->photo_3) {
            Storage::disk('public')->delete($ourTeam->photo_3);
        }

        $ourTeam->delete();

        return redirect()->route('our-team.index')
            ->with('success', 'Konfigurasi tim berhasil dihapus.');
    }
}