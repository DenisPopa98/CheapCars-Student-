<!DOCTYPE html>

<html>

  <head>
  	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style1.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  <section>

<div class="card-group">
  <?php

  for($i=1;$i<=5;$i++)
  {
    $query = "SELECT * FROM masini WHERE id = $i ";
    $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
    while ($row = mysqli_fetch_assoc($rezultat)){
      $id=$row['id'];
    ?>
    <div class="card">
      <?php echo "<p> <img src=uploads/$id.jpg></p>"; ?>
      <div class="card-body">
        <p class="card-text">Detalii Masina:</p>
        <?php
        
          echo "<hr class=\"short\">";
          echo "<p>Marca : " .$row['marca'] . "</p>";
          echo "<p>Model : " .$row['model'] . "</p>";
          echo "<p>An fabricatie : " .$row['an_fabricatie'] . "</p>";
          echo "<p>Combustibil : " .$row['combustibil'] . "</p>";
          echo "<p>Capacitate cilindrica : " .$row['capacitate_cilindrica'] . "</p>";
          echo "<p>Kilometraj : " .$row['kilometraj'] . "</p>";
          echo "<p>Pret : " .$row['pret'] . "</p>";
          echo "<p>Telefon: " .$row['Telefon'] . "</p>";       
        ?>
      </div>
    </div>
    <?php
  } }
  ?>
</div>





    <footer>
      <i>Copyright Popa Denis</i>   <i>|</i>   <i> Hariton Horatiu</i>
   </footer>
</body>

</html>
