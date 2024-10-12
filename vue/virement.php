<section id="virement">
    <h2>Virement</h2>
    <form action="./index.php?action=virement" method="POST">
        <label for="compte">Destinataire</label>
        <select name="compte" id="compte">
            <?php foreach($comptes as $compte): ?>
                <option value="<?= $compte['compte']->getClientId(); ?>"><?= $compte['client']->getPrenom(); ?> <?= $compte['client']->getNom(); ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="montant">montant</label>
        <input type="number" name="montant" required/>
        <input type="submit" name="virer" value="Virer">
    </form>

    <?php if(isset($_GET['msg'])): ?>
        <p>Solde négatif impossible</p>
    <?php endif; ?>
</section>