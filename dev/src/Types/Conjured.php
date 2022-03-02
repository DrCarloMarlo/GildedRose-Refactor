<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 02.03.2022
 * Time: 22:25
 */

class Conjured extends Types
{
    protected function valid_quality($quality)
    {
        return parent::valid_quality($quality);
    }

    public function modifier_quality($item)
    {
        $item->quality = $this->valid_quality($item->quality);

        $item->sell_in--;

        $item->quality = $item->quality - 2;

        if ($item->sell_in <= 0) {
            $item->quality = $item->quality - 2;
        }

        if ($item->quality <= self::$min_quality) {
            $item->quality = self::$min_quality;
            return $item;
        }

        return $item;
    }
}
