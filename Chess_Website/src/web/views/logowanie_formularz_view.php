<form action="logowanie.php" method="POST">
 
    <p style="color: white; font-size: 24px;"> Zaloguj się <p> <br/>
    <p style="color: white">Login</p>
    <input type="text" name="login"/> <br/> <br/>
    <p style="color: white">Hasło</p>
    <input type="password" name="password"/> <br/> <br/>
    <input type="submit" name="submit" value="Zaloguj się"/> <br/>

     <?php 
        if(isset($_SESSION['blad_log'])){
        echo $_SESSION['blad_log'];
        unset($_SESSION['blad_log']);
        }
    ?>

</form>