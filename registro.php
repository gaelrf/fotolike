<?php
    if(isset($_POST['usuario'])){
        require_once 'conexiondb.php';
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (usuario, email, password) VALUES (:usuario, :email, :password)";
        $stm = $conexion->prepare($sql);
        $stm->bindParam(":usuario", $usuario);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":password", $password);
        $stm->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="" method="post">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Correo" required>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <input type="submit" value="Registrarse">
    </form>
    
</body>
</html>