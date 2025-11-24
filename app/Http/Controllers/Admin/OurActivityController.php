<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurActivity;
use Illuminate\Support\Facades\Storage;

class OurActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = OurActivity::orderBy('category', 'asc')->orderBy('created_at', 'desc')->get();

        // Group activities by category for better display
        $groupedActivities = $activities->groupBy('category');

        return view('admin.activities.index', compact('activities', 'groupedActivities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [
            'agency' => 'Agency',
            'cable-laying' => 'Cable Laying',
            'ship-to-ship' => 'Ship to Ship',
            'provision-supply' => 'Provision Supply',
            'medivac' => 'Medivac Operation',
            'crew-change' => 'Crew Change'
        ];

        return view('admin.activities.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:agency,cable-laying,ship-to-ship,provision-supply,medivac,crew-change',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('activities', 'public');
        }

        OurActivity::create($data);

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurActivity $activity)
    {
        $categories = [
            'agency' => 'Agency',
            'cable-laying' => 'Cable Laying',
            'ship-to-ship' => 'Ship to Ship',
            'provision-supply' => 'Provision Supply',
            'medivac' => 'Medivac Operation',
            'crew-change' => 'Crew Change'
        ];

        return view('admin.activities.show', compact('activity', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurActivity $activity)
    {
        $categories = [
            'agency' => 'Agency',
            'cable-laying' => 'Cable Laying',
            'ship-to-ship' => 'Ship to Ship',
            'provision-supply' => 'Provision Supply',
            'medivac' => 'Medivac Operation',
            'crew-change' => 'Crew Change'
        ];

        return view('admin.activities.edit', compact('activity', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurActivity $activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:agency,cable-laying,ship-to-ship,provision-supply,medivac,crew-change',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($activity->photo) {
                Storage::disk('public')->delete($activity->photo);
            }
            $data['photo'] = $request->file('photo')->store('activities', 'public');
        }

        $activity->update($data);

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurActivity $activity)
    {
        // Delete associated photo
        if ($activity->photo) {
            Storage::disk('public')->delete($activity->photo);
        }

        $activity->delete();

        return redirect()->route('activities.index')
            ->with('success', 'Aktivitas berhasil dihapus.');
    }

    /**
     * Get category display name
     */
    public static function getCategoryName($category)
    {
        $categories = [
            'agency' => 'Agency',
            'cable-laying' => 'Cable Laying',
            'ship-to-ship' => 'Ship to Ship',
            'provision-supply' => 'Provision Supply',
            'medivac' => 'Medivac Operation',
            'crew-change' => 'Crew Change'
        ];

        return $categories[$category] ?? $category;
    }
}