<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    // ambil semua submission milik user yang login
    public function index(Request $request)
    {
        $submissions = Submission::where('user_id', $request->user()->id)
            ->orderBy('week')
            ->get();

        return response()->json($submissions);
    }

    // simpan atau update submission
    public function store(Request $request)
    {
        $request->validate([
            'week' => 'required|integer|between:1,4',
            'drive_link' => 'required|string',
        ]);

        $submission = Submission::updateOrCreate(
            [
                'user_id' => $request->user()->id,
                'week' => $request->week,
            ],
            [
                'drive_link' => $request->drive_link,
            ]
        );

        return response()->json($submission, 201);
    }
}