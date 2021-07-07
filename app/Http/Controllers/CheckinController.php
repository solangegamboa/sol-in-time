<?php

namespace App\Http\Controllers;

use App\Exports\CheckinExport;
use App\Models\Checkin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $checkins = Checkin::with('types')->where('user_id', Auth::user()->id)->orderByDesc('date')->orderByDesc('time')->orderByDesc('type_id')->get();
        return view('checkin.index', compact('checkins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $dateTime = ['date' => date('Y-m-d'), 'time' => date('H:i')];
        return view('checkin.create', $dateTime);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'type_id' => 'required',
        ]);

        Checkin::create([
            'date' => $request->date,
            'time' => $request->time,
            'obs' => $request->obs,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id
        ]);
        return back()->with('success', 'Clock in registred');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Checkin $checkin
     * @return \Illuminate\Http\Response
     */
    public function show(Checkin $checkin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Checkin $checkin
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkin $checkin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Checkin $checkin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkin $checkin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Checkin $checkin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Checkin $checkin)
    {
        $checkin->delete();
        return back()->with('success', 'Clock in deleted');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        return Excel::download(new CheckinExport, 'checkin.xlsx');
    }
}
