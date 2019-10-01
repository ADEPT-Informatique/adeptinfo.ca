<?php
/**
 * URLUtilities.php
 * Created by Olivier Brassard on 10-08-18.
 * Copyright © 2018 Olivier Brassard. All rights reserved.
 */

function url_for($script_path) {
    $script_path = str_replace('\\','/',$script_path);
    $root = str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']);
    $base_url = "//".$_SERVER["SERVER_NAME"].':';
    return $base_url . $_SERVER['SERVER_PORT'].str_replace($root,"",$script_path);
}

?>