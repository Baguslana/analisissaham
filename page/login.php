<?php
// session_start();
if (!empty($_SESSION['email'])) {
    header('location:Dashboard');
}
?>

<form action="proses_login.php" method="POST" class="needs-validation" novalidate>
    <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Email address</label>
        <div class="invalid-feedback">
            Masukan Email Addreess.
        </div>
    </div>
    <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
        <div class="invalid-feedback">
            Masukan Password.
        </div>
    </div>
    <p class="my-3">Belum Punya Akun? <a href="#" data-bs-toggle="modal" data-bs-target="#register">Register</a></p>
    <button type="submit" name="submit_validate" type="submit" value="submit" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Login</button>
</form>

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_register.php" method="POST" class="needs-validation" novalidate>
                <div class="modal-body">
                    <input type="text" name="level" value="2" hidden>
                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Nama Lengkap</label>
                        <div class="invalid-feedback">
                            Masukan Nama Lengkap.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                        <div class="invalid-feedback">
                            Masukan Email Addreess.
                        </div>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <div class="invalid-feedback">
                            Masukan Password.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="register_validate" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>