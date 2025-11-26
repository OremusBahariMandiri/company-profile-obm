<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certification;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certifications = Certification::orderBy('created_at', 'desc')->get();

        return view('admin.certification.index', compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.certification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {

            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'certifications');
        }

        Certification::create($data);

        return redirect()->route('certification.index')
            ->with('success', 'Sertifikat berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certification $certification)
    {
        return view('admin.certification.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certification $certification)
    {
        return view('admin.certification.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certification $certification)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($certification->photo) {
                StorageHelper::deleteFile($certification->photo);
            }

            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'certifications');
        }

        $certification->update($data);

        return redirect()->route('certification.index')
            ->with('success', 'Sertifikat berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certification $certification)
    {
        // Delete associated photo
        if ($certification->photo) {    
            StorageHelper::deleteFile($certification->photo);

        }

        $certification->delete();

        return redirect()->route('certification.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}