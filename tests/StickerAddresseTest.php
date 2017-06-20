<?php


class StickerAddresseTest extends \PHPUnit\Framework\TestCase
{
    public function testCreate()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
        $this->assertInstanceOf(\Buuum\StickerAddresse::class, $stickerInfo);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Name
     */
    public function testIncorrectName()
    {
        $stickerInfo = new \Buuum\StickerAddresse('Nómbre', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ExtraName
     */
    public function testIncorrectExtraName()
    {
        $stickerInfo = new \Buuum\StickerAddresse('Nombre', 'óoo', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Addresse
     */
    public function testIncorrectAddress()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'dirección nª sender', '', 'Badalona', '08390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Email
     */
    public function testIncorrectEmail()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060','rwrwres');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage ExtraAddresse
     */
    public function testIncorrectExtraAddress()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direccin sender', 'ò´', 'Badalona', '08390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage City
     */
    public function testIncorrectCity()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direcci sender', '', 'Badalóna', '08390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage PostalCode
     */
    public function testIncorrectPostalCode()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direcci sender', '', 'Badalona', '390', '+34600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Phone
     */
    public function testIncorrectPhone()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE','', 'direcci sender','', 'Badalona', '08390', '600606060');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Lang
     */
    public function testIncorrectLang()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direcci sender', '', 'Badalona', '08390', '+34600606060', '', 'fff');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Country
     */
    public function testIncorrectCountry()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direcci sender', '', 'Badalona', '08390', '+34600606060', '', 'ES','sss');
    }

    public function testGetValue()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
        $this->assertEquals('NOMBRE', $stickerInfo->name());
        $this->assertEquals('direccion sender', $stickerInfo->addresse());
        $this->assertEquals('Badalona', $stickerInfo->city());
        $this->assertEquals('08390', $stickerInfo->postalCode());
        $this->assertEquals('+34600606060', $stickerInfo->phone());
        $this->assertEquals('ES', $stickerInfo->lang());
        $this->assertEquals('ES', $stickerInfo->country());
    }

    public function testEquals()
    {
        $stickerInfo = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
        $stickerInfo2 = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060');
        $stickerInfo3 = new \Buuum\StickerAddresse('NOMBRE', '', 'direccion sender', '', 'Badalona', '08390', '+34600606060', '','FR');

        $this->assertTrue($stickerInfo->equals($stickerInfo2));
        $this->assertFalse($stickerInfo->equals($stickerInfo3));
    }
}