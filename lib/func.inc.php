<?php

$errors = [];



function validateName($name)
{
    global $errors;

    if (strlen($name) == 0 || !isset($name)) {
        $errors['name'] = "Name darf nicht leer sein";
        return false;
    } else if (strlen($name) > 20) {
        $errors['name'] = "Name zu lang";
        return false;
    } else {
        return true;
    }
}

function validateGender($gender)
{

}

function validateWeight($weight)
{
    global $errors;

    if ($weight < 0) {
        $errors['weight'] = "Gewicht darf nicht negativ sein";
        return false;
    } else {
        return true;
    }
}

function validateHeight($height)
{
    global $errors;

    if ($height < 0) {
        $errors['height'] = "Größe ungültig";
        return false;
    } else {
        return true;
    }
}

function validate($name, $weight, $height)
{
    return validateName($name) & validateWeight($weight) & validateHeight($height);
}

function calculate($weight, $height){
    $bmi = 0.0;
    if(isset($_POST["submit"])){
        $bmi = $weight/($height/100*$height/100);
    }
    return $bmi;
}

function typen($bmi){
    $ausgabe = 0;
    if($bmi <= 18.5){
        $ausgabe = "Untergewicht";
    }elseif ($bmi > 18.5 && $bmi <= 24.9){
        $ausgabe = "Normal";
    }elseif ($bmi > 25.0  && $bmi <= 29.9){
        $ausgabe = "Übergewicht";
    }elseif ($bmi > 30){
        $ausgabe = "Adipositas";
    }
    return $ausgabe;
}

?>