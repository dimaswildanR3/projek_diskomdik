<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Video::all(); // Fetch all videos
        return view('videos.index', compact('videos')); // Pass videos to the index view
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        return view('videos.create'); // Show form to create a new video
    }

    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'url' => 'required|url',
        ]);

        // Create a new video record in the database
        Video::create($validated);

        return redirect()->route('videos.index')->with('success', 'Video created successfully!');
    }

    /**
     * Display the specified video.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id); // Fetch the video by ID
        return view('videos.show', compact('video')); // Show the video details
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id); // Fetch the video by ID
        return view('videos.edit', compact('video')); // Show form to edit the video
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'url' => 'required|url',
        ]);

        // Update the video record in the database
        $video = Video::findOrFail($id);
        $video->update($validated);

        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy($id)
    {
        // Delete the video from the database
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }
}
