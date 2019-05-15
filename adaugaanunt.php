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
<article>
  <h1> Adauga anunt </h1>


        <?php

                require("mysql.php");

                if (isset($_POST['submit'])) {
                    //daca s-a efectuat trimiterea formularului
                    //înregistrăm clientul nou în baza de date
                    $marca = $_POST['marca'];
                    $model = $_POST['model'];
                    $pret = $_POST['pret'];
                    $an_fabricatie = $_POST['an_fabricatie'];
                    $combustibil = $_POST['combustibil'];
                    $kilometraj = $_POST['kilometraj'];
                    $capacitate_cilindrica = $_POST['capacitate_cilindrica'];
                    $telefon = $_POST['telefon'];

                    $query = "INSERT INTO masini (marca,model,pret,an_fabricatie,combustibil,kilometraj,capacitate_cilindrica,telefon)
                      VALUES ('$marca', '$model', '$pret', '$an_fabricatie', '$combustibil', '$kilometraj', '$capacitate_cilindrica', '$telefon');";

                    $result=mysqli_query($conexiune, $query);

                    if (!$result) {
                      echo mysqli_error($conexiune);
                    } else {
                       echo "<h2>Inserare efectuată cu success!</h2>";
                        echo "<p>Înapoi la <a href='CheapCars1.php'>Homepage</a>";

                    }
                    $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $idx = strpos($_FILES['fileToUpload']['name'],'.');
                $ext = substr($_FILES['fileToUpload']['name'],$idx);
                $id = mysqli_insert_id($conexiune);
                $file_name = $id . $ext;
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                  $uploadOk = 1;
                } else {
                  echo "File is not an image.";
                $uploadOk = 0;
          }
        }
          // Check if file already exists
          if (file_exists($target_file)) {
          $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
        // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            $uploadOk = 0;
          }
          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
          rename($target_dir . $_FILES["fileToUpload"]["name"],$target_dir . $file_name);
                } else {
                    //dacă nu s-a efectuat trimiterea, înseamnă că trebuie să afișăm formularul


                    ?>
                    <form id="editCheapCars" action="adaugaanunt.php" method="post" enctype="multipart/form-data">

                        <div>
                            <label for="marca">Marca :</label>
                            <input type="text" name="marca" id="marca" value="" >
                        </div>
                        <div>
                            <label for="model">Model :</label>
                            <input type="text" name="model" id="model" value="" >
                        </div>
                        <div>
                            <label for="pret">Pret :</label>
                            <input type="text" name="pret" id="pret" value="" >
                        </div>
                        <div>
                            <label for="an_fabricatie">Anul fabricatiei :</label>
                            <input type="text" name="an_fabricatie" id="an_fabricatie" value="" >
                        </div>
                        <div>
                            <label for="combustibil">Tip de combustibil :</label>
                            <input type="text" name="combustibil" id="combustibil" value="" >
                        </div>
                        <div>
                            <label for="kilometraj">Kilometraj :</label>
                            <input type="text" name="kilometraj" id="kilometraj" value="" >
                        </div>
                        <div>
                          <label for="capacitate_cilindrica">Capacitatea cilindrica a motorului :</label>
                          <input type="text" name="capacitate_cilindrica" id="capacitate_cilindrica" value="" >
                        </div>
                        <div>
                          <label for="telefon">Numar de telefon :</label>
                          <input type="text" name="telefon" id="telefon" value="" >
                        </div>
                        <div>
                          <label for="imagine">Incarca o imagine :</label>
                          <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                      <div id="send">
                        <input type="submit" name="submit" value="Submit">
                      </div>

                    </form>

                    <?php

                }

                mysqli_close($conexiune);


        ?>



</article>



<footer>
<i>Copyright Popa Denis</i>   <i>|</i>   <i> Hariton Horatiu</i>
</footer>
</body>

</html>
