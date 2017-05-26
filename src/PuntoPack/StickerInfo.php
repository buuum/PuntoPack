<?php

namespace Buuum;

final class StickerInfo
{
    private $collection_mode;
    private $delivery_mode;
    private $weight;
    private $mumber_of_packages;

    public function __construct($collection_mode, $delivery_mode, $weight, $number_of_packages, $value = 0)
    {
        $this->setCollectionMode($collection_mode);
        $this->setDeliveryMode($delivery_mode);
        $this->setWeight($weight);
        $this->setnumberPackages($number_of_packages);
        $this->setValue($value);
    }

    protected function setCollectionMode($collection_mode)
    {
        if(!preg_match('@^(CCC|CDR|CDS|REL)$@', $collection_mode)){
            throw new \InvalidArgumentException('CollectionMode');
        }
        $this->collection_mode = $collection_mode;
    }

    protected function setDeliveryMode($delivery_mode)
    {
        if(!preg_match('@^(LCC|LD1|LDS|24R|24L|24X|ESP|DRI)$@', $delivery_mode)){
            throw new \InvalidArgumentException('DeliveryMode');
        }
        $this->delivery_mode = $delivery_mode;
    }

    protected function setWeight($weight)
    {
        if(!preg_match('@^[0-9]{3,7}$@', $weight)){
            throw new \InvalidArgumentException('Weight');
        }
        $this->weight = $weight;
    }

    protected function setnumberPackages($mumber_of_packages)
    {
        if(!preg_match('@^[0-9]{1,2}$@', $mumber_of_packages)){
            throw new \InvalidArgumentException('NumberPackages');
        }
        $this->mumber_of_packages = $mumber_of_packages;
    }

    protected function setValue($value)
    {
        if(!preg_match('@^[0-9]{1,7}$@', $value)){
            throw new \InvalidArgumentException('Value');
        }
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