<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use TCG\Voyager\Facades\Voyager;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('browse', app(Activity::class));
        $usesSoftDeletes = true;
        $isServerSide = false;

        $view = "voyager::activities.browse";
        return Voyager::view(
            $view,
            compact(
                'isServerSide',
                'usesSoftDeletes'
            )
        );
    }

    public function getDatatable(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        try {
            $activities = Activity::select(
                [
                    'id',
                    'description',
                ]
            );

            return DataTables::eloquent($activities)
                ->toJson();
        } catch (\Exception $ex) {
            return response()->json([], 404);
        }
    }
}

