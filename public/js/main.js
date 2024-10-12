document.getElementById('form').addEventListener('submit', function (event) {
    event.preventDefault();

    const numeroCompte = document.getElementById('numeroCompte').value;
    const solde = parseFloat(document.getElementById('solde').value);
    const typeDeCompte = document.getElementById('typeDeCompte').value;
    const motDePasse = document.getElementById('motDePasse') ? document.getElementById('motDePasse').value : '';

    const erreurs = [];

    if (numeroCompte.length < 5 || numeroCompte.length > 15) {
        erreurs.push("Le numéro de compte doit contenir entre 5 et 15 caractères.");
    }

    if (solde < 10 || solde > 2000) {
        erreurs.push("Le solde doit être compris entre 10 et 2000.");
    }

    const typesValid = ['courant', 'epargne', 'entreprise'];
    if (!typesValid.includes(typeDeCompte)) {
        erreurs.push("Le type de compte doit être 'courant', 'épargne' ou 'entreprise'.");
    }


    if (motDePasse.includes(' ')) {
        erreurs.push("Le mot de passe ne doit pas contenir d'espaces.");
    }

    const messageErreur = document.getElementById('messageErreur');
    messageErreur.innerHTML = '';
    if (erreurs.length > 0) {
        messageErreur.innerHTML = erreurs.join('<br>');
        messageErreur.style.color = 'red';
        return;
    }

    this.submit();
});