<?php require_once __DIR__ . '/../src/bootstrap.php'; 
require_once __DIR__ . '/../src/Clogin.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
</head>
<style>

*,*::after,
*::before{

    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        background: teal;
        color: white;
    }

    .container {

        padding: 20px;
        width: 100%;
        display: flex;
        justify-content: space-around;
        height: 90vh;
        align-items: center;
        color: white;
    }

    .left-content {

        position: relative;
        left: -100px;
        top: -49px;
        display: flex;
        flex-direction: column;

    }

    .logo {

        width: 251px;

        position: relative;
        animation: moveUp 1s forwards;
    }

    .logo img {

        width: 255px;
        height: 140px;
        filter: drop-shadow(0px -2px 2px black);
    }


    .title {

        font-size: 3rem;
        font-family: 'Arial black', sans-serif;
        margin: 0;
        position: relative;
        animation: moveDown 1s forwards;
        color: rgb(255, 197, 0);
        text-align: start;
        filter: drop-shadow(0px -2px 2px black);

    }

    .right-content {

        display: flex;
        flex-direction: column;
        width: 39%;
        position: relative;
        right: -50px;

    }


    .right-content p a {

        color: rgb(252, 203, 43);
        text-underline-offset: 4px;
    }


    .right-content p a:hover {

        color: rgb(2, 2, 82);

    }



    form {

        width: 30rem;
        display: block;
        padding: 8px 1rem;

    }

    label {
        display: block;
        transform: translate(0, -2.75rem);
        font-weight: bold;
    }

    input {

        width: 100%;
        margin-top: 1.5rem;
        padding: 0.25rem;
        border: none;
        border-bottom: 3px solid rgb(255, 255, 255);
        transition: border-color 0.2s ease;
        background: none;
        color: white;
    }

    input:focus {
        outline: none;
        border-color: rgb(255, 197, 0);
    }


    @supports (not (-ms-ime-align:auto)) {
        label {
            color: white;
            transform: translate(0.25rem, -1.5rem);
            transition: all 0.2s ease-out;
        }

        input:focus+label,
        input:not(:placeholder-shown)+label {
            color: #f8f8f8;
            transform: translate(0, -2.75rem);
        }
    }



    button {

        position: relative;
        left: 105px;
        width: 280px;
        border: 2px solid rgb(250, 250, 249);
        border-radius: 5px;
        background: none;
        color: #fff;
        cursor: pointer;
        padding: 5px;
        margin-top: 18px;
        font-size: 1.5rem;
        font-weight: bold;

    }


    button:hover {
        background-color: rgb(255, 197, 0);
        border: 2px solid rgb(255, 197, 0);
    }

    .c-footer {

        text-align: center;
        font-size: 18px;
        margin-top: 18px;
    }


    .animate-up {
        animation: moveUp 1s forwards;
    }

    .animate-down {
        animation: moveDown 1s forwards;
    }

    @keyframes moveUp {
        from {
            top: 50px;
            opacity: 0;
        }

        to {
            top: 2px;
            opacity: 1;
        }
    }

    @keyframes moveDown {
        from {
            bottom: 50px;
            opacity: 0;
        }

        to {
            bottom: 0;
            opacity: 1;
        }
    }
</style>

<body>
    <div class="container">
        <div class="left-content">
            <div class="logo" id="logo"><img src="../image/logo.png" alt=""></div>
            <h1 class="title" id="title">Connexion</h1>
        </div>
        <div class="right-content">
        <?php if ($errors): ?>
        <ul>
            <?php 
            flash();
            foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

            <form method="post" action="login.php">
            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                <input type="email" id="Email" name="Email" value="<?php echo htmlspecialchars($inputs['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder=" " required>
                <label for="Email">Adresse électronique</label>
                <input type="password" id="password" name="password" placeholder=" " required>
                <label for="password">Mot de Passe</label>
                <button type="submit">Connexion</button>
            </form>
            <div class="c-footer">
                <p>Si vous n'avez pas de compte : <a href="../public/signup.php">Inscrivez-vous</a></p>
            </div>
        </div>
    </div>
    <script src="../asset/js/script.js"></script>
</body>

</html>