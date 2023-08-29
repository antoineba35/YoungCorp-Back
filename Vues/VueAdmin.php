<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YoungCorp - Accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <center>
            <div class="haut-page">
                <h1 class="titre"><b>YoungCorp</b></h1>
                <img src="pictures/youngcap.jpg" class="imgProfil" />
            </div>
            <header>
                <div class="nav-bar">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="index.php?action=Accueil">Accueil</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php?action=Accueil">Road to piece</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?action=Accueil">What if</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?action=Accueil">Tweets</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Utilisateur
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="index.php?action=Accueil">Utilisateur</a></li>
                                        <li><a class="dropdown-item" href="index.php?action=Accueil">Parametres</a></li>
                                    </ul>
                                </li>
                                <?php
                                    if(isset($_SESSION['user'])) {
                                        if($_SESSION['user']->getEstAdmin()){
                                            ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="index.php?action=Admin&onglet=users">Administrateur</a>
                                                </li>
                                            <?php
                                        }                                    
                                    } 
                                ?>
                            </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>              
        </center>
        
        <center>
            <div id="menuAdmin">
                <ul id="onglets">
                    <?php
                        if($onglet == 'users') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=users">Utilisateurs</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=users">Utilisateurs</a></li>';
                        }
                        if($onglet == 'actu') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=actu">Actualités</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=actu">Actualités</a></li>';
                        }
                        if($onglet == 'rdp') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=rdp">Road to piece</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=rdp">Road to piece</a></li>';
                        }
                        if($onglet == 'whatif') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=whatif">What if </a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=whatif">What if </a></li>';
                        }
                        if($onglet == 'tweet') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=tweet">Tweets</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=tweet">Tweets</a></li>';
                        }
                        if($onglet == 'sondage') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=sondage">Sondage</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=sondage">Sondage</a></li>';
                        }
                        if($onglet == 'theme') {
                            echo '<li class="active"><a href="index.php?action=Admin&onglet=theme">Themes</a></li>';
                        } else {
                            echo '<li><a href="index.php?action=Admin&onglet=theme">Themes</a></li>';
                        }
                    ?>
                </ul>

                <?php
                    // affichage de la page selon l'onglet selectionnés
                    switch($onglet) {
                        case "users": include('VueAdmin/VueAdminUser/VueAdmin.user.php'); break;
                        case "actu": include('VueAdmin/VueAdmin.actu.php'); break;
                        case "rdp": include('VueAdmin/VueAdmin.rdp.php'); break;
                        case "whatif": include('VueAdmin/VueAdmin.whatif.php'); break;
                        case "tweet": include('VueAdmin/VueAdmin.tweet.php'); break;
                        case "sondage": include('VueAdmin/VueAdmin.sondage.php'); break;
                        case "theme": include('VueAdmin/VueAdmin.theme.php'); break;
                        default: header ("Location: index.php?action=Accueil"); break;
                    }
                ?>
            </div>
        </center>
        
    </body>
</html>