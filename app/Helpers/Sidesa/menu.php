<?php

if (! function_exists('kodemenu')) {
    function kodemenu($sesi,$menu)
    {
        switch ($sesi) {
            case 'surat':
                $list   = [
                    'suratkeluar',
                    'suratlayananmandiri',
                    'suratlayananlangsung',
                    'formatsurat',
                    'datasyaratsurat'
                ];
                break;
            
            default:
                # code...
                break;
        }
        $result = '';
        // aktif jika menu ada yang sama
        if (in_array($menu,$list)) {
            $result = 'menu-is-opening menu-open';
        }
        return $result;;
    }
}