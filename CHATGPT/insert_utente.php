<?php
require 'config.php';

$sql = "INSERT INTO Utente (Nome, Cognome, Professione, Curriculum, Email, Telefono, Località)
        VALUES (:nome, :cognome, :professione, :curriculum, :email, :telefono, :localita)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => 'Cindy',
    ':cognome' => 'Weiss',
    ':professione' => 'Full Stack Web Developer',
    ':curriculum' => 'link_al_curriculum.pdf',
    ':email' => 'cindy.weiss@outlook.it',
    ':telefono' => '3496051086',
    ':localita' => 'Innichen (BZ)'
]);

echo "Utente inserito con successo!";
?>
