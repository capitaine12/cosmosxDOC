<?php
include_once __DIR__ . '/../bootstrap.php';

$errorMessages = [];
$successMessage = "";

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ensure the $_FILES array is set
    if (!isset($_FILES['file_path']) && !isset($_POST['nameFile']) && !isset($_POST['description']) && !isset($_POST['level'])) {
        $file = $_FILES['file_path'];
        $fileName = $_POST['nameFile'];
        $fileDescription = $_POST['description'];
        $fileLevel = $_POST['level'];
        $filePath =   '../../docs/' . basename($file['name']);
    //var_dump($filePath);

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Inseret les détails du fichier dans la basse de donnée

            try {

                $pdo = getConecte();
                // Prepare the statement with the correct column names
                $stmt = $pdo->prepare("INSERT INTO files (nameFile, description, level, file_path) VALUES (?, ?, ?, ?)");
                $stmt->execute([$fileName, $fileDescription, $fileLevel, $filePath]);
                $_SESSION['successMessage'] = "Fichier enregistré avec succès.";
            } catch (PDOException $e) {
                $_SESSION['errorMessages'][] = "Erreur lors de l'insertion des détails du fichier : " . $e->getMessage();
            }
        } else {
            $_SESSION['errorMessages'][] = "Échec du déplacement du fichier téléchargé.";
        }
    } else {
        $_SESSION['errorMessages'][] = "Tous les champs du formulaire sont obligatoires.";
    }

    // Redirect to the same page to prevent form resubmission
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
// Fetch files and users 

try {

    $pdo = getConecte();

    $files = $pdo->query("SELECT * FROM files")->fetchAll();
    $users = $pdo->query("SELECT userid, firstName, lastName,email,studyPath, level FROM users  ORDER BY userid ASC,lastName  ASC")->fetchAll();
    $fileCount = $pdo->query("SELECT COUNT(*) FROM files")->fetchColumn();
    $usersCount = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
} catch (PDOException $e) {

    $_SESSION['errorMessages'][] = "Error fetching data: " . $e->getMessage();
}

// Display error and success messages
if (!empty($_SESSION['errorMessages'])) {

    $errorMessages = $_SESSION['errorMessages'];
    unset($_SESSION['errorMessages']);
}

if (!empty($_SESSION['successMessage'])) {

    $successMessage = $_SESSION['successMessage'];
    unset($_SESSION['successMessage']);
}
?>



<!--link style of admine page -->

<link rel="stylesheet" href="../../asset/css/style.css">

<body>
    <header>
        <div class="logo">COSMOS X DOC - Admin</div>
        <nav>
            <ul>
                <li><a href="../../index.php">Accueil</a></li>
                <li><a href="./../../public/documents.php">Documents</a></li>
                <li><a href="#gestion-fichiers">Gestion des fichiers</a></li>
                <li><a href="#gestion-utilisateurs">Gestion des utilisateurs</a></li>
            </ul>
        </nav>
    </header>

    <main class="admin-dashboard">
        <!--- pour les messages d'erreur -->
        <?php if (!empty($errorMessages)): ?>
            <div class="warning-message">
                <?php foreach ($errorMessages as $message): ?>
                    <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <!--- pour les messages de succes -->
        <?php if (!empty($successMessage)): ?>
            <div class="success-message">
                <p><?= htmlspecialchars($successMessage, ENT_QUOTES, 'UTF-8') ?></p>
            </div>
        <?php endif; ?>

        <section id="gestion-fichiers" class="sec-lb sec-fil sec-wrap">

            <form id="uploadForm" class="Form" action="index.php" enctype="multipart/form-data" method="POST">

                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
                <div class="file-upload">
                    <input type="file" id="file_path" name="file_path" required>
                </div>
                <div class="input-group">
                    <input type="text" id="nameFile" name="nameFile" placeholder="Nom du fichier" required>
                </div>
                <div class="input-group">
                    <textarea id="description" name="description" placeholder="Description du fichier" required></textarea>
                </div>
                <div class="radio-group">
                    <label><input type="radio" name="level" value="licence1" checked> Licence 1</label>
                    <label><input type="radio" name="level" value="licence2"> Licence 2</label>
                    <label><input type="radio" name="level" value="licence3"> Licence 3</label>
                    <label><input type="radio" name="level" value="master1"> Master 1</label>
                    <label><input type="radio" name="level" value="master2"> Master 2</label>
                </div>

                <button class="btn" type="submit">Télécharger</button>
            </form>
            <div class="status status-wrap">
                <div class="statu">
                    <span>35</span>
                    <p>Visiteurs</p>
                </div>
                <div class="statu">
                    <span><?= $usersCount ?></span>
                    <p>Inscrits</p>
                </div>
                <div class="statu">
                    <span> <?= $fileCount ?></span>
                    <p>Fichiers téléchargés</p>
                </div>
            </div>
        </section>

        <section id="gestion-fichiers" class="sec-fil ">
            <h2>Gestion des fichiers</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fichier</th>
                        <th>Nom</th>
                        <th>Niveau</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file) : ?>
                        <tr>
                            <td><img src="<?= htmlspecialchars($file['file_path'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($file['nameFile'], ENT_QUOTES, 'UTF-8') ?>" width="50"></td>
                            <td><?= htmlspecialchars($file['nameFile'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($file['level'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td width="360" style="overflow: hidden;"><?= htmlspecialchars($file['description'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($file['uploaded_date'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <button data-id="<?= $file['id'] ?>" class="modify-btn">Modifier</button>
                                <button data-id="<?= $file['id'] ?>" class="delete-btn">Supprimer</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section id="gestion-utilisateurs" class="sec-fil">
            <h2>Gestion des utilisateurs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Filière</th>
                        <th>Niveau</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= htmlspecialchars($user['userid'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($user['firstName'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($user['lastName'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($user['studyPath'], ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($user['level'], ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>