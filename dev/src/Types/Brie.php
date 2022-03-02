<?php
/**
 * Created by PhpStorm.
 * User: carly
 * Date: 02.03.2022
 * Time: 22:25
 */

class Brie extends Types
{
    protected function valid_quality($quality)
    {
        return parent::valid_quality($quality);
    }

    public function modifier_quality($item)
    {
        $item->quality = $this->valid_quality($item->quality);

        $item->sell_in--;

        $item->quality++;

        if ($item->sell_in <= 0) {
            $item->quality++;
        }

        if ($item->quality >= self::$max_quality) {
            $item->quality = self::$max_quality;
            return $item;
        }

        return $item;
    }
}
