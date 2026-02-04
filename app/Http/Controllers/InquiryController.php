<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Jobs\SendInquiryMail;
use App\Models\Inquiry;
use App\Mail\InquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InquiryController extends Controller
{
    public function create()
    {
        return view('inquiry.create');
    }

    public function confirm(InquiryRequest $request)
    {
        $validated = $request->validated();

        return view('inquiry.confirm', $validated);
    }

    public function store(InquiryRequest $request)
    {
        $validated = $request->validated();

        $inquiry = Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        SendInquiryMail::dispatch($inquiry);

        return redirect()->route('inquiry.complete')->with('success', '送信しました');
    }

    public function complete(Request $request)
    {
        return view('inquiry.complete');
    }

    public function index()
    {
        $inquiries = Inquiry::latest()->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }
}

