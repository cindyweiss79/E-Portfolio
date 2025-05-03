<?php
require 'config.php';

$sql = "INSERT INTO Skill (ID_Utente, Nome_Skill, Percentuale, Link_Media)
        VALUES (:id_utente, :skill, :percentuale, :media)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id_utente' => 1,
    ':skill' => 'PHP',
    ':percentuale' => 85,
    ':media' => 'https://linkallmedia.com'
]);

echo "Skill inserita!";
?>
