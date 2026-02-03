<

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <title>Consentement Cookies</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    
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
