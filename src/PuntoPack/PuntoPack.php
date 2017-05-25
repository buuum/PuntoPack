<?php

namespace Buuum;

use Buuum\Exceptions\InvalidEngineOrKeyException;
use Buuum\Exceptions\InvalidValuesException;

class PuntoPack
{

    const INVALIDMERCHANT = [1, 2, 3, 5, 8];

    /**
     * @var string
     */
    private $url = "http://api.mondialrelay.com/Web_Services.asmx?WSDL";

    /**
     * @var string
     */
    private $engine;

    /**
     * @var string
     */
    private $key;

    /**
     * @var \SoapClient
     */
    private $client;


    public function __construct($engine, $key)
    {
        $this->engine = $engine;
        $this->key = $key;
    }


    public function getTracking($expeditionId, $lang = 'ES')
    {
        $params = [
            'Expedition' => $expeditionId,
            'Langue'     => $lang
        ];
        $params = $this->securizedParams($params);

        return $this->getResponse('WSI2_TracingColisDetaille', $params);
    }

    private function getResponse($function, $params)
    {
        $response = $this->getClient()->$function($params);
        if (in_array($response->{$function . 'Result'}->STAT, self::INVALIDMERCHANT)) {
            throw new InvalidEngineOrKeyException();
        }

        if ($response->{$function . 'Result'}->STAT > 96) {
            throw new InvalidValuesException();
        }

        $output = new \stdClass();
        $output->code = $response->{$function . 'Result'}->STAT;
        $output->response = $response->{$function . 'Result'};

        return $output;


    }

    public function createSticker(
        StickerInfo $stickerInfo,
        StickerAddresse $sender,
        StickerAddresse $addressee,
        $text = null,
        StickerPointRelais $stickerPointRelais = null
    ) {

        $params = [
            'ModeCol' => $stickerInfo->collectionMode(),
            'ModeLiv' => $stickerInfo->deliveryMode(),

            'Expe_Langage' => $sender->lang(),
            'Expe_Ad1'     => $sender->name(),
            'Expe_Ad3'     => $sender->addresse(),
            'Expe_Ville'   => $sender->city(),
            'Expe_CP'      => $sender->postalCode(),
            'Expe_Pays'    => $sender->country(),
            'Expe_Tel1'    => $sender->phone(),

            'Dest_Langage' => $addressee->lang(),
            'Dest_Ad1'     => $addressee->name(),
            'Dest_Ad3'     => $addressee->addresse(),
            'Dest_Ville'   => $addressee->city(),
            'Dest_CP'      => $addressee->postalCode(),
            'Dest_Pays'    => $addressee->country(),
            'Dest_Tel1'    => $addressee->phone(),

            'Poids'      => $stickerInfo->weight(),
            'NbColis'    => $stickerInfo->numberPackages(),
            'CRT_Valeur' => $stickerInfo->value(),
        ];

        if ($stickerPointRelais) {
            $params['LIV_Rel_Pays'] = $stickerPointRelais->city();
            $params['LIV_Rel'] = $stickerPointRelais->id();
        }

        $params = $this->securizedParams($params);

        if ($text) {
            $params['Texte'] = $text;
        }

        return $this->getResponse('WSI2_CreationEtiquette', $params);
    }

    public function getStickers(array $ids, $lang = 'ES')
    {
        $params = [
            'Expeditions' => implode(';', $ids),
            'Langue'      => $lang
        ];

        $params = $this->securizedParams($params);

        return $this->getResponse('WSI2_GetEtiquettes', $params);
    }

    private function getClient()
    {
        if (!$this->client) {
            $this->client = new \SoapClient($this->url);
        }
        return $this->client;
    }

    private function securizedParams($params)
    {
        $params = ['Enseigne' => $this->engine] + $params;
        $params["Security"] = strtoupper(md5(implode("", $params) . $this->key));

        return $params;
    }
}
