<?php

namespace App\Http\Controllers;

use App\Models\Tribe;
use Illuminate\Http\Request;

class GameController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tribe = $this->getOrCreateTribe($request);
//        return view('game')->with(['tribe' => 'awd']);
        return view('game')->with(['tribe' => $tribe->export()]);
    }

    /**
     * @param Request $request
     * @return Tribe
     */
    protected function getOrCreateTribe(Request $request)
    {
        if ($user = $request->user()) {
            $tribe = Tribe::getUserTribe($user);
        } else {
            $sessionId = $request->session()->getId();
            $tribeId = $request->session()->get('tribe_id');
            $tribe = Tribe::getSessionTribe($tribeId, $sessionId);
        }
        if (!$tribe) {
            // tribe is missing.
            // user needs to create a tribe
            $sessionId = $request->session()->getId();
            $tribe = new Tribe();
            $tribe->session_key = $sessionId;
            return $tribe;
            // ok user is logged
        }
        return $tribe;
    }
}
