// menu d'inscription et de connexion
document.getElementById('dropdownIcon').addEventListener('click', function () {
    let dropdownMenu = document.getElementById('dropdownMenu');

    // console.log(dropdownMenu);//
    // console.log("El archivo JavaScript se ha ejecutado correctamente");//

    if (dropdownMenu.style.display === 'none') {  //Vérifiez que le menu dropdown n'est pas affiché sur la page
        dropdownMenu.style.display = 'block';    //Afficher le menu dropdown avec blok
    } else {
        dropdownMenu.style.display = 'none';
    }
});

// Pour afficher et masquer le mot de passe
function togglePasswordVisibility() {
    let passwordInput = document.getElementById('password-input');
    let eyeIcon = document.getElementById('eye-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
