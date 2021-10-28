<?php

function checkIfVoid($ch_var){
    if (empty($ch_var)) {
        return true;
    }else{
        return false;
    }
}

function checkLongInvalid($ch_var, $long){
    if(strlen($ch_var) > $long){
        return true;
    }else{
        return false;
    }
}

function checkPhoneInvalid($ch_phoneInvalid){
    if(!preg_match("/^\d{9}$/", $ch_phoneInvalid)){
        return true;
    }else{
        return false;
    }
}

function checkEmailInvalid($ch_phoneInvalid){
    if (!filter_var($ch_phoneInvalid, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}

function checkIfFileOk($file){
    if(!empty($file) && $file['error'] ==  UPLOAD_ERR_OK){
        return true;
    }else{
        return false;
    }
}
?>