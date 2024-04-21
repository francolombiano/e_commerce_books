<?php
require_once "inc/functions.inc.php";

// Si l'utilisateur est déjà connecté, il pourras pas avoir accés à la page d'inscription
// if (!empty($_SESSION['user'])) {

//   header("location:" . RACINE_SITE . "profil.php");
// }

$info = '';
$verif = ''; 

if (!empty($_POST)) // l'envoi du Formulaire (button "S'inscrire" ) 
{
    // debug($_POST);

    $verif = true;
  }
    foreach ($_POST as $value) {


        if (empty($value)) {

            $verif = false;
        }
    }

    if (!$verif) {
        debug($_POST);


        $info = alert("Veuillez renseigner tout les champs", "danger");
    } else {

       // debug($_POST);
      }  

      // On stock les values de nos champs dans des variables et en les passant dans la fonction trim()

      $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
      $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
      $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $password = isset($_POST['password']) ? $_POST['password'] : '';
      $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';
      $choice = isset($_POST['choice']) ? $_POST['choice'] : '';
      $cpostal = isset($_POST['cpostal']) ? $_POST['cpostal'] : '';
      $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
      $pays = isset($_POST['pays']) ? $_POST['pays'] : '';

      // $sql = "INSERT INTO users (prenom, nom, tel, email, password, confirmPassword, choice, cpostal, ville, pays) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      // $pdo = connexionBdd();
      // $stmt = $pdo->prepare($sql);
      // $stmt->execute([$prenom, $nom, $tel, $email, $password, $confirmPassword, $choice, $cpostal, $ville, $pays]);
      // if ($stmt->rowCount() > 0) {
      //     echo "Datos guardados correctamente";
      // } else {
      //     $errorInfo = $pdo->errorInfo();
      //     echo "Error al guardar los datos: " . $errorInfo[2];
      // }



    //   if (strlen($prenom) < 2 || preg_match('/[0-9]+/', $prenom)) {

    //     $info = alert("Le prénom n'est pas valide.", "danger");
    // }

    // if (strlen($nom) < 2 || preg_match('/[0-9]+/', $nom)) {

    //     $info .= alert("Le nom n'est pas valide.", "danger");
    // }

    // if (!preg_match('#^[0-9]+$#', $tel) || strlen($tel) > 10 || !trim($tel)) {

    //     $info .= alert("Le Téléphone n'est pas valide.", "danger");
    // }

    // if (strlen($email) > 50 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {

    //     $info .= alert("L'email n'est pas valide.", "danger");
    // }
    // if (strlen($password) < 5 || strlen($password) > 15) {

    //     $info .= alert("Le mot de passe n'est pas valide.", "danger");
    // }
    // if ($password !== $confirmPassword) {

    //     $info .= alert("Le mot de passe et la confirmation doivent être identique.", "danger");
    // }

    // if ($choice != 'f' && $choice != 'h' && $choice != 'autre') {
    //     $info .= alert("La civilité n'est pas valide.", "danger");
    // }

    // if (!preg_match('#^[0-9]+$#', $cpostal)) {
    //     $info .= alert("Le code postal n'est pas valide.", "danger");
    // }

    // if (strlen($ville) > 20) {
    //     $info .= alert("La ville n'est pas valide.", "danger");
    // }

    // if (strlen($pays) < 5 || strlen($pays) > 50) {
    //     $info .= alert("Le pays n'est pas valide.", "danger");
    // }

     if (empty($info)) {

       $emailExist = checkEmailUser($email);

        if ($emailExist) {

           $info = alert("Vous avez déjà un compte", "danger");
           

   
            // ***************** REDIRECTION "authentification.php"



        } else if ($password !== $confirmPassword) {

            $info .= alert("Le mot de passe et la confirmation doivent être identiques.", "danger");
       } else {

             $mdp = password_hash($password, PASSWORD_DEFAULT);

            inscriptionUsers($prenom, $nom, $tel, $email, $password, $confirmPassword, $choice, $cpostal, $ville, $pays);

           $info = alert('Vous êtes bien inscrit, vous pouvez vous connectez !', 'success');
        }
    }

 else {
debug($_POST);
echo 'Non SUBMIT';
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
<div id="enrigestrement-reusi" class="error"></div>
<section class="ecrivez-nous p-5">
<form id="form" action="register.php" method="POST" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">
  
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
  <input type="number" class="form-control rounded-pill input-custom" id="tel" name="tel"> 
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
        <!-- <span class="inputError"></span> -->
       
  </div>

  <div class="p-3 inputs col-sm-12">
        <label for="confirmPassword" class="form-label">Confirmer mot de passe</label> 
        <input type="password" class="form-control rounded-pill input-custom" id="confirmPassword" name="confirmPassword">
        <i class="bi bi-eye-slash ms-3 iconeye1" id="toggleConfirmPassword"></i>
        <div id="confirmPwdError" class="error"></div>
        <!-- <span class="inputError"></span> -->
  </div>

  <div class="p-3 civilite col-sm-12">
                            <label for="choice" class="form-label">Civilite</label>
                            <select name="choice" id="choice" class="form-select rounded-pill input-custom">
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
  <label for="ville" class="form-label">Pays</label> 
  <input type="text" class="form-control rounded-pill input-custom" id="pays" name="pays"> 
  <div id="payserror" class="error"></div>  
  <span class="inputError"></span> 
</div>

<!-- bouton -->
  <button type="submit" class="btn btn-outline-dark rounded-start ms-4 bouton">Registre</button>
  <!-- </div> -->
</form>
</section>


<!-- Promotion du livre -->
<section class="promotions mt-5 p-5 bg-promo">
        <div class="row">
            <div class="col-5 p-5">
                <h2 class="text-white">Top sellers</h2>
                <p class="p-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates consequatur earum totam
                    doloremque numquam aliquid ex voluptate alias recusandae sint ad, a esse omnis distinctio, repellat
                    fugiat blanditiis repellendus quam.</p>
            </div>

            <div class="col-3 promo1  border border-whit rounded-4 py-2   ">
                <div class="small-img1">
                <img src="./assets/img/promo_1.jpg"  alt="img-promo">
                <button type="submit" class="btn btn-outline-secondary rounded-5">20€</button>
                <span class="p-2">lorem lorem</span>
                <span>lorem lorem lorem</span>
                </div>
            </div>

            <div class="col-3 promo2  border border-whit rounded-4 py-2 
          ">
                <div class="small-img2 ">
                <img src="./assets/img/promo_2.jpg"  alt="img-promo">
                <button type="submit" class="btn btn-outline-secondary rounded-5">20€</button>
                <span class="p-2">lorem lorem</span>
                <span>lorem lorem lorem</span>
                </div>
            </div>
        </div>

</section>

</main>


<?php
require_once "inc/footer.inc.php";
?> 