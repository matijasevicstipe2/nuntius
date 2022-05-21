<!DOCTYPE html>

<head>
	<title>Clanak</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style2.css"/>

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
        $id = $_GET['id'];
        $query = "SELECT * from vijesti where id = $id";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result)

        ?>
        <section class="vijest" role="main">
        <div class="row">
        <i class="category"><?php echo "<span>".$row['kategorija']."</span>";?></i>
        <h1 class="title2"><?php echo $row['naslov'];?></h1>
        <p><p style="font-weight:bold;font-size:7px;color:dodgerblue">OBJAVLJENO:</p> <?php
        echo "<span>".$row['datum']."</span>";
        ?></p>
        </div>
        <section class="slika">
             <?php echo '<img src="img/'  . $row['slika'] . '" />';
             ?>
        </section>
        <section class="about"><p>
            <?php echo "<i>".$row['sazetak']."</i>";
            ?>
            </p>
        </section>
        <section class="sadrzaj"> 
            <p><?php echo $row['tekst'];?>
        </p>
        </section>
        </section>
        
        
       
        <footer class="foot">
            <p>Copyright © 2021 Stipe Matijasevic</p>
        </footer>
    </div>
    
    
</body>
</html>