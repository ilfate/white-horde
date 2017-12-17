<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Tribe
 *
 * int    id
 * int    user_id
 * string session_key
 * string name
 * int    year
 * text   data
 * bool   is_active
 *
 * @package App\Models
 */
class Tribe extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'white_tribes';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

    protected $appends = array();

    protected $guarded = array();

    /**
     * @param Request $request
     * @return Tribe
     */
    public static function getOrCreateTribe(Request $request)
    {
        if ($user = $request->user()) {
            $tribe = Tribe::getUserTribe($user);
        } else {
            $sessionId = $request->session()->getId();
            $tribeId = $request->session()->get('tribe_id');
            //dd([$tribeId, $sessionId]);
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

    public static function getUserTribe(User $user)
    {
        return self::where('user_id', '=', $user->id)
            ->where('is_active', '=', true)
            ->get()
            ->first();
    }

    public static function getSessionTribe($tribeId, $sessionId)
    {
        return self::where('id', '=', $tribeId)
            ->where('session_key', '=', $sessionId)
            ->where('is_active', '=', true)
            ->get()
            ->first();
    }

    public function export()
    {
        return json_encode([
            'id'   => $this->id,
            'year' => $this->year,
            'name' => $this->name,
            'data' => $this->data,
        ]);
    }

}
