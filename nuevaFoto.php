<?php
session_start();
if (isset($_SESSION["id"])) {
    if (isset($_POST["titulo"])) {
        $titulo = $_POST['titulo'];
        $foto = $_FILES['foto'];
        $nombreFoto = $foto['name'];
        $tipoFoto = $foto['type'];
        $tamanoFoto = $foto['size'];
        $tmpFoto = $foto['tmp_name'];
        $errorFoto = $foto['error'];
        if ($tamanoFoto <= 1000000) {
            $ruta = "fotos/" . $nombreFoto;
            if (move_uploaded_file($tmpFoto, $ruta)) {
                echo "Foto subida correctamente";
            }
        } else {
            echo "El tamaño de la foto es demasiado grande";
        }
    }
} else {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo" required>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" required>
        <input type="submit" value="Subir">
</body>

</html>