<?php
$hostname = "localhost";
$username = "root";
$bd = "cheapcars";


$conexiune = mysqli_connect($hostname,$username)
or die ("Eroare! Functia apelata da eroare, este posbil ca cei 3 parametrii sa fie completati eronat!");

$baza_date = mysqli_select_db($conexiune,$bd)
or die ("Eroare! Numele aceste baze de date nu exista!");
?>
