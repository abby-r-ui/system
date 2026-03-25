<?php

namespace App\Http\Controllers;
use App\Models\Submission;
use App\Models\Reviewer;
use App\Models\Review;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller {
    public function index() {
        $stats = [
            'pending' => Submission::where('status', 'pending')->count(),
            'reviewing' => Submission::where('status', 'reviewing')->count(),
            'completed' => Submission::where('status', 'completed')->count(),
            'overdue' => Review::where('due_date', '<', now())->where('status', 'pending')->count()
        ];
        return view('dashboard', compact('stats'));
    }
}