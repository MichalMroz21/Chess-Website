<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="pl">

    <head>

    <meta charset="utf-8"/>
    <meta name="description" content="Strona z informacjami o szachach. 
    Naucz się grać lub ulepsz swoje umiejętności!"/>
    <meta name="keywords" content="szachy, królowa, nauka, kurs, informacje"/>
    <title>Strona o Szachach</title>
    <meta name="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css" type="text/css"/>

    <link rel="shortcut icon" href="favicon/favicon.ico" >

    <script src="jquery-3.6.0.min.js"></script>
    <script src="slajdy.js" defer></script>
    <script src="trybciemny.js" defer></script>

    <noscript>
        <style type="text/css">
             .divzkolami {
               display: none; 
             }
    
             #darktheme
             {
                display: none;
             }
             #darktheme1{
                 display: none;
             }
        </style>
    </noscript>

    </head>




    <body id="0">

        <header>
            
            <div id="nagłówek">
                <img src="img/darktheme1.png" alt="darktheme" id="darktheme1"/>
                <img src= "img/king.png" alt="król" id="krol" />
                <div id="logo">Strona o Szachach</div>
                <img src="img/darktheme1.png" alt="darktheme" id="darktheme"/>
            </div>
        
        </header>

        <nav>

            <div id="nawigacja">

                <ul>
						 <li><a href="index.php">Strona Główna</a></li>
                        
                        <li id="rozwijane">
                            Jak grać
                            <ul>
								<li><a href="ruchy.php">Ruchy</a></li>
                                <li><a href="podstawy.php">Podstawy</a></li>
                                <li><a href="otwarcia.php">Otwarcia</a></li>
                            </ul>
                        </li>
                    
                    <li><a href="gry_arcymistrzow.php">Gry Arcymistrzów</a></li>
                    <li><a href="galeria_formularz.php">Galeria</a></li>
                    <li><a href="zadania_szachowe.php">Zadania Szachowe</a></li>

                    <?php

                        include 'views/przycisk_logowania_wylogowania_view.php';

                    ?>


                    <li><a href="rejestracja_formularz.php">Zarejestruj się</a></li>
                </ul>

            </div>

        </nav>

        <main>

            <article>

                <div id="pojemnik">

                    <section>

                        <div class = "sekcja">

                            <div class="obraz"> 
                                <img src="img-index/Hi1.png" alt="Hi"/> 
                                <svg class="divzkolami">  
                                    <circle r="20" cx="40%" cy="50%" fill="red" stroke="black" class="czerwony"> </circle> 
                                    <circle r="20" cx="60%" cy="50%" fill="green" stroke="black" class="zielony"> </circle> 
                                </svg>    
                            </div>
                            <div class="tekst"> <p class="tekstspecjalny">Witaj na Stronie o Szachach!</p> 
                                Znajdziesz tu informacje o tym jak poprawnie grać w szachy - zasady gry i podstawowe kombinacje oraz
                                otwarcia szachowe. W sekcji Gry Arcymistrzów możesz przejrzeć gry najlepszych graczy na świecie. 
                                Jeśli chcesz polepszyć swoje umiejętności lub sprawdzić
                                się to skorzystaj z Zadań Szachowych. Baw się dobrze!
                            </div>

                        </div>

                    </section>

                    <div id="dolny_pasek"></div>

                </div>

            </article>

        </main>

        <footer>

            <div id="stopka">

                <a href="https://www.youtube.com/channel/UCbdcpQ5uPPymv7Ea0nnFfOw" target="_blank"><div id="yt">Youtube</div></a>
                <a href="https://www.facebook.com/magnuschess/" target="_blank"><div id="fb">Facebook</div></a>
                <a href="https://twitter.com/MagnusCarlsen?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><div id="tw">Twitter</div></a>

            </div>

           <div id="prawa"><p>Strona o Szachach &copy; Wszelkie prawa zastrzeżone!</p></div> 

        </footer>


    </body>



</html>