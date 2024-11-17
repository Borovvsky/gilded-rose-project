<?php

namespace App;

class ItemAdapter implements UpdateableItem
{
    public function __construct(private Item $item) {}

    public function updateQuality(): void
    {
        $updater = $this->getUpdater();
        $updater->updateQuality();
    }

    public function getName(): string { return $this->item->name; }
    public function getSellIn(): int { return $this->item->sell_in; }
    public function getQuality(): int { return $this->item->quality; }

    public function setSellIn(int $sellIn): void { $this->item->sell_in = $sellIn; }
    public function setQuality(int $quality): void { $this->item->quality = $quality; }

    private function getUpdater(): UpdateableItem
    {
        return match ($this->item->name) {
            'Aged Brie' => new AgedBrieUpdater($this),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassesUpdater($this),
            'Sulfuras, Hand of Ragnaros' => new SulfurasUpdater($this),
            default => new DefaultUpdater($this),
        };
    }
}