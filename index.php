<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
}
include("conexiondb.php");
$sql="SELECT fotos.*, COUNT(likes.id) as num_likes FROM fotos LEFT JOIN likes ON fotos.id = likes.idfoto GROUP BY fotos.id;";
$fotos = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotos</title>
</head>
<body>
    <h1>Fotos</h1>
    <a href="registro.php">Registrarse</a>
    <a href="login.php">Iniciar sesión</a>
    <a href="nuevaFoto.php">Subir foto</a>
    <?php foreach($fotos as $foto): ?>
        <div>
            <h2><?php echo $foto['titulo']; ?></h2>
            <img src="<?php echo $foto['foto']; ?>" alt="<?php echo $foto['titulo']; ?>">
            <p><?php echo $foto['num_likes']; ?> Likes</p>
            <a href="like.php?idfoto=<?php echo $foto['id']; ?>">Like</a>
        </div>
    <?php endforeach; ?>
</body>
</html>