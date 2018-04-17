<?php
/**
 * requestsHandlers.php
 * Created by Olivier Brassard on 17-04-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

function validatePost($field){
    if (isset($_POST[$field]) and $_POST[$field] != ""){
        $data = $_POST[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    else {
        return false;
    }
}
function validateGet($field)
{
    if (isset($_GET[$field]) and $_GET[$field] != "") {
        $data = $_GET[$field];
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } else {
        return false;
    }
}