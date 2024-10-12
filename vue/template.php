<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banque</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./index.php">Home</a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="./index.php?action=solde">Solde</a>
                <a class="nav-item nav-link" href="./index.php?action=virement">Virement</a>
                <a class="nav-item nav-link" href="./index.php?action=depot">Dépôt</a>
                <a class="nav-item nav-link" href="./index.php?action=retrait">Retrait</a>
                <a class="nav-item nav-link" href="./index.php?action=inscription">Inscription</a>

                <?php if(isset($_SESSION['idClient'])): ?>
                    <a class="nav-item nav-link" href="./index.php?action=deconnexion">deconnexion (<?= $_SESSION['emailClient'] ?>)</a>
                <?php else: ?>
                    <a class="nav-item nav-link" href="./index.php?action=connexion">Connexion</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>

    <main>
        <?= $content ?? ''; ?>
    </main>

    <script src="./public/js/main.js"></script>
</body>
</html>