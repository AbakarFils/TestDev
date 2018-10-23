<?php


    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }



    // dd/mm/yyyy ==> yyyy-mm-dd
    function date_parse_fr2en($date, $sep='/')
    {
        if($date == null || $date == '')
            return NULL;
        else
        {
            $dateConvert = $date == '' ? NULL : date('Y-m-d', strtotime(str_replace($sep, '-', $date)));
            return $dateConvert;
        }
    }

    function date_heure_parse_fr2en($date, $sep='/')
    {
        if($date == null || $date == '')
            return NULL;
        else
        {
            $dateConvert = $date == '' ? NULL : date('Y-m-d H:i:s', strtotime(str_replace($sep, '-', $date)));
            return $dateConvert;
        }
    }

    // yyyy-mm-dd ==>  dd/mm/yyyy
    function date_parse_en2fr($date)
    {
        if($date == null || $date == '')
            return '';
        else
        {
            $new_date = date('d/m/Y',strtotime($date));
            return $new_date;
        }
    }

    function date_heure_parse_en2fr($date)
    {
        if($date == null || $date == '')
            return '';
        else
        {
            $new_date = date('d/m/Y H:i:s',strtotime($date));
            return $new_date;
        }
    }
