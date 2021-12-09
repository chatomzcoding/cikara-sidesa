<?php

if (! function_exists('viewLogAktif')) {
    function viewLogAktif()
    {
        $view = "<section>
                    <small class='badge badge-light'>Log Aktif <i class='fas fa-check text-success'></i></small>
                </section>    
                ";
        return $view;
    }
}
if (! function_exists('button_logall')) {
    function button_logall($log,$posisi='float-right')
    {
        $view = NULL;
        if (count($log) > 0) {
            $view = " <a href='#' data-toggle='modal' data-target='#log' class='btn btn-outline-info btn-flat btn-sm ".$posisi."' ><i class='far fa-file'></i> LOG</a> 
                    ";
        }
        return $view;
    }
}