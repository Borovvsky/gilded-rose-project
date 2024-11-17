<?php

namespace App;

class DefaultUpdater implements UpdateableItem
{
    public function __construct(private ItemAdapter $item) {}

    public function updateQuality(): void
    {
        if ($this->item->getQuality() > 0) {
            $this->item->setQuality($this->item->getQuality() - 1);
        }

        $this->item->setSellIn($this->item->getSellIn() - 1);

        if ($this->item->getSellIn() < 0 && $this->item->getQuality() > 0) {
            $this->item->setQuality($this->item->getQuality() - 1);
        }
    }
}