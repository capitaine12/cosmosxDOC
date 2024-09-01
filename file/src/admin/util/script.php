<?php
function generateRandomColor() {
    $colors = ['#FF5733', '#33FF57', '#3357FF', '#F333FF', '#FF3384']; // Liste de couleurs
    return $colors[array_rand($colors)];
}

$db = getConecte();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    // Vérification que les champs existent et sont non vides
    if (!isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['Content']) && !isset($_POST['icon_color'])) {
        
        // Protection contre les injections XSS
        $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES, 'UTF-8');
        $Content = htmlspecialchars($_POST['Content'], ENT_QUOTES, 'UTF-8');
        //$icon_color = htmlspecialchars($_POST['icon_color'], ENT_QUOTES, 'UTF-8');
        $iconColor = generateRandomColor();
        try {
            // Insertion dans la base de données
            $sql = 'INSERT INTO comment (firstName, lastName, Content, icon_color) VALUES (:firstName, :lastName, :Content, ?)';
            $statement = $db->prepare($sql);
            $statement->bindValue(':firstName', $firstName, PDO::PARAM_STR);
            $statement->bindValue(':lastName', $lastName, PDO::PARAM_STR);
            $statement->bindValue(':Content', $Content, PDO::PARAM_STR);
            $statement->bindValue(':icon_color', $icon_color, PDO::PARAM_STR);
            
            if ($statement->execute()) {
                //echo "Commentaire ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du commentaire.";
            }
            
        } catch (Exception $e) {
            // Gestion des erreurs
            error_log('Erreur : ' . $e->getMessage());
            //echo "Erreur lors de l'ajout du commentaire.";
        }
    } else {
        //echo "Tous les champs sont requis.";
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Récupération des commentaires pour les afficher
$testimonials = $db->query('SELECT * FROM comment')->fetchAll(PDO::FETCH_ASSOC);

