<?php

// get nama lengkap
if (! function_exists('deletefile')) {
    function deletefile($lokasi)
    {
        if (!is_dir($lokasi)) {
            if (file_exists($lokasi)) {
                unlink($lokasi);
            }
        }
    }
}