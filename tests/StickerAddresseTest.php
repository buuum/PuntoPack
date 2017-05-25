<?php


class StickerAddresseTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $stickerInfo = new \Buuum\StickerAddresse('Nombre', 'direccion sender', 'Badalona', '08390', '+34600606060');
        $this->assertInstanceOf(\Buuum\StickerAddresse::class, $stickerInfo);
    }

    public function testGetValue()
    {
        $stickerInfo = new \Buuum\StickerAddresse('Nombre', 'direccion sender', 'Badalona', '08390', '+34600606060');
        $this->assertEquals('Nombre', $stickerInfo->name());
        $this->assertEquals('direccion sender', $stickerInfo->addresse());
        $this->assertEquals('Badalona', $stickerInfo->city());
        $this->assertEquals('08390', $stickerInfo->postalCode());
        $this->assertEquals('+34600606060', $stickerInfo->phone());
        $this->assertEquals('ES', $stickerInfo->lang());
        $this->assertEquals('ES', $stickerInfo->country());
    }

    public function testEquals()
    {
        $stickerInfo = new \Buuum\StickerAddresse('Nombre', 'direccion sender', 'Badalona', '08390', '+34600606060');
        $stickerInfo2 = new \Buuum\StickerAddresse('Nombre', 'direccion sender', 'Badalona', '08390', '+34600606060');
        $stickerInfo3 = new \Buuum\StickerAddresse('Nombre', 'direccion sender', 'Badalona', '08390', '+34600606060', 'FR');

        $this->assertTrue($stickerInfo->equals($stickerInfo2));
        $this->assertFalse($stickerInfo->equals($stickerInfo3));
    }
}