<?php
require_once "inc/functions.inc.php";

$info = '';

if (!empty($_POST)) {
    // debug($_POST);
    $verif = true;

    foreach ($_POST as $value) {


        if (empty($value)) {

            $verif = false;
        }
    }

    if (!$verif) {
        // debug($_POST);


        $info = alert("Veuillez renseigner tout les champs", "danger");
    } else {

        // debug($_POST);
        $email = isset($_POST['email']) ? $_POST['email'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;

        $user = checkUser($email, $password);
        debug($user);

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $_SESSION['user'] = $user;

                header("location:" . RACINE_SITE . "profil.php");
            } else {
                $info = alert("Les identifiants sont incorrectes", "danger");
            }
        }

        // } else {
        //     $info = alert("Les identifiants sont incorrectes", "danger");


        // }


    }
}

$title = "authentification";
require_once "inc/header.inc.php";
?>


<main class="bg-authentification">
<!-- Image d'en-tête authentification -->   
<section class="affiche-authentification">
            <div class="text-center text-white col-sm-12">
                 <h1 class="titre-4 display-3 p-5">Se conecter!</h1> 
                 <i class="bi bi-chevron-down down"></i>
            </div>
        </section>

<!-- Formulaire de authentification -->
<div id="enrigestrement-reusi" class="error"></div>
<section class="authentification-users p-5">

    <?php
        echo $info;
    ?>

<form id="form-authetification" action="" method="POST" class="w-50 mx-auto p-3 text-white rounded-5 formV border p-5 col-sm-12 col-md-8">
  
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