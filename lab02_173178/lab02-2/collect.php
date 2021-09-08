<?php
$ime = $_GET["ime"];
$prezime= $_GET["prezime"];
$email = $_GET["email"];
$pol= $_GET["pol"];

if (!isset($ime) || !isset($prezime) || !isset($email) || !isset($pol))
    header("Location:/form.php");

else {
    echo "Ime: " . $ime . "; Prezime: " . $prezime . "; Email: " . $email . "; Pol: ";
    if ($pol == 1)
        echo "masko";
    else
        echo "zensko";
}
