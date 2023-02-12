<form action="rejestracja.php" method="POST">
 
    <p style="color: white; font-size: 24px;"> Rejestracja nowego użytkownika <p> <br/>

    <p style="color: white;"> E-mail </p> <input type="text" name="email"/> <br/> <br/>
        <?php 
            if(isset($_SESSION['blad_email'])){
                echo $_SESSION['blad_email'];
                unset($_SESSION['blad_email']);
                }
        ?>
        <p style="color: white;"> Login </p> <input type="text" name="login"/> <br/> <br/>
        <?php 
            if(isset($_SESSION['blad_login'])){
                echo $_SESSION['blad_login'];
                unset($_SESSION['blad_login']);
                }
        ?>
        <p style="color: white;"> Hasło </p> <input type="password" name="password"/> <br/> <br/>
        <?php 
            if(isset($_SESSION['blad_haslo'])){
                echo $_SESSION['blad_haslo'];
                unset($_SESSION['blad_haslo']);
                }
        ?>
        <p style="color: white;"> Powtórz Hasło </p> <input type="password" name="passwordR"/> <br/> <br/>
        <?php 
            if(isset($_SESSION['blad_hasloR'])){
                echo $_SESSION['blad_hasloR'];
                unset($_SESSION['blad_hasloR']);
                }
        ?>
        <input type="submit" value="Zarejestruj się"/>
        <?php
            if(isset($_SESSION['bladPowt'])){
                echo $_SESSION['bladPowt'];
                unset($_SESSION['bladPowt']);
                }
                                    
            if(isset($_SESSION['powodzenieRejestracji'])){
                echo $_SESSION['powodzenieRejestracji'];
                unset($_SESSION['powodzenieRejestracji']);
                }
                                    
            if(isset($_SESSION['niepowodzenieRejestracji'])){
                echo $_SESSION['niepowodzenieRejestracji'];
                unset($_SESSION['niepowodzenieRejestracji']);
                }
        ?>

</form>