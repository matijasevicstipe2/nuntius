<!DOCTYPE html>

<head>
	<title>Sopitas</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style2.css">

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
        <section id="s" class="secc">
            <?php 
            include 'connect.php';
            $kateg = $_GET['id'];
            
            $query = "SELECT * FROM vijesti WHERE kategorija = '$kateg' and arhiva = 0";
            $result = mysqli_query($dbc, $query);
            $i=0;
            while($row = mysqli_fetch_array($result)) {
            echo '<article class="arc">';
            echo'<div class="article2">';
            echo '<div class="sport_img">';
            echo '<img src="img/'  . $row['slika'] . '" />';
            echo '</div>';
            echo "<p style=\"font-weight:bold;font-size:10px;color:dodgerblue\">Objavljeno:</p><span>" . $row['datum'] . "</span>";
            echo '<div class="media_body">';
            echo '<h4 class="title">';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
            echo '</a></h4>';
            echo '<p class="sazetak">' . $row['sazetak'] . '</p>';
            echo '</div></div>';
            echo '</article>';
            }
            mysqli_close($dbc);
            ?>

        </section>
        
    
        <footer class="foot">
            <p>Copyright © 2021 Stipe Matijasevic</p>
        </footer>
    </div>
    
      
    
</body>
</html>