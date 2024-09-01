<?php
//session_start(); // Assurez-vous que la session est démarrée en tout début de script

$errorMessages = [];
$successMessage = "";

// Fonction pour générer un token CSRF unique
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Vérifiez le token CSRF lors de la soumission du formulaire
function checkCsrfToken($token) {
    // Vérifiez si le token existe dans la session et comparez-le avec celui soumis
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Token CSRF pour le formulaire
$csrfToken = generateCsrfToken();

// Vérification de l'authentification et des autorisations
// Assurez-vous que seuls les utilisateurs autorisés peuvent accéder à cette page
/* if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: ../../login.php'); // Redirigez les utilisateurs non autorisés
    exit;
} */

// Gestion du téléchargement de fichier
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification du token CSRF
    if (!checkCsrfToken($_POST['csrf_token'] ?? '')) {
        $_SESSION['errorMessages'][] = "Échec de la validation CSRF. Veuillez réessayer.";
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    // Assurez-vous que les données de téléchargement sont définies
    if (isset($_FILES['file_path']) && isset($_POST['nameFile']) && isset($_POST['description']) && isset($_POST['level'])) {
        $file = $_FILES['file_path'];
        $fileName = htmlspecialchars($_POST['nameFile'], ENT_QUOTES, 'UTF-8');
        $fileDescription = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $fileLevel = htmlspecialchars($_POST['level'], ENT_QUOTES, 'UTF-8');
        
        // Vérifiez le type MIME et l'extension du fichier
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        $fileMimeType = mime_content_type($file['tmp_name']);
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (in_array($fileMimeType, $allowedMimeTypes) && in_array($fileExtension, ['jpg', 'jpeg', 'png', 'pdf'])) {
            $uploadDir = __DIR__ . '/upload/'; // Chemin du dossier où les fichiers seront stockés
            $filePath = $uploadDir . uniqid() . '_' . basename($file['name']);
            
            // Vérifiez si le dossier existe
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Créez le dossier si nécessaire avec des permissions appropriées
            }

            // Déplacez le fichier uploadé
            if (move_uploaded_file($file['tmp_name'],  $filePath)) {
                // Insertion des détails du fichier dans la base de données
                try {
                    $pdo = getConecte();
                    $stmt = $pdo->prepare("INSERT INTO files (nameFile, description, level, file_path) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$fileName, $fileDescription, $fileLevel, $filePath]);
                    $_SESSION['successMessage'] = "Fichier enregistré avec succès.";
                } catch (PDOException $e) {
                    $_SESSION['errorMessages'][] = "Erreur lors de l'insertion des détails du fichier : " . $e->getMessage();
                }
            } else {
                // Erreur de déplacement du fichier
                $_SESSION['errorMessages'][] = "Échec du déplacement du fichier téléversé.";
                // Ajoutez une trace pour déboguer
                $_SESSION['errorMessages'][] = "Chemin du fichier temporaire : " . $file['tmp_name'];
                $_SESSION['errorMessages'][] = "Chemin de destination : " . $filePath;
                $_SESSION['errorMessages'][] = "Permissions du dossier : " . substr(sprintf('%o', fileperms($uploadDir)), -4);
            }
        } else {
            $_SESSION['errorMessages'][] = "Type de fichier non autorisé.";
        }
    } else {
        $_SESSION['errorMessages'][] = "Tous les champs du formulaire sont requis.";
    }

    // Redirigez pour prévenir la resoumission du formulaire
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


// Récupération des fichiers et des utilisateurs
try {
    $pdo = getConecte();

    $files = $pdo->query("SELECT * FROM files")->fetchAll();
    $users = $pdo->query("SELECT userid, firstName, lastName, email, studyPath, level FROM users ORDER BY userid ASC, lastName ASC")->fetchAll();
    $fileCount = $pdo->query("SELECT COUNT(*) FROM files")->fetchColumn();
    $usersCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
} catch (PDOException $e) {
    $_SESSION['errorMessages'][] = "Erreur lors de la récupération des données : " . $e->getMessage();

}

// Affichage des messages d'erreur et de succès
if (!empty($_SESSION['errorMessages'])) {
    $errorMessages = $_SESSION['errorMessages'];
    unset($_SESSION['errorMessages']);
}

if (!empty($_SESSION['successMessage'])) {
    $successMessage = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}

/* $uploadDir = __DIR__ . '/../uploads/';
$testFilePath = $uploadDir . 'test.txt';

if (file_put_contents($testFilePath, "Test de permission")) {
    echo "Fichier de test créé avec succès.";
} else {
    echo "Erreur lors de la création du fichier de test.";
} */

?>
