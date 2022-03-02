<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 02.03.2022
 * Time: 22:25
 */

class Legendary extends Types
{
    protected static $max_quality = 80;

    protected function valid_quality($quality)
    {
        return self::$max_quality;
    }

    public function modifier_quality($item)
    {
        $item->quality = $this->valid_quality($item->quality);
        return $item;
    }
}
