<?php

namespace App\Exports;

use App\Http\Resources\CheckinCollection;
use App\Models\Checkin;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class CheckinExport implements FromCollection
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Support\Collection
     */
    public function collection()
    {
        $checkins = Checkin::with('types')->where('user_id', Auth::user()->getAuthIdentifier())->orderByDesc('date')->orderByDesc('time')->orderByDesc('type_id')->get();
        return CheckinCollection::collection($checkins);
    }
}
