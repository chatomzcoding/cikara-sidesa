<?php

if (! function_exists('list_statusrekam')) {
    function list_statusrekam()
    {
        $list = [
            'belum wajib',
            'belum rekam',
            'sudah rekam',
            'card printed',
            'print ready record',
            'card shipped',
            'sent for card printing',
            'card issued'
        ];
        return $list;
    }
}