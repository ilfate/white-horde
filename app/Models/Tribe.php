<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class Tribe
 *
 * int    id
 * int    user_id
 * string session_key
 * string name
 * string state
 * int    year
 * text   data
 * bool   is_active
 *
 * @property mixed id
 * @property mixed year
 * @property mixed name
 * @property mixed data
 * @property mixed state
 *
 * @package App\Models
 */
class Tribe extends Model
{
    const STATE_CREATION        = 'creation';
    const STATE_CREATION_BATTLE = 'battle_c';
    const STATE_BATTLE          = 'battle';
    const STATE_SETTLE          = 'settle';
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
     * @var Collection
     */
    protected $tribeMembers;

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

    public function withTribeMembers()
    {
        $this->tribeMembers = Tribesman::where('tribe_id', '=', $this->id)
            ->where('is_alive', '=', true)->get();
    }

    public function export()
    {
        $data = [
            'id'   => $this->id,
            'year' => $this->year,
            'name' => $this->name,
            'data' => $this->data,
        ];
        if ($this->tribeMembers) {
            $data['tribesmen'] = [];
            foreach ($this->tribeMembers as $tribeMember) {
                $data['tribesmen'][] = $tribeMember->exportAsArray();
            }

        }
        return json_encode($data);
    }

}
