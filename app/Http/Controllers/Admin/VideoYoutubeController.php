<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoYoutube;
use Illuminate\Http\Request;

class VideoYoutubeController extends Controller
{
    public function index()
    {
        $videos = VideoYoutube::orderBy('urutan', 'asc')->paginate(10);
        return view('admin.video-youtube.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video-youtube.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'youtube_id' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        // Helper to extract Youtube Video ID from URL if user pastes a full URL
        $youtubeId = $this->extractYoutubeId($request->youtube_id);

        VideoYoutube::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'youtube_id' => $youtubeId,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ]);

        return redirect()->route('admin.video-youtube.index')
            ->with('success', 'Video Youtube berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $video = VideoYoutube::findOrFail($id);
        return view('admin.video-youtube.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = VideoYoutube::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'youtube_id' => 'required|string|max:255',
            'urutan' => 'required|integer|min:1',
            'status' => 'nullable|boolean',
        ]);

        $youtubeId = $this->extractYoutubeId($request->youtube_id);

        $video->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'youtube_id' => $youtubeId,
            'urutan' => $request->urutan,
            'status' => $request->has('status') ? true : false,
        ]);

        return redirect()->route('admin.video-youtube.index')
            ->with('success', 'Video Youtube berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $video = VideoYoutube::findOrFail($id);
        $video->delete();

        return redirect()->route('admin.video-youtube.index')
            ->with('success', 'Video Youtube berhasil dihapus.');
    }

    private function extractYoutubeId($urlOrId)
    {
        // Simple regex to parse youtube video ID from various URLs
        $regExp = '/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/';
        if (preg_match($regExp, $urlOrId, $match)) {
            if (isset($match[2]) && strlen($match[2]) == 11) {
                return $match[2];
            }
        }
        return $urlOrId; // If not matched, assume it is already a video ID
    }
}
