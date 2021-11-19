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
// menu highlight
if (! function_exists('menuaktif')) {
    function menuaktif($menu,$sesi)
    {
        $result = NULL;
        if ($menu == $sesi) {
            $result = 'bg-info';
        }

        return $result;
    }
}

// get nama lengkap
if (! function_exists('notifjson')) {
    function notifjson($data)
    {
        if ($data) {
            $result["success"] = "1";
            $result["message"] = "success";
        } else {
            $result["success"] = "0";
            $result["message"] = "error";
        }

        return $result;
    }
}
if (! function_exists('cektoken')) {
    function cektoken($token)
    {
        if (isset($token) AND $token == '$2y$10$kIAxk2KCirEdUXMv8iuX6OkLHP6ha.XIbSkIrN1HcLga9zEi4/sLa') {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
if (! function_exists('uploadgambar')) {
    function uploadgambar($request,$folder)
    {
         $decode     = base64_decode($request->image);
        file_put_contents('public/img/bulan.png', $decode);
        // open the output file for writing
        $output_file    = 'public/img/bulan.png';
        $namafile       = time().'-'.tgl_sekarang().'.png';
        $filebaru = 'public/img/'.$folder.'/'.$namafile;
        copy($output_file,$filebaru);
        $ifp = fopen( $filebaru, 'wb' ); 

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $request->image );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 1 ] ) );

        // clean up the file resource
        fclose( $ifp ); 

        return $namafile; 
    }
}

// IP
// Mendapatkan IP pengunjung menggunakan getenv()
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edg'))
        $browser = 'Microsoft Edge';
    else
        $browser = 'Other';
    return $browser;
}

function kompres($file,$temp,$ukuran=600)
    {
        $name       = time().'_'.$file->getClientOriginalName();
        $ext        = $file->getClientOriginalExtension();
        
        $tmp_name   = $file->getRealPath();
        $path = $temp .'/'. $name;
        
        list($width, $height) = getimagesize($tmp_name);
      
        if($ext == 'png'){
            $new_image = imagecreatefrompng($tmp_name);
        }
        
        if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG')  {  
            $new_image = imagecreatefromjpeg($tmp_name);  
        }
        
        $new_width=$ukuran;
        $new_height = ($height/$width)*$ukuran;
        $tmp_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($tmp_image, $new_image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagejpeg($tmp_image, $path, 100);
        imagedestroy($new_image);
        imagedestroy($tmp_image);
        return $name;
    }