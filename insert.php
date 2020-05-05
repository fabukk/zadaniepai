<?php

function wczytaj($zmienna)
{
    if (!isset($_GET[$zmienna]) || $_GET[$zmienna]=="")
        die( "Blad! brak zmiennej: ".$zmienna ); // nie podano marki w $
    return $_GET[$zmienna];
}

$baza = new  mysqli("localhost", "root", "", "fabian");
if (mysqli_connect_errno())  die( "Blad: ".mysqli_connect_error() );
$baza->set_charset("utf8");

$id_pracownicy = wczytaj("id_pracownicy");
$imie = wczytaj("imie");
$nazwisko = wczytaj("nazwisko");

$sql = $baza->prepare("INSERT INTO pracownicy VALUES (?, ?, ?);");
if ($sql) {
    $sql->bind_param("iss", $id_pracownicy, $imie, $nazwisko);
    $sql->execute();
    $sql->close();
} else
    die('Błąd: ' . $baza->error);
$baza->close();
