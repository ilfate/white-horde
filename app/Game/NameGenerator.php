<?php
/**
 * Created by PhpStorm.
 * User: ilya
 * Date: 17.12.17
 * Time: 13:35
 */

namespace App\Game;


use App\ChanceHelper;

class NameGenerator
{
    const MALE = 'male';
    const FEMALE = 'female';

    public static function generate($gender, $notInList = [])
    {
        $names = config('names.names.' . $gender);
        $name = ChanceHelper::oneFromArray($names);
        if ($notInList && in_array($name, $notInList)) {
            $i = 0;
            while (in_array($name, $notInList)) {
                $name = ChanceHelper::oneFromArray($names);
                $i ++;
                if ($i > 50) {
                    return $name;
                }
            }
        }
        return $name;
    }
}