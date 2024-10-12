<section id="ouvrir">
    <form method="POST" action="./index.php?action=openAccount" id="form">
        <div class="form-group">
            <label for="numeroCompte">Numéro de compte</label>
            <input type="text" class="form-control" id="numeroCompte" name="numeroCompte"
            placeholder="Numéro de compte" required>
        </div>
        <div class="form-group">
            <label for="solde">Solde</label>
            <input type="number" class="form-control" id="solde" name="solde" placeholder="Solde initial"
            min="10" max="2000" required>
        </div>
        <div class="form-group">
            <label for="typeDeCompte">Type de compte</label>
            <select class="form-control" id="typeDeCompte" name="typeDeCompte" required>
                <option value="courant">Courant</option>
                <option value="epargne">Épargne</option>
                <option value="entreprise">Entreprise</option>
            </select>
        </div>
        <div id="messageErreur"></div>
        <button type="submit" class="btn btn-primary" name='ouvrir_compte' id="create_account">Créer compte</button>
    </form>
</section>
