<?php
class ConvertToWareki {

   static function convertForSeirekiToWareki($year = null) {
        $year = intval($year);
        if ($year) {
            switch ($year) {
                case $year > 1988:
                    $yearNumber = $year - 1988;
                    $yearValue = "平成";
                    break;
                case $year > 1925:
                    $yearNumber = $year - 1925;
                    $yearValue = "昭和";
                    break;
                case $year > 1911:
                    $yearNumber = $year - 1911;
                    $yearValue = "大正";
                    break;
                case $year > 1867:
                    $yearNumber = $year - 1867;
                    $yearValue = "明治";
                    break;
                default:
                    $yearNumber = $year;
                    $yearValue = null;
                    break;
            }
            if ($yearNumber == 1) {
                $yearNumber = "元";
            }
            $returnValue = $yearValue . $yearNumber . "年";
            return $returnValue;
        }
    }
    
    public static function convertJpDate($input = 'today'){
        $date = strtotime($input);
        $year = self::convertForSeirekiToWareki(date('Y',$date));
        $month = date('m',$date);
        $day = date('d',$date);
        return $year.$month.'月'.$day.'日';
    }
    
    public static function convertJpDateDay($input = 'Y-m-d'){
        $string = self::convertJpDate($input);
        $days = array(
                '1' => '月',
                '2' => '火',
                '3' => '水',
                '4' => '木',
                '5' => '金',
                '6' => '土',
                '0' => '日',
            );
         return $string .' (' . $days[date('w',  strtotime($input))] .  ') ';
    }

}