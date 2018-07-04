<?php

class Helpers
{
    function menuAktif($act =array())
    {
        $action = !empty($_GET['act']) ? $_GET['act'] : 'dashboard';
        $str = '';
        if (!empty($act)) {
            if (in_array($action, $act)) {
                $str .= 'class ="active"';
            }
        }
        return $str;
    }

    function dateIndo(&$date){
        if(preg_match('/^(\d{4})-(\d{1,2})-(\d{1,2})$/', $date, $mtc)){
            $bln = array(
                '',
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            );
            $mtc[2] = $bln[intval($mtc[2])];

            $date = intval($mtc[3]) . " {$mtc[2]} {$mtc[1]}";
            return $date;
        }
    }

}