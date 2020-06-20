<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Inscription</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">Pratoverde</span> Hôtels</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li class="current"><a href="signup.php">Inscription</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
        </div>
    </section>

    <section id="main">
        <div class="container">
            <article id="main-col">
                <h1 class="page-title">Bienvenue chez nous</h1>

                <div class="dark">
                    <h3>Créez votre compte</h3>

                    <form class="quote" action="signupinsert.php" method="POST">
                        <div>
                            <label>Nom</label><br>
                            <input type="text" placeholder="Nom Complet" name="name" required>
                        </div>
                        <div>
                            <label>Adresse</label><br>
                            <input type="text" placeholder="Adresse" name="address" required>
                        </div>
                        <div>
                            <label>Email</label><br>
                            <input type="email" placeholder="Email" name="email" required>
                        </div>
                        <div>
                            <label>Mot de Passe</label><br>
                            <input type="text" placeholder="Mot de passe" name="password" required>
                        </div>

                        <div>
                            <h5> </h5>
                        </div>
                        <button class="button_1" type="submit" name="inscription">S'inscrire</button>
                        <br></br>
                        <div>
                            <?php
					if (isset($_GET["retour"]) == 'ko')
					{
						echo "Inscription refusée : Cette adresse email existe déjà ! ";
					}
				?>
                        </div>
                    </form>
                </div>
    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
