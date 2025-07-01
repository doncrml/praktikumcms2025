<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::orderByDesc('CREATED_AT')->get(); // Oracle butuh huruf besar
        return view('feedbacks.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('feedbacks.create');
    }

    public function store(Request $request)
    {
        try {
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

            Log::info('Feedback berhasil dikirim', [
                'nama' => $request->input('NAMA'),
                'email' => $request->input('EMAIL')
            ]);

            return redirect()->route('feedbacks.index')->with('success', 'Pesan berhasil dikirim!');
        } catch (\Exception $e) {
            Log::error('Gagal mengirim feedback: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal mengirim feedback.');
        }
    }

    public function destroy($id)
    {
        try {
            $feedback = Feedback::findOrFail($id);
            $feedback->delete();

            Log::info('Feedback berhasil dihapus', ['id' => $id]);

            return back()->with('success', 'Pesan berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus feedback: ' . $e->getMessage(), ['id' => $id]);
            return redirect()->back()->with('error', 'Gagal menghapus feedback.');
        }
    }
}
