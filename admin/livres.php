<?php

require_once "../inc/functions.inc.php";

if( !isset($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");
}else{
    if($_SESSION['user']['role'] == 'ROLE_USER'){
        header("location:".RACINE_SITE."index.php");
    }
}



// ************************************************




$title = "Livres";

?>

<main>

    <div class="d-flex flex-column m-auto mt-5">

        <h2 class="text-center fw-bolder mb-5 text-danger">Liste des livres</h2>
        <a href="gestionFilms.php" class="btn btn-primary p-3 fs-3 align-self-end "> Ajouter un livre</a>
        <table class="table table-dark table-bordered mt-5 ">
            <thead>
                <tr>
                    <!-- th*7 -->
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Affiche</th>
                    <th>Autor</th>
                    <th>Âge limite</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Synopsis</th>
                    <th>Date de sortie</th>
                    <th>Supprimer</th>
                    <th> Modifier</th>
                </tr>
            </thead>
            <tbody>


 

<?php

        $livres = allLivres();

                foreach ($livres as $livre) {

                    $autors = stringToArray($livre['autor']);

                ?>

                    <tr>

                        <!-- Je récupére les valeus de mon tabelau $livre dans des td -->
                        <td><?= $livre['id_livre'] ?></td>
                        <td><?= $livre['title'] ?></td>
                        <td> <img src="<?= RACINE_SITE . "assets/img/" . $livre['image'] ?>" alt="affiche du livre" class="img-fluid upload-img"></td>
                        <td><?= $livre['autor'] ?> </td>
                        <td>
                            <ul>
                                <?php
                                foreach ($autors as $autor) {
                                ?>
                                    <li><?= $autor; ?></li>



                                <?php

                                }
                                ?>

                            </ul>
                        </td>


                        <td><?= $livre['ageLimit'] ?></td>
                        <td><?= $livre['title'] ?></td>
                        <td><?= $film['price'] ?>€</td>
                        <td><?= $film['stock'] ?></td>
                        <td><?= substr($livre['synopsis'], 0, 50) ?>...</td>
                        <td><?= $livre['date'] ?></td>
                        <td class="text-center">
                            <a href="gestionLivres.php?action=delete&id_livre=<?= $livre['id_livre'] ?>">
                                <i class="bi bi-trash3-fill text-danger"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="gestionLivres.php?action=update&id_livre=<?= $livre['id_livre'] ?>">
                                <i class="bi bi-pen-fill"></i>
                            </a>
                        </td>

                    </tr>
                <?php
                }

                ?>


            </tbody>


        </table>


    </div>

</main>

<?php
require_once "../inc/footer.inc.php";
?>


