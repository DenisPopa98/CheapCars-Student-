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
  <section id="main">
    <article>
        
      <header>
        <h1>Căutare masina</h2>
      </header>

            <form action="cautare.php" id="cautare" method="post">
                <label for="caut">Căutare masina:</label>
                <select name="criteriu">
                  <option value="marca"> Dupa marca</option>
                  <option value="pret"> Pret maxim</option>
                  <option value="kilometraj"> Kilometraj maxim</option>
                  <option value="an_fabricatie"> Anul fabricatiei maxim</option>
                  <option value="capacitate_cilindrica"> Capacitate cilindrica maxima</option>
                  <option value="combustibil"> Combustibil</option>
                </select>
                <input type="text" name="caut" id="caut" value="" >
                <div class="button"><input type="submit" name="submit" value="caută"></div>
            </form>
    </article>

        <?php
            if (isset($_POST['submit']) ) {
              $criteriu=$_POST['criteriu'];
              switch ($criteriu) {
                case "marca":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE marca LIKE '%" . $termen_cautare . "%'";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {

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
                        break;
                     ?>

            </article>
                    
        <?php
                case "pret":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE pret <= $termen_cautare";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {
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
                        }
                     ?>

            </article>

        <?php
                }
                break;
                case "kilometraj":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE kilometraj <= $termen_cautare";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {
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
                        }
                     ?>

            </article>

        <?php
                }
                break;
                case "an_fabricatie":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE an_fabricatie <= $termen_cautare";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {
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
                        }
                     ?>

            </article>

        <?php
                }
                break;
                case "capacitate_cilindrica":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE capacitate_cilindrica <= $termen_cautare";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {
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
                        }
                     ?>

            </article>

        <?php
                }
                break;
                case "combustibil":
                  $termen_cautare = $_POST['caut'];
                  $query = "SELECT * FROM masini WHERE combustibil LIKE '%" . $termen_cautare . "%'";
                  $rezultat = mysqli_query($conexiune, $query) or die ('Eroare');
                  $nr_rezultate = mysqli_num_rows($rezultat);

                  if ($nr_rezultate == 0) {
                    echo "<h2>Căutarea nu a produs rezultate.</h2>";
                  }   else {
        ?>

                <article>
              <header>
                <h2>Rezultate căutare</h2>
              </header>
                    <p><strong>Am găsit <?php echo $nr_rezultate;?> rezultate</strong></p>

                    <?php
                        while ($row = mysqli_fetch_assoc($rezultat)) {
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
                        }
                     ?>

            </article>

        <?php
                }
                break;
              }
            }
        ?>
<footer>
<i>Copyright Popa Denis</i>   <i>|</i>   <i> Hariton Horatiu</i>
</footer>
</body>

</html>

