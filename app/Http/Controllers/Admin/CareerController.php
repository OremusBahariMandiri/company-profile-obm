<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;
use App\Helpers\StorageHelper; // Import StorageHelper

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = Career::orderBy('created_at', 'desc')->get();

        return view('admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'careers_name' => 'required|string|max:255',
            'description' => 'required|string',
            'position' => 'required|string|max:255',
            'working_area' => 'required|string|max:255',
            'spesification_1' => 'nullable|string|max:255',
            'spesification_2' => 'nullable|string|max:255',
            'spesification_3' => 'nullable|string|max:255',
            'spesification_4' => 'nullable|string|max:255',
            'spesification_5' => 'nullable|string|max:255',
            'spesification_6' => 'nullable|string|max:255',
            'spesification_7' => 'nullable|string|max:255',
            'spesification_8' => 'nullable|string|max:255',
            'spesification_9' => 'nullable|string|max:255',
            'spesification_10' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'sallary' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,closed',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo')) {
            // BEFORE: $request->file('photo')->store('careers', 'public');
            // AFTER: StorageHelper
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'careers');
        }

        Career::create($data);

        return redirect()->route('career.index')
            ->with('success', 'Lowongan karir berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        return view('admin.career.show', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        return view('admin.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Career $career)
    {
        $request->validate([
            'careers_name' => 'required|string|max:255',
            'description' => 'required|string',
            'position' => 'required|string|max:255',
            'working_area' => 'required|string|max:255',
            'spesification_1' => 'nullable|string|max:255',
            'spesification_2' => 'nullable|string|max:255',
            'spesification_3' => 'nullable|string|max:255',
            'spesification_4' => 'nullable|string|max:255',
            'spesification_5' => 'nullable|string|max:255',
            'spesification_6' => 'nullable|string|max:255',
            'spesification_7' => 'nullable|string|max:255',
            'spesification_8' => 'nullable|string|max:255',
            'spesification_9' => 'nullable|string|max:255',
            'spesification_10' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'sallary' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive,closed',
            'contact_phone' => 'nullable|string|max:20',
            'contact_email' => 'nullable|email|max:255',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($career->photo) {
                // BEFORE: Storage::disk('public')->delete($career->photo);
                // AFTER: StorageHelper
                StorageHelper::deleteFile($career->photo);
            }
            // BEFORE: $request->file('photo')->store('careers', 'public');
            // AFTER: StorageHelper
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'careers');
        }

        $career->update($data);

        return redirect()->route('career.index')
            ->with('success', 'Lowongan karir berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        // Delete associated photo - UPDATED SECTION
        if ($career->photo) {
            // BEFORE: Storage::disk('public')->delete($career->photo);
            // AFTER: StorageHelper
            StorageHelper::deleteFile($career->photo);
        }

        $career->delete();

        return redirect()->route('career.index')
            ->with('success', 'Lowongan karir berhasil dihapus.');
    }
}