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

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return view('inquiry.confirm', $validated);
    }

    public function store(Request $request)
    {
        // ここでDB保存（後でやる）
        return view('inquiry.complete');
    }

    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }
}

