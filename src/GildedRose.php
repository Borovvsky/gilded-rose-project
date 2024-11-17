<?php

namespace App;

final class GildedRose
{
    public function updateQuality(Item $item)
    {
        $itemAdapter = new ItemAdapter($item);
        $itemAdapter->updateQuality();
    }
}