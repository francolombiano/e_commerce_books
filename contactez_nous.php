<?php
$title = "Contactez-nous";
require_once "inc/header.inc.php";
?>

<main class=" container-fluid  p-5 ensayo">
        <form method="#" class="w-50 mx-auto p-3 text-white rounded-5 formV border">
            <!-- <div class="row"> -->
            <h3></h3>
            <div class="p-3 inputs">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control rounded-pill" id="prenom" name="prenom">
                <span class="inputError"></span>
            </div>

            <div class="p-3 inputs">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control rounded-pill" id="nom" name="nom">
                <span class="inputError"></span>
            </div>

            <div class="p-3 inputs">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control rounded-pill" id="email" name="email">
                <span class="inputError"></span>
            </div>


            <div class="p-3">
                <label for="exampleFormControlTextarea1" class="form-label">Comments</label>
                <textarea class="form-control rounded-pill" id="exampleFormControlTextarea1"
                    style="height: 90px"></textarea>
            </div>

            <button type="submit" class="btn btn-outline-dark rounded-start ms-3">Envoyer</button>


            <!-- </div> -->
        </form>

        <section class=" mt-5 p-5 bg-promo">
        <div class="row">
            <div class="col-5 p-5 ">
                <h2 class="text-white">Top sellers</h2>
                <p class="p-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates consequatur earum totam
                    doloremque numquam aliquid ex voluptate alias recusandae sint ad, a esse omnis distinctio, repellat
                    fugiat blanditiis repellendus quam.</p>
            </div>

            <div class="col-3 promo1  border border-whit rounded-4 py-2   ">
                <div class="small-img1">
                <img src="./assets/img/1_1.jpg"  alt="img-promo">
                <button type="submit" class="btn btn-outline-secondary rounded-5">20€</button>
                <span class="p-2">lorem lorem</span>
                <span>lorem lorem lorem</span>
                </div>
            </div>

            <div class="col-3 promo2  border border-whit rounded-4 py-2 
          ">
                <div class="small-img2 ">
                <img src="./assets/img/2_2.jpg"  alt="img-promo">
                <button type="submit" class="btn btn-outline-secondary rounded-5">20€</button>
                <span class="p-2">lorem lorem</span>
                <span>lorem lorem lorem</span>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-6"></div>
            </div>
        </div>

</section>
    </main>



<?php
require_once "inc/footer.inc.php";
?>
