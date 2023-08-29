<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>YoungCorp - Accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
                <div class="connecter">
                    <svg id="show" xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>           
                </div>
            </header>
            <dialog id="DialogExample">
                <center>
                    <h1>Se connecter</h1>
                    <svg  id="hide" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </center>
                <form autocomplete="off" method="post" action="index.php?action=Connecter" >
                    <p id="message-erreur"><?php echo $message; ?></p>
                    <label for="Pseudo">Pseudo : </label>
                    <input type="text" name="Pseudo" id="Pseudo" autocomplete="off" required />
                    <br />
                    <label for="Mdp">Mot de passe : </label>
                    <input type="password" name="Mdp" id="Mdp" autocomplete="off" required />
                    <br />
                    <input type="submit" id="btnConnecter" name="btnConnecter" value="Se connecter" />
                </form>
            </dialog>
            <script type="text/JavaScript">
                (function() {  
                        var dialog = document.getElementById('DialogExample');  
                        document.getElementById('show').onclick = function() { dialog.show();  
                    }; 
                    document.getElementById('hide').onclick = function() { dialog.close();  
                    }; 
                })();
            </script>
        </center>

    </body>
</html>