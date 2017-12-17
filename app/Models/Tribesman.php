<?php

namespace App\Models;

use App\Game\NameGenerator;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tribesman
 *
 * int    id
 * int    tribe_id
 * ing    age
 * string name
 * text   data
 * text   traits
 * text   items
 * text   decks
 * bool   is_alive
 * bool   gender
 *
 * @package App\Models
 */
class Tribesman extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'white_tribesman';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array();

    protected $appends = array();

    protected $guarded = array();

    public static function initTribeMembers(Tribe $tribe)
    {
        $numberToCreate = 6;
        $tribeMembers = [];
        $names = [];
        for ($i = 0; $i < $numberToCreate; $i ++) {
            $tribesman = new self();
            $tribesman->gender = self::getRandomGender();
            $tribesman->tribe_id = $tribe->id;
            $tribesman->age = mt_rand(20, 60);
            $tribesman->name = NameGenerator::generate(
                $tribesman->gender ? NameGenerator::MALE : NameGenerator::FEMALE,
                $names
            );
            $tribesman->save();
            $names[] = $tribesman->name;
            $tribeMembers[] = $tribesman;
        }
    }

    public static function getRandomGender()
    {
        return !!mt_rand(0, 1);
    }
}
