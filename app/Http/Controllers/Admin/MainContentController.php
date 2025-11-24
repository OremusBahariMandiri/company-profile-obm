<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainContent;
use Illuminate\Support\Facades\Storage;

class MainContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainContents = MainContent::all();
        $canAdd = $mainContents->count() < 3;

        return view('admin.main-content.index', compact('mainContents', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingCount = MainContent::count();

        if ($existingCount >= 3) {
            return redirect()->route('main-content.index')
                ->with('error', 'Maximum 3 main content items allowed.');
        }

        return view('admin.main-content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingCount = MainContent::count();

        if ($existingCount >= 3) {
            return redirect()->route('main-content.index')
                ->with('error', 'Maximum 3 main content items allowed.');
        }

        $request->validate([
            'title_1' => 'required|string|max:255',
            'subtitle_1' => 'required|string',
            'photo_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_2' => 'required|string|max:255',
            'subtitle_2' => 'required|string',
            'photo_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_3' => 'required|string|max:255',
            'subtitle_3' => 'required|string',
            'photo_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo uploads
        if ($request->hasFile('photo_1')) {
            $data['photo_1'] = $request->file('photo_1')->store('main-content', 'public');
        }

        if ($request->hasFile('photo_2')) {
            $data['photo_2'] = $request->file('photo_2')->store('main-content', 'public');
        }

        if ($request->hasFile('photo_3')) {
            $data['photo_3'] = $request->file('photo_3')->store('main-content', 'public');
        }

        MainContent::create($data);

        return redirect()->route('main-content.index')
            ->with('success', 'Main content created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MainContent $mainContent)
    {
        return view('admin.main-content.show', compact('mainContent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainContent $mainContent)
    {
        return view('admin.main-content.edit', compact('mainContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MainContent $mainContent)
    {
        $request->validate([
            'title_1' => 'required|string|max:255',
            'subtitle_1' => 'required|string',
            'photo_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_2' => 'required|string|max:255',
            'subtitle_2' => 'required|string',
            'photo_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'title_3' => 'required|string|max:255',
            'subtitle_3' => 'required|string',
            'photo_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo uploads
        if ($request->hasFile('photo_1')) {
            // Delete old photo
            if ($mainContent->photo_1) {
                Storage::disk('public')->delete($mainContent->photo_1);
            }
            $data['photo_1'] = $request->file('photo_1')->store('main-content', 'public');
        }

        if ($request->hasFile('photo_2')) {
            // Delete old photo
            if ($mainContent->photo_2) {
                Storage::disk('public')->delete($mainContent->photo_2);
            }
            $data['photo_2'] = $request->file('photo_2')->store('main-content', 'public');
        }

        if ($request->hasFile('photo_3')) {
            // Delete old photo
            if ($mainContent->photo_3) {
                Storage::disk('public')->delete($mainContent->photo_3);
            }
            $data['photo_3'] = $request->file('photo_3')->store('main-content', 'public');
        }

        $mainContent->update($data);

        return redirect()->route('main-content.index')
            ->with('success', 'Main content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainContent $mainContent)
    {
        // Delete associated photos
        if ($mainContent->photo_1) {
            Storage::disk('public')->delete($mainContent->photo_1);
        }
        if ($mainContent->photo_2) {
            Storage::disk('public')->delete($mainContent->photo_2);
        }
        if ($mainContent->photo_3) {
            Storage::disk('public')->delete($mainContent->photo_3);
        }

        $mainContent->delete();

        return redirect()->route('main-content.index')
            ->with('success', 'Main content deleted successfully.');
    }
}
