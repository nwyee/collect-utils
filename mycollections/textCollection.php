<?php

class textCollection {

	//for japanese character
	public static function matchText($needles, $haystack,$ignore_space = true, $option = "KVa") {
        //Convert han-kaku katakana to zenkaku katakana (K)
        //convert zenkaku alpha-numeric to hankaku.
        $haystack = mb_convert_kana($haystack, $option);
        //remove white space
        if($ignore_space){
            $haystack = preg_replace('/\s+/', '', $haystack);
        }
        foreach($needles as $needle){
            if($ignore_space){
                $needle = preg_replace('/\s+/', '', $needle);
            }
            $haystack = strtoupper($haystack);
            $needle = strtoupper($needle);
            if (strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
}