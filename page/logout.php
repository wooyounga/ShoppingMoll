<?php
    session_start();
    unset($_SESSION['login_user']);

    echo "<script>location.href = '../main.php'</script>";
?>
