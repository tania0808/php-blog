<?php
function show($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function generateRandomString($length = 20) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

function get_date($date){
    return date('jS M, Y', strtotime($date));
}