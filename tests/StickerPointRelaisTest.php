<?php


class StickerPointRelaisTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $stickerInfo = new \Buuum\StickerPointRelais('043432');
        $this->assertInstanceOf(\Buuum\StickerPointRelais::class, $stickerInfo);
    }

    public function testGetValue()
    {
        $stickerInfo = new \Buuum\StickerPointRelais('043432');
        $this->assertEquals('043432', $stickerInfo->id());
        $this->assertEquals('ES', $stickerInfo->city());
    }

    public function testEquals()
    {
        $stickerInfo = new \Buuum\StickerPointRelais('043432');
        $stickerInfo2 = new \Buuum\StickerPointRelais('043432');
        $stickerInfo3 = new \Buuum\StickerPointRelais('043432', 'FR');

        $this->assertTrue($stickerInfo->equals($stickerInfo2));
        $this->assertFalse($stickerInfo->equals($stickerInfo3));
    }
}