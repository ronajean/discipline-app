<?php

namespace App\Http\Controllers;

use App\Models\ArchiveViolation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArchiveViolationController extends Controller
{
    public function index(Request $request)
    {
        $query = ArchiveViolation::query();

        if ($request->has('search')) {
            $query->where('student_id', 'like', '%' . $request->search . '%');
        }

        $archive_violations = $query->orderBy('created_at', 'desc')->get();

        return view('staff.archive', compact('archive_violations'));
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|exists:students,student_id',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fileContent = file_get_contents($request->file('file')->getRealPath());

        ArchiveViolation::create([
            'student_id' => $request->student_id,
            'file' => $fileContent,
        ]);

        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    public function download($id)
    {
        $archive = ArchiveViolation::findOrFail($id);

        return response($archive->file)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="archive_' . $archive->id . '.pdf"');
    }
}
