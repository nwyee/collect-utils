<?php

class arrayCollection{

	public static function convert_multi_array($arr) {
        $glue = "\n";
        foreach($arr as $key => $each) {
            if (@is_array($each)){
                $arr[$key] = $key . " : " . self::convert_multi_array($each);
            }else{
                $arr[$key] = $key . " : " .$each;
            }
        }
        return implode($glue, $arr);
    }
    
    public static function checkEmptyArray($data){
        $data_string = implode('',$data);
        return $data_string == '' ? true: false;
    }
}