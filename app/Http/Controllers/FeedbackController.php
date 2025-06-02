<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderByDesc('CREATED_AT')->get(); // Oracle butuh huruf besar
        return view('feedbacks.index', compact('feedbacks')); // disesuaikan dengan folder blade
    }

    public function create()
    {
        return view('feedbacks.create'); // disesuaikan dengan folder blade
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA' => 'required',
            'EMAIL' => 'nullable|email',
            'PESAN' => 'required',
        ]);

        Feedback::create([
            'NAMA' => $request->input('NAMA'),
            'EMAIL' => $request->input('EMAIL'),
            'PESAN' => $request->input('PESAN'),
        ]);

        return redirect()->route('feedbacks.index')->with('success', 'Pesan berhasil dikirim!');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return back()->with('success', 'Pesan berhasil dihapus!');
    }
}
