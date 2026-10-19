<?php
// Configurar las cabeceras para que devuelva JSON
header('Content-Type: application/json');
include "../db/conexion.php";



// Obtener el offset enviado por JavaScript (por defecto 0)
$offset = isset($_POST["offset"]) ? (int)$_POST["offset"] : 0;
$limit = 30;

// Preparar la consulta usando LIMIT y OFFSET para la paginación
$stmt = $pdo->prepare("SELECT id, nombre , descripcion FROM productos LIMIT :limit OFFSET :offset");

// Bind de los parámetros como enteros
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

// Obtener los resultados y devolverlos en JSON
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultados);
