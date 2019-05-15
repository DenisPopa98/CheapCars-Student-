<!DOCTYPE html>

<html>

  <head>
  	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="css/style1.css">
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
  <?php
   if (isset($_POST['submit'])) {
     $nume = $_POST['nume'];
     $prenume = $_POST['prenume'];
     $email = $_POST['email'];
     $mesaj = $_POST['mesaj'];

     $query = "INSERT INTO inbox (nume,prenume,email,mesaj) VALUES ('$nume', '$prenume', '$email', '$mesaj');";

    $result=mysqli_query($conexiune, $query);
    if (!$result) {
      echo mysqli_error($conexiune);
    } else {
      echo "<h2>Mesajul a fost trimis cu success!</h2>";
      echo "<p>Înapoi la <a href='index.php'>Homepage</a>";
    }
   }
  ?>
  <div class="container">
    <div style="text-align:center">
      <h2>Contact</h2>
      <p>Ne puteți lăsa un mesaj sau puteți veni la adresa alăturată in intervalele orare. </p>
    </div>
    <div class="row">

      <aside>

        <p>Telefon mobil/fix : 0732456345/0258345923</p>
        <p>E-mail : cheap.cars@yahoo.com </p>
        <p>Adresa : str. Lalelelor nr. 33, Alba Iulia, Alba </p>
        <br><br><br>
        <p> Program : L-V : 09:00-17:00 / S-D : INCHIS </p>
        <br>
        <br>
        <img src="img/mapa.png" alt="Adresa pe mapa" style="width:390px; height:250px; ">
      </aside>

      <div class="column">
      <form id="editInbox"  action="contact.php" method="post" enctype="multipart/form-data">
          <label for="nume">Nume</label>
          <input type="text" id="nume" name="nume" placeholder="Nume..">
          <label for="prenume">Prenume</label>
          <input type="text" id="prenume" name="prenume" placeholder="Prenume..">
          <label for="email">E-Mail</label>
          <input type="text" id="email" name="email" placeholder="E-mail-ul dvs..">

          </select>
          <label for="mesaj">Mesaj</label>
          <textarea id="mesaj" name="mesaj" placeholder="Mesajul dvs.." style="height:170px"></textarea>
          <input type="submit" value="submit">
        </form>
      </div>
    </div>
  </div>
<?php     mysqli_close($conexiune); ?>

<footer>
<i>Copyright Popa Denis</i>   <i>|</i>   <i> Hariton Horatiu</i>
</footer>
</body>

</html>
