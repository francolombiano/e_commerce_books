// menu d'inscription et de connexion
document.getElementById('dropdownIcon').addEventListener('click', function() {
    let dropdownMenu = document.getElementById('dropdownMenu');
    
   // console.log(dropdownMenu);//
   //console.log("El archivo JavaScript se ha ejecutado correctamente");//

    if (dropdownMenu.style.display === 'none') {  //Vérifiez que le menu dropdown n'est pas affiché sur la page
        dropdownMenu.style.display = 'block';    //Afficher le menu dropdown avec blok
    } else {
        dropdownMenu.style.display = 'none';
    }
});

// Pour afficher et masquer le mot de pass du le formulaire sans changer la forme du l'icone

// let show = document.getElementById("password");
// console.log("el archivo se esta ejecutando correctamente");
// let icon =document.querySelector(".iconeye");

// icon.addEventListener("click", e=> {
//     if(show.type==="password"){
//        show.type="text";
//     }else{
//     show.type= "password"
//     }});

let champPasword = document.getElementById("password");
//console.log(champPasword);
let show = document.getElementById("togglePassword");
//console.log(togglePassword);
let eyeIcon = document.querySelector(".iconeye");
//console.log(eyeIcon);

show.addEventListener("click", function() {
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
//console.log(champPasword);
let showConfirMdp = document.getElementById("toggleConfirmPassword");
//console.log(togglePassword);
let eyeIconCmdp = document.querySelector(".iconeye1");
//console.log(eyeIcon);

showConfirMdp.addEventListener("click", function() {
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

// validation de le formulaire*******************
let myForm = document.querySelector('form');
//console.log(myForm);
 let inputPrenom = document.getElementById('prenom');
// console.log(inputPrenom);
 let prenomError = document.getElementById('prenomError');
// console.log(prenomError);
let inputNom = document.getElementById('nom');
//console.log(inputNom);
let nomError = document.getElementById('nomError');
//console.log(nomError);
let inputTelephone = document.getElementById('tel');
//console.log(inputTelephone);
let telError = document.getElementById('telephoneError');
//console.log(telError);
let inputEmail = document.getElementById('email');
//console.log(inputEmail);
let emailError = document.getElementById('emailError');
//console.log(emailError);
let inputPassword = document.getElementById('password');
//console.log(inputPassword);
let passwordError = document.getElementById('passwordError');
//console.log(passwordError);
let inputConfirmPwd = document.getElementById('confirmPassword');
//console.log(inputConfirmPwd);
let confirmPwdError = document.getElementById('confirmPwdError');
//console.log(confirmPwdError);
let inputChoice = document.getElementById('choice');
//console.log(inputChoice);
let choiceError = document.getElementById('choiceError');
//console.log(choiceError);
let inputCodePostal = document.getElementById('cpostal');
//console.log(inputCodePostal);
let codePostalError = document.getElementById('cpostalerror');
//console.log(codePostalError);
let inputVille = document.getElementById('ville');
//console.log(inputVille);
let villError = document.getElementById('villerror');
//console.log(villError);
let inputPays = document.getElementById('pays');
//console.log(inputPays);
let paysError = document.getElementById('payserror');
//console.log(paysError);
// let messageError = document.getElementById('messageError');


myForm.addEventListener('submit', function(event){
            event.preventDefault();
    let valuePrenom = inputPrenom.value.trim();
    let valueNom = inputNom.value.trim();
    let valueEmail = inputEmail.value.trim();
    let valueCodePostal = inputCodePostal.value.trim();
    let valueVille = inputVille.value.trim();
    let valuePays = inputPays.value.trim();
    let valueTelephone = inputTelephone.value;
    let valueChoice = inputChoice.value;
    let valuePassword = inputPassword.value;
    let valueConfirmPwd = inputConfirmPwd.value;


        prenomError.textContent = '';
        nomError.textContent = '';
        telError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';
        confirmPwdError.textContent = '';
        choiceError.textContent = '';
        codePostalError.textContent ='';
        villError.textContent = '';
        paysError.textContent = '';
    
//Vérifiez que le champ du nom n'est pas vide
  if (valuePrenom === '') {
    prenomError.textContent = 'Veuillez entrer votre prenom';
    inputPrenom.focus();
    return;
}

if (valuePrenom.length < 3 || valuePrenom.length > 20) {
    prenomError.textContent = 'Le prenom doit comporter entre 3 et 10 caractères..';
    inputPrenom.focus(); 
    return false;
    }

// Vérifiez que le champ Nom de famille n'est pas vide
  if (valueNom === '') {
    nomError.textContent = 'Veuillez entrer votre nom';
    inputNom.focus();
       return;
    }

    if (valueNom.length < 3 || valueNom.length > 20) {
        nomError.textContent = 'Le nom de famille doit comporter entre 3 et 10 caractères.';
        inputNom.focus(); 
        return false;
    }

//Pour vérifier que le champ téléphone n'est pas vide et est correctement renseigné
if (valueTelephone.length < 10) {
    telError.textContent = "Please enter a valid phone number";
  } else {
    telError.textContent = "";
  }
  

// if (valueTelephone === ''|| valueTelephone.length !== 10) {
    //     telError.textContent = 'Vous devez entrer un numéro de téléphone valide';
    //     inputTelephone.focus();
    //     return;
    // } else {
    //     telError.textContent = '';
    //     return;
    // }

// Pour vérifier que le champ email n'est pas vide

    if (valueEmail === '') {
       emailError.textContent = 'Veuillez entrer votre email';
       inputEmail.focus();
        return;
         }

// Expression régulière pour valider le format de l'e-mail
let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (!emailRegex.test(valueEmail)) { 
    emailError.textContent = 'Veuillez entrer un email valide';
    inputEmail.focus();
    return;
}else {
        emailError.textContent = '';
     }

if (valuePassword === '') {
    passwordError.textContent = 'Vous devez entrer un mot de passe valide';
    inputPassword.focus();
    return;
    }

if (valueConfirmPwd === '') {
    confirmPwdError.textContent = 'Vous devez confirmer le mot de passe';
    inputEmail.focus();
    return;
}

// Expression régulière pour valider le format du mot de passe, Le mot de passe doit comporter au moins 8 caractères, 1 lettre majuscule, 1 lettre minuscule, 1 chiffre et 1 caractère spécial (entre !@#$%^&*(),.?":{}|<>).

let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

if (!passwordRegex.test(valuePassword)) {
    passwordError.textContent = "Le mot de passe doit contenir au moins 8 caractères, 1 majuscule, 1 minuscule, 1 chiffre, et 1 caractère spécial.";
    inputPassword.focus();
    return;
} else {
    passwordError.textContent = '';
}


// Pour valider la confirmation du mot de passe
    if (valuePassword !== valueConfirmPwd) {
        confirmPwdError.textContent = "Les mots de passe ne correspondent pas.";
        inputConfirmPwd.focus();
        return;
    } else {
        confirmPwdError.textContent = '';
    }

// Pour vérifier que le champ civilité n'est pas vide
   if (valueChoice == "") {
     choiceError.textContent = 'Vous devez choisir une option';
       inputChoice.focus();
    return;
   }

// Pour vérifier que le champ code postal n'est pas vide
   if (valueCodePostal == "") {
    codePostalError.textContent = 'Vous devez préciser un code postal';
      inputCodePostal.focus();
   return;
  }

// Pour vérifier que le ville n'est pas vide 
  if (valueVille == "") {
    villError.textContent = 'Vous devez préciser une Ville';
      inputVille.focus();
   return;
  }

//   Pour valider que la ville ne contient que des lettres et des espaces
//   let villeRegex = /^[A-Za-z\s]+$/; 
//   if (!villeRegex.test(valueVille)) {
//        villError.textContent = 'Veuillez saisir une ville valide.';
//        inputVille.focus();
//        return false;
//   } else { return true;
// }

if (valueVille.length < 3 || valueVille.length > 20) {
   villError.textContent = 'Vous devez saisir un nom de ville valide.';
   inputVille.focus(); 
   return false;
}


// Pour vérifier que le champ pays n'est pas vide
if (valuePays == "") {
    paysError.textContent = 'Vous devez préciser un pays';
      inputPays.focus();
   return;
  }


// //To verify that the name field contains two characters
//   if (valueFullName.length < 2) {
//     // Si el campo de nombre excede los 50 caracteres, mostramos un mensaje de error
//     fullnameError.textContent = 'Votre prenom dois etre deus caracteres';
//     inputFullName.focus();
//     return;
//   }

//   //To verify that the last field contains two characters
//   if (valueLastName.length < 2) {
//     // Si el campo de nombre excede los 50 caracteres, mostramos un mensaje de error
//     lastnameError.textContent = 'Votre nom doit faire au moins deux caracteres';
//     inputLastName.focus();
//     return;
//   }

// //If all the fields are correct, send the form and clean it
// //alert('Formulaire soumis avec succès');
inputPrenom.style.borderColor = 'red';
inputNom.style.borderColor = 'red';
inputTelephone.style.borderColor = 'red';
inputEmail.style.borderColor = 'red';
inputPassword.style.borderColor = 'red';
inputConfirmPwd.style.borderColor = 'red';
inputChoice.style.borderColor = 'red';
inputCodePostal.style.borderColor = 'red';
inputVille.style.borderColor = 'red';
inputPays.style.borderColor = 'red';

myForm.reset();


});







    