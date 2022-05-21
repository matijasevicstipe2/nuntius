<!DOCTYPE html>

<head>
	<title>Sopitas</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="styles/style2.css" />

</head>
<body>
    <header>

    </header>

    <form method="POST" action="registracija.php">
        <label for="ime">Ime:</label>
        <span id="porukaIme" class="bojaPoruke"></span>
            <input type="text" name="ime" id="ime">
            <span id="porukaPrezime" class="bojaPoruke"></span>
            <label for="pime">Prezime:</label>
            <input type="text" id="prezime" name="pime">
            <span id="porukaUsername" class="bojaPoruke"></span>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <span id="porukaPass" class="bojaPoruke"></span>
            <label for="pass">Lozinka:</label>
            <input type="password" id="pass" name="pass">
            <span id="porukaPassRep" class="bojaPoruke"></span>
            <label for="passa">Lozinka ponovo:</label>
            <input type="password" id="passRep" name="passa">
     
            <button type="submit"  id="slanje" value="Prihvati">Prihvati</button>
            
    </form>
    <script type="text/javascript">
 document.getElementById("slanje").onclick = function(event) {
 
 var slanjeForme = true;
 
 // Ime korisnika mora biti uneseno
 var poljeIme = document.getElementById("ime");
 var ime = document.getElementById("ime").value;
 if (ime.length == 0) {
 slanjeForme = false;
 poljeIme.style.border="1px dashed red";
 document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
 } else {
 poljeIme.style.border="1px solid green";
 document.getElementById("porukaIme").innerHTML="";
 } 
 // Prezime korisnika mora biti uneseno
 var poljePrezime = document.getElementById("prezime");
 var prezime = document.getElementById("prezime").value;
 if (prezime.length == 0) {
 slanjeForme = false;13
 poljePrezime.style.border="1px dashed red";
 
document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
 } else {
 poljePrezime.style.border="1px solid green";
 document.getElementById("porukaPrezime").innerHTML="";
 }
 
 // Korisničko ime mora biti uneseno
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
 
 // Provjera podudaranja lozinki
 var poljePass = document.getElementById("pass");
 var pass = document.getElementById("pass").value;
 var poljePassRep = document.getElementById("passRep");
 var passRep = document.getElementById("passRep").value;
 if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
 slanjeForme = false;
 poljePass.style.border="1px dashed red";
 poljePassRep.style.border="1px dashed red";
 document.getElementById("porukaPass").innerHTML="<br>Lozinke nisu iste!<br>";
 
document.getElementById("porukaPassRep").innerHTML="<br>Lozinke nisu iste!<br>";
 } else {
 poljePass.style.border="1px solid green";
 poljePassRep.style.border="1px solid green";
 document.getElementById("porukaPass").innerHTML="";
 document.getElementById("porukaPassRep").innerHTML="";
 }
 
 if (slanjeForme != true) {
 event.preventDefault();
 }14
 
 };
 
 </script>
    <?php

        function provjeriKorisnika($dbc,$username){
            $que = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
            $stmt=mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $que)){
                mysqli_stmt_bind_param($stmt,'s',$username);
                
                mysqli_stmt_execute($stmt);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                mysqli_stmt_bind_result($stmt, $a);
                mysqli_stmt_fetch($stmt); 
                
                if(mysqli_stmt_num_rows($stmt) > 0){
                   
                    return false;
                }else{
                    return true;
                }   
                
            }
            
        }


            if(!empty($_POST['username']) && !empty($_POST['pass']) && !empty($_POST['ime']) && !empty($_POST['pime']) && !empty($_POST['passa'])){
                
                $username = $_POST['username'];
                $password = $_POST['pass'];
                $ime = $_POST['ime'];
                $pime = $_POST['pime'];
                $passa = $_POST['passa'];
                if($passa != $password){
                    echo 'Lozinke se ne poklapaju';

                }else{
                      $h_pass = password_hash($password, CRYPT_BLOWFISH);
    
                $servername = "127.0.0.1:3307";
                $username2 = "root";
                $password2 = "";
                $basename = "bazavijesti";
                
                $dbc = mysqli_connect($servername, $username2, $password2, $basename) or
                        die("Error connecting: " . mysqli_error($dbc));
                
                if ($dbc) {
                    $b = provjeriKorisnika($dbc,$username);
                    if($b){
                        $sql = "INSERT INTO korisnik(ime,prezime,korisnicko_ime,lozinka,razina) VALUES (?,?,?,?,?)";
                        $stmt=mysqli_stmt_init($dbc);
                        if (mysqli_stmt_prepare($stmt, $sql)){
                            $razina = 0;
                            mysqli_stmt_bind_param($stmt,'ssssi',$ime,$pime,$username,$h_pass,$razina);
                            mysqli_stmt_execute($stmt);
                         
                         } 
                    }else{
                        echo 'korisnik vec postoji';
                    }
                
                
                }
                mysqli_close($dbc);
                }
                
    
            }

        ?>

   

    <footer>

    </footer>
      
    
</body>
</html>