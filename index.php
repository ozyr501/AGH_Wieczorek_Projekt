<?php session_start(); ?>
<!doctype html>

<html lang="pl">

<head>
    <title>Kino</title>
    <meta charset="utf-8">
    <meta name="description" content="Strona do zererwacji biletów. Stworzona w ramach projektu zaliczeniowego z przedmiotu JPiA">
    <meta name="author" content="Krzysztof Wieczorek">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleindex.css">
    <script src="script.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.3.min.js"></script>
</head>

<body>
    <header>
        <div id="titlepic">
            <picture>
                <source srcset="logo.gif" alt="Logo" media="(min-width: 700px)">
                <img src="logosmall.gif" alt="Logo">
            </picture>
        </div>
        <div id="menubutton">
            <img src="icon/Hamburger.png" alt="Menu">
        </div>
    </header>
    <nav id="menu-bar" class="MenuHide">
        <div>
            <a href="index.php" class="MenuButton">Strona główna</a>
        </div>
        <div>
            <a href="repertuar.php" class="MenuButton">Repertuar</a>
        </div>
        <div>
            <a href="ticket.php" class="MenuButton">Walidacja biletu</a>
        </div>
        <div>
            <a href="address.php" class="MenuButton">Kontakt</a>
        </div>
        <div id="loginmenu">
            <a href="loginpage.php" id="login_redirect" class="MenuButton">zaloguj</a>
            <div id="ddlogin">zaloguj</div>
            <div id="dropdown" class="hide">
                <form action="login.php" method="POST">
                    <label for="login">Login:</label><br />
                    <input type="text" id="login" name="login"><br />
                    <label for="pass">Hasło:</label><br />
                    <input type="password" id="pass" name="pass"><br />
                    <input type="submit" value="zaloguj" name="log"><br />
                </form>
                <a href="registerpage.php">Nie masz konta? Zarejstruj się!</a>
            </div>
        </div>
    </nav>
    <main>
        <section>
            <h1>Trochę o nas</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien leo, aliquam ut bibendum ut, malesuada id purus.
                Mauris maximus hendrerit nisl, vel tristique turpis convallis quis. Interdum et malesuada fames ac ante ipsum primis in
                faucibus. Vivamus vitae sapien tristique, tempor felis at, ornare nunc. Maecenas hendrerit quam eget mauris blandit, sit
                amet congue felis rhoncus. Maecenas congue congue accumsan. Phasellus at est id odio tempus vestibulum. Nunc tristique
                libero diam. Pellentesque ut iaculis elit. Fusce euismod bibendum mi, at ultrices neque varius eget. Proin laoreet a ex
                sit amet vulputate. Proin vel blandit arcu. Pellentesque cursus consectetur nisi, nec mollis dui finibus consectetur.
                <br />
            </p>
        </section>
        <article id="movies">
            <h3>Polecane filmy:</h3>
            <div id="list">
                <?php
                $link = mysqli_connect("localhost", "FilmViewer", "", "kino");
                if (!$link) {
                    echo ("Błąd bazy danych. Bardzo przepraszamy");
                    exit();
                }
                $que = "SELECT NAZWA, OCENA FROM filmy ORDER BY OCENA DESC LIMIT 6";
                $result = $link->query($que);
                ?>
                <ul class="flex-films">
                    <?php foreach ($result as $film) : ?>
                        <li class='flex-film'>
                            <?php echo ($film["NAZWA"]) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </article>
    </main>
    <script>
        $('body').click(function(e) {
            if ($(window).width() >= 700) {
                if (e.target.id == "loginmenu" || $(e.target).closest('#loginmenu').length > 0) {
                    showDropdown();
                    return;
                }
                if (e.target.id == "ddlogin" && $("#dropdown").hasClass("show")) {
                    hideDropdown();
                    return;
                }
                if ($("#dropdown").hasClass("show")) {
                    hideDropdown();
                    return;
                }
            } else {
                if (e.target.id == "menubutton" || $(e.target).closest('#menubutton').length > 0) {
                    if ($("#menu-bar").hasClass("MenuHide")) {
                        showMenu();
                    } else {
                        hideMenu();
                    }
                }
            }
        });
    </script>
</body>

</html>