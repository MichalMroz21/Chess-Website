<form enctype="multipart/form-data" action="upload.php" method="POST">
 
                                    <p style="color: white; font-size: 24px;">Dodaj zdjęcie do galerii</p>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576"/> <br/>
                                    <input name="image" type="file"/> <br/>
                                    <?php 

                                    if(isset($_SESSION['blad_plik_wybranie'])){
                                        echo $_SESSION['blad_plik_wybranie'];
                                        unset($_SESSION['blad_plik_wybranie']);
                                        }

                                    if(isset($_SESSION['blad_plik_obrazek'])){
                                        echo $_SESSION['blad_plik_obrazek'];
                                        unset($_SESSION['blad_plik_obrazek']);
                                        }

                                    if(isset($_SESSION['blad_plik_istnieje'])){
                                        echo $_SESSION['blad_plik_istnieje'];
                                        unset($_SESSION['blad_plik_istnieje']);
                                        }

                                    if(isset($_SESSION['blad_plik_format'])){
                                        echo $_SESSION['blad_plik_format'];
                                        unset($_SESSION['blad_plik_format']);
                                        }

                                    if(isset($_SESSION['blad_plik_rozmiar'])){
                                        echo $_SESSION['blad_plik_rozmiar'];
                                        unset($_SESSION['blad_plik_rozmiar']);
                                        }
                                        
                                    ?> 
                                    <p style="color: white;">Znak wodny<p> <input name="znakwodny" type="text"/> <br/>
                                    <?php
                                    if(isset($_SESSION['blad_znakwodny'])){
                                        echo $_SESSION['blad_znakwodny'];
                                        unset($_SESSION['blad_znakwodny']);
                                        }
                                        
                                    ?>
                                    <?php
                                    if(isset($_SESSION['zalogowany'])) echo '<p style="color: white;">Autor<p><input name="author" type="text" value="'.$nick.'" readonly/> <br/>';
                                    else echo '<p style="color: white;">Autor<p><input name="author" type="text"/> <br/>';
                                    ?>
                                    <?php
                                    if(isset($_SESSION['blad_author'])){
                                        echo $_SESSION['blad_author'];
                                        unset($_SESSION['blad_author']);
                                        }
                                        
                                    ?>
                                    <p style="color: white;">Tytuł<p><input name="title" type="text"/> <br/> <br/>

                                    <?php
                                    if(isset($_SESSION['zalogowany'])){
                                        echo '<input type="radio" id="publiczne" name="dostep" value="publiczne">';
                                        echo '<label for="publiczne">Publiczne</label><br/>';
                                        echo '<input type="radio" id="prywatne" name="dostep" value="prywatne">';
                                        echo '<label for="prywatne">Prywatne</label><br/>';
                                        echo '<br/>';
                                    }
                                    ?>

                                    <?php
                                    if(isset($_SESSION['blad_tytul'])){
                                        echo $_SESSION['blad_tytul'];
                                        unset($_SESSION['blad_tytul']);
                                        }
                                        
                                    ?>
                                    
                                    <input type="submit" value="Prześlij plik" name="submit"/>
                                    <?php
                                    if(isset($_SESSION['udalo_sie_wyslac_pliki'])){
                                        echo $_SESSION['udalo_sie_wyslac_pliki'];
                                        unset($_SESSION['udalo_sie_wyslac_pliki']);
                                        }
                                        
                                    ?>
                                    <?php
                                    if(isset($_SESSION['nie_udalo_sie_wyslac_pliki'])){
                                        echo $_SESSION['nie_udalo_sie_wyslac_pliki'];
                                        unset($_SESSION['nie_udalo_sie_wyslac_pliki']);
                                        }
                                        
                                    ?>
                                    <?php
                                    if(isset($_SESSION['plik_nie_zostal_wyslany'])){
                                        echo $_SESSION['plik_nie_zostal_wyslany'];
                                        unset($_SESSION['plik_nie_zostal_wyslany']);
                                        }
                                        
                                    ?>
									
									<br/> <br/> <br/>

									<p><a href="galeria_add_pre.php" style="text-decoration: none; color: red; font-size: 24px;">Przejście do galerii zdjęć</a></p>
									<p><a href="galeria_del_pre.php" style="text-decoration: none; color: yellow; font-size: 24px;">Przejście do koszyka</a></p>
                                    <a href="galeria_wyszukiwarka.php" style="text-decoration: none; color: blue; font-size: 24px;">Przejście do wyszukiwarki</a></p>


</form>