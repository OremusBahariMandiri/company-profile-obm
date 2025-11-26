<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\StorageHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizationStructure;
use Illuminate\Support\Facades\Storage;

class OrganizationStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizationStructures = OrganizationStructure::all();
        $canAdd = $organizationStructures->count() < 1; // Only allow 1 organization structure

        return view('admin.organization-structure.index', compact('organizationStructures', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingCount = OrganizationStructure::count();

        if ($existingCount >= 1) {
            return redirect()->route('organization-structure.index')
                ->with('error', 'Hanya boleh ada 1 struktur organisasi. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        return view('admin.organization-structure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingCount = OrganizationStructure::count();

        if ($existingCount >= 1) {
            return redirect()->route('organization-structure.index')
                ->with('error', 'Hanya boleh ada 1 struktur organisasi. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'organization');
        }

        OrganizationStructure::create($data);

        return redirect()->route('organization-structure.index')
            ->with('success', 'Struktur organisasi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationStructure $organizationStructure)
    {
        return view('admin.organization-structure.show', compact('organizationStructure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationStructure $organizationStructure)
    {
        return view('admin.organization-structure.edit', compact('organizationStructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrganizationStructure $organizationStructure)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($organizationStructure->photo) {
                StorageHelper::deleteFile($organizationStructure->photo);
            }
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'organization');
        }

        $organizationStructure->update($data);

        return redirect()->route('organization-structure.index')
            ->with('success', 'Struktur organisasi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationStructure $organizationStructure)
    {
        // Delete associated photo
        if ($organizationStructure->photo) {
            StorageHelper::deleteFile($organizationStructure->photo);
        }

        $organizationStructure->delete();

        return redirect()->route('organization-structure.index')
            ->with('success', 'Struktur organisasi berhasil dihapus.');
    }
}
