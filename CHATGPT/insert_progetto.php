<?php
require 'config.php';

$sql = "INSERT INTO Progetto (ID_Utente, Titolo_Progetto, Descrizione, link_progetto)
        VALUES (:id_utente, :titolo, :descrizione, :link)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id_utente' => 1,
    ':titolo' => 'Project 01',
    ':descrizione' => 'Descrizione del progetto',
    ':link' => 'https://linkprogetto.com'
]);

echo "Progetto inserito!";
?>
