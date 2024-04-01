<?php

require_once "inc/functions.inc.php";

if (!empty($_SESSION['user'])) {

  header("location:" . RACINE_SITE . "profil.php");
}
// ==================

if (!empty($_POST)) // l'envoi du Formulaire (button "S'inscrire" ) 
{
  // debug($_POST);


  $verif = true;
  foreach ($_POST as $value) {


    if (empty($value)) {

      $verif = false;
    }
  }
  $info = '';

  if (!$verif) {

    // debug($_POST);

    $info = alert("Veuillez renseigner tout les champs", "danger");
  } else {


    // debug($_POST);
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : null;
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : null;
    $tel = isset($_POST['tel']) ? $_POST['tel'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;
    $civility = isset($_POST['civility']) ? $_POST['civility'] : null;
    $cpostal = isset($_POST['cpostal']) ? $_POST['cpostal'] : null;
    $ville = isset($_POST['ville']) ? $_POST['ville'] : null;
    $pays = isset($_POST['pays']) ? $_POST['pays'] : null;


    if (strlen($firstName) < 2 || preg_match('/[0-9]+/', $firstName)) {

      $info = alert("Le prénom n'est pas valide.", "danger");
    }

    if (strlen($lastName) < 2 || preg_match('/[0-9]+/', $lastName)) {

      $info .= alert("Le nom n'est pas valide.", "danger");
    }

    if (!preg_match('#^[0-9]+$#', $tel) || strlen($tel) > 10 || !trim($tel)) {

      $info .= alert("Le Téléphone n'est pas valide.", "danger");
    }
    if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $info .= alert("L'email n'est pas valide.", "danger");
    }
    if (strlen($password) < 5 || strlen($password) > 15) {

      $info .= alert("Le mot de passe n'est pas valide.", "danger");
    }
    if ($password !== $confirmPassword) {

      $info .= alert("Le mot de passe et la confirmation doivent être identique.", "danger");
    }
    if ($civility != 'femme' && $civility != 'homme' && $civility != 'autre') {
      $info .= alert("La civilité n'est pas valide.", "danger");
    }
  }
}




$title = "enregistrement";
require_once "inc/header.inc.php";
?>

<main class="bg-register">

  <!-- Image d'en-tête contactez-nous -->
  <section class="affiche-inscription">

    <div class="text-center text-white col-sm-12">
      <h1 class="titre-3 display-3">Registre!</h1>
      <i class="bi bi-chevron-down down"></i>



    </div>
  </section>

  <!-- Formulaire de contact -->
  <section class="ecrivez-nous p-5"> <?= $info; ?>
    <form action="#" method="post" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">

      <div class="p-3 inputs col-sm-12">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control rounded-pill input-custom" id="prenom" name="prenom">
        <div id="prenomError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom">
        <div id="nomError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="number" class="form-control rounded-pill input-custom" id="tel" name="tel" maxlength="10">
        <div id="telephoneError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
        <div id="emailError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">
        <i class="bi bi-eye-slash ms-3 iconeye" id="togglePassword"></i>
        <div id="passwordError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="confirmPassword" class="form-label">Confirmer mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
        <i class="bi bi-eye-slash ms-3 iconeye1" id="toggleConfirmPassword"></i>
        <div id="confirmPwdError" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 civilite col-sm-12">
        <label for="civility" class="form-label">Civilite</label>
        <select name="civility" id="civility" class="form-select rounded-pill input-custom">
          <option value="" selected>--- Choisir une option ---</option>
          <option value="femme">Femme</option>
          <option value="homme">Homme</option>
          <option value="autre">Autre</option>
        </select>
        <div id="choiceError" class="error"></div>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="cpostal" class="form-label">Code postal</label>
        <input type="number" class="form-control rounded-pill input-custom" id="cpostal" name="cpostal">
        <div id="cpostalerror" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control rounded-pill input-custom" id="ville" name="ville">
        <div id="villerror" class="error"></div>
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="pays" class="form-label">Pays</label>
        <input type="text" class="form-control rounded-pill input-custom" id="pays" name="pays">
        <div id="payserror" class="error"></div>
        <span class="inputError"></span>
      </div>

      <!-- bouton -->
      <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Registre</button>
      <!-- <p class="text-center mt-5">Vous avez déjà un compte ! <a href="authentification.php" class="text-danger">Connectez-vous ici</a></p> -->
      <!-- </div> -->
    </form>
  </section>
</main>