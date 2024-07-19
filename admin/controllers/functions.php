<?php
require_once "db.php";

function sanitize($form_input)
{
    global $link;
    $form_input = trim($form_input);
    $form_input = strip_tags($form_input, '<p><h1><h2><img><i><b><u>');
    $form_input = mysqli_real_escape_string($link, $form_input);

    return $form_input;

}

function check_duplicate($table_name, $field, $user_input)
{
    global $link;
    $sql = "SELECT * FROM $table_name WHERE $field = '$user_input'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
// function to check PIn
function check_pin($table_name, $field, $user_input)
{
    global $link;
    $sql = "SELECT * FROM $table_name WHERE $field = '$user_input'";
    $query = mysqli_query($link, $sql);

    if ($query) {
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }
}

function upload_image($image_array, &$error, $min_size=5)
{
    $img_size = $image_array['size'];
    $tmp_name = $image_array['tmp_name'];
    $img_name = $image_array['name'];
    $img_type = $image_array['type'];

    if ($img_size > 921600000) {
        $error[] = "Sorry, your image is too large";
        $err_flag = true;
    }
    if ($img_size < $min_size) {
        $error[] = "Resolution of image is too small.";
        $err_flag = true;
    }
    $safe_ext = array('jpeg', 'jpg', 'png');
    $img_ext2 = explode('/', $img_type);
    $img_ext3 = end($img_ext2);
    $img_ext = strtolower($img_ext3);
    if (!in_array($img_ext, $safe_ext)) {
        $error[] = "File type not allowed.";
        $err_flag = true;
    }

    $upload_dir = 'uploads/';
    $img_path = $upload_dir.'product'.time().mt_rand(10,99).'.'.$img_ext;

    if (!isset($err_flag)) {
        $send = move_uploaded_file($tmp_name, $img_path);
        if ($send) {
            return $img_path;
        } else {
            return $error;
        }
    }
}

function upload_cv($image_array, &$error, $min_size=5)
{
    $img_size = $image_array['size'];
    $tmp_name = $image_array['tmp_name'];
    $img_name = $image_array['name'];
    $img_type = $image_array['type'];

    if ($img_size > 921600) {
        $error[] = "Sorry, your image is too large";
        $err_flag = true;
    }
    if ($img_size < $min_size) {
        $error[] = "Resolution of image is too small.";
        $err_flag = true;
    }
    $safe_ext = array('pdf', 'epub');
    $img_ext2 = explode('/', $img_type);
    $img_ext3 = end($img_ext2);
    $img_ext = strtolower($img_ext3);
    if (!in_array($img_ext, $safe_ext)) {
        $error[] = "File type not allowed.";
        $err_flag = true;
    }

    $upload_dir = 'resources/';
    $img_path = $upload_dir.'res'.time().mt_rand(10,99).'.'.$img_ext;

    if (!isset($err_flag)) {
        $send = move_uploaded_file($tmp_name, $img_path);
        if ($send) {
            return $img_path;
        } else {
            return $error;
        }
    }
}

function select_frm_table($table)
{
    global $link;
    $sql = "SELECT * FROM $table";
    $query = mysqli_query($link, $sql);
    if ($query) {
        return $query;
    }
}

function upload_doc($image_array, &$error, $min_size=0)
{
    $img_size = $image_array['size'];
    $tmp_name = $image_array['tmp_name'];
    $img_name = $image_array['name'];
    $img_type = $image_array['type'];

    if ($img_size > 1024000000) {
        $error[] = "Sorry, your Document is too large";
        $err_flag = true;
    }
    if ($img_size < $min_size) {
        $error[] = "Resolution of Document is too small.";
        $err_flag = true;
    }
    $safe_ext = array('pdf', 'jpeg', 'png');
    $img_ext2 = explode('/', $img_type);
    $img_ext3 = end($img_ext2);
    $img_ext = strtolower($img_ext3);
    if (!in_array($img_ext, $safe_ext)) {
        $error[] = "File type not allowed.";
        $err_flag = true;
    }

    $upload_dir = 'files/';
    $img_path = $upload_dir.'files'.time().mt_rand(10,99).'.'.$img_ext;

    if (!isset($err_flag)) {
        $send = move_uploaded_file($tmp_name, $img_path);
        if ($send) {
            return $img_path;
        } else {
            return $error;
        }
    }
}
