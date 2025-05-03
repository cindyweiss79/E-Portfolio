<?php
require 'config.php';

$sql = "INSERT INTO Indirizzo (ID_Utente, Paese_Indirizzo, Provincia_Indirizzo, Comune_Indirizzo, CAP_Indirizzo, VIA_Indirizzo, Numero_civico)
        VALUES (:id_utente, :paese, :provincia, :comune, :cap, :via, :civico)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':id_utente' => 1,
    ':paese' => 'Italia',
    ':provincia' => 'BZ',
    ':comune' => 'Innichen',
    ':cap' => 39038,
    ':via' => 'J. Cornet',
    ':civico' => '8/c'
]);

echo "Indirizzo inserito!";
?>
