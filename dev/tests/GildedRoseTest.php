<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @dataProvider itemProvider
     */
    public function test_item($nameItem, $sell_in, $quality, $exp_sell_in, $exp_quality): void
    {
        $items = [new Item($nameItem, $sell_in, $quality)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertSame($exp_sell_in, $items[0]->sell_in);
        $this->assertSame($exp_quality, $items[0]->quality);
    }

    public function itemProvider()
    {
        /**
         * @var array
         * [
         *     string $nameItem,
         *     integer $sell_in,
         *     integer $quality,
         *     integer $exp_sell_in,
         *     integer $exp_quality
         * ]
         */
        return [
            //normal class assertion data
            ['+5 Dexterity Vest', 10, 20, 9, 19],
            ['Elixir of the Mongoose', 5, 7, 4, 6],
            ['Elixir of the Horse Power', -1, 7, -2, 5],
            ['+7 Dexterity Vest', -1, 1, -2, 0],
            //brie class assertion data
            ['Aged Brie', 2, 0, 1, 1],
            ['Aged Brie', 0, 3, -1, 5],
            ['Aged Brie', 1, 49, 0, 50],
            //legendary class assertion data
            ['Sulfuras, Hand of Ragnaros', 0, 80, 0, 80],
            ['Sulfuras, Hand of Ragnaros', -1, 80, -1, 80],
            ['Sulfuras, Hand of Ragnaros', -1, 59, -1, 80],
            ['Sulfuras, Hand of Ragnaros', -1, 98, -1, 80],
            //backstage class assertion data
            ['Backstage passes to a TAFKAL80ETC concert', 15, 20, 14, 21],
            ['Backstage passes to a TAFKAL80ETC concert', 10, 49, 9, 50],
            ['Backstage passes to a TAFKAL80ETC concert', 5, 49, 4, 50],
            ['Backstage passes to a TAFKAL80ETC concert', 0, 49, -1, 0],
            //conjured class assertion data
            ['Conjured Mana Cake', 3, 6, 2, 4],
            ['Conjured Mana Cake', 0, 6, -1, 2],
            ['Conjured Mana Cake', -3, 3, -4, 0],
        ];
    }
}
