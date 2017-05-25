<?php


class StickerInfoTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $this->assertInstanceOf(\Buuum\StickerInfo::class, $stickerInfo);
    }

    public function testGetValue()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $this->assertEquals('CCC', $stickerInfo->collectionMode());
        $this->assertEquals('LCC', $stickerInfo->deliveryMode());
        $this->assertEquals(1000, $stickerInfo->weight());
        $this->assertEquals(1, $stickerInfo->numberPackages());
        $this->assertEquals(0, $stickerInfo->value());

    }

    public function testEquals()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $stickerInfo2 = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $stickerInfo3 = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 2, 0);

        $this->assertTrue($stickerInfo->equals($stickerInfo2));
        $this->assertFalse($stickerInfo->equals($stickerInfo3));
    }
}