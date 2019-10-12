<?php

function getTranslations() {

    $file = file_get_contents(__DIR__.'/translations.json');
    $translations = json_decode($file); 

    if (json_last_error() != JSON_ERROR_NONE) {
        throw new Error("Please check the syntax in i18n/translations.json");
    }

    $lang = (isset($_GET['lang']) && $_GET['lang']=="en") ? "en":"fr";
    if ($lang == "en"){
        return $translations->en;
    } else {
        return $translations->fr;
    }
    
}

?>

