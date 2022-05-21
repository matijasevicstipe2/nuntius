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
        <?php 
        session_start();
        $_SESSION['prijava'] = 2;
        if(isset($_SESSION['user']) && isset($_SESSION['password'])){
            if($_SESSION['razina'] == 1){
                echo 'Dobrodošli ' . $_SESSION['user'] . ',vi ste administrator.';
                echo '<a href="registracija.php">Ovdje mozete unijeti nove korisnike</a>';
                echo '<a href="unos.html">Ovdje mozete unijeti nove vijesti</a>';
                include 'admin.php';
            }else{
                echo 'Zao nam je ' . $_SESSION['user'] .  ', ali nemate ovlasti ovdje.';

            }
        }else{
            include 'login.php';
            if($_SESSION['prijava'] == 1){
                $_SESSION['user'] = $username;
                $_SESSION['password'] = $password;
                    if($_SESSION['razina'] == 1){
                        echo 'Dobrodošli ' . $_SESSION['user'] . ',vi ste administrator.';
                        echo '<a href="registracija.php">Ovdje mozete unijeti nove korisnike</a>';
                        echo '<a href="unos.html">Ovdje mozete unijeti nove vijesti</a>';
                        include 'admin.php';
                    }else if($_SESSION['razina'] == 0){
                        echo 'Zao nam je ' . $_SESSION['user'] .  ', ali nemate ovlasti ovdje.';
                    }
            }else if($_SESSION['prijava'] == 0){
                echo 'Neuspjesna prijava!';
            }else{
                echo 'Prijavi se!';
            }
        }
        
   
        ?>

        <footer class="foot">
            <p>Copyright © 2021 Stipe Matijasevic</p>
        </footer>
    </div>
    
      
    
</body>
</html>