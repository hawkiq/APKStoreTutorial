<?php


function clean($text){
    global $connect;
    $text = strip_tags($text);
    $text = str_ireplace("'","",$text);
    $text = str_ireplace(";","",$text);
    $text = str_ireplace("#","",$text);
    $text = str_ireplace("%","",$text);
    $text = str_ireplace(">","",$text);
    $text = str_ireplace("<","",$text);
    $text = str_ireplace("script","",$text);
    $text = str_ireplace("meta","",$text);
    $text = mysqli_real_escape_string($connect,$text);
    return $text;
}

function checkUser($username){
    global $connect;
    $sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
    mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        return true;
    }
return false;
}

function checkEmail($email){
    global $connect;
    $sql = "SELECT * FROM `users` WHERE `user_mail` = '$email'";
    mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        return true;
    }
    return false;
}

function create_thumb($img_name,$newname,$type,$width,$height){
    if(!strcmp("image/jpg",$type) || !strcmp("image/jpeg",$type) || !strcmp("image/pjpeg",$type))
        $src_img=imagecreatefromjpeg($img_name);

    if(!strcmp("image/png",$type))
        $src_img=imagecreatefrompng($img_name);

    if(!strcmp("image/gif",$type))
        $src_img=imagecreatefromgif($img_name);

    $old_x=imageSX($src_img);
    $old_y=imageSY($src_img);

    if ($old_x > $width ){
        $new_x = $width;
    }else{
        $new_x = $width;
    }
    if ($old_y > $height ){
        $new_y = $height;
    }else{
        $new_y = $height;
    }

    $dst_img=ImageCreateTrueColor($new_x,$new_y);
    imagesavealpha($dst_img, true);
    $color = imagecolorallocatealpha($dst_img, 0, 0, 0, 127);
    imagefill($dst_img, 0, 0, $color);
    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_x,$new_y,$old_x,$old_y);

    $watermark_file='images/watermark.gif';

    $transparency = 20;

    $wext=getFileExtension($watermark_file);


    if(!strcmp("jpg",$wext) || !strcmp("jpeg",$wext)) $watermark=imagecreatefromjpeg($watermark_file);

    if(!strcmp("png",$wext)) $watermark=imagecreatefrompng($watermark_file);

    if(!strcmp("gif",$wext)) $watermark=imagecreatefromgif($watermark_file);

    $watermark_width = imagesx($watermark);
    $watermark_height = imagesy($watermark);

    // place watermark image on the right left of the main image
    //$dest_x = $old_x - $watermark_width - 5;
    //$dest_y = $old_y - $watermark_height - 5;

    $dest_x = (($new_x - $watermark_width)/2);
    $dest_y = (($new_y - $watermark_height)/2);

    imagecopymerge($dst_img, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, $transparency);

    if(!strcmp("image/png",$type))  imagepng($dst_img,$newname);
    else if(!strcmp("image/gif",$type))  imagegif($dst_img,$newname);
    else imagejpeg($dst_img,$newname);

    imagedestroy($dst_img);
    imagedestroy($src_img);
}
function getFileExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function check($title,$version){
    global $connect;
    $sql = "SELECT * FROM `files` WHERE `file_title` = '$title' AND `file_version` = '$version'";
    mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        return true;
    }
    return false;
}
function get_uploader($id){
    global $connect;
    $sql = "SELECT * FROM `users` WHERE `user_id` = $id";
    $q = mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        $data = mysqli_fetch_assoc($q);
        return $data['user_name'];
    }
    return "No User";
}
function get_cat($id){
    global $connect;
    $sql = "SELECT * FROM `category` WHERE `cat_id` = $id";
    $q = mysqli_query($connect,$sql);
    if (mysqli_affected_rows($connect) > 0){
        $data = mysqli_fetch_assoc($q);
        return $data['cat_name'];
    }
    return "No Cat";
}























