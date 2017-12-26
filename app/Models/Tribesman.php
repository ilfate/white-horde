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
 *
 * @property mixed id
 * @property mixed age
 * @property mixed name
 * @property mixed gender
 * @property mixed traits
 * @property mixed items
 * @property mixed decks
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

    protected $traitsArray = [];
    protected $itemsArray = [];
    protected $decksArray = [];

    /**
     * @param Tribe $tribe
     * @return array
     */
    public static function initTribeMembers(Tribe $tribe)
    {
        $numberToCreate = 1;
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
            $tribeMembers[] = $tribesman->exportAsArray();
        }
        return $tribeMembers;
    }

    public function exportAsArray()
    {
        return [
            'id' => $this->id,
            'age' => $this->age,
            'name' => $this->name,
            'gender' => $this->gender,
            'traits' => $this->getTraits(),
            'items' => $this->getItems(),
            'decks' => $this->getDecks(),

        ];
    }

    /**
     * @return array|mixed
     */
    public function getTraits()
    {
        if ($this->traitsArray) return $this->traitsArray;
        if ($this->traits) {
            $this->traitsArray = \json_decode($this->traits, true);
        }
        return $this->traitsArray;
    }

    /**
     * @return array|mixed
     */
    public function getItems()
    {
        if ($this->itemsArray) return $this->itemsArray;
        if ($this->items) {
            $this->itemsArray = \json_decode($this->items, true);
        }
        return $this->itemsArray;
    }

    /**
     * @return array|mixed
     */
    public function getDecks()
    {
        if ($this->decksArray) return $this->decksArray;
        if ($this->decks) {
            $this->decksArray = \json_decode($this->decks, true);
        }
        return $this->decksArray;
    }

    /**
     * 0 - female
     * 1 - male
     * @return bool
     */
    public static function getRandomGender()
    {
        return !!mt_rand(0, 1);
    }
}
