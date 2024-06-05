<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Violation;
use App\Models\Complaint;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch the latest 10 records from each table
        $violations = Violation::latest()->take(10)->get();
        $complaints = Complaint::latest()->take(10)->get();

        // Add a 'title' field to each record dynamically
        $violations->each(function ($item) {
            $item->title = 'Violation: ' . $item->offense;
        });

        $complaints->each(function ($item) {
            $item->title = 'Complaint: ' . $item->nature_and_cause;
        });

        // Combine all violations and complaints into one collection
        $allNotifications = $violations->concat($complaints);

        // Sort by created_at field in descending order
        $allNotifications = $allNotifications->sortByDesc('created_at');

        return view('staff.dashboard', compact('allNotifications'));
    }
}
