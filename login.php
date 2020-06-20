<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>Connexion</title>
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
                    <li class="current"><a href="login.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="newsletter">
        <div class="container">
            </form>
            </nav>
        </div>
    </section>

    <section id="main">
        <div class="container">
            <article id="main-col">
                <h1 class="page-title">Trois différents Hôtels</h1>
                <ul id="services">
                    <li>
                        <h3>Pratoverde Limoges</h3>
                        <p>L'hôtel Pratoverde Limoges est situé dans le centre de Limoges. À proximité des restaurants, des rues commerçantes, du centre historique de Limoges et du musée de la porcelaine Adrien Dubouché, il sera le point de départ idéal pour visiter Limoges.</p>
                    </li>
                    <li>
                        <h3>Pratoverde Périgueux</h3>
                        <p>Heureux de vous accueillir à Périgueux ! Idéalement situé pour déambuler dans les rues du centre historique, visiter la cathédrale St-Front, flâner le long de l'Isle, découvrir le quartier Vesunna ou profiter de sa gastronomie, vous serez les bienvenus !</p>
                    </li>
                    <li>
                        <h3>Pratoverde Toulouse</h3>
                        <p>Toulouse, la ville rose vous accueille ! De l'hotel Pratoverde Toulouse partez visiter le centre historique à pied, de la basilique Saint-Sernin à la place du Capitole, en passant par les bords du canal du midi ou de la Garonne. Des sites facilement accessibles depuis l'hôtel pour vous accompagner dans votre séjour.</p>
                    </li>
                </ul>
            </article>

            <aside id="sidebar">
                <div class="dark">
                    <h3>Connectez vous</h3>
                    <form class="quote" action="check.php" method="POST">
                        <div>
                            <label>Email</label><br>
                            <input type="email" placeholder="Email" name="email" required>
                        </div>
                        <div>
                            <label>Mot de passe</label><br>
                            <input type="text" placeholder="Mot de passe" name="password" required>
                        </div>
                        <div>
                            <label>Type de compte</label><br>
                        </div>
                        <div>
                            <div>
                                <input type="radio" name="type" value="c" required>Client

                                <input type="radio" name="type" value="a" required>Administrateur
                            </div>
                            <div>
                                <h5> </h5>
                            </div>
                            <button class="button_1" type="submit">Connexion</button><br></br>
                            <div>
                                <?php 
						if (isset($_GET["retour"])){
							echo "Désolé, mais il semble que vous n'ayez pas de compte";
						}  
 
			?>
                            </div>
                    </form>

                </div>
            </aside>
        </div>
    </section>

    <footer>
        <p>Créé par Benjamin & Simon</p>
    </footer>
</body>

</html>
