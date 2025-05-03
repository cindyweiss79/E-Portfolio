
<?php

$id_utente = 1;

//Parametri di connessione al database
$servername = "localhost";
$username = "root";
$password ="";
$database = "E-Portfolio";

//connessione al database
$conn = new mysqli($servername, $username, $password, $database);

//verifica di connessione
if ($conn->connect_error) {
    die("Connessione del database fallita:".$conn->connect_error);
}

//faccio una Query al database per prendere i dati dell'utente 1
$query1 = "SELECT * FROM Utente WHERE ID_Utente=$id_utente";
$Utente = $conn->query($query1);

//controllo se ho ricevuto i dati e li rendo leggibili dal php
if($Utente->num_rows>0) {
    $UtenteNew = $Utente->fetch_assoc();
}

//questi servono per visualizzare se ho ricevuto i valori correttamente dal database di MySQL
/*foreach ($UtenteNew as $key => $value) {
    echo $key." ".$value.", ";
}*/

//query skills
$query2 = "SELECT * FROM Skill WHERE ID_Utente=$id_utente";
$Skills = $conn->query($query2);

//controllo se ho ricevuto i dati e li rendo leggibili dal php
if($Skills->num_rows>0) {
    $SkillsNew = $Skills->fetch_all();
}

//questi servono per visualizzare se ho ricevuto i valori correttamente dal database di MySQL
/*
foreach ($SkillsNew as $key => $value) {
    echo "<br>".$key.", ";
    foreach ($value as $key2 => $value2) {
        echo $key2." ".$value2.", ";
    }
}*/



?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="header">
        
    <ul class="nav justify-content-center">
        <li class="nav-item"><a class="nav-link active text-white" aria-current="page" href="#">HOME</a>
        </li>
        <li class="nav-item"><a class="nav-link active text-white" href="#experience">EXPERIENCE</a>
        </li>
        <li class="nav-item"><a class="nav-link active text-white" href="#portfolio">PORTFOLIO</a>
        </li>
        <li class="nav-item"><a class="nav-link active text-white" href="mailto:cindy.weiss@outlook.it">CONTACT</a>
        </li>
    </ul>



<div class="container-fluid video-background">
    <video autoplay muted loop playsinline>
        <source src="image/video_cindy.mp4" type="video/mp4">
    </video>
    
    <div class="video-overlay text-uppercase">
        <div class="p-4 bg-opacity-75 rounded text-white d-inline-block">
            <h1 class="display-4 fw-bold">I<span class="text-success">'</span>M</h1>
            <h1 class="display-4 fw-bold"><?= htmlspecialchars($UtenteNew["Nome"]) ?></h1>
            <h1 class="display-4 fw-bold"><?= htmlspecialchars($UtenteNew["Cognome"]) ?><span class="text-success">.</span></h1>
            <h5 class="mt-4" style="max-width: 200px;"><?= htmlspecialchars($UtenteNew["Professione"]) ?></h5>
        </div>
    </div>
</div>

<img src="https://images.pexels.com/photos/20066246/pexels-photo-20066246/free-photo-of-among-others-se-ti-piace-il-mio-lavoro-considera-di-supportarmi-su-https-www-patreon-com-marek-piwnicki.jpeg?auto=compress&cs=tinysrgb&w=1600">
</header>

<main>
    <div id="containerPrimo" class="container-md fluid">
        <div class="row align-items-start">
            <div class="col-md-12 mb-5">
                <div id="cardPrimo"  class="card p-4">
                    <p><?= htmlspecialchars($UtenteNew["descrizione"]) ?>
                    </p>
                    <div class="text-center mt-3">
                    <a href="image/curriculumIT.pdf" class="btn btn-outline-success btn-sm btn-center custom-btn" download>DOWNLOAD RESUME</a>
                </div>
            </div>
            </div>
        </div>
    </div>

<!--Software skills-->
    <div id="containerSecondo" class="container-md fluid" style="background-color: transparent;">
        <div class="row align-items-start" style="background-color: transparent; ">
            <div class="col-md-12 mb-3" style="background-color: transparent; ">
                <div id="cardSecondo" class="card p-4" style="background-color: transparent; border-color: transparent;">
                    <h1 class="text text-center" style="color: rgb(57, 63, 87)"><span style="color:darkgray">01</span> PROFESSIONAL</h1>
                    <br>
                    <h4 class="text text-center" style="color: rgb(57, 63, 87); font-weight: lighter;">MY KNOWLEDGE LEVEL IN SOFTWARE</h4>
                    <br>
                    <?php
                        foreach ($SkillsNew as $key => $Skill) {
                            echo "
                            <label for='text' ".( $key==0?"style='color: rgb(57, 63, 87)'":"").">".$Skill[2]."</label>
                            <div class='progress'> 
                            <div class='progress-bar progress-bar-striped progress-bar-animated bg-s
                            uccess' style='width: ".$Skill[3]."%'>".$Skill[3]."%</div>
                            </div>
                            <br>";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--My latest Work-->
    <div id="containerTerzo" class="container-md fluid">
        <div class="row align-items-start">
            <div class="col-md-12 mb-3">
                <div id="cardTerzo" class="card p-4">
                    <h1 id="portfolio" class="text text-center"><span style="color:lightgrey">02</span> PORTFOLIO</h1>
                    <img src="image/E_Portfolio_Freeform.jpg" alt="Portfolio Preview">
                    <br><a href="image/E_Portfolio_Freeform.pdf" class="btn"></a>
                    <a href="image/CoronaAutofficina.pdf" class="btn"><h4 class="text text-center" style="font-weight: lighter">MY LATEST WORK. SEE MORE ></h4></a>
                </div>
            </div>
        </div>
    </div>

<!--Experience-->
    <div id="containerTerzo" class="container-md fluid">
        <div class="row align-items-start">
            <div class="col-md-12 mb-3">
                <div id="cardTerzo" class="card p-4">
                    <h1 id="experience" class="text text-center"><span style="color:lightgrey">03</span> EXPERIENCE</h1>
                    <div class="text text-center mt-3">
                        <a href="http://localhost/corso/Cavallini/" style="display:block; margin-bottom: 10px;">Cavallinis Appartments</a>
                         <a href="http://localhost/corso/adventusiast%20in%20php/" style="display:block; margin-bottom: 10px;">Adventusiast</a>
                         <a href="http://127.0.0.1:3002/" style="display:block;">Corona Autofficina</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="scrollTopBtn" class="btn btn-outline-success btn-sm btn-center custom-btn">
    ↑ Torna su
  </button>

</main>



<?php include('includes/footer.php'); ?>

<p id="contact" style="text-align: center ;">Contattami su <a href="https://www.linkedin.com">LinkedIn</a> o visita il mio <a href="https://github.com">GitHub</a></p>


<!-- Poi Popper e Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

<!-- Poi il tuo script.js -->
<script src="script.js"></script>
</body>
</html>










