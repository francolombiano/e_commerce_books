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

function inscriptionUsers(string $prenom, string $nom, string $tel, string $email, string $password, string $confirmPassword, string $choice, string $cpostal, string $ville, string $pays): void
{

    $pdo = connexionBdd(); // je stock ma connexion  à la BDD dans une variable

    $sql = "INSERT INTO users 
        (prenom, nom, tel, email, password, confirmPassword, choice, cpostal, ville, pays)
        VALUES
        (:prenom, :nom, :tel, :email, :password, :confirmPassword, :choice, :cpostal, :ville, :pays)"; // Requête d'insertion que je stock dans une variable
    $request = $pdo->prepare($sql); // Je prépare ma requête et je l'exécute
    $request->execute(
        array(
            ':prenom' => $prenom,
            ':nom' => $nom,
            ':tel' => $tel,
            ':email' => $email,
            ':password' => $password,
            ':confirmPassword' => $confirmPassword,
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


?>