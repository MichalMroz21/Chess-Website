
<?php

    function czyNazwaInKoszyk($nazwa){
        $flaga = 0;
        for($i=0; $i<count($_SESSION['koszyk']); $i++){
            if($nazwa == $_SESSION['koszyk'][$i]){
                $flaga = 1;
            }
        }
        return $flaga;
    }

?>




<div id="galeria">

    <?php 
        $zmienna = '/images/';

        if(!isset($_SESSION['koszyk'])) $_SESSION['koszyk'] = array();

        if(isset($_SESSION['nazwyObrazkow'])) unset($_SESSION['nazwyObrazkow']);

        for($i=0; $i<$pageSize; $i++){

            $flaga = 1;

            if($_SESSION['ktoraGaleria']){
                if(!czyNazwaInKoszyk($tab[$i][0])){
                    $flaga = 0;
                }
                if($tab[$i][3]=='prywatne'){
                    if($tab[$i][1]!=$nick){
                        $flaga = 0;
                    }
                }
            }
            else{
                if($tab[$i][3]=='prywatne'){
                    if($tab[$i][1]!=$nick){
                        $flaga = 0;
                    }
                } 
            }

            if(($tab[$i][0] != "") && $flaga) {
                echo '<div class="zdjecie"><a href=' . '"' . $zmienna . 'watermark_' . $tab[$i][0] . '"' . 'target="_blank"><img src=' . '"' . $zmienna . 'thumbnail_' . $tab[$i][0] . '"' . 'alt="magnus_carlsen"></a> <p style="text-align:center; color: white;">' . 'Tytuł: ' . $tab[$i][2] . '<br/> <br/>' . 'Autor: ' . $tab[$i][1] . '<br/> <br/>' . 'Dostęp: ' . $tab[$i][3] . '</p></div>';

            }

        }

    
     ?>
                        
</div>



<?php

$_SESSION['nazwyObrazkow'] = array();

$flag = 0;

for($i=0; $i<$pageSize; $i++){

    $flaga = 1;

    if($_SESSION['ktoraGaleria']){
        if(!czyNazwaInKoszyk($tab[$i][0])){
            $flaga = 0;
        }
        if($tab[$i][3]=='prywatne'){
            if($tab[$i][1]!=$nick){
                $flaga = 0;
            }
        }
    }
    else{
        if($tab[$i][3]=='prywatne'){
            if($tab[$i][1]!=$nick){
                $flaga = 0;
            }
        } 
    }

    if(($tab[$i][0] != "") && $flaga) {
        $_SESSION['nazwyObrazkow'][$i] = $tab[$i][0];
        $flag = 1;
    }
    else{
        $_SESSION['nazwyObrazkow'][$i] = 'null';
    }

}

if($flag){

    echo '<div style="align-items: center; display: flex; flex-direction: column; gap: 10px;">';

    $wiadomosc = $_SESSION['ktoraGaleria'] ? 'Usuń zdjęcia z koszyka' : 'Dodaj zdjęcia do koszyka';

    echo '<p style="color:white; margin-bottom; 10px;">' . $wiadomosc . '</p>';

    $wiadomosc = $_SESSION['ktoraGaleria'] ? 'koszyk_odejmowanie.php' : 'koszyk_dodawanie.php';

    echo '<form method="POST" action="' . $wiadomosc . '">';
    
                    for($j=0; $j<$pageSize; $j++){

                        $f = 1;

                        if($_SESSION['ktoraGaleria']){
                            if(!czyNazwaInKoszyk($tab[$j][0])){
                                $f = 0;
                            }
                            if($tab[$j][3]=='prywatne'){
                                if($tab[$j][1]!=$nick){
                                    $f = 0;
                                }
                            }
                        }
                        else{
                            if($tab[$j][3]=='prywatne'){
                                if($tab[$j][1]!=$nick){
                                    $f = 0;
                                }
                            } 
                        }
    
                        if(($tab[$j][0] != "") && $f){
                            echo ($j+1) . '.';
    
                            $flaga = 0;

                            if(!$_SESSION['ktoraGaleria']){

                                for($k=0; $k<count($_SESSION['koszyk']); $k++){
    
                                    if($_SESSION['koszyk'][$k]==$tab[$j][0]) $flaga = 1;
        
                                }

                            }
    
    
                            if($flaga){
                                echo '<input type="checkbox" name="box' . $j . '" checked>';
                            }
                            else{
                                echo '<input type="checkbox" name="box' . $j . '">';
                            }
    
                            
                        }
                    }

                $wiadomosc = $_SESSION['ktoraGaleria'] ? 'Usuń zaznaczone z zapamiętanych' : 'Zapamiętaj wybrane';
    
                echo '<input type="submit" value="' . $wiadomosc . '" name="submit"/>';
    
                echo '</form>';

    echo '</div>';

}

?>


<div style="text-align: center; margin-top: 25px;">
    <a href="galeria_dane_pre_minus.php" style="margin-right:10px; text-decoration: none; color: blue;">Poprzednia strona</a>
    <a href="galeria_dane_pre_plus.php" style="margin-left: 10px; text-decoration: none; color:blue;">Następna strona</a>
</div>