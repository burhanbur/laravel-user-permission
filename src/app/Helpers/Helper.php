<?php

if (!function_exists('bulan')) {
    function bulan($bulan){
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
            default:
                $bulan = Date('F');
                break;
        }
        
        return $bulan;
    }
}

if (!function_exists('tanggal')) {
    function tanggal($tanggal = null) {

        if ($tanggal) {            
            $a = explode('-',$tanggal);
            $tanggal = $a['2']." ".bulan($a['1'])." ".$a['0'];
        }

        return $tanggal;
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($ex, $url = null) {
        $response = [
            'success' => false,
            'message' => $ex->getMessage().' in file '.$ex->getFile().' at line '.$ex->getLine(),
            'url' => $url
        ];

        return $response;
    }
}

if (!function_exists('initResponse')) {
    function initResponse($url = null) {
        $response = [
            'success' => false,
            'message' => 'init',
            'data' => [],
            'url' => $url
        ];

        return $response;
    }
}