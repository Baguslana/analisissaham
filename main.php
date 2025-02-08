<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Analisis Saham | <?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
</head>

<body>
    <div class="row flex justify-content-center m-0 bg-light-subtle">
        <div class="col-lg-6 col-sm-6 shadow py-3 px-4 bg-light">
            <div style="position: relative; background-image: url(assets/img/dashboard.jpg); background-size: cover; background-position-y: 60%; border-radius: 11px;">
                <div class="text-center mb-3 pb-2">
                    <div style="position: absolute; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.7); width: 100%; height: 100%; border-radius: 11px;"></div>
                    <div style="position: relative;" class="text-center">
                        <h1 class="fw-bold pt-3 text-light">Analasis Saham</h1>
                        <p class="mb-1 text-light">Bagus Nurlana | 2206700015</p>
                        <div class="w-100 d-flex justify-content-center gap-3">
                            <a href="https://www.instagram.com/alfinyasa/" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-instagram"></i></a>
                            <a href="https://github.com/Baguslana" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-github"></i></a>
                            <a href="https://www.linkedin.com/in/bagusnurlana/" class="text-decoration-none fw-bold text-primary fs-5 me-3"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-top py-4">
                <p class="mb-2" style="text-align: justify;">Ini adalah aplikasi yang berisikan beberapa list saham yang ada di Indonesia yang nantinya dapat melakukan analisis saham dari data yang ada. Data saham diambil dari situs <a href="https://www.kaggle.com/code/haidhiangkawijana/prediksi-saham-lstm/input" class="text-decoration-none fw-bold text-primary">Kaggle</a> yang dibuat oleh seseorang yang bernama <a href="https://www.kaggle.com/code/haidhiangkawijana/prediksi-saham-lstm/input" class="text-decoration-none fw-bold text-primary">Haidhi Angkawijana</a>. Dengan berisikan kurang lebih 800 saham dari seluruh Indonesia </p>
                <a href="#" class="text-decoration-none fw-bold text-primary">Selengkapnya</a>
            </div>

            <!-- data table -->
            <div class="border-top py-4" id="">
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="fw-bold mb-3"><?= $title; ?></h3>
                    <?php if ($title != "Login") : ?>
                        <div class="d-flex gap-3 align-items-center">
                            <p><i class="bi bi-person-circle"></i> <?= $_SESSION['email']; ?></p>
                            <a href="Logout" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-right"></i> Logout</a>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div id="pageContent">
                        <?php
                        if ($title != "Login") {
                            if (empty($_SESSION['email'])) {
                                header('location:Login');
                            }
                        }
                        include $page;
                        ?>
                    </div>
                </div>
            </div>

            <div class="border-top text-center pt-4">
                <p>© 2023. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>