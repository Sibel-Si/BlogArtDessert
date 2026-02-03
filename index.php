<?php 
require_once 'header.php';
//sql_connect();


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Consentement Cookies</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        /* Couleurs personnalisées */
        .modal-header {
            background-color: #C66D25;
        }

        .modal-header h5 {
            color: white;
        }

        .btn-primary {
            background-color: #C66D25;
            border-color: #C66D25;
        }

        .btn-primary:hover {
            background-color: #561D0B;
            border-color: #561D0B;
        }

        .btn-outline-primary {
            color: #C66D25;
            border-color: #C66D25;
        }

        .btn-outline-primary:hover {
            background-color: #C66D25;
            color: white;
        }

        .text-cookie {
            color: #561D0B;
        }

        .modal-content {
            border: 2px solid #E7A564;
        }
    </style>
</head>

<body>

    <!-- Modal -->
    <div class="modal fade" id="cookieconsent2" tabindex="-1" aria-labelledby="cookieconsentLabel2" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="cookieconsentLabel2">Cookies & Confidentialité</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-cookie-bite fa-4x text-cookie"></i>
                        </div>

                        <div class="col-9">
                            <p class="text-cookie">
                                Ce site utilise des cookies afin de vous garantir la meilleure expérience possible.
                                <a class="d-block" href="#" style="color:#C66D25;">En savoir plus sur les cookies</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- Refuser NE FERME PLUS la pop-up -->
                    <button type="button" class="btn btn-outline-primary" onclick="refuseCookies()">
                        Refuser
                    </button>

                    <!-- Accepter ferme la pop-up -->
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        Accepter
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script CNIL : ouverture automatique + refus bloquant -->
    <script>
        // Ouverture automatique au chargement
        window.onload = function () {
            const modal = new bootstrap.Modal(document.getElementById('cookieconsent2'));
            modal.show();
        };

        // Refus bloquant
        function refuseCookies() {
            alert("Vous devez accepter les cookies pour continuer la navigation.");
            // La pop-up reste ouverte
        }
    </script>
    <meta charset="UTF-8">
    <title>Les Délices Bordelais</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font proche de ta maquette -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #F7EEDB;
            /* beige doux */
            font-family: 'Poppins', sans-serif;
        }

        header {
            background-color: #F3D9B1;
            /* beige plus chaud */
            border-bottom: 3px solid #C49A6C;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #5A3E2B;
            /* marron foncé */
            font-weight: 600;
        }

        .btn-caramel {
            background-color: #C49A6C;
            color: white;
            border: none;
        }

        .btn-caramel:hover {
            background-color: #A67F55;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .category-card {
            background-color: #FFF7EB;
            border: 2px solid #E2C9A6;
        }

        footer {
            background-color: #F3D9B1;
            border-top: 3px solid #C49A6C;
        }
    </style>
    </head>

    <body>

        <!-- HEADER -->
        <header class="py-3 mb-4">
            <div class="container d-flex justify-content-between align-items-center">
                <h1 class="h3 m-0">Les Délices Bordelais</h1>

                <nav>
                    <a href="login.php" class="btn btn-outline-dark me-2">Login</a>
                    <a href="signup.php" class="btn btn-caramel">Sign Up</a>
                </nav>
            </div>
        </header>

        <div class="container">

            <!-- CARD PRINCIPALE -->
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="https://picsum.photos/400/300" class="img-fluid" alt="Image du blog">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">Les Délices Bordelais</h2>
                            <p class="card-text">Le blog gourmand autour des spécialités bordelaises.</p>
                            <a href="#" class="btn btn-caramel">Découvrir</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATÉGORIES -->
            <h3 class="mb-3">Catégories</h3>
            <div class="row mb-5">

                <div class="col-md-4">
                    <div class="card category-card text-center p-4">
                        <h4 class="card-title">Canelé</h4>
                        <a href="#" class="btn btn-caramel mt-2">Voir</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card category-card text-center p-4">
                        <h4 class="card-title">Croissant</h4>
                        <a href="#" class="btn btn-caramel mt-2">Voir</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card category-card text-center p-4">
                        <h4 class="card-title">Baguette</h4>
                        <a href="#" class="btn btn-caramel mt-2">Voir</a>
                    </div>
                </div>

            </div>

            <!-- ARTICLES RÉCENTS -->
            <h3 class="mb-3">Articles récents</h3>
            <div class="row mb-5">

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://picsum.photos/400/250?1" class="card-img-top" alt="Article 1">
                        <div class="card-body">
                            <h5 class="card-title">Titre article 1</h5>
                            <p class="card-text">Petit résumé de l’article...</p>
                            <a href="#" class="btn btn-caramel">Lire</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://picsum.photos/400/250?2" class="card-img-top" alt="Article 2">
                        <div class="card-body">
                            <h5 class="card-title">Titre article 2</h5>
                            <p class="card-text">Petit résumé de l’article...</p>
                            <a href="#" class="btn btn-caramel">Lire</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://picsum.photos/400/250?3" class="card-img-top" alt="Article 3">
                        <div class="card-body">
                            <h5 class="card-title">Titre article 3</h5>
                            <p class="card-text">Petit résumé de l’article...</p>
                            <a href="#" class="btn btn-caramel">Lire</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <footer class="text-center py-4 mt-5">
            <p class="m-0">Blog'Art 26</p>
            <p class="m-0">Crédits site — Plan du site — CGU — RGPD — Mentions légales</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>

<?php require_once 'footer.php'; ?>