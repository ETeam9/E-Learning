<!DOCTYPE html>
<?php
    session_start();
    //BOOM
    if (isset($_GET['pocetna_kurs'])) {
    $_SESSION['kurs'] =  $_GET['pocetna_kurs'];
    } /*else {
        header("Location:pocetna_strana.php");
    }*/
?>
<html lang="sr-latin">
<head>
<meta charset="utf8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<meta name="author" content="Jonathan Stipe" />
<meta name="copyright" content="&copy; 2012 Jonathan Stipe" />
<title>E-Ucenje</title>
<style>
body {
    margin: 0;
}

.header {
    text-align: center;
}

.sideNav {
   height: 100vh;
   width: 0;
   position: fixed;
   z-index: 1;
   top: 0;
   left: 0;
   background-color: rgb(46, 218, 195);
   overflow-x: hidden;
   padding-top: 60px;
   transition: 0.5s;
}
.sideNav a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 16px;
   color: #000000;
   font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   display: block;
   transition: 0.3s;
}
.sidenav a:hover {
   color: #f1f1f1;
}
.sideNav .closeBtn {
   position: absolute;
   top: 0;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
}

/*
button {
   padding: 15px;
   background-color: rgb(0, 27, 145);
   color: rgb(255, 255, 255);
   font-size: 20px;
   border: none;
   border-radius: 2%;
}*/

.main-content{
   transition: 0.5s;
}

.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
  position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  
  z-index: 500;
}

.navbar a {
  //float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .openSideNav {
  cursor: pointer;
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .openSideNav {
  background-color: red;
}

.right_side {
    float: right;
}

#tekst{
    margin: auto;
    width: 40%;
    margin-bottom: 20px;
    margin-top: 20px;
    padding-top: 15px;
    background-color: white;
    border: 5px solid #333;
    float: center;
    content: "";
    display: table;
    clear: both;
}

#tekst h3{
    margin-left:25px;
    margin-right:30px;
    margin-bottom:20px;
}

#tekst p{
    margin-left: 10px;
}

#tekst ul{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

#tekst ul li{
}

#tekst ul li a{
    text-decoration: none;
    font-size: 20px;
    color: black;
}

#tekst ul li a:hover{
    color: rgb(46, 218, 195);
}

.wrapper {
    margin: 24px 80px;
    height: auto;
    padding: 48px;
    border-radius: 15px;
    box-shadow: 0px 0px 12px 7px rgba(61,55,76,0.64);
}
.opis {
  margin: 24px 15px;
  margin
  position: relative;
  height: auto;
  word-wrap: break-word;
}
.sekcija {
  border-bottom: 1px solid gray;
  padding: 24px 0px;
}
.lista {
    display: flex;
    flex-direction: column;
}
.listItem {
    padding-top: 12px;
}
.fa {
    padding-top:24px;
    font-size: 20px;
}

</style>
<script>
    <?php
        $greska=$_SESSION['student_kurs_sifra_greska'];
        if($greska!="")
        {
    ?>
            alert(<?php echo "\"" .$greska. "\""; ?>);
    <?php   
        }
        $_SESSION['student_kurs_sifra_greska']="";
    ?>
</script>  
</head>
<body>
<!-- stranicni meni-->
<div class="sideNav">   
    <!-- ovde da se ubace konkretni linkovi ka kursevima ... -->
        <a href="#" class="closeBtn">×</a>
    <a href="proces.php?odjava">Odjava</a>
        <a href="profil.php">Profil</a>
    <!-- ................................................... -->
</div>
<div class="main-content">
    
    <div class="header">
        <p id="header_p"><img src="logo_moodle2.png" /></p>
    </div>

    <div class="navbar">
        <div class="dropdown">
        <!-- sa klikom da dugme se otvara stranicni meni-->
            <button class="openSideNav"><i class="fa fa-align-justify"></i></button>
        </div>
        <!-- link koje ce da baca na pocetnu stranu od trenutno ulogovanog korisnika -->
        <a class="right_side" href="pocetna_strana.php"><i class="fa fa-home"></i></a>
    </div>  
</div>
<!-- dodato za test-->
<?php
        $sifra=$_SESSION['kurs'];
        $mysqli = new mysqli('localhost', 'root', '', 'portal') or die(mysqli_error($mysqli));
        $mysqli -> set_charset("utf8");
        $result= $mysqli->query("SELECT * FROM test WHERE sifra_kursa='$sifra' ORDER BY broj_testa DESC LIMIT 1") or die($mysqli->error);
        $row= $result->fetch_assoc();
        if($row!=null)
        {
            $_SESSION['test']=$row['broj_testa'];
            $status=$row['status'];
            $poeni=$row['poeni_svi'];
        }
        else
        {
            $_SESSION['test']=1;
            $status="onemogucen";
            $poeni=0.0;
        }    
?>
<!-- kraj dodatog za test-->
<?php
    if($_SESSION["tipKorisnika"] == "student")  // pocetak student sesije
    {
?>
<div class='wrapper'>
<?php
$sifra = $_SESSION['kurs']; 
$mysqli = new mysqli('localhost', 'root', '', 'portal') or die(mysqli_error($mysqli));
$mysqli -> set_charset("utf8");

$result= $mysqli->query("SELECT * FROM kurs WHERE sifra_kursa='$sifra'") or die($mysqli->error);
while($row = $result->fetch_assoc())
{
?>
<div style="display: flex; justify-content: space-between">
    <h3><?php echo($row['naziv']); ?></h3>
    <button class="btn-danger" style="border-radius: 5px">Sacuvaj</button>
    </div>
    <div contentEditable="true" class="opis"><?php echo($row['opis']); ?></div>
    <!-- dodato za test-->
    <div>
    <?php
            $email=$_SESSION['idKorisnika'];
            $test=$_SESSION['test'];
            $result= $mysqli->query("SELECT * FROM radio WHERE sifra_kursa='$sifra' AND broj_testa=$test AND email_student='$email'") or die($mysqli->error);
            $row= $result->fetch_assoc();
            $bodovi=$row['bodovi'];
            if($status=="omogucen" && ($bodovi==-1 || $bodovi==null))
            {
    ?>
                <form action="proces.php" method="POST">
                    <button class="btn-primary" style="border-radius: 5px;" type="submit" name="pokreni_test"> Pokreni test </button>
                </form>
    <?php
            }
    ?>       
    </div> 
    <br>
    <div>
        <a href="rezultati_test.php"><button class="btn-primary" style="border-radius: 5px;">Rezultati</button></a>
    </div>   
    <br>    
    <!-- kraj dodatog za test-->

    <div class="sekcija" style="border-top: 1px solid gray;">
        <h4>Nedelja 1</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_3.doc</li>
            <!--<li class="fa"><a>&#xf15c; </a>Fajl_4.doc</li>-->
        <ul>
    </div>

    <div class="sekcija">
        <h4>Nedelja 2</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>

    <div class="sekcija">
        <h4>Nedelja 3</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>
    
    <div class="sekcija">
        <h4>Nedelja 4</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>
    <div class="sekcija">
        <h4>Nedelja 5</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>

    <div class="sekcija">
        <h4>Nedelja 6</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>
    
    <div class="sekcija">
        <h4>Nedelja 7</h4>
        <ul class="lista" >
            <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
            <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
        <ul>
    </div>
    <div class="sekcija">
        <h4>Nedelja 8</h4>
    </div>
    
    <div class="sekcija">
        <h4>Nedelja 9</h4>
    </div>
    <div class="sekcija">
        <h4>Nedelja 10</h4>
    </div>

    <div class="sekcija">
        <h4>Nedelja 11</h4>
        <ul>
        <ul>
    </div>
    
    <div class="sekcija">
        <h4>Nedelja 12</h4>
        <ul>
        <ul>
    </div>
    <div class="sekcija">
        <h4>Nedelja 13</h4>
        <ul>
        <ul>
    </div>
    
    <div class="sekcija">
        <h4>Nedelja 14</h4>
        <ul>
        <ul>
    </div>
    <div class="sekcija">
        <h4>Nedelja 15</h4>
        <ul>
        <ul>
    </div>
</div>
<?php        
    }
} // kraj student sesije 
?>
<?php
    if($_SESSION["tipKorisnika"] == "profesor")
    {
    ?>
    <div class='wrapper'>
    <?php
    $sifra = $_SESSION['kurs']; 
    $mysqli = new mysqli('localhost', 'root', '', 'portal') or die(mysqli_error($mysqli));
    $mysqli -> set_charset("utf8");
    
    $result= $mysqli->query("SELECT * FROM kurs WHERE sifra_kursa='$sifra'") or die($mysqli->error);
    while($row = $result->fetch_assoc())
    {
    ?>

    <div style="display: flex; justify-content: space-between">
        <h3><?php echo($row['naziv']); ?></h3>
        <div>
        <button class="btn-danger" style="border-radius: 5px">Izmeni</button>
        <button class="btn-primary" style="border-radius: 5px;">Sacuvaj</button>
        </div>
        </div>
        <div contentEditable="true" class="opis"><?php echo($row['opis']); ?></div>
        <div style=" float:right; ">
        </div>
        <!-- dodato za test-->
        <div>
        <?php
            if($status=="onemogucen" || ($poeni==0.0 && $status=="kreiran"))
            {
        ?>
                <form action="proces.php" method="POST">
                    <input type="hidden" name="status" value="<?php echo $status;?>">
                    <button class="btn-primary" style="border-radius: 5px;" type="submit" name="kreiran_test"> Napravi test </button>
                </form>
        <?php
            }
        ?>
        <?php
            if($poeni>0.0 && $status=="kreiran")
            {
        ?>
                <form action="proces.php" method="POST">
                    <button class="btn-primary" style="border-radius: 5px;" type="submit" name="omoguci_test"> Omoguci test </button>
                </form>
        <?php
            }
        ?>
        <?php
            if($status=="omogucen")
            {
        ?>
                <form action="proces.php" method="POST">
                    <button class="btn-primary" style="border-radius: 5px;" type="submit" name="onemoguci_test"> Onemoguci test </button>
                </form>
        <?php
            }
        ?>  
        </div>  
        <br>
        <div>
            <a href="rezultati_test.php"><button class="btn-primary" style="border-radius: 5px;">Rezultati</button></a>
        </div>   
        <br>       
        <!-- kraj dodatog za test-->



<form method='post'action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype='multipart/form-data'>
<?php
    //postavljanje fajlova po nedeljama
    for ($i=0; $i < 15; $i++) {

        if ($i == 0) {
            echo '<div class="sekcija" style="border-top: 1px solid gray;">';
        }
        else
            echo '<div class="sekcija">';
        echo '<h4>Nedelja '.($i+1).'</h4>
            <ul class="lista" >';

        $result = $mysqli->query("SELECT * FROM fajl WHERE sifra_kursa='$sifra' AND id_sekcije='$i' ORDER BY redni_broj ASC") or die($mysqli->error);
        while($row = $result->fetch_assoc()){
            echo '<li class="fa"><a href="'.$row['lokacija'].'">'.$row['naziv'].'</a></li>';
        }
            echo '<li class="fa"><input type="file" name="files'.$i.'[]" id="files'.$i.'" multiple></li>
            <ul>
        </div>';
    }
?>
    <input type='submit' name='submit' value='Sacuvaj!!!'>
</form>
<?php
    if(isset($_POST['submit'])){
        for ($i=0; $i < 15; $i++) {
            $count_files = count($_FILES['files'.$i]['name']);
            for ($j=0; $j < $count_files; $j++) {
                $file_name = $_FILES['files'.$i]['name'][$j];
                $file_tmp_name=$_FILES['files'.$i]['tmp_name'][$j];
                $file_error=$_FILES['files'.$i]['error'][$j];
                $file_ext=explode('.',$file_name);
                $file_act_ext=strtolower(end($file_ext));
                if($file_error===0){
                    $file_random_name=uniqid('',true).".".$file_act_ext;
                    $file_dest="fajlovi/$file_random_name";
                    move_uploaded_file($file_tmp_name,$file_dest);

                    $files_update = "INSERT INTO fajl (id, naziv, lokacija, tip_fajla, sifra_kursa, id_sekcije, redni_broj, vidljivost) VALUES (0, '$file_name', '$file_dest', '$file_act_ext', '$sifra', '$i', '$j', 0);";
                    mysqli_query($mysqli,$files_update);
                }
            }
        }        
    }
?>
    <?php        
    } 
 } // kraj student sesije 
?>
<?php
    if($_SESSION["tipKorisnika"] == "admin")
    {
    ?>
    <div class='wrapper'>
    <?php
    $sifra = $_SESSION['kurs']; 
    $mysqli = new mysqli('localhost', 'root', '', 'portal') or die(mysqli_error($mysqli));
    $mysqli -> set_charset("utf8");
    
    $result= $mysqli->query("SELECT * FROM kurs WHERE sifra_kursa='$sifra'") or die($mysqli->error);
    while($row = $result->fetch_assoc())
    {
    ?>
    <div style="display: flex; justify-content: space-between">
        <h3><?php echo($row['naziv']); ?></h3>
        <div>
        <button class="btn-danger" style="border-radius: 5px">Izmeni</button>
        <button class="btn-primary" style="border-radius: 5px;">Sacuvaj</button>
        </div>
        </div>
        <div class="opis">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur mollitia reiciendis quia sunt tempore vel totam magni, facere voluptatem nostrum, eum nobis corporis, harum quo delectus aliquid fugiat dolorum possimus. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis quo porro sequi repudiandae ab, sit, nemo architecto sunt fuga debitis laborum unde! Iusto nam ipsa enim fugiat quisquam? Quod, ea! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum aliquid assumenda fugit beatae ratione? Et itaque, iusto quia libero rerum veniam officiis dignissimos nisi, in expedita autem minus consequuntur id!</div>
        <div style=" float:right; ">
        </div>
        <!-- dodato za test -->
        <div>
            <a href="rezultati_test.php"><button class="btn-primary" style="border-radius: 5px;">Rezultati</button></a>
        </div>
        <br>  
        <!-- kraj dodatog za test -->
        <div class="sekcija" style="border-top: 1px solid gray;">
            <h4>Nedelja 1</h4>
        <div>
        <button class="btn-primary" style="border-radius: 5px">Dodaj fajl</button>
        </div>
            <ul class="lista" >
            <div style="justify-content: space-between;">
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf </li>
                <button style="margin-left:1050px; border-radius:5px;" class='btn-danger'>obrisi</button>
            </div>
            <div style="justify-content: space-between;">
                <li class="fa"><a>&#xf15c; </a>Fajl_2.pdf </li>
                <button style="margin-left:1050px; border-radius:5px;" class='btn-danger'>obrisi</button>
            </div>
            <div style="justify-content: space-between;">
                <li class="fa"><a>&#xf15c; </a>Fajl_3.pdf </li>
                <button style="margin-left:1050px; border-radius:5px;" class='btn-danger'>obrisi</button>
            </div>
            <div style="justify-content: space-between;">
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf </li>
                <button style="margin-left:1050px; border-radius:5px;" class='btn-danger'>obrisi</button>
            </div>
            <ul>
        </div>
    
        <div class="sekcija">
            <h4>Nedelja 2</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
    
        <div class="sekcija">
            <h4>Nedelja 3</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
        
        <div class="sekcija">
            <h4>Nedelja 4</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
        <div class="sekcija">
            <h4>Nedelja 5</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
    
        <div class="sekcija">
            <h4>Nedelja 6</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
        
        <div class="sekcija">
            <h4>Nedelja 7</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul class="lista" >
                <li class="fa"><a>&#xf15c; </a>Fajl_1.pdf</li>
                <li class="fa"><a>&#xf15c; </a>Fajl_2.doc</li>
            <ul>
        </div>
        <div class="sekcija">
            <h4>Nedelja 8</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
        </div>
        
        <div class="sekcija">
            <h4>Nedelja 9</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
        </div>
        <div class="sekcija">
            <h4>Nedelja 10</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
        </div>
    
        <div class="sekcija">
            <h4>Nedelja 11</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul>
            <ul>
        </div>
        
        <div class="sekcija">
            <h4>Nedelja 12</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul>
            <ul>
        </div>
        <div class="sekcija">
            <h4>Nedelja 13</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul>
            <ul>
        </div>
        
        <div class="sekcija">
            <h4>Nedelja 14</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul>
            <ul>
        </div>
        <div class="sekcija">
            <h4>Nedelja 15</h4>
        <button class="btn-danger" style="border-radius: 5px">Dodaj fajl</button>
            <ul>
            <ul>
        </div>
    </div>
    <?php        
    } 
 } // kraj student sesije 
?>
<script>
var i = 0;

let openBtn = document.querySelector(".openSideNav");
openBtn.addEventListener("click", () => {
    if (i == 0) {
        showNav();
        i++;
    } else {
        hideNav();
        i--;
    }
});
let closeBtn = document.querySelector(".closeBtn");
closeBtn.addEventListener("click", () => {
   hideNav();
});
function showNav() {
   document.querySelector(".sideNav").style.width = "200px";
   // margina na 0  da ne se guzva sajt
   document.querySelector('.main-content').style.marginLeft = "200px";
}
function hideNav() {
   document.querySelector(".sideNav").style.width = "0";
   document.querySelector('.main-content').style.marginLeft = "0px";
}

</script>
</body>
</html>