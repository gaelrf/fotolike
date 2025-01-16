<?php

session_start();
if (isset($_SESSION["id"])) {
    if (isset($_GET["idfoto"])) {
        require_once("conexiondb.php");
        try {
            $sql = "INSERT INTO likes (idfoto, idusuario) VALUES (:idfoto, :idusuario)";
            $stm = $conexion->prepare($sql);
            $stm->bindParam(":idfoto", $_GET["idfoto"]);
            $stm->bindParam(":idusuario", $_SESSION["id"]);
            $stm->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        header("Location: index.php");
    }
}
header(header: "Location: index.php");

?>