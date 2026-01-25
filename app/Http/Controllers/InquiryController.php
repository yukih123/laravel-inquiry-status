<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return redirect()->back()->with('success', '送信しました');
    }

    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }
}

