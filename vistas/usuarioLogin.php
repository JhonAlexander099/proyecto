<?php
use controladores\ControladorUsuario;
include_once "config/autoload.php";
include_once "vistas/layout/header.php";
session_start();
session_destroy();
?>
<div class="position-absolute top-50 start-50 translate-middle">
<h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1> 
<form method="post" action="?login">
    <input class='form-control mb-2' type="text" name="user" placeholder="Correo">
    <input class='form-control' type="password" name="pass" placeholder="Contraseña">
    <div class="mt-2 mx-5">
        <a href="?registrar-usuario">registrar usuario</a>
    </div>
    <input class='w-100 btn btn-lg btn-primary mt-3' type="submit" name="submit" value="Login">
</form>
</div>
<?php
if(!empty($_POST)){
    $user = htmlentities(trim($_POST["user"]));
    $pass = htmlentities(trim($_POST["pass"]));

    
    $controladorUsuario = new ControladorUsuario();
    $controladorUsuario->login($user, $pass);
}
include_once "vistas/layout/footer.php";

