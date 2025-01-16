<?php
if (isset($_POST["usuario"])) {
    require_once 'conexiondb.php';
    $usuario = $_POST['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stm = $conexion->prepare($sql);
    $stm->bindParam(':usuario', $usuario);
    $stm->execute();
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    $password = $_POST['password'];
    if ($usuario && password_verify($password, $usuario['password'])) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $usuario['id'];
        header('Location: nuevaFoto.php');
    } else {
        echo 'Usuario o contraseña incorrectos';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar sesión">
    </form>

</body>

</html>