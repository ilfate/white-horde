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
        $tribe = Tribe::getOrCreateTribe($request);
//        return view('game')->with(['tribe' => 'awd']);
        $tribe->withTribeMembers();
        return view('game')->with(['tribe' => $tribe->export()]);
    }

    public function test()
    {
        $text = '';

        $generator = \Nubs\RandomNameGenerator\All::create();

        echo $generator->getName();

        return $text;
    }


}
