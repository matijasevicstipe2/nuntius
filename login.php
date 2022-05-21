<!DOCTYPE html>

<head>
	<title>Sopitas</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style2.css" />

</head>
<body>
    <header>

</header>

    <form method="POST" action="administracija.php">
    <span id="porukaUsername" class="bojaPoruke"></span>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <span id="porukaPass" class="bojaPoruke"></span>
            <label for="pass">Lozinka:</label>
            <input type="password" id="pass" name="pass">

            <button type="submit" id="prijava" value="Prijava">Prijava</button>
            
    </form>

 <script type="text/javascript">
 document.getElementById("prijava").onclick = function(event) {
 
 var slanjeForme = true;
 var poljeUsername = document.getElementById("username");
 var username = document.getElementById("username").value;
 if (username.length == 0) {
 slanjeForme = false;
 poljeUsername.style.border="1px dashed red";
 
document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
 } else {
 poljeUsername.style.border="1px solid green";
 document.getElementById("porukaUsername").innerHTML="";
 }
 

 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 
 if (pass.length == 0) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 
 document.getElementById("porukaPass").innerHTML="<br>Unesite lozinku!<br>";

 } else {
 poljePass.style.border="1px solid green";

 document.getElementById("porukaPass").innerHTML="";

 }
 
 if (slanjeForme != true) {
 event.preventDefault();
 }
 
 };
 
 </script>
    <?php

        if(!empty($_POST['username']) && !empty($_POST['pass'])){
                
            $username = $_POST['username'];
            $password = $_POST['pass'];

            $servername = "127.0.0.1:3307";
            $username2 = "root";
            $password2 = "";
            $basename = "bazavijesti";
            
            $dbc = mysqli_connect($servername, $username2, $password2, $basename) or
                    die("Error connecting: " . mysqli_error($dbc));
              if ($dbc) {
                    $sql = "SELECT korisnicko_ime,lozinka,razina FROM korisnik WHERE korisnicko_ime = ? ";
                    $stmt=mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)){
            
                        mysqli_stmt_bind_param($stmt,'s',$username);
                   
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                    }
                    
                    mysqli_stmt_bind_result($stmt, $a,$b,$c);
                    $row = mysqli_stmt_fetch($stmt);
                    $_SESSION['razina'] = $c;
                    if($username == $a && password_verify($password,$b)){
                        echo 'Prijava uspjela';
                        $_SESSION['prijava'] = 1;

                    }else{
                        echo 'Prijava nije uspjela';
                        $_SESSION['prijava'] = 0;
                    }
                    
                }
            
           
        }


           
        
        ?>


</body>
</html>