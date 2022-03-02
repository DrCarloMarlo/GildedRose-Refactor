<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 02.03.2022
 * Time: 22:23
 */

abstract class Types
{
    protected static $max_quality = 50;
    protected static $min_quality = 0;

    protected function valid_quality($quality) {
        if ($quality > self::$max_quality) return self::$max_quality;
        return $quality;
    }

    public function modifier_quality($item) {}
}
