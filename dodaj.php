<html>
<head>
    <meta charset="utf-8">
    <title>Dodawanie</title>
</head>
<body>
<h1>Dodawanie do bazy</h1>
<form method="get" action="insert.php">
    <table border="0">
        <tr><td>NauczycielID</td><td><select name="id_pracownicy">



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

                    if ($sql =  $baza->prepare("SELECT id_pracownicy FROM pracownicy"))
                    {
                        $sql->execute();
                        $sql->bind_result($id_pracownicy);
                        while ($sql->fetch())
                        {
                            echo "<option>$id_pracownicy</option>";
                        }
                        $sql->close();
                    }
                    else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );


                    ?>





                </select></td></tr>
        <tr><td>Ocena</td><td><input type="text" name="imie"></td></tr>
        <tr><td>Ocena</td><td><input type="text" name="nazwisko"></td></tr>
        <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
    </table>
</form>
</body>
</html>