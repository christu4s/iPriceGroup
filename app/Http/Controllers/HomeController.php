<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller 
{
    public function stringToUpberCaseHub ($data) {
        return strtoupper($data);
    }

    public function stringAlternateUperCase ($data) {
        $alternateUpperString = '';
        for ($i = 0; $i < strlen($data); $i++) {
            if($i % 2 == 0)
            $alternateUpperString.= $data[$i];
            else 
            $alternateUpperString.= strtoupper($data[$i]);
        }
        return $alternateUpperString;
    }

    public function updateStringToCsvFile($data) {
        $stringSplitToArray = str_split($data, 1);
        $stringSeperatedByComma = implode(',', $stringSplitToArray);
        $fileProcess = fopen('exportString.csv', 'w');
        fputcsv($fileProcess, compact('stringSeperatedByComma'));
        fclose($fileProcess);
        return 'CSV Created';
    }
 
    public function index()
    {

        $defaultString = 'hello world';
        $stringToUppercase = $this->stringToUpberCaseHub($defaultString);
        $stringToAlternateUperCase = $this->stringAlternateUperCase($defaultString);
        $stringToCsv = $this->updateStringToCsvFile($defaultString);
        return view('welcome', compact('stringToUppercase', 'stringToAlternateUperCase' , 'stringToCsv'));
    }
}
