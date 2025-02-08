<form action="proses_register.php" method="POST" class="needs-validation" novalidate>
    <input type="text" name="level" value="2" hidden>
    <div class="form-floating mb-3">
        <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="name@example.com" required>
        <label for="floatingInput">Nama Lengkap</label>
        <div class="invalid-feedback">
            Masukan Email Addreess.
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
    <button type="submit" name="submit_validate" type="submit" value="submit" class="btn btn-primary btn-sm"><i class="bi bi-box-arrow-in-right"></i> Login</button>
</form>