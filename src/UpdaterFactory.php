<?php

namespace App;

class UpdaterFactory
{
    public static function create(ItemAdapter $itemAdapter): UpdateableItem
    {
        return match ($itemAdapter->getName()) {
            'Aged Brie' => new AgedBrieUpdater($itemAdapter),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassesUpdater($itemAdapter),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdater($itemAdapter),
            default => new DefaultUpdater($itemAdapter),
        };
    }
}

