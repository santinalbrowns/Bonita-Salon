<?php

use app\core\Application;

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonita Salon</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="./assets/boxicons/boxicons.css" />
    <script src="./assets/js/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    

</head>

<body>
    <!--header content-->
    <header>
        <nav>
            <a href="/" class="brand">
                Bonita Salon
            </a>

            <ul>

                <?php if (Application::isGuest()) : ?>
                    <li><a href="http://www.bonitasalon.com/" class="active">Home</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="/login">Login</a></li>
                <?php else : ?>
                    <li><a href="/logout">Logout</a></li>
                    <li><a @click="openModal">BOOK NOW</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <!--main content-->
        {{content}}
        <!--is a place holder-->
    </main>

    <footer>
        <!--footer content-->
        <nav>
            <a href="/" class="brand">
                Bonita Salon
            </a>

            <ul>
                <li><a href="http://www.bonitasalon.com">Home</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </footer>

</body>

</html>