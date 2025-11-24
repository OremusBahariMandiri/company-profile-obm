<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::orderBy('status', 'desc')->orderBy('branch_name', 'asc')->get();

        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'address' => 'required|string',
            'pic' => 'required|string|max:255',
            'mobile_phone_number' => 'required|string|max:255',
            'email_1' => 'required|email|max:255',
            'email_2' => 'nullable|email|max:255',
            'status' => 'required|in:main_office,branch',
        ]);

        // Check if trying to create multiple main offices
        if ($request->status === 'main_office') {
            $existingMainOffice = Branch::where('status', 'main_office')->first();
            if ($existingMainOffice) {
                return redirect()->back()->withInput()
                    ->with('error', 'Hanya boleh ada satu kantor pusat. Edit kantor pusat yang sudah ada atau ubah status yang lain.');
            }
        }

        Branch::create($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'Data kantor berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'address' => 'required|string',
            'pic' => 'required|string|max:255',
            'mobile_phone_number' => 'required|string|max:255',
            'email_1' => 'required|email|max:255',
            'email_2' => 'nullable|email|max:255',
            'status' => 'required|in:main_office,branch',
        ]);

        // Check if trying to create multiple main offices
        if ($request->status === 'main_office' && $branch->status !== 'main_office') {
            $existingMainOffice = Branch::where('status', 'main_office')->first();
            if ($existingMainOffice) {
                return redirect()->back()->withInput()
                    ->with('error', 'Hanya boleh ada satu kantor pusat. Edit kantor pusat yang sudah ada atau ubah status yang lain.');
            }
        }

        $branch->update($request->all());

        return redirect()->route('branches.index')
            ->with('success', 'Data kantor berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')
            ->with('success', 'Data kantor berhasil dihapus.');
    }

    /**
     * Get status display name
     */
    public static function getStatusName($status)
    {
        $statuses = [
            'main_office' => 'Kantor Pusat',
            'branch' => 'Kantor Cabang'
        ];

        return $statuses[$status] ?? $status;
    }

    /**
     * Get main office for website
     */
    public static function getMainOffice()
    {
        return Branch::where('status', 'main_office')->first();
    }

    /**
     * Get branches for website
     */
    public static function getBranches()
    {
        return Branch::where('status', 'branch')->orderBy('branch_name', 'asc')->get();
    }
}