<?php

namespace Buuum;

final class StickerInfo
{
    private $collection_mode;
    private $delivery_mode;
    private $weight;
    private $mumber_of_packages;

    public function __construct($collection_mode, $delivery_mode, $weight, $mumber_of_packages, $value = 0)
    {
        $this->collection_mode = $collection_mode;
        $this->delivery_mode = $delivery_mode;
        $this->weight = $weight;
        $this->mumber_of_packages = $mumber_of_packages;
        $this->value = $value;
    }

    public function collectionMode()
    {
        return $this->collection_mode;
    }

    public function deliveryMode()
    {
        return $this->delivery_mode;
    }

    public function weight()
    {
        return $this->weight;
    }

    public function numberPackages()
    {
        return $this->mumber_of_packages;
    }

    public function value()
    {
        return $this->value;
    }

    public function equals(StickerInfo $stickerInfo)
    {
        return $this->weight() === $stickerInfo->weight()
            && $this->value() === $stickerInfo->value()
            && $this->numberPackages() === $stickerInfo->numberPackages()
            && $this->collectionMode() === $stickerInfo->collectionMode()
            && $this->deliveryMode() === $stickerInfo->deliveryMode();
    }

}