<?php

include 'connection.php';

$sql = "DELETE FROM pet WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);

$stmt->execute();
$conn->close();

header('Location: index.php');