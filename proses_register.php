<?php
include "connect.php";

$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : "";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";

if (!empty(isset($_POST['register_validate']))) {
    $select = mysqli_query($con, "SELECT * FROM user WHERE email = '$email' AND nama = '$nama'");
    if (mysqli_num_rows($select) > 0) {
        $massage = '
        <script>
        window.location = "../Login";
        alert("nama ' . $nama . ' & email ' . $email . '  sudah terdaftar");
        </script>
        ';
    } else {
        $query = mysqli_query($con, "INSERT INTO user (nama, email, password, level ) VALUES ('$nama', '$email', '$password', '$level')");
        if ($query) {
            $massage = '
        <script>
        window.location = "../Login";
        alert("Berhasil Menambahkan ' . $email . '");
        </script>
        ';
        } else {
            $massage = '
        <script>
        window.location = "../Login";
        alert("Gagal insert data");
        </script>
        ';
        }
    }
}

echo $massage;
