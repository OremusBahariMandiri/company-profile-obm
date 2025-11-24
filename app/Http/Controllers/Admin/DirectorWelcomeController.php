<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectorWelcome;
use Illuminate\Support\Facades\Storage;

class DirectorWelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directorWelcomes = DirectorWelcome::all();
        $canAdd = $directorWelcomes->count() < 1; // Only allow 1 director welcome

        return view('admin.director-welcome.index', compact('directorWelcomes', 'canAdd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingCount = DirectorWelcome::count();

        if ($existingCount >= 1) {
            return redirect()->route('director-welcome.index')
                ->with('error', 'Hanya boleh ada 1 sambutan direktur. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        return view('admin.director-welcome.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingCount = DirectorWelcome::count();

        if ($existingCount >= 1) {
            return redirect()->route('director-welcome.index')
                ->with('error', 'Hanya boleh ada 1 sambutan direktur. Edit yang sudah ada atau hapus untuk membuat baru.');
        }

        $request->validate([
            'title_highlight' => 'required|string|max:255',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'content_3' => 'required|string',
            'content_4' => 'nullable|string',
            'director_name' => 'required|string|max:255',
            'director_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle director photo upload
        if ($request->hasFile('director_photo')) {
            $data['director_photo'] = $request->file('director_photo')->store('director', 'public');
        }

        DirectorWelcome::create($data);

        return redirect()->route('director-welcome.index')
            ->with('success', 'Sambutan direktur berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DirectorWelcome $directorWelcome)
    {
        return view('admin.director-welcome.show', compact('directorWelcome'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DirectorWelcome $directorWelcome)
    {
        return view('admin.director-welcome.edit', compact('directorWelcome'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DirectorWelcome $directorWelcome)
    {
        $request->validate([
            'title_highlight' => 'required|string|max:255',
            'content_1' => 'required|string',
            'content_2' => 'required|string',
            'content_3' => 'required|string',
            'content_4' => 'nullable|string',
            'director_name' => 'required|string|max:255',
            'director_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $data = $request->all();

        // Handle director photo upload
        if ($request->hasFile('director_photo')) {
            // Delete old photo
            if ($directorWelcome->director_photo) {
                Storage::disk('public')->delete($directorWelcome->director_photo);
            }
            $data['director_photo'] = $request->file('director_photo')->store('director', 'public');
        }

        $directorWelcome->update($data);

        return redirect()->route('director-welcome.index')
            ->with('success', 'Sambutan direktur berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DirectorWelcome $directorWelcome)
    {
        // Delete associated photo
        if ($directorWelcome->director_photo) {
            Storage::disk('public')->delete($directorWelcome->director_photo);
        }

        $directorWelcome->delete();

        return redirect()->route('director-welcome.index')
            ->with('success', 'Sambutan direktur berhasil dihapus.');
    }
}
