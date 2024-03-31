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

// validation de le formulaire
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


//myForm.addEventListener('submit', function(event){
  //event.preventDefault();
   
//     let valueFullName = inputFullName.value.trim();
//     let valueLastName = inputLastName.value.trim();
//     let valueChoice = inputChoice.value;
//     let valueEmail = inputEmail.value.trim();
//     let valueMessage = inputMessage.value.trim();

//     fullnameError.textContent = '';
//     lastnameError.textContent = '';
//     choiceError.textContent = '';
//     emailError.textContent = '';
//     messageError.textContent = '';
    

// // To verify that the name field is not empty
//   if (valueFullName === '') {
//     fullnameError.textContent = 'Veuillez entrer votre prenom';
//     inputFullName.focus();
//     return;
//   }

// //To verify that the lasstname field is not empty
//   if (valueLastName === '') {
//     lastnameError.textContent = 'Veuillez entrer votre nom';
//     inputLastName.focus();
//     return;
//   }

// //To verify that the choice field is not empty
//   if ( valueChoice == "") {
//     choiceError.textContent = 'Vous devez choisir une option';
//     inputChoice.focus();
//     return;
//   }

// // To verify that the email field is not empty
//   if (valueEmail === '') {
//     emailError.textContent = 'Veuillez entrer votre email';
//     inputEmail.focus();
//     return;
//   }

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

// //To verify that the text field has 15 characters at hand
//   if (valueMessage.length < 30) {
//     messageError.textContent = 'Votre message doit comporter au moins 30 caractères';
//     inputMessage.focus();
//     return;
//   }

//   //Email validation
  
//   let regexMail = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

//   if (!regexMail.test(valueEmail)) { 
//     emailError.textContent = 'Lemail saisi nest pas correct';
//     return;
// }

// //If all the fields are correct, send the form and clean it
// //alert('Formulaire soumis avec succès');
// inputFullName.style.borderColor = 'green';
// inputLastName.style.borderColor = 'green';
// inputChoice.style.borderColor = 'green';
// inputEmail.style.borderColor = 'green';
// inputMessage.style.borderColor = 'green';
// myForm.reset();

// });







    