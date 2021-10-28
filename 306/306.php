<?php
require('ValidationException.php');
require('RequiredValidationException.php');
require('TooLongValidationException.php');
require('InvalidPhoneValidationException.php');
require('InvalidEmailValidationException.php');
require('InvalidKeyValidationException.php');
require('FileUploadException.php');
require('NoUploadedFileException.php');
require('TooBigFileException.php');
require('InvalidTypeFileException.php');

$firstname = $lastname = $phone = $email = $file = "";

$firstnameVoid = $lastnameVoid = $phoneVoid = $emailVoid = $fileVoid= true;
$firstnameInvalid = $lastnameInvalid = $phoneInvalid = $emailInvalid = true;

$errors = [];
$post = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $post = true;
    require __DIR__ . '/helpers.php';

    //NOMBRE
    try{
        if(checkIfVoid($_POST["firstname"])){
            throw new RequiredValidationException("nombre");
        }
        $long = 25;
        if(checkLongInvalid($_POST["firstname"],$long)){
            throw new TooLongValidationException("nombre", $long);
        }
            $firstname = $_POST["firstname"];
    }catch (Exception $e){
        array_push($errors, $e->getMessage());
    }

    //APELLIDO
    try{
        if(checkIfVoid($_POST["lastname"])){
            throw new RequiredValidationException("apellido");
        }
        $long = 50;
        if(checkLongInvalid($_POST["lastname"], $long)){
            throw new TooLongValidationException("apellido", $long);
        }
            $lastname = $_POST["lastname"];
    }catch (Exception $e){
        array_push($errors, $e->getMessage());
    }

    //TElÉFONO
    try{
        if(checkIfVoid($_POST["phone"])){
            throw new RequiredValidationException("teléfono");
        }
        if(checkPhoneInvalid($_POST["phone"])){
            throw new InvalidPhoneValidationException();
        }
        $phone = $_POST["phone"];
    }catch (Exception $e){
        array_push($errors, $e->getMessage());
    }

    //EMAIL
    try{
        if(checkIfVoid($_POST["email"])){
            throw new RequiredValidationException("email");
        }
        if(checkEmailInvalid($_POST["email"])){
            throw new InvalidEmailValidationException();
        }
        $email = $_POST["email"];
    } catch (Exception $e){
        array_push($errors, $e->getMessage());
    }

    //FILE
    try{
        if(!checkIfFileOk($_FILES["fileUpload"])){
            throw new NoUploadedFileException();
        }

        if($_FILES["fileUpload"]['size'] > 1048576){
            throw new TooBigFileException();
        }

        if($_FILES["fileUpload"]['type'] != 'image/jpeg'){
            throw new InvalidTypeFileException();
        }
        $randomName = date("Y-m-d:h:m:s", microtime(true));
        $randomName = $randomName.".jpeg";

        $_FILES["fileUpload"]['name'] = $randomName;
        $url = "./uploads/".$_FILES["fileUpload"]['name'];
        move_uploaded_file($_FILES["fileUpload"]['tmp_name'], $url);

    }catch (Exception $e){
        array_push($errors, $e->getMessage());
    }
}
require __DIR__ . '/306.view.php';
?>
