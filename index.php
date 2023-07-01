<?php

$selectedLanguage = 'CSphinx';
$initFunction = [];
$initMacro = [];
$typesData = [];
$typesData['CSphinx'] = [
    'str' => 'dword',
    'int' => 'int',
    'clr' => 'dword',
    'lpx' => 'int',
    'gpx' => 'int',
    'any' => 'dword',
    'fnc' => 'dword'
];

$defineColorTable =
    ['IndianRed'=>0xCD5C5C,'LightCoral'=>0xF08080,'Salmon'=>0xFA8072,'DarkSalmon'=>0xE9967A,
        'Crimson'=>0xDC143C,'Red'=>0xFF0000,'FireBrick'=>0xB22222,'DarkRed'=>0x8B0000,'Pink'=>0xFFC0CB,
        'LightPink'=>0xFFB6C1,'HotPink'=>0xFF69B4,'DeepPink'=>0xFF1493,'MediumVioletRed'=>0xC71585,
        'PaleVioletRed'=>0xDB7093,'LightSalmon'=>0xFFA07A,'Coral'=>0xFF7F50,'Tomato'=>0xFF6347,'OrangeRed'=>0xFF4500,
        'DarkOrange'=>0xFF8C00,'Orange'=>0xFFA500,'Gold'=>0xFFD700,'Yellow'=>0xFFFF00,'LightYellow'=>0xFFFFE0,
        'LemonChiffon'=>0xFFFACD,'LightGoldenrodYellow'=>0xFAFAD2,'PapayaWhip'=>0xFFEFD5,'Moccasin'=>0xFFE4B5,
        'PeachPuff'=>0xFFDAB9,'PaleGoldenrod'=>0xEEE8AA,'Khaki'=>0xF0E68C,'DarkKhaki'=>0xBDB76B,'Lavender'=>0xE6E6FA,
        'Thistle'=>0xD8BFD8,'Plum'=>0xDDA0DD,'Violet'=>0xEE82EE,'Orchid'=>0xDA70D6,'Fuchsia'=>0xFF00FF,
        'Magenta'=>0xFF00FF,'MediumOrchid'=>0xBA55D3,'MediumPurple'=>0x9370DB,'RebeccaPurple'=>0x663399,
        'BlueViolet'=>0x8A2BE2,'DarkViolet'=>0x9400D3,'DarkOrchid'=>0x9932CC,'DarkMagenta'=>0x8B008B,'Purple'=>0x800080,
        'Indigo'=>0x4B0082,'SlateBlue'=>0x6A5ACD,'DarkSlateBlue'=>0x483D8B,
        'GreenYellow'=>0xADFF2F,'Chartreuse'=>0x7FFF00,'LawnGreen'=>0x7CFC00,'Lime'=>0x00FF00,'LimeGreen'=>0x32CD32,
        'PaleGreen'=>0x98FB98,'LightGreen'=>0x90EE90,'MediumSpringGreen'=>0x00FA9A,'SpringGreen'=>0x00FF7F,
        'MediumSeaGreen'=>0x3CB371,'SeaGreen'=>0x2E8B57,'ForestGreen'=>0x228B22,'Green'=>0x008000,'DarkGreen'=>0x006400,
        'YellowGreen'=>0x9ACD32,'OliveDrab'=>0x6B8E23,'Olive'=>0x808000,'DarkOliveGreen'=>0x556B2F,
        'MediumAquamarine'=>0x66CDAA,'DarkSeaGreen'=>0x8FBC8B,'LightSeaGreen'=>0x20B2AA,'DarkCyan'=>0x008B8B,
        'Teal'=>0x008080,'Aqua'=>0x00FFFF,'Cyan'=>0x00FFFF,'LightCyan'=>0xE0FFFF,'PaleTurquoise'=>0xAFEEEE,
        'Aquamarine'=>0x7FFFD4,'Turquoise'=>0x40E0D0,'MediumTurquoise'=>0x48D1CC,'DarkTurquoise'=>0x00CED1,
        'CadetBlue'=>0x5F9EA0,'SteelBlue'=>0x4682B4,'LightSteelBlue'=>0xB0C4DE,'PowderBlue'=>0xB0E0E6,
        'LightBlue'=>0xADD8E6,'SkyBlue'=>0x87CEEB,'LightSkyBlue'=>0x87CEFA,'DeepSkyBlue'=>0x00BFFF,'DodgerBlue'=>0x1E90FF,
        'CornflowerBlue'=>0x6495ED,'MediumSlateBlue'=>0x7B68EE,'RoyalBlue'=>0x4169E1,'Blue'=>0x0000FF,
        'MediumBlue'=>0x0000CD,'DarkBlue'=>0x00008B,'Navy'=>0x000080,'MidnightBlue'=>0x191970,'Cornsilk'=>0xFFF8DC,
        'BlanchedAlmond'=>0xFFEBCD,'Bisque'=>0xFFE4C4,'NavajoWhite'=>0xFFDEAD,'Wheat'=>0xF5DEB3,'BurlyWood'=>0xDEB887,
        'Tan'=>0xD2B48C,'RosyBrown'=>0xBC8F8F,'SandyBrown'=>0xF4A460,'Goldenrod'=>0xDAA520,'DarkGoldenrod'=>0xB8860B,
        'Peru'=>0xCD853F,'Chocolate'=>0xD2691E,'SaddleBrown'=>0x8B4513,'Sienna'=>0xA0522D,'Brown'=>0xA52A2A,
        'Maroon'=>0x800000,'White'=>0xFFFFFF,'Snow'=>0xFFFAFA,'HoneyDew'=>0xF0FFF0,'MintCream'=>0xF5FFFA,
        'Azure'=>0xF0FFFF,'AliceBlue'=>0xF0F8FF,'GhostWhite'=>0xF8F8FF,'WhiteSmoke'=>0xF5F5F5,'SeaShell'=>0xFFF5EE,
        'Beige'=>0xF5F5DC,'OldLace'=>0xFDF5E6,'FloralWhite'=>0xFFFAF0,'Ivory'=>0xFFFFF0,'AntiqueWhite'=>0xFAEBD7,
        'Linen'=>0xFAF0E6,'LavenderBlush'=>0xFFF0F5,'MistyRose'=>0xFFE4E1,'Gainsboro'=>0xDCDCDC,'LightGray'=>0xD3D3D3,
        'Silver'=>0xC0C0C0,'DarkGray'=>0xA9A9A9,'Gray'=>0x808080,'DimGray'=>0x696969,'LightSlateGray'=>0x778899,
        'SlateGray'=>0x708090,'DarkSlateGray'=>0x2F4F4F,'Black'=>0x000000];

foreach ($defineColorTable as $name=>$value) {
    $defineColorTable[strtoupper($name)] = $value;
}

$defineFunction = [];

function getName() {
    static $i = 0;
    return 'f'.($i++);
}

function gitListFile($src) {
    $html = file_get_contents($src);
    $files = [];
    if (preg_match_all('/<a class="js-navigation-open Link--primary".*?href="(.*?)".*>(.*?)<\/a>/ui', $html, $list)) {
        foreach($list[1] as $i => $file)
        {
            $key = trim($list[2][$i]);
            $files [$key]= file_get_contents(str_replace('/blob/','/',"https://raw.githubusercontent.com{$file}"));
        }
    }
    return $files;
}

function parseHTML($html)
{
    if (gettype($html)=='string')
    {
        $root = new DOMDocument('1.0', 'UTF-8');
        $root->validateOnParse = false;
        @$root->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
    } else $root = $html;
    $result = array();
    $result['tag'] = $root->nodeName;
    if ($root->nodeType == XML_TEXT_NODE
        || $root->nodeType == XML_COMMENT_NODE
        || $root->nodeType == XML_CDATA_SECTION_NODE) $result['value'] = $root->nodeValue;

    if ($root->hasAttributes()) {
        foreach ($root->attributes as $attr) {
            $result['attributes'][$attr->name] = $attr->value;
        }
    }
    if ($root->hasChildNodes()) {
        $children = $root->childNodes;
        if ($children->length > 0)
        {
            if ($children->item(0)->nodeType == XML_TEXT_NODE
                || $children->item(0)->nodeType == XML_CDATA_SECTION_NODE) {
                $child = $children->item(0);
                $result['value'] = $child->nodeValue;
            }
            $childs = [];
            foreach ($children as $child) {
                if($item = parseHTML($child)) $childs[] = $item;
            }
            if ($childs) $result['child'] = $childs;
        }
    }
    return $result;
}

$files = gitListFile('https://github.com/leotag-source/applications/tree/main/example');

if (!isset($files['core.html'])) {
    echo 'Нет core.html файла в папке!';
    die();
}

function loadStructure($name) {
    global $files;
    $list = [];
    $structure = parseHTML($files[$name]);
    foreach ($structure['child'] as $item)
    {
        if (isset($item['child'])) {
            foreach ($item['child'] as $item2)
            {
                $list[$item2['tag']] = $item2['child'];
            }
            return $list;
        }
    }
}

function makeFunction($name, $code, $attr, $innerhtml = ', evalChildren') {
    global $selectedLanguage, $initFunction, $typesData, $defineFunction;

    $attributes = [];

    foreach ($attr as $key => $value)
    {
        if (preg_match('/^([\w-]+):(\w+)$/ui', $key, $structureKey)) {
            $attributes []= [$structureKey[1], $structureKey[2], $value];
        }
    }

    $defineFunction[$name] = $attributes;

    $returntype = 'void';
    if (isset($attr['return']) && isset($typesData[$selectedLanguage][$attr['return']])) {
        $returntype = $typesData[$selectedLanguage][$attr['return']];
    }

    switch ($selectedLanguage) {
        case 'CSphinx':
            $codeAttribute = '';
            foreach ($attributes as $item)
            {
                $type = explode('-', $item[0]);
                $item[0] = $typesData['CSphinx'][$type[0]];
                $codeAttribute .= ", {$item[0]} {$item[1]}";
            }

            $initFunction []= ":{$returntype} api_{$name}(dword parentNode{$innerhtml}{$codeAttribute}) {";
            $initFunction []= $code;
            $initFunction []= '}';
            break;
        case 'JavaScript':
            $codeAttribute = '';
            foreach ($attributes as $item)
            {
                $codeAttribute .= ", {$item[1]}";
            }

            $initFunction []= "function api_{$name}(parentNode{$innerhtml}{$codeAttribute}) {";
            $initFunction []= $code;
            $initFunction []= '}';
            break;
    }
    return '';
}

function globalPixelConvert($data, $reverse = false) {
    $data = strtolower($data);
    if (preg_match('/^(\d+)px$/u', $data, $pixel)) {
        return $pixel[1];
    }
    if (preg_match('/^(\d+)vw$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        return "api_getscreenwidth()*{$pixel[1]}";
    }
    if (preg_match('/^(\d+)vh$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        return "api_getscreenheight()*{$pixel[1]}";
    }
    if (preg_match('/^(\d+)%$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        $functionScreen = 'api_getscreenwidth';
        if ($reverse) $functionScreen = 'api_getscreenheight';
        return "{$functionScreen}()*{$pixel[1]}";
    }

    return 0;
}

function localPixelConvert($data, $reverse = false) {
    $data = strtolower($data);
    if (preg_match('/^(\d+)px$/u', $data, $pixel)) {
        return $pixel[1];
    }
    if (preg_match('/^(\d+)vw$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        if (!$pixel[1]) return '0';
        return "getWindowWidth()*{$pixel[1]}";
    }
    if (preg_match('/^(\d+)vh$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        if (!$pixel[1]) return '0';
        return "getWindowHeight()*{$pixel[1]}";
    }
    if (preg_match('/^(\d+)%$/u', $data, $pixel)) {
        $pixel[1] = $pixel[1]/100;
        $functionScreen = 'getWindowWidth';
        if ($reverse) $functionScreen = 'getWindowHeight';
        return "{$functionScreen}()*{$pixel[1]}";
    }
    return 0;
}

function colorConvert($data) {
    global $defineColorTable;
    $data = strtoupper($data);
    if (preg_match('/^\s*#([0-9A-F][0-9A-F])([0-9A-F][0-9A-F])([0-9A-F][0-9A-F])\s*$/u', $data, $color)) {
        return "0x{$color[1]}{$color[2]}{$color[3]}";
    }
    if (preg_match('/^\s*#([0-9A-F])([0-9A-F])([0-9A-F])\s*$/u', $data, $color)) {
        return "0x{$color[1]}{$color[1]}{$color[2]}{$color[2]}{$color[3]}{$color[3]}";
    }
    if (isset($defineColorTable[$data])) {
        return $defineColorTable[$data];
    }
    return 0;
}

function fncConvert($code) {
    if (preg_match('/(\w+)/ui', $code, $match)) {
        $name = strtolower($match[1]);
        return "api_{$name}(0,0)";
    }
    return '';
}

function convertArguments($type, $value) {
    $value = preg_replace_callback('/@(\w+[\w\d_]+)/ui', function($match) {
        $name = strtolower($match[1]);
        return "{$name}(0,0)";
        //return "0";
    }, $value);
    $structType = explode('-', $type);
    $type = $structType[0];
    $rule = null;
    if (isset($structType[1])) {
        $rule = $structType[1];
    }
    if ($type == 'str') {
        return '"'.$value.'"';
    }
    if ($type == 'int') {
        return $value;
    }
    if ($type == 'clr') {
        return colorConvert($value);
    }
    if ($type == 'fnc') {
        return fncConvert($value);
    }
    if ($type == 'lpx') {
        return localPixelConvert($value, $rule == 'y');
    }
    if ($type == 'gpx') {
        return globalPixelConvert($value, $rule == 'y');
    }
    return null;
}

function toCode($structure) {
    global $selectedLanguage, $defineFunction, $initMacro;
    $code = [];
    foreach ($structure as $element)
    {
        if (isset($element['attributes'])) $attr = $element['attributes'];
        else $attr = [];

        $tagName = $element['tag'];

        switch ($tagName) {
            case 'script':
                if (isset($attr['name'])) $funcName = strtolower($attr['name']);
                else $funcName = '';

                if (!isset($attr['language'])) {
                    echo 'Аттрибут language не задан!';
                    die();
                }
                if ($attr['language'] == $selectedLanguage) {
                    if ($funcName) makeFunction($funcName, $element['value'], $attr);
                    else $code []= $element['value'];
                }

                break;
            case '#text':
                $value = trim($element['value']);
                if ($value) $code []= "setText(parentNode, \"{$value}\");";
                break;
            default:
                if (isset($element['attributes'])) $attr = $element['attributes'];
                else $attr = [];

                if (!isset($defineFunction[$tagName]) && !isset($initMacro[$tagName])) {
                    echo "Тэг {$tagName} не найден!";
                    die();
                }

                $fnc = 0;
                if (isset($element['child']) && $element['child']) {
                    $fnc = getName();
                    makeFunction($fnc, toCode($element['child']), [], '');
                    //$code []= toCode($element['child']);
                    $fnc = '#api_'.$fnc;
                }
                $structFunction = $defineFunction[$tagName];
                $args = [];
                $argsType = [];
                foreach ($structFunction as $item) {
                    $args[$item[1]] = convertArguments($item[0], $item[2]);
                    $argsType[$item[1]] = $item[0];
                }
                foreach ($attr as $name => $value) {
                    $args[$name] = convertArguments($argsType[$name], $value);
                }

                $args = implode(', ', $args);
                if ($args) $args = ', '.$args;

                $code []= "api_{$tagName}(parentNode, $fnc{$args});";
        }
    }
    return implode("\r\n",$code);
}

$structureCore = loadStructure('core.html');
$structureApps = loadStructure('simple.html');

$coreCode = toCode($structureCore['head']);
$coreApps = toCode($structureApps['body']);

$initFunction = implode("\n", $initFunction);

$coreCode = str_replace(['%%INIT%%', '%%CODE%%'], [$initFunction, $coreApps], $coreCode);

echo "<pre>{$coreCode}</pre>";

//$coreCode = "#startaddress 0x10000\n#code32 TRUE\n#jumptomain FALSE\n{$coreCode}";
$coreCode = str_replace("\n", "\r\n", $coreCode);
//$coreCode = iconv('UTF-8', 'CP1251', $coreCode);
file_put_contents('./applications.c', $coreCode);
