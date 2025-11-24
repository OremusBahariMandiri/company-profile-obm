<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class publicNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->paginate(9);
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not needed for public news display
        return redirect()->route('publicnews.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not needed for public news display
        return redirect()->route('publicnews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);

        // Get related news (same topic)
        $relatedNews = News::where('id', '!=', $id)
                          ->where('topic', $news->topic)
                          ->latest()
                          ->take(3)
                          ->get();

        // Get latest news (different from current)
        $latestNews = News::where('id', '!=', $id)
                         ->latest()
                         ->take(3)
                         ->get();

        return view('news.show', compact('news', 'relatedNews', 'latestNews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not needed for public news display
        return redirect()->route('publicnews.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Not needed for public news display
        return redirect()->route('publicnews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Not needed for public news display
        return redirect()->route('publicnews.index');
    }
}