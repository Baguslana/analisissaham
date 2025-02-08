<?php
session_start();
include "connect.php";

$email = (isset($_POST['email'])) ? htmlentities($_POST['email']) : "";
$password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";

if (!empty(isset($_POST['submit_validate']))) {
    $query = mysqli_query($con, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
    $return = mysqli_fetch_array($query);
    if ($return) {
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $return['id_user'];
        $_SESSION['level'] = $return['level'];
        header('location:../Dashboard');
    } else {
?>
        <script>
            alert("email dan Password tidak sesuai");
            window.location = "../login";
        </script>
<?php
    }
}
?>