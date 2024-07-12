<?php
// Verifica si se recibió la información del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera el valor del campo 'age' enviado por el formulario
    $age = $_POST['age'];

    // Configuración de la conexión a la base de datos
    $servername = "localhost"; // Cambia esto según tu servidor de base de datos
    $username = "root"; // Cambia esto según tu usuario de base de datos
    $password = ""; // Cambia esto según tu contraseña de base de datos
    $dbname = "base"; // Cambia esto según el nombre de tu base de datos

    // Intenta establecer la conexión utilizando mysqli
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Prepara una consulta SQL para insertar la edad en una tabla 'usuarios'
    $sql = "INSERT INTO definitiva (edad) VALUES ($age)";

    // Ejecuta la consulta y verifica si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}

