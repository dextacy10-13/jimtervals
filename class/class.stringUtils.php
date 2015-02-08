<?php
class StringUtils{

    /*
        * @name - sortByWordLength
        * @param - array - pass an array of words, values and will sort by str length
    */
    static function sortByWordLength($aWords){
        usort($aWords, function($a, $b) {
            return strlen($b) - strlen($a);
        });
        return $aWords;
    }
    /*
        * @name - sortByWordLength
        * @param - string - string - pass an sting of words you wish to split up
        * @param - aRemoveChars - array - pass an array of characters you wish to strip
    */
    static function stringToWords($string, $delim = ' ' ,$aRemoveChars = null ){        
        return ( explode($delim, str_replace($aRemoveChars, '', strip_tags( strtolower($string) ) ) ) );    
    }
    /*
        * @name - removeWords
        * @param - array - pass an array of words
        * @param - array - pass an array of words you wish to remove from the first array
    */
    static function removeWords($aWords, $aRemove){
        return array_diff( array_unique($aWords), $aRemove);
    }
}