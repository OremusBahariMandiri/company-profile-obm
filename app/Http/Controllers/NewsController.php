<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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

        // Path ke public_html/images/news
        $publicHtmlPath = $_SERVER['DOCUMENT_ROOT'] . '/images/news';

        // Pastikan folder images/news ada
        if (!File::exists($publicHtmlPath)) {
            File::makeDirectory($publicHtmlPath, 0755, true);
        }

        // Handle image uploads
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($publicHtmlPath, $imageName);
            $news->image = 'news/' . $imageName;
        }

        if ($request->hasFile('image2')) {
            $image2 = $request->file('image2');
            $image2Name = time() . '_' . Str::random(10) . '.' . $image2->getClientOriginalExtension();
            $image2->move($publicHtmlPath, $image2Name);
            $news->image2 = 'news/' . $image2Name;
        }

        if ($request->hasFile('image3')) {
            $image3 = $request->file('image3');
            $image3Name = time() . '_' . Str::random(10) . '.' . $image3->getClientOriginalExtension();
            $image3->move($publicHtmlPath, $image3Name);
            $news->image3 = 'news/' . $image3Name;
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

        // Path ke public_html/images/news
        $publicHtmlPath = $_SERVER['DOCUMENT_ROOT'] . '/images/news';

        // Pastikan folder images/news ada
        if (!File::exists($publicHtmlPath)) {
            File::makeDirectory($publicHtmlPath, 0755, true);
        }

        // Handle image uploads
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image)) {
                File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move($publicHtmlPath, $imageName);
            $news->image = 'news/' . $imageName;
        }

        if ($request->hasFile('image2')) {
            // Delete old image if exists
            if ($news->image2 && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2)) {
                File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2);
            }

            $image2 = $request->file('image2');
            $image2Name = time() . '_' . Str::random(10) . '.' . $image2->getClientOriginalExtension();
            $image2->move($publicHtmlPath, $image2Name);
            $news->image2 = 'news/' . $image2Name;
        }

        if ($request->hasFile('image3')) {
            // Delete old image if exists
            if ($news->image3 && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3)) {
                File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3);
            }

            $image3 = $request->file('image3');
            $image3Name = time() . '_' . Str::random(10) . '.' . $image3->getClientOriginalExtension();
            $image3->move($publicHtmlPath, $image3Name);
            $news->image3 = 'news/' . $image3Name;
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

        // Delete associated images
        if ($news->image && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image)) {
            File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image);
        }
        if ($news->image2 && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2)) {
            File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image2);
        }
        if ($news->image3 && File::exists($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3)) {
            File::delete($_SERVER['DOCUMENT_ROOT'] . '/images/' . $news->image3);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully!');
    }
}