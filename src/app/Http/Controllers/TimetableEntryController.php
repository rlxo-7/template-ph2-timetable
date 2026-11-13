<?php

namespace App\Http\Controllers;

use App\Models\TimetableEntry;
use Illuminate\Http\Request;

class TimetableEntryController extends Controller
{
	public function index()
	{
		$entries = TimetableEntry::orderBy('day')
			->orderBy('period')
			->get();

		return view('entries.index', [
			'entries' => $entries,
		]);
	}

	public function create()
	{
		return view('entries.create');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'day' => ['required', 'integer', 'between:1,5'],
			'period' => ['required', 'integer', 'between:1,6'],
			'title' => ['required', 'string', 'max:255'],
			'room' => ['nullable', 'string', 'max:255'],
		], [
			'title.required' => '授業名を入力してください',
            'day.required,integer,between' => '曜日は1〜5で入力してください',
			'period.required,integer,between' => '時限は1〜6で入力してください',
		]);
			$taken = TimetableEntry::where('day', $request->input('day'))
            ->where('period', $request->input('period'))
            ->exists();
            if ($taken) {
            return back()->withErrors([
            'period' => 'その曜日・時限にはすでに授業が登録されています',
            ])->withInput();
            }

		TimetableEntry::create($validated);

		return redirect('/entries');
	}


    public function edit($id)
    {
        $entry = TimetableEntry::findOrFail($id);

        return view('entries.edit', [
            'entry' => $entry,
        ]);
    }

    public function update(Request $request, $id)
    {
        $entry = TimetableEntry::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'room' => ['nullable', 'string', 'max:255'],
        ]);
		$entry->update($validated);
		return redirect('/entries');
		}

	
	public function destroy($id)
	{
		$entry = TimetableEntry::findOrFail($id);
		$entry->delete();
		return redirect('/entries');
		}


    }

	

