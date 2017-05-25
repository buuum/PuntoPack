Simple php api class with TIPSA
================================

[![Packagist](https://img.shields.io/packagist/v/buuum/puntopack.svg)](https://packagist.org/packages/buuum/puntopack)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?maxAge=2592000)](#license)

## Install

### System Requirements

You need PHP >= 7.0.0 to use Buuum\PuntoPack but the latest stable version of PHP is recommended.

### Composer

Buuum\PuntoPack is available on Packagist and can be installed using Composer:

```
composer require buuum/puntopack
```

### Manually

You may use your own autoloader as long as it follows PSR-0 or PSR-4 standards. Just put src directory contents in your vendor directory.


### Documentation

[WebServices PDF](webservice-20121105-en-v4.pdf)

### Constructor
```php
$puntopack = new PuntoPack($engine, $key);
```
### Methods

#### getTracking
```php
$tracking = $puntopack->getTracking('31187802');
```
$tracking output
```php
object(stdClass)#284 (2) {
  ["code"]=>
  string(2) "24"
  ["response"]=>
  object(stdClass)#285 (5) {
    ["STAT"]=>
    string(2) "24"
    ["Libelle01"]=>
    string(0) ""
    ["Relais_Libelle"]=>
    string(0) ""
    ["Relais_Num"]=>
    string(0) ""
    ["Libelle02"]=>
    string(0) ""
  }
}
```

#### createSticker
```php
$info = new StickerInfo('CCC', 'LCC', 1000, 1, 0);
$addresse = new StickerAddresse('Nombre', 'direccion sender', 'City1', '08390', '+34600606060');
$addresse2 = new StickerAddresse('Nombre 2', 'direccion 2 ', 'City2', '08920', '+34600606064');

$sticky = $puntopack->createSticker($info, $addresse, $addresse2);
```
$sticky output
```php
object(stdClass)#253 (2) {
  ["code"]=>
  string(1) "0"
  ["response"]=>
  object(stdClass)#254 (3) {
    ["STAT"]=>
    string(1) "0"
    ["ExpeditionNum"]=>
    string(8) "31432234"
    ["URL_Etiquette"]=>
    string(115) "/ww2/PDF/StickerMaker2.aspx?ens=ST1471&expedition=3044&lg=ES&format=A4&crc=FE5859A"
  }
}

```

#### getStickers
```php
$stickers = $this->puntopack->getStickers([31187798, 31187800, 31187801]);
```

$stickers output

```php
object(stdClass)#257 (2) {
  ["code"]=>
  string(1) "0"
  ["response"]=>
  object(stdClass)#283 (3) {
    ["STAT"]=>
    string(1) "0"
    ["URL_PDF_A4"]=>
    string(133) "/ww2/PDF/StickerMaker2.aspx?ens=TDESDD1421&expedition=31187798;31187800;31187801&lg=ES&format=A4&crc=53EE42FFC459ABDE2778"
    ["URL_PDF_A5"]=>
    string(133) "/ww2/PDF/StickerMaker2.aspx?ens=TDESDD1421&expedition=31187798;31187800;31187801&lg=ES&format=A5&crc=53EE42FFC459ABDE2778"
  }
}

```

## LICENSE

The MIT License (MIT)

Copyright (c) 2017

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.