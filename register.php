<?php
$title = "enregistrement";
require_once "inc/header.inc.php";
?>

<main>
  <!-- Image d'en-tête contactez-nous -->
  <section class="affiche-inscription">
    <div class="text-center text-white col-sm-12">
      <h1 class="titre-3 display-3">Registre!</h1>
      <i class="bi bi-chevron-down down"></i>
    </div>
  </section>

  <!-- Formulaire de contact -->
  <section class="ecrivez-nous p-5">
    <form action="#" method="post" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">

      <div class="p-3 inputs col-sm-12">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control rounded-pill input-custom" id="prenom" name="prenom">
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control rounded-pill input-custom" id="nom" name="nom">
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="tel" class="form-label">Téléphone</label>
        <input type="number" class="form-control rounded-pill input-custom" id="tel" name="tel" maxlength="10">
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control rounded-pill input-custom" id="email" name="email">
        <span class="inputError"></span>
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="password" name="password">
        <i class="bi bi-eye-slash ms-3" id="togglePassword"></i>
        <span class="inputError"></span>

      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="confirmPassword" class="form-label">Confirmer mot de passe</label>
        <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
        <i class="bi bi-eye-slash ms-3" id="toggleConfirmPassword"></i>
        <span class="inputError"></span>
      </div>

      <div class="p-3 civilite col-sm-12">
        <label for="choice" class="form-label">Civilite</label>
        <select name="choice" id="choice" class="form-select">
          <option value="" selected>--- Choisir une option ---</option>
          <option value="femme">Femme</option>
          <option value="homme">Homme</option>
          <option value="autre">Autre</option>
        </select>
        <!-- <div id="choiceError" class="error"></div>  este es para la validacion del formulario -->
      </div>

      <div class="p-3 inputs col-sm-12">
        <label for="cpostal" class="form-label">Code postal</label>
        <input type="number" class="form-control rounded-pill input-custom" id="tel" name="tel" maxlength="10">
        <span class="inputError"></span>
      </div>


      <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Envoyer</button>
      <!-- </div> -->
    </form>
  </section>
  <?php
  require_once "inc/footer.inc.php";
  ?>
  </footer>

</main>