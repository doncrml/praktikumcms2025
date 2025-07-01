<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function create()
    {
        $images = Image::all();
        return view('image.upload', compact('images'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|max:2048',
            ]);

            $imagePath = $request->file('image')->store('images', 'public');

            $image = new Image();
            $image->title = $request->title;
            $image->image_path = $imagePath;
            $image->save();

            Log::info('Gambar berhasil diupload', [
                'title' => $request->title,
                'path' => $imagePath
            ]);

            return redirect('/upload')->with('success', 'Gambar berhasil diupload');
        } catch (\Exception $e) {
            Log::error('Gagal upload gambar: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengupload gambar.');
        }
    }

    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id);

            Storage::disk('public')->delete($image->image_path);

            $image->delete();

            Log::info('Gambar berhasil dihapus', ['id' => $id]);

            return redirect('/upload')->with('success', 'Gambar berhasil dihapus');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus gambar: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Gagal menghapus gambar.');
        }
    }
}
