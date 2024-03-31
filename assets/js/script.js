// Il semble que vous ayez un conflit de fusion dans votre code JavaScript. Voici une résolution possible pour le conflit de fusion :

JavaScript

// menu d'inscription et de connexion
document.getElementById('dropdownIcon').addEventListener('click', function () {
    let dropdownMenu = document.getElementById('dropdownMenu');

    if (dropdownMenu.style.display === 'none') {  //Vérifiez que le menu dropdown n'est pas affiché sur la page
        dropdownMenu.style.display = 'block';    //Afficher le menu dropdown avec blok
    } else {
        dropdownMenu.style.display = 'none';
    }
});

// Pour afficher et masquer le mot de pass du le formulaire sans changer la forme du l'icone

let champPasword = document.getElementById("password");
let show = document.getElementById("togglePassword");
let eyeIcon = document.querySelector(".iconeye");

show.addEventListener("click", function () {
    if (champPasword.type === "password") {
        champPasword.type = "text";
        eyeIcon.classList.remove("bi-eye-slash");
        eyeIcon.classList.add("bi-eye");
    } else {
        champPasword.type = "password";
        eyeIcon.classList.remove("bi-eye");
        eyeIcon.classList.add("bi-eye-slash");
    }
});

//Pour montrer et masquer la confirmation du le mot de pass du le formulaire 

let champConfirmdp = document.getElementById("confirmPassword");
let showConfirMdp = document.getElementById("toggleConfirmPassword");
let eyeIconCmdp = document.querySelector(".iconeye1");

showConfirMdp.addEventListener("click", function () {
    if (champConfirmdp.type === "password") {
        champConfirmdp.type = "text";
        eyeIconCmdp.classList.remove("bi-eye-slash");
        eyeIconCmdp.classList.add("bi-eye");
    } else {
        champConfirmdp.type = "password";
        eyeIconCmdp.classList.remove("bi-eye");
        eyeIconCmdp.classList.add("bi-eye-slash");
    }
});

// validation de le formulaire
let myForm = document.querySelector('form');
let inputPrenom = document.getElementById('prenom');
let prenomError = document.getElementById('prenomError');
let inputNom = document.getElementById('nom');
let nomError = document.getElementById('nomError');
let inputTelephone = document.getElementById('tel');
let telError = document.getElementById('telephoneError');
let inputEmail = document.getElementById('email');
let emailError = document.getElementById('emailError');
let inputPassword = document.getElementById('password');
let passwordError = document.getElementById('passwordError');
let inputConfirmPwd = document.getElementById('confirmPassword');
let confirmPwdError = document.getElementById('confirmPwdError');
let inputChoice = document.getElementById('choice');
let choiceError = document.getElementById('choiceError');
let inputCodePostal = document.getElementById('cpostal');
let codePostalError = document.getElementById('cpostalerror');
let inputVille = document.getElementById('ville');
let villError = document.getElementById('villerror');
let inputPays = document.getElementById('pays');
let paysError = document.getElementById('payserror');

myForm.addEventListener('submit', function (event) {
    event.preventDefault();

    let valueFullName = inputFullName.value.trim();
    let valueLastName = inputLastName.value.trim();
    let valueChoice = inputChoice.value;
    let valueEmail = inputEmail.value.trim();
    let valueMessage = inputMessage.value.trim();

    fullnameError.textContent = '';
    lastnameError.textContent = '';
    choiceError.textContent = '';
    emailError.textContent = '';
    messageError.textContent = '';


    // To verify that the name field is not empty
    if (valueFullName === '') {
        fullnameError.textContent = 'Veuillez entrer votre prenom';
        inputFullName.focus();
        return;
    }

    //To verify that the lasstname field is not empty
    if (valueLastName === '') {
        lastnameError.textContent = 'Veuillez entrer votre nom';
        inputLastName.focus();
        return;
    }

    //To verify that the choice field is not empty
    if (valueChoice == "") {
        choiceError.textContent = 'Vous devez choisir une option';
        inputChoice.focus();
        return;
    }

    // To verify that the email field is not empty
    if (valueEmail === '') {
        emailError.textContent = 'Veuillez entrer votre email';
        inputEmail.focus();
        return;
    }

    //To verify that the name field contains two characters
    if (valueFullName.length < 2) {
        // Si el campo de nombre excede los 50 caracteres, mostramos un mensaje de error
        fullnameError.textContent = 'Votre prenom dois etre deus caracteres';
        inputFullName.focus();
        return;
    }

    //To verify that the last field contains two characters
    if (valueLastName.length < 2) {
        // Si el campo de nombre excede los 50 caracteres, mostramos un mensaje de error
        lastnameError.textContent = 'Votre nom doit faire au moins deux caracteres';
        inputLastName.focus();
        return;
    }

    //To verify that the text field has 15 characters at hand
    if (valueMessage.length < 30) {
        messageError.textContent = 'Votre message doit comporter au moins 30 caractères';
        inputMessage.focus();
        return;
    }

    //Email validation

    let regexMail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

    if (!regexMail.test(valueEmail)) {
        emailError.textContent = 'Lemail saisi nest pas correct';
        return;
    }

    //If all the fields are correct, send the form and clean it
    //alert('Formulaire soumis avec succès');
    inputFullName.style.borderColor = 'green';
    inputLastName.style.borderColor = 'green';
    inputChoice.style.borderColor = 'green';
    inputEmail.style.borderColor = 'green';
    inputMessage.style.borderColor = 'green';
    myForm.reset();

});
// Code généré par l'IA. Examinez et utilisez soigneusement. Plus d'informations sur la FAQ.
// Dans ce code, j’ai résolu le conflit de fusion en conservant les commentaires et le code de la version “main”. J’ai également conservé les erreurs de validation du formulaire de la version “main”.