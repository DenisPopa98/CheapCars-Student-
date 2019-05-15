<!DOCTYPE html>

<html>

  <head>
  	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style1.css">
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <title>CheapCars</title>
  </head>

<body>
<?php
    require("mysql.php");
?>
  <header>
  	<img class="Logo" src="img/logo.jpg" alt="Logo-ul site-ului" style="width:180px; height:150px; ">
    <nav>
      <ul>
        <li><a href="index.php" >Home</a></li>
        <li><a href="adaugaanunt.php">Adaugă anunț</a></li>
        <li class="search">
          <a href="cautare.php"><span class="icon"><i class="fa fa-search"></i></span>
          <span class="text">Cautare masina</span></a>
          <li><a href="contact.php">Contact</a></li>
      </li>

      </ul>
    </nav>
  </header>

<article>
    <header>
        <h1>Operațiuni anunt</h2>
    </header>


    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            require("mysql.php");

            if (isset($_POST['submit'])) {
                //daca s-a efectuat trimiterea formularului
                //actualizăm înregistrarea în baza de date
                $query = "UPDATE masini
                    SET marca='".$_POST['marca']."',
                     model='". $_POST['model'] ."',
                     pret='". $_POST['pret'] ."',
                     an_fabricatie='". $_POST['an_fabricatie'] ."',
                     kilometraj='". $_POST['kilometraj'] ."',
                     capacitatea_cilindrica='". $_POST['capacitatea_cilindrica'] ."',
                     combustibil='". $_POST['combustibil'] ."',
                     Telefon='". $_POST['Telefon'] ."'
                     WHERE id=".$id;

                $result=mysqli_query($conexiune, $query);
                if (!$result) {
                    echo mysqli_error($conexiune);
                } else {
                     echo "<h2>Modificare efectuată cu success!</h2>";
                    echo "<p>Înapoi la <a href='CheapCars1.php'>Homepage</a>";
                }
            } else {
                //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul
                $query = "SELECT *
                    FROM masini
                    WHERE masini.id=".$id;

                $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                $row=mysqli_fetch_assoc($rezultat);

                ?>
                <form id="editAnunt" action="modanunt.php?id=<?=$id?>" method="post">

                    <div>
                        <label for="marca">Marca :</label>
                        <input type="text" name="marca" id="marca" value="<?=$row["marca"]?>" >
                    </div>
                    <div>
                        <label for="model">Model :</label>
                        <input type="text" name="model" id="model" value="<?=$row["model"]?>" >
                    </div>
                    <div>
                        <label for="pret">Pret :</label>
                        <input type="text" name="pret" id="pret" value="<?=$row["pret"]?>" >
                    </div>
                    <div>
                        <label for="kilometraj">Kilometraj :</label>
                        <input type="text" name="kilometraj" id="kilometraj" value="<?=$row["kilometraj"]?>" >
                    </div>
                    <div>
                        <label for="Telefon">Telefon:</label>
                        <input type="text" name="Telefon" id="Telefon" value="<?=$row["Telefon"]?>" >
                    </div>
                    <div>
                        <label for="capacitate_cilindrica">Capacitatea cilindrica a motorului :</label>
                        <input type="text" name="capacitate_cilindrica" id="capacitate_cilindrica" value="<?=$row["capacitate_cilindrica"]?>" >
                    </div>
                    <div>
                        <label for="an_fabricatie">Anul fabricatiei :</label>
                        <input type="text" name="an_fabricatie" id="an_fabricatie" value="<?=$row["an_fabricatie"]?>" >
                    </div>
                    <div>
                        <label for="combustibil">Tipul de combustibil :</label>
                        <input type="text" name="combustibil" id="combustibil" value="<?=$row["combustibil"]?>" >
                    </div>

                  <div id="send">
                    <input type="submit" name="submit" value="Submit">
                  </div>

                </form>

                <?php

            }
            mysqli_close($conexiune);
        } else {
            echo "<p>Lipsă paramentru (nu știu ce anunt să modific)</p>";
            echo "<p>Mergeți înapoi la <a href='CheapCars1.php'>Homepage</a> și selectați unul</p>";
        }

    ?>



</article>
  <footer>
<i>Copyright Popa Denis</i>   <i>|</i>   <i> Hariton Horatiu</i>
</footer>
</body>

</html>
