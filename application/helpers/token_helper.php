<?php

/* Created by John Enrick Pleños */
function generateToken($userID){
    $tokenContent = array(
        "ip_address" => $_SERVER['REMOTE_ADDR'],
        "date_created" => time(),
        "max_life" => 60*60*4, //4 hours life
        "user_id"
    );
}
