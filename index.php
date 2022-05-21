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
        <h2>Sport</h2>
        <section id="s" class="sec">
            <?php 
         
            include 'connect.php';
            $query = "SELECT * FROM vijesti WHERE kategorija ='sport' and arhiva = 0 limit 3";
            $result = mysqli_query($dbc, $query);
            $i=0;
            
            while($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo'<div class="article">';
            echo '<div class="sport_img">';
            echo '<img src="img/'  . $row['slika'] . '" />';
            echo '</div>';
            echo "<p style=\"font-weight:bold;font-size:10px;color:dodgerblue\">Objavljeno:</p><span>" . $row['datum'] . "</span>";
            echo '<div class="media_body">';
            echo '<h4 class="title">';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
            echo '</a></h4>';
            echo '<i class ="sazetak">' . $row['sazetak'] . '</i>';
            echo '</div></div>';
            echo '</article>';
            }
            ?>

        </section>
        <h2>Kultura</h2>
        <section id="k" class="sec">
        <?php 
            $query = "SELECT * FROM vijesti WHERE kategorija ='kultura' and arhiva = 0 limit 3";
            $result = mysqli_query($dbc, $query);
            $i=0;
          
            while($row = mysqli_fetch_array($result)) {
            echo '<article>';
            echo'<div class="article">';
            echo '<div class="sport_img">';
            echo '<img src="img/'  . $row['slika'] . '" />';
            echo '</div>';
            echo "<p style=\"font-weight:bold;font-size:10px;color:dodgerblue\">Objavljeno:</p><span>" . $row['datum'] . "</span>";
            echo '<div class="media_body">';
            echo '<h4 class="title">';
            echo '<a href="clanak.php?id='.$row['id'].'">';
            echo $row['naslov'];
            echo '</a></h4>';
            echo '<p class ="sazetak">' . $row['sazetak'] . '</p>';
            echo '</div></div>';
            echo '</article>';
            }
            ?>
    
        </section>
    
        <footer class="foot">
            <p>Copyright © 2021 Stipe Matijasevic</p>
        </footer>
    </div>
    
      
    
</body>
</html>