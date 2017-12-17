<?php

namespace App\Http\Controllers;

use App\Http\Responses\Api;
use App\Models\Tribe;
use App\Models\Tribesman;
use Illuminate\Http\Request;

class TribeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function name(Request $request)
    {
        $name = $request->get('name');

        if (!$name) {
            return (new Api([], Api::STATUS_ERROR, [['message' => 'Wrong request']]))->toResponse();
        }

        $tribe = Tribe::getOrCreateTribe($request);
        if (!$tribe) {
            return (new Api([], Api::STATUS_ERROR, [['message' => 'Tribe not found']]))->toResponse();
        }

        $tribe->name = $name;
        try {
            $tribe->save();
            $request->session()->put('tribe_id', $tribe->id);
        } catch (\Exception $e) {
            return (new Api([], Api::STATUS_ERROR, [['message' => 'Server Error']]))->toResponse();
        }

        // since we have a tribe now. We will create new people

        $tribesmenExport = Tribesman::initTribeMembers($tribe);

        return (new Api(['id' => $tribe->id, 'name' => $tribe->name, 'tribesmen' => $tribesmenExport]))
            ->toResponse();
    }


}
