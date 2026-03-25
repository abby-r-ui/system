<?php

namespace App\Http\Controllers;
use App\Models\Submission;
use App\Models\Review;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class SubmissionController extends Controller {
    public function index() {
        $submissions = Submission::with('reviews')->latest()->get();
        return view('submissions.index', compact('submissions'));
    }
    
    public function store(Request $request) {
        $submission = Submission::create($request->all());
        $submission->qr_code = QrCode::generate("submission/{$submission->id}");
        $submission->save();
        return redirect()->route('submissions.index')->with('success', 'Submission created!');
    }

    public function assignReviewers(Request $request, $id) {
        $submission = Submission::findOrFail($id);
        foreach($request->reviewer_ids ?? [] as $reviewerId) {
            Review::create([
                'submission_id' => $id,
                'reviewer_id' => $reviewerId,
                'due_date' => now()->addDays(14)
            ]);
        }
        $submission->status = 'reviewing';
        $submission->save();
        return back()->with('success', 'Reviewers assigned!');
    }
    public function generateReport($id) {
        $submission = Submission::with('reviews.reviewer')->findOrFail($id);
        $pdf = Pdf::loadView('reports.submission', compact('submission'));
        return $pdf->download('submission-report.pdf');
    }
    
    public function show($id) {
        $submission = Submission::with('reviews.reviewer')->findOrFail($id);
        return view('submissions.show', compact('submission'));
    }

    public function qr($type, $id) {
        $url = url("/submissions/{$id}");
        $qr = QrCode::size(300)->generate($url);
        return response($qr)->header('Content-Type', 'image/png');
    }
}
