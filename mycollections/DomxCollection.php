<?php

class DomxCollection {
	
    public static function getTableSrc($content) {
        $doc = new \DOMDocument();
        $doc->loadHTML($content);
        $xpath = new \DOMXPath($doc);
        $patientList = array();
        //retreive only id with "searce_result_tbl"
        $table =$xpath->query("//*[@id='search_result_tbl']")->item(0);
        $rows = $table->getElementsByTagName('tr');
        foreach($rows as $key => $row) {
            if($key == 0) continue;
            $cells = $row->getElementsByTagName('td');
            $patient = [
                "orca_id" => $cells[2]->textContent,
                "patient_id" => self::getPatientIdFromSrc($cells[1])
            ];
            $patientList[] = $patient;
        }
        return $patientList;
    }

    private static function getPatientIdFromSrc($cell) {
        foreach($cell->childNodes as $node){
            $src = $node->getAttribute("href");
            //get only query data for patient_id
            preg_match('/&patient_id=(.*?)&/', $src, $match);
            return $match[1];
        }
        return "";
    }

    public function testSrc() {
        $file = "Home medical care electronic chart.html";
        $content = file_get_contents($file);
        $patientList = $this->getTableSrc($content);
        dump($patientList);
    }
}