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
        $conditions = new Conditions();
        $classItem = $conditions::$defaultClass;
        foreach ($this->items as $key => $item) {
            foreach ($conditions->getConditionsKey() as $special) {
                if (str_contains($item->name, $special)) {
                    $classItem = $conditions->getHandlerClass_Name($special);
                }
            }
            $instance = new $classItem();
            $this->items[$key] = $instance->modifier_quality($item);
        }
    }
}
