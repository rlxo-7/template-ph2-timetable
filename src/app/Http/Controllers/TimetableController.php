<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        $mondayClasses = DB::select(
            'SELECT period, name, teacher, room FROM courses WHERE day = ? ORDER BY period ASC',
            [1]
        );

        $requiredClasses = DB::select(
            'SELECT name, credits FROM courses WHERE required = ? ORDER BY code ASC',
            [true]
        );

        return view('timetable', [
            'mondayClasses' => $mondayClasses,
            'requiredClasses' => $requiredClasses,
        ]);
    }
    
    public function edit($id)
{
    $entry = TimetableEntry::findOrFail($id);

    return view('entries.edit', [
        'entry' => $entry,
    ]);
}
}
