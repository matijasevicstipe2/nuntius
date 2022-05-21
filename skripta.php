<!DOCTYPE html>

<head>
	<title>Sopitas</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style2.css" />

</head>
<body>
    <div class="main">
        <header>

            <nav class="navigate" role="navigation">
                <ul>
                <li>
                <a href="index.php">Početna</a>
                </li>
                <li>
                <a href="kategorija.php?id=sport">Sport</a>
                </li>
                <li>
                <a href="kategorija.php?id=kultura">Kultura</a>
                </li>
                <li>
                <a href="administracija.php" >Administracija</a>
                </li>
                </ul>
               </nav>      

        </header>

    <?php
    include 'connect.php';

    $slika = $_FILES['slika']['name'];
    $datum = $_POST['datum'];
    $datum2 = date('d.m.Y.',strtotime($datum));
    $naslov = $_POST['naslov'];
    $kratkiSadrzaj = $_POST['about'];
    $sadrzaj = $_POST['content'];
    $kategorija = $_POST['kategorija'];

    if(isset($_POST['arhiva'])){
        $arhivaVrijednost = 1;
    }else{
        $arhivaVrijednost = 0;
    }
    $imgDir = 'img/'. $slika;
    move_uploaded_file($_FILES['slika']['tmp_name'],$imgDir);
    $query = "INSERT INTO vijesti(datum,naslov,sazetak,tekst,slika,kategorija,arhiva)
     values('$datum2','$naslov','$kratkiSadrzaj','$sadrzaj','$slika','$kategorija','$arhivaVrijednost')";
    echo mysqli_error($dbc);
    $result = mysqli_query($dbc,$query) or die('Error while querying..');
    
    mysqli_close($dbc);

    ?>
   
        <?php
        if(!$arhivaVrijednost){
            echo '<section class="vijest">';
            echo "<h2 class='category'>$kategorija</h2>";
            echo "<h1 class='title2'>$naslov</h1>";
            echo "<p><p style=\"font-weight:bold;font-size:7px;color:dodgerblue\">OBJAVLJENO:</p><span>$datum2</span></p>";
            echo "<img src=\"$imgDir\" alt=\"Picture\" />";
            echo "<section class=\"sadrzaj\"><p>$sadrzaj</p></section></section>";
        }
        
         ?>


    <footer class="foot">
            <p>Copyright © 2021 Stipe Matijasevic</p>
        </footer>

      
    </div>  
</body>
</html>