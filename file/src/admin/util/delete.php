<?php
include_once dirname(__DIR__). '/src/bootstrap.php';

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];
    // Supprimer le fichier de la base de données
    $stmt = $pdo->prepare("DELETE FROM files WHERE id = ?");
    $stmt->execute([$fileId]);
    // Retourner un message de succès
    echo json_encode(['success' => true]);
} else {
   // echo json_encode(['success' => false]);
}
?>
