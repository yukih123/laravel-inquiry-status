<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function create()
    {
        return view('inquiry.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|max:1000',
        ]);

        Inquiry::create($validated);

        return redirect()->route('inquiry.thanks')->with('success', '送信しました');
    }

    public function thanks()
    {
        return view('inquiry.thanks');
    }

    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }
}

