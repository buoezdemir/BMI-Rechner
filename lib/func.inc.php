<?php

$errors = [];

$weight = 0;
$height= 0;
$bmi = 0;
$heightM = 0;

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
    $heightM = $height/100;
    $bmi = $weight/($heightM*$heightM);
    return $bmi;

}
