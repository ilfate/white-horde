<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 17.12.17
 * Time: 14:02
 */

namespace App\Game;


use App\Models\Tribesman;

class Attack extends Deck
{

    const TYPE_ATTACK = 'attack';
    const TYPE_DEFENCE = 'defence';

    /**
     * @var Tribesman
     */
    protected $tribesman;

    protected $type;

    protected function setup()
    {

    }
}