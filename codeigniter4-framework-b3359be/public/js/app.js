const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', async function(event) {
    event.preventDefault(); // On bloque l'envoi classique

    const useremail = this.querySelector('input[name="email"]');
    const userpwd   = this.querySelector('input[name="mdp"]');
    
    const generalErrorDiv = document.getElementById('js-error-message');
    const generalErrorSpan = generalErrorDiv.querySelector('.msg-content');

    let isValid = true;

    generalErrorDiv.style.display = 'none';
    [useremail, userpwd].forEach(input => input.classList.remove('input-error'));


    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(useremail.value)) {
        useremail.classList.add('input-error');
        isValid = false;
    }

    if (userpwd.value.length < 6) {
        userpwd.classList.add('input-error');
        isValid = false;
    }

    if (!isValid) {
        generalErrorSpan.innerText = "Veuillez corriger les erreurs dans le formulaire.";
        generalErrorDiv.style.display = 'block';
        return; 
    }


    const formData = new FormData(this);

    try {
        const response = await fetch(this.getAttribute('data-url'), {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        const result = await response.json();

        if (response.ok && result.success) {
            window.location.href = result.redirect;
        } else {
            generalErrorSpan.innerText = result.message || 'Identifiants incorrects.';
            generalErrorDiv.style.display = 'block';
            userpwd.classList.add('input-error');
        }
    } catch (error) {
        console.error('Erreur Fetch:', error);
        generalErrorSpan.innerText = "Serveur injoignable.";
        generalErrorDiv.style.display = 'block';
    }
});