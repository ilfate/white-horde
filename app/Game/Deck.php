<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 17.12.17
 * Time: 14:02
 */

namespace App\Game;


use App\Models\Tribesman;

abstract class Deck
{

    const TYPE_ATTACK = 'attack';
    const TYPE_DEFENCE = 'defence';

    /**
     * @var Tribesman
     */
    protected $tribesman;

    public function __construct(Tribesman $tribesman)
    {
        $this->tribesman = $tribesman;
    }

    /**
     * @param Tribesman $tribesman
     */
    public static function init(Tribesman $tribesman)
    {
        $attackDeck = new Attack($tribesman);

//        $defenceDeck = new self(self::TYPE_DEFENCE, $tribesman);
    }

    abstract protected function setup();
}