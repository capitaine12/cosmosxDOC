<?php

include_once dirname(__DIR__) . '/src/bootstrap.php';

if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Fetch existing file details
    $stmt = $pdo->prepare("SELECT * FROM files WHERE id = ?");
    $stmt->execute([$fileId]);
    $file = $stmt->fetch();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fileName = $_POST['nameFile'];
        $fileDescription = $_POST['description'];
        $fileLevel = $_POST['niveau'];

        // Update file details in the database
        $stmt = $pdo->prepare("UPDATE files SET name = ?, description = ?, level = ? WHERE id = ?");
        if ($stmt->execute([$fileName, $fileDescription, $fileLevel, $fileId])) {
            header('Location: /../update.php');
            exit();
        } else {
            $error = "Failed to update file information in the database.";
        }
    }
} else {
    header('Location: /../update.php');
    exit();
}
?>

<?php require_once '../partial/link.php'; ?>

<body>
    <header>
        <div class="logo">COSMOS X DOC - Admin</div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Gestion des fichiers</a></li>
            <li><a href="index.php#gestion-utilisateurs">Gestion des utilisateurs</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Modifier un fichier</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form id="updateForm" method="POST" action="update.php?id=<?= htmlspecialchars($fileId) ?>">
                
            <div class="input-group">
                    <input type="text" id="nameFile" name="nameFile" placeholder="Nom du fichier" value="<?= htmlspecialchars($file['name']) ?>" required>
                </div>
                <div class="input-group">
                    <textarea id="description" name="description" placeholder="Description du fichier" required><?= htmlspecialchars($file['description']) ?></textarea>
                </div>
                <div class="radio-group">
                    <label><input type="radio" name="niveau" value="licence1" <?= $file['level'] == 'licence1' ? 'checked' : '' ?>> Licence 1</label>
                    <label><input type="radio" name="niveau" value="licence2" <?= $file['level'] == 'licence2' ? 'checked' : '' ?>> Licence 2</label>
                    <label><input type="radio" name="niveau" value="licence3" <?= $file['level'] == 'licence3' ? 'checked' : '' ?>> Licence 3</label>
                    <label><input type="radio" name="niveau" value="master1" <?= $file['level'] == 'master1' ? 'checked' : '' ?>> Master 1</label>
                    <label><input type="radio" name="niveau" value="master2" <?= $file['level'] == 'master2' ? 'checked' : '' ?>> Master 2</label>
                </div>
                <button class="btn" type="submit">Modifier</button>
            </form>
        </section>
    </main>
</body>

</html>