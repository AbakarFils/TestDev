<?php

    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }


    function btn_add_action()
    {
        echo '<div class="row">
                <div class="col-sm-12" style="margin-bottom: 30px">
                    <button type="button" id="btn_add" class="btn btn-primary">Ajouter <span lass="m-l-5"><i
                                class="fa fa-plus-square"></i></span></button>
                </div>
            </div>';
    }


    function btn_edit_action($id)
    {

            echo '<a href="#" class="on-default btn_edit"
                   id="'.$id.'"><i class="fa fa-pencil"></i></a>&nbsp;';
    }



    function btn_delete_action($id)
    {
            echo '<a href="#" class="on-default btn_delete"
                    id="'.$id.'"><i class="fa fa-trash-o" style="color:red"></i></a>&nbsp;';
    }


    function btn_show_action($id)
    {
            echo '<a href="#" class="on-default btn_show"
                    id="'.$id.'"><i class="fa fa-eye" style="color:#CCCCCC"></i></a>';
    }


    function empty2null($value)
    {
        if (trim($value) == '')
            return null;
        else
            return $value;
    }

    function site()
    {
        //http://www.consulatchadakar.net/testDev/
        return 'http://localhost/testDev/';
    }

    function Debug($var)
    {
        echo ("<pre>");
        var_dump($var);
        die();
    }