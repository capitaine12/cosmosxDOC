<?php

include_once __DIR__ . '/../src/bootstrap.php';
include __DIR__ . '/../src/Csignup.php';



?>
<?php /* view('header', ['title' => 'inscription'])  */ ?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'CXD | Inscription' ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    *,
    *::after,
    *::before {

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
        overflow: hidden;
        /* Désactiver la réactivité */
    }

    .container {

        padding: 20px;
        display: flex;
        justify-content: space-around;
        height: 90vh;
        align-items: center;
        color: white;
        width: 100%;
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

    .right-content p a,
    .agree a {

        color: rgb(252, 203, 43);
        text-underline-offset: 4px;


    }

    .right-content p a:hover,
    .agree a:hover {

        color: rgb(170, 170, 250);

    }



    form {

        width: 30rem;
        display: block;
        padding: 8px 1rem;

    }

    label {
        display: block;
        transform: translate(0, -2.75rem);
        font-weight: bolder;
    }

    input,
    select {

        width: 100%;
        margin-top: 1.5rem;
        padding: 0.25rem;
        border: none;
        border-bottom: 3px solid rgb(255, 255, 255);
        transition: border-color 0.2s ease;
        background: none;
        color: white;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: rgb(255, 197, 0);
    }

    select {
        font-size: 15px;
        font-weight: bold;

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



    /*
background: linear-gradient(90deg, #442980, #442980 25%, #ff772e 0, #ff772e 50%, #f0f2f2 0, #f0f2f2 75%, #bd158d 0, #bd158d);
*/
    option {

        font-size: 15px;
        color: teal;
        font-weight: bolder;
        border-radius: 5px;
    }


    button {

        padding: 5px;
        width: 280px;
        border: 2px solid rgb(250, 250, 249);
        border-radius: 5px;
        background: none;
        color: #fff;
        cursor: pointer;
        position: relative;
        left: 105px;
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

    @keyframes moveUp {
        from {
            top: 50px;
            opacity: 0;
        }

        to {
            top: 0;
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

    .animate-up {
        animation: moveUp 1s forwards;
    }

    .animate-down {
        animation: moveDown 1s forwards;
    }

    input[type='checkbox'] {
        margin: 0;
        padding: 0;
        width: 40px;
    }

    .agree {

        margin-top: 25px;
        display: flex;

    }
</style>

<body>
    <div class="container">
        <div class="left-content">
            <div class="logo" id="logo">
                <img src="../image/logo.png" alt="">
            </div>
            <h1 class="title" id="title">Inscription</h1>
        </div>
<?php var_dump($errors) ?>
        <div class="right-content">
           
            <form action="./signup.php" method="post">
                <input type="text" id="firstName" name="firstName" value="<?= htmlspecialchars($inputs['firstName'] ?? '') ?>" class="<?= error_class($errors, 'firstName')  ?>" placeholder=" " required>
                <label for="firstName">Prénom</label>
                <small><?= $errors['firstName'] ?? '' ?></small>

                <input type="text" id="lastName" name="lastName" value="<?= htmlspecialchars($inputs['lastName'] ?? '') ?>" class="<?= error_class($errors, 'lastName')  ?>" placeholder=" " required>
                <label for="lastName">Nom</label>
                <small><?= $errors['lastName'] ?? '' ?></small>

                <input type="email" id="email" name="email" value="<?= htmlspecialchars($inputs['email'] ?? '') ?>" class="<?= error_class($errors, 'email')  ?>" placeholder=" " required>
                <label for="email">Adresse électronique</label>
                <small><?= $errors['email'] ?? '' ?></small>

                <input type="password" id="password" name="password" value="<?= htmlspecialchars($inputs['password'] ?? '') ?>" class="<?= error_class($errors, 'password')  ?>" placeholder=" " required>
                <label for="password">Mot de Passe</label>
                <small><?= $errors['password'] ?? '' ?></small>

                <input type="password" id="cpassword" name="cpassword" value="<?= htmlspecialchars($inputs['cpassword'] ?? '') ?>" class="<?= error_class($errors, 'cpassword')  ?>" placeholder=" " required>
                <label for="cpassword">Confirmez le Mot de Passe</label>
                <small><?= $errors['cpassword'] ?? '' ?></small>

                <select name="studyPath" class="<?= error_class($errors, 'studyPath')  ?>" required>
                    <option value="" disabled selected>Filière</option>
                    <option value="Informatique" <?= isset($inputs['studyPath']) && $inputs['studyPath'] == 'Informatique' ? 'selected' : '' ?>>Informatique</option>
                    <option value="Physique Chimie" <?= isset($inputs['studyPath']) && $inputs['studyPath'] == 'Physique Chimie' ? 'selected' : '' ?>>Physique Chimie</option>
                    <option value="Maths Informatique" <?= isset($inputs['studyPath']) && $inputs['studyPath'] == 'Maths Informatique' ? 'selected' : '' ?>>Maths Informatique</option>
                </select>
                <small><?= $errors['studyPath'] ?? '' ?></small>

                <select name="level" class="<?= error_class($errors, 'level')  ?>" required>
                    <option value="" disabled selected>Niveau</option>
                    <option value="Licence1" <?= isset($inputs['level']) && $inputs['level'] == 'Licence1' ? 'selected' : '' ?>>Licence 1</option>
                    <option value="Licence2" <?= isset($inputs['level']) && $inputs['level'] == 'Licence2' ? 'selected' : '' ?>>Licence 2</option>
                    <option value="Licence3" <?= isset($inputs['level']) && $inputs['level'] == 'Licence3' ? 'selected' : '' ?>>Licence 3</option>
                    <option value="master1" <?= isset($inputs['level']) && $inputs['level'] ==  'master1' ? 'selected' : '' ?>>Master 1</option>
                    <option value="master2" <?= isset($inputs['level']) && $inputs['level'] ==  'master2' ? 'selected' : '' ?>>Master 2</option>
                </select>
                <small><?= $errors['level'] ?? '' ?></small>

                <div class="agree">
                    <input type="checkbox" value="checked" <?= isset($inputs['agree']) ? 'checked' : '' ?> name="agree" id="agree">
                    <b>J'accepte les <a href="#">conditions de service</a></b>
                </div>
                <small><?= $errors['agree'] ?? '' ?></small>

                <button type="submit">S’inscrire</button>
            </form>
            <div class="c-footer">
                <p>Si vous avez un compte : <a href="login.php">Connectez-vous</a></p>
            </div>
            
        </div>
    </div>
    <script src="../asset/js/script.js"></script>
</body>

</html>