<?php
function clean(string $value): string {
    $value = trim($value);
    return htmlspecialchars($value);
}

function isPost(): bool {
    return $_SERVER["REQUEST_METHOD"]==="POST";
}

function validate_string(string $string, int $minLength = 1, int $maxLength = 50000): bool
{
    if (strlen($string) < $minLength || strlen($string)>$maxLength)
        return false;

    return true;
}

function validate_date(string $date): bool {
    //option 3: simpler option
    if (DateTime::createFromFormat("Y-m-d", $date)===false)
        return false;

    return true;
}

function is_empty($value):bool {
    return empty($value);
}

// compare if the current value in the selected array
function is_selected(string $value, array $array): bool {
    if (in_array($value, $array))
        return true;
    return false;
}

function show_post() {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}

function checkIfFileOk($file){
    if(!empty($file) && $file['error'] ==  UPLOAD_ERR_OK){
        return true;
    }else{
        return false;
    }
}

?>