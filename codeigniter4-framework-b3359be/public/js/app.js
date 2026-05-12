const form = document.getElementById('logForm');

form.addEventListener('submit', function(event){

    event.preventDefault();

    const username = document.getElementById('nom');
    const useremail = document.getElementById('email');
    const userpwd = document.getElementById('mdp');

    const errorNom = document.getElementById('nomError');
    const errorEmail = document.getElementById('emailError');
    const errorMdp = document.getElementById('mdpError');

    let isValid = true;

    [errorNom, errorEmail, errorMdp].forEach(span => {
        span.textContent = "";
    });

    [username, useremail, userpwd].forEach(input => {
        input.classList.remove('input-error');
    });

    if(username.value.trim().length < 3){

        errorNom.textContent =
            "Le nom doit contenir au moins 3 caractères.";

        username.classList.add('input-error');

        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailRegex.test(useremail.value)){

        errorEmail.textContent =
            "Veuillez entrer une adresse email valide.";

        useremail.classList.add('input-error');

        isValid = false;
    }

    if(userpwd.value.length < 6){

        errorMdp.textContent =
            "Le mot de passe doit contenir au moins 6 caractères.";

        userpwd.classList.add('input-error');

        isValid = false;
    }

    if(isValid){

        alert("🎉 Formulaire validé !");

    }

});