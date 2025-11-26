<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrustedClient;
use App\Helpers\StorageHelper; // Import StorageHelper

class TrustedClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trustedClients = TrustedClient::orderBy('created_at', 'desc')->get();

        return view('admin.trusted-clients.index', compact('trustedClients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trusted-clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo')) {
            // BEFORE: $request->file('photo')->store('trusted-clients', 'public');
            // AFTER: StorageHelper
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'trusted-clients');
        }

        TrustedClient::create($data);

        return redirect()->route('trusted-clients.index')
            ->with('success', 'Logo klien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrustedClient $trustedClient)
    {
        return view('admin.trusted-clients.show', compact('trustedClient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrustedClient $trustedClient)
    {
        return view('admin.trusted-clients.edit', compact('trustedClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrustedClient $trustedClient)
    {
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);

        $data = $request->all();

        // Handle photo upload - UPDATED SECTION
        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($trustedClient->photo) {
                // BEFORE: Storage::disk('public')->delete($trustedClient->photo);
                // AFTER: StorageHelper
                StorageHelper::deleteFile($trustedClient->photo);
            }
            // BEFORE: $request->file('photo')->store('trusted-clients', 'public');
            // AFTER: StorageHelper
            $data['photo'] = StorageHelper::storeFile($request->file('photo'), 'trusted-clients');
        }

        $trustedClient->update($data);

        return redirect()->route('trusted-clients.index')
            ->with('success', 'Logo klien berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrustedClient $trustedClient)
    {
        // Delete associated photo - UPDATED SECTION
        if ($trustedClient->photo) {
            // BEFORE: Storage::disk('public')->delete($trustedClient->photo);
            // AFTER: StorageHelper
            StorageHelper::deleteFile($trustedClient->photo);
        }

        $trustedClient->delete();

        return redirect()->route('trusted-clients.index')
            ->with('success', 'Logo klien berhasil dihapus.');
    }
}