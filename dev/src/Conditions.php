<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 03.03.2022
 * Time: 11:32
 */
namespace GildedRose;

class Conditions
{
    public static $defaultClass = 'Normal';

    /**
     * @var array specialized[string $modificator => string $className, ...]
     *
     * Комменатрий соискателя: в случае роста кол-ва условий желательна переделка в класс каталог
     */
    private static $specialized = [
        'Aged Brie' => 'Brie',
        'Backstage passes' => 'Backstage',
        'Conjured' => 'Conjured',
        'Sulfuras' => 'Legendary',
    ];

    // @return array
    public function getConditionsKey()
    {
        return array_keys(self::$specialized);
    }

    public function getHandlerClass_Name($condition)
    {
        return self::$specialized[$condition];
    }
}