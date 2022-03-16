<?php

namespace Fallenangelbg\QuickShortURL;

class shortUrl
{
    /**
     * You can define any kind of letters here, corresponding to a digit
     * @var array[]
     */
    public static $decodeArray = array(
      1 => "f",
      2 => "K",
      3 => "j",
      4 => "m",
      5 => "Q",
      6 => "v",
      7 => "Z",
      8 => "p",
      9 => "w",
      0 => "D",
    );

    /**
     * Convert the DB unique ID to a string
     * @param int $uniqueId
     *
     * @return string
     */
    function buildShortLink(int $uniqueId = 0): string
    {
        $shortUrl = '';
        if (!empty($uniqueId)) {
            $separateNumber = str_split($uniqueId);
            foreach ($separateNumber as $singleDigit) {
                $shortUrl .= self::$decodeArray[$singleDigit];
            }

        }

        return $shortUrl;
    }

    /**
     * Convert a string to its corresponding numerical ID
     * @param string $string
     *
     * @return string
     */
    function buildNormalLink(string $string = ''): string
    {
        if (empty($string)) {
            return '';
        }
        $separateString = str_split($string);
        $inverseDecode = array_flip(self::$decodeArray);

        $uniqueId = '';
        foreach ($separateString as $singleLetter) {
            $uniqueId .= $inverseDecode[$singleLetter];
        }

        return intval($uniqueId);
    }

}