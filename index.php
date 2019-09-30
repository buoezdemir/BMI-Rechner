<html>
<head>
    <title>BMI-Rechner</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="js/index.js"></script>
</head>
<body>

<h1>BMI-Rechner</h1>

<?php

require "lib/func.inc.php";
$name = "";
$height = 0;
$weight = 0;
$gender = "";

if (isset($_POST['submit'])) {
    global $name, $height,$weight,$gender, $bmi;
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $height = isset($_POST['height']) ? $_POST['height'] : "";
    $weight = isset($_POST['weight']) ? $_POST['weight'] : "";
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $bmi = isset($_POST['bmi']) ? $_POST['bmi'] : "";

    if (validate($name, $height, $weight, $gender)) {
        echo "<p class='success'></p>";
    } else {
        echo "<p class='error'>Daten fehlerhaft</p>";
    }
}

?>

<form id="form_bmi" action="index.php" method="post">

    <div class="block">
        <label>Name:</label>
        <input type="text" name="name" maxlength="25" required="required" value="<?= htmlspecialchars($name) ?>"/>
        <?php if (isset($errors['name'])) echo "<div class='error'>" . $errors['name'] . "</div>"; ?>
    </div>

    <div class="block">
        <label>Geschlecht:</label>
        <input type="radio" id="mn" name="gender" value="male" checked required="required"> Männlich<br>
        <input type="radio" id="wb" name="gender" value="female" required="required"> Weiblich<br>
        <?php if (isset($errors['gender'])) echo "<div class='error'>" . $errors['gender'] . "</div>"; ?>
    </div>

    <div class="radio">
        <label>Größe in kg:</label>
        <input type="number" id="h" name="height" min="30" max="250" required="required" value="<?= htmlspecialchars($height) ?>"/>
        <?php if (isset($errors['height'])) echo "<div class='error'>" . $errors['height'] . "</div>"; ?>

    </div>

    <div class="block">
        <label>Gewicht in cm:</label>
        <input type="number" id="w" name="weight" min="10" max="300" required="required" value="<?= htmlspecialchars($weight) ?>"/>
        <?php if (isset($errors['weight'])) echo "<div class='error'>" . $errors['weight'] . "</div>"; ?>
    </div>


    <div class="block">
        <input type="submit" name="submit" value="Speichern" onclick=""/>
    </div>
    <div class="block">
        <label><b>Info zum BMI:</b> <br> Unter 18.5 Untergewicht <br> 18.5-24.9 Normal <br> 25.0 - 29.9 Übergewicht <br> 30.0 und darüber Adipositas </label>
    </div>
    <div class="block">
        <input type="button"  value="Löschen" onclick="clearForm()"/>
    </div>



</form>

<?php
    if(isset($_POST["submit"])){
        echo "Dein BMI ist: " ;
        echo round(calculate($weight,$height), 1);
        echo" Das heisst: ";
        echo typen(calculate($weight,$height));
    }
?>


</body>
</html>