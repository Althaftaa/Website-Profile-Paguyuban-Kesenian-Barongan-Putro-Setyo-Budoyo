<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::latest()->paginate(10);

        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'location' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        Schedule::create($validated);

        return redirect()
            ->route('schedule.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable',
            'location' => 'required|max:255',
            'description' => 'nullable',
            'status' => 'required',
        ]);

        $schedule->update($validated);

        return redirect()
            ->route('schedule.index')
            ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('schedule.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }
}
