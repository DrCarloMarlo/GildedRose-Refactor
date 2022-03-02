<?php

declare(strict_types=1);

namespace GildedRose;

require_once __DIR__ . '/autoload.php';

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

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

    public function __construct(array $items)
    {
        $this->items = $items;
    }


    /*
     * Комменатрий соискателя: для реализации метода использован подход "табличного метода Макконнела"
     * так как подобный метод более лаконичен и прозрачен в обслуживании, расширении входных условий, чем бесконечные
     *  вложения if...else или switch ... case
    */
    public function updateQuality(): void
    {
        $classItem = 'Normal';
        foreach ($this->items as $key => $item) {
            //$classItem = 'Normal';
            foreach (self::$specialized as $special => $class) {
                if (str_contains($item->name, $special)) {
                    $classItem = $class;
                }
            }
            $instance = new $classItem();
            $this->items[$key] = $instance->modifier_quality($item);
        }
    }
}
