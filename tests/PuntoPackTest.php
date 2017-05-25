<?php

class PuntoPackTest extends \PHPUnit\Framework\TestCase
{

    private $engine;
    private $key;

    /**
     * @var \Buuum\PuntoPack
     */
    private $puntopack;

    /**
     * @before
     */
    public function setupSomeFixtures()
    {
        $this->getCredentials();
        $this->puntopack = new \Buuum\PuntoPack($this->engine, $this->key);
    }

    private function getCredentials()
    {
        $this->engine = '';
        $this->key = '';
    }

    public function testCreate()
    {
        $puntopack = new \Buuum\PuntoPack('', '');
        $response = $puntopack->getTracking('id');

        $this->assertTrue(in_array($response->code, [1, 2, 3, 5, 8]));
    }

    public function testgetTrackingException()
    {
        $tracking = $this->puntopack->getTracking('31187802');
        $this->assertTrue($tracking->code != 0);
    }

    public function testgetTracking()
    {
        $tracking = $this->puntopack->getTracking('123456');
        $this->assertEquals(24, $tracking->code);
    }

    /**
     * @expectedException TypeError
     */
    public function testNotCreatedStickyByValues()
    {
        $sticky = $this->puntopack->createSticker(null, null, null);
    }

    public function testCreateOkSticky()
    {
        $info = new \Buuum\StickerInfo('CCC', 'LCC', 1000, 1, 0);
        $addresse = new \Buuum\StickerAddresse('NOMBRE', 'direccion sender', 'Badalona', '08390', '+34600606060');
        $addresse2 = new \Buuum\StickerAddresse('NOMBRE', 'direccion 2 ', 'Montgat', '08390', '+34600606064');

        $sticky = $this->puntopack->createSticker($info, $addresse, $addresse2);

        $this->assertEquals(0, $sticky->code);
        $this->assertTrue(is_string($sticky->response->ExpeditionNum));
        $this->assertTrue(is_string($sticky->response->URL_Etiquette));
        $this->assertNotEmpty($sticky->response->ExpeditionNum);
        $this->assertNotEmpty($sticky->response->URL_Etiquette);
    }

    public function testGetStickersKo()
    {
        $stickers = $this->puntopack->getStickers([]);

        $this->assertEquals($stickers->code, 24);

        $stickers = $this->puntopack->getStickers([31187798, 31187800, 31187801, 3]);
        $this->assertEquals($stickers->code, 24);
    }

    public function testGetStickersOk()
    {
        $stickers = $this->puntopack->getStickers([31187798, 31187800, 31187801]);
        $this->assertEquals($stickers->code, 0);

        $this->assertTrue(is_string($stickers->response->URL_PDF_A4));
        $this->assertTrue(is_string($stickers->response->URL_PDF_A5));
        $this->assertNotEmpty($stickers->response->URL_PDF_A4);
        $this->assertNotEmpty($stickers->response->URL_PDF_A5);
    }

}