<?php

namespace App;

class SulfurasUpdater implements UpdateableItem
{
    public function __construct(private ItemAdapter $item) {}

    public function updateQuality(): void
    {}
}