// menu d'inscription et de connexion
document.getElementById('dropdownIcon').addEventListener('click', function() {
    let dropdownMenu = document.getElementById('dropdownMenu');
    
   // console.log(dropdownMenu);//
   // console.log("El archivo JavaScript se ha ejecutado correctamente");//

    if (dropdownMenu.style.display === 'none') {  //Vérifiez que le menu dropdown n'est pas affiché sur la page
        dropdownMenu.style.display = 'block';    //Afficher le menu dropdown avec blok
    } else {
        dropdownMenu.style.display = 'none';
    }
});

