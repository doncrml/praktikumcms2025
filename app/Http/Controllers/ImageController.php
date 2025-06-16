<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
     
        $images = Image::all();

       
        return view('image.upload', compact('images'));
    }

    public function store(Request $request)
    {
      
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|max:2048',
        ]);

      
        $imagePath = $request->file('image')->store('images', 'public');

        
        $image = new Image();
        $image->title = $request->title;
        $image->image_path = $imagePath;
        $image->save();

        return redirect('/upload')->with('success', 'Gambar berhasil diupload');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

       
        Storage::disk('public')->delete($image->image_path);

        
        $image->delete();

        return redirect('/upload')->with('success', 'Gambar berhasil dihapus');
    }
}
