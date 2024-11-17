<?php

namespace App;

class BackstagePassesUpdater implements UpdateableItem
{
    private const FIRST_QUALITY_THRESHOLD = 11;
    private const SECOND_QUALITY_THRESHOLD = 6;

    public function __construct(private ItemAdapter $item) {}

    public function updateQuality(): void
    {
        if ($this->item->getQuality() < 50) {
            $this->item->setQuality($this->item->getQuality() + 1);

            if ($this->item->getSellIn() < self::FIRST_QUALITY_THRESHOLD && $this->item->getQuality() < 50) {
                $this->item->setQuality($this->item->getQuality() + 1);
            }

            if ($this->item->getSellIn() < self::SECOND_QUALITY_THRESHOLD && $this->item->getQuality() < 50) {
                $this->item->setQuality($this->item->getQuality() + 1);
            }
        }

        $this->item->setSellIn($this->item->getSellIn() - 1);

        if ($this->item->getSellIn() < 0) {
            $this->item->setQuality(0);
        }
    }
}