<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function create_select_list($data, $key, $label, $default_value=null)
{
    if (!is_array($data)) {
        return '<option value=""></option>';
    }
    $pulldown_list = '<option value=""></option>';
    foreach ($data as $value)
    {
        if($default_value ==  $value->$key)
            $selected = 'selected';
        else
            $selected = '';
        $pulldown_list .= '<option '.$selected.'  value="' . $value->$key . '">' . $value->$label . '</option>';
    }
    return $pulldown_list;
}