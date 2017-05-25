<?php


class StickerInfoTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $this->assertInstanceOf(\Buuum\StickerInfo::class, $stickerInfo);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIncorrectCollectionMode()
    {
        $stickerInfo = new \Buuum\StickerInfo('C3CC', 'LCC', 1000, 1, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIncorrectDeliveryMode()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'L3CC', 1000, 1, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIncorrectWeight()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', null, 1, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIncorrectNumberPackages()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000,  null, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIncorrectValue()
    {
        $stickerInfo = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, null);
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