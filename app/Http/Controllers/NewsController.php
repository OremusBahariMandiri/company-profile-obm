<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\StorageHelper; // Import StorageHelper

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'news' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->topic = $request->topic;
        $news->news = $request->news;

        // Handle image uploads - UPDATED SECTION
        if ($request->hasFile('image')) {
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image = StorageHelper::storeFile($request->file('image'), 'news');
        }

        if ($request->hasFile('image2')) {
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image2 = StorageHelper::storeFile($request->file('image2'), 'news');
        }

        if ($request->hasFile('image3')) {
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image3 = StorageHelper::storeFile($request->file('image3'), 'news');
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'topic' => 'required|string|max:255',
            'news' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->topic = $request->topic;
        $news->news = $request->news;

        // Handle image uploads - UPDATED SECTION
        if ($request->hasFile('image')) {
            // Delete old image
            if ($news->image) {
                // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image);
                // AFTER: StorageHelper
                StorageHelper::deleteFile($news->image);
            }
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image = StorageHelper::storeFile($request->file('image'), 'news');
        }

        if ($request->hasFile('image2')) {
            // Delete old image
            if ($news->image2) {
                // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2);
                // AFTER: StorageHelper
                StorageHelper::deleteFile($news->image2);
            }
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image2 = StorageHelper::storeFile($request->file('image2'), 'news');
        }

        if ($request->hasFile('image3')) {
            // Delete old image
            if ($news->image3) {
                // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3);
                // AFTER: StorageHelper
                StorageHelper::deleteFile($news->image3);
            }
            // BEFORE: Manual file handling dengan $_SERVER['DOCUMENT_ROOT']
            // AFTER: StorageHelper
            $news->image3 = StorageHelper::storeFile($request->file('image3'), 'news');
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);

        // Delete associated images - UPDATED SECTION
        if ($news->image) {
            // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image);
            // AFTER: StorageHelper
            StorageHelper::deleteFile($news->image);
        }
        if ($news->image2) {
            // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2);
            // AFTER: StorageHelper
            StorageHelper::deleteFile($news->image2);
        }
        if ($news->image3) {
            // BEFORE: File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3);
            // AFTER: StorageHelper
            StorageHelper::deleteFile($news->image3);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}