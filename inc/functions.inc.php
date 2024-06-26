<?php

session_start();

define("RACINE_SITE","/ecommerce_livres/"); // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemin absolus à partir de localhost (on ne prend pas locahost). Ainsi nous écrivons tous les chemins (exp : src, href) en absolus avec cette constante



///////////////////////////// Fonction de débugage revisar //////////////////////////
function debug($var)
{

    echo '<pre class="border border-dark bg-light text-primary w-50 p-3">';

    var_dump($var);

    echo '</pre>';
}



////////////////////// Fonction d'alert revisar ////////////////////////////////////////

function alert(string $contenu, string $class)
{

    return "<div class='alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5' role='alert'>
        $contenu

            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>

        </div>";
}

///////////////////////////  Fonction de connexion à la BDD //////////////////////////

// Constante du serveur => localhost
define("DBHOST", "localhost");

// Constante de l'utilisateur de la BDD du serveur en local  => root
define("DBUSER", "root");

// Constante pour le mot de passe de serveur en local => pas de mot de passe
define("DBPASS", "");

// Constante pour le nom de la BDD
define("DBNAME", "bookstore");


function connexionBdd()
{

    // Sans la variable $dsn et sans le constantes, on se connecte à la BDD :

    // $pdo = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');

    // avec la variable DSN (Data Source Name) et les constantes

    // $dsn = "mysql:host=localhost;dbname=cinema;charset=utf8";

    $dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";

    try {

        $pdo = new PDO($dsn, DBUSER, DBPASS);

        // On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {

        die($e->getMessage());
    }

    return $pdo;
}
 //connexionBdd();


//////////////////Fonction qui convertie les string en tableau////////////

//Convertir les string en tableau ///
function stringToArray(string $string): array
{

    $array = explode('/', trim($string)); // je transforme ma chaine de caractère en tableau et supprime les "/"
    //autour de la chaine de caractère
    return $array; // ma fonction retroune un tableau 
}

//////////////////// Fonctions du CRUD pour les utilisateurs Users /////////////////////

function inscriptionUsers(string $prenom, string $nom, string $tel, string $email, string $password, string $choice, string $cpostal, string $ville, string $pays): void
{

    $pdo = connexionBdd(); // je stock ma connexion  à la BDD dans une variable

    $sql = "INSERT INTO users 
        (prenom, nom, tel, email, password, choice, cpostal, ville, pays)
        VALUES
        (:prenom, :nom, :tel, :email, :password, :choice, :cpostal, :ville, :pays)"; // Requête d'insertion que je stock dans une variable
    $request = $pdo->prepare($sql); // Je prépare ma requête et je l'exécute
    $request->execute(
        array(
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':tel' => $tel,
            ':email' => $email,
            ':password' => $password,
            ':choice' => $choice,
            ':cpostal' => $cpostal,
            ':ville' => $ville,
            ':pays' => $pays

        )
    );
}


function checkEmailUser(string $email): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email

    ));

    $resultat = $request->fetchColumn();
    return $resultat;
}


function checkUser(string $email, string $password): mixed
{
    $pdo = connexionBdd();

    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':email' => $email
    ));

    $user = $request->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    } else {
        return null;
    }
}

// function checkUser(string $email, string $password): mixed
// {

//     $pdo = connexionBdd();

//     $sql = "SELECT * FROM users WHERE password = :password AND email = :email";
//     $request = $pdo->prepare($sql);
//     $request->execute(array(
//         ':password' => $password,
//         ':email' => $email


//     ));
//     $resultat = $request->fetch();
//     return $resultat;
// }

//  /////////////////Fonction pour récupérer tous les utilisateurs///////////////////
function allUsers(): array
{

    $pdo = connexionBdd();
    $sql = "SELECT * FROM users";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}

// /////////////////  Fonction pour recupereer un seul utilisateur  //////////////////////

function showUser(int $id): array
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM users WHERE id_user = :id_user";
    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':id_user' => $id

    ));
    $result = $request->fetch();
    return $result;
}

// /////////////////  Fonction pour supprimer un utilisateur  ///////////////////////


function deleteUser(int $id): void
{
    $pdo = connexionBdd();
    $sql = "DELETE FROM users WHERE id_user = :id_user";
    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':id_user' => $id

    ));
}

// ////////////////////  Fonction pour modifier le role d'un utilisateur//////////////

function updateRole(string $role, int $id): void
{
    $pdo = connexionBdd();
    $sql = "UPDATE users SET role = :role WHERE id_user = :id_user";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':role' => $role,
        ':id_user' => $id

    ));
}

//////////////une fonction pour recupérer toutes les catégories//////////

function allCategories(): array
{

    $pdo = connexionBdd();
    $sql = "SELECT * FROM categories";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}


////////////////// fonction pour récupérer tous les livres/////////////////////

function allLivres(): array
{

    $pdo = connexionBdd();
    $sql = "SELECT livres.* , categories.name AS genre
    FROM livres
    LEFT JOIN categories ON livres.category_id = categories.id_category";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;
}

// //////////////  Fonction pour récuperer un livre qui a la même catégorie  /////////////////

function livresByCategory(int $id): array
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM livres WHERE category_id = :id";
    $request = $pdo->prepare($sql);
    $request->execute([':id' => $id]);

    $result = $request->fetchAll();
    return $result;
}



//////////////  fonction pour afficher un livre///////////////

function showLivre(int $id): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT livres.* , categories.name AS genre
    FROM livres 
    LEFT JOIN categories
    ON films.category_id = categories.id_category
    WHERE id_film = :id ";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));

    $result = $request->fetch();
    return $result;
}


///////////////////////////Fonction pour modifier le  livre///////////
function updateLivre(int $idLivre, int $category, string $title, string $autor, string $ageLimit, string $synopsis, string $date, string $image, float $price, int $stock) : void 

{
    $pdo = connexionBdd();
    $sql = "UPDATE films SET 
                    id_livre = :id,
                    category_id = :category_id,
                    title = :title,
                    autor = :autor,
                    ageLimit = :ageLimit,
                    synopsis = :synopsis,
                    ageLimit = :ageLimit,
                    date = :date,
                    image = :image,
                    price = :price,
                    stock = :stock 
                    WHERE id_film = :id";

    $request = $pdo->prepare($sql);
    $request->execute(array (

        ':id' => $idLivre,
        ':category_id' => $category,
        ':title' => $title,
        ':autor' => $autor,
        ':ageLimit' => $ageLimit,
        ':synopsis' => $synopsis,
        ':date' => $date,
        ':image' => $image,
        ':price' => $price,
        ':stock' => $stock

    ));
}

function showCategory(int $id): mixed
{
    $pdo = connexionBdd();
    $sql = "SELECT * FROM categories WHERE id_category = :id ";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));

    $result = $request->fetch();
    return $result;
}

// ///////   Fonction pour ajouter une catégorie   /////////////

function addCategory(string $categoryName, string $description): void
{

    $pdo = connexionBdd();

    $sql = "INSERT INTO categories (nom, description) VALUES (:nom, :description)";

    $request = $pdo->prepare($sql);
    $request->execute(array(

        ':nom' => $categoryName,
        ':description' => $description
    ));
}

////////  Fonction pour supprimer une categorie //////////


function deleteCategory(int $id): void
{
    $pdo = connexionBdd();

    // // Supprimer les livres associés à la catégorie
    // $sql = "DELETE FROM livres WHERE category_id = :id";
    // $request = $pdo->prepare($sql);
    // $request->execute([':id' => $id]);

    // Supprimer la catégorie
    $sql = "DELETE FROM categories WHERE id_category = :id";
    $request = $pdo->prepare($sql);
    $request->execute(array(':id' => $id));
}

?>