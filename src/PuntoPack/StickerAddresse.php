<?php

namespace Buuum;

final class StickerAddresse
{
    private $name;
    private $extraname;
    private $addresse;
    private $extraaddresse;
    private $city;
    private $postal_code;
    private $phone;
    private $email;
    private $lang;
    private $country;

    public function __construct(
        $name,
        $extraname,
        $addresse,
        $extraaddresse,
        $city,
        $postal_code,
        $phone,
        $email = '',
        $lang = 'ES',
        $country = 'ES'
    ) {
        $this->setName($name);
        $this->setExtraName($extraname);
        $this->setAddresse($addresse);
        $this->setExtraAddresse($extraaddresse);
        $this->setCity($city);
        $this->setPostalCode($postal_code);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setLang($lang);
        $this->setCountry($country);
    }

    protected function setName($name)
    {
        if (!preg_match('@^[0-9a-zA-Z_\-\'., /]{2,32}$@', $name)) {
            throw new \InvalidArgumentException('Name');
        }
        $this->name = $name;
    }

    protected function setExtraName($name)
    {
        if (!preg_match('@^[0-9a-zA-Z_\-\'., /]{0,32}$@', $name)) {
            throw new \InvalidArgumentException('ExtraName');
        }
        $this->extraname = $name;
    }

    protected function setAddresse($addresse)
    {
        if (!preg_match('@^[0-9a-zA-Z_\-\'., /]{2,32}$@', $addresse)) {
            throw new \InvalidArgumentException('Addresse');
        }
        $this->addresse = $addresse;
    }

    protected function setExtraAddresse($addresse)
    {
        if (!preg_match('@^[0-9a-zA-Z_\-\'., /]{0,32}$@', $addresse)) {
            throw new \InvalidArgumentException('ExtraAddresse');
        }
        $this->extraaddresse = $addresse;
    }

    protected function setCity($city)
    {
        if (!preg_match('@^[a-zA-Z_\-\' ]{2,26}$@', $city)) {
            throw new \InvalidArgumentException('City');
        }
        $this->city = $city;
    }

    protected function setPostalCode($postal_code)
    {
        if (!preg_match('@^[0-9]{5}$@', $postal_code)) {
            throw new \InvalidArgumentException('PostalCode');
        }
        $this->postal_code = $postal_code;
    }

    protected function setPhone($phone)
    {
        if (!preg_match('@^\+[0-9]{9,13}$@', $phone)) {
            throw new \InvalidArgumentException('Phone');
        }
        $this->phone = $phone;
    }

    protected function setEmail($email)
    {
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Email');
        }
        $this->email = $email;
    }

    protected function setLang($lang)
    {
        if (!preg_match('@^[A-Z]{2}$@', $lang)) {
            throw new \InvalidArgumentException('Lang');
        }
        $this->lang = $lang;
    }

    protected function setCountry($country)
    {
        if (!preg_match('@^[A-Z]{2}$@', $country)) {
            throw new \InvalidArgumentException('Country');
        }
        $this->country = $country;
    }

    public function name()
    {
        return $this->name;
    }

    public function addresse()
    {
        return $this->addresse;
    }

    public function extraname()
    {
        return $this->extraname;
    }

    public function extraaddresse()
    {
        return $this->extraaddresse;
    }

    public function city()
    {
        return $this->city;
    }

    public function postalCode()
    {
        return $this->postal_code;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function phone()
    {
        return $this->phone;
    }

    public function email()
    {
        return $this->email;
    }

    public function country()
    {
        return $this->country;
    }

    public function equals(StickerAddresse $stickerInfo)
    {
        return $this->city() === $stickerInfo->city()
            && $this->lang() === $stickerInfo->lang()
            && $this->country() === $stickerInfo->country()
            && $this->postalCode() === $stickerInfo->postalCode()
            && $this->name() === $stickerInfo->name()
            && $this->addresse() === $stickerInfo->addresse()
            && $this->extraname() === $stickerInfo->extraname()
            && $this->extraaddresse() === $stickerInfo->extraaddresse()
            && $this->phone() === $stickerInfo->phone()
            && $this->email() === $stickerInfo->email();
    }

}