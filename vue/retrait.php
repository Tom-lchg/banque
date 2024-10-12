<section id="retrait">
    <h2>Retrait</h2>
    <form action="./index.php?action=retrait" method="post">
        <label for="montant">montant</label>
        <input type="number" name="montant" />
        <input type="submit" name="retrait" value="Retirer">
    </form>

    <?php if(isset($_GET['msg'])): ?>
        <p>Solde négatif impossible</p>
    <?php endif; ?>
</section>