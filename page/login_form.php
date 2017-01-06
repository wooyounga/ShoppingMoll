<!doctype html>
<html>
<head>
    <title>로그인</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login_form.css">
</head>
<body>
    <div id="header">
    <?php require_once '../library/nav2.php' ?>
    </div>
    <div class = "login_form">
        <form method="post" action="login.php">

            <input type="text" name="id" class="id_input"><br>
            <input type="password" name="passwd" class="passwd_input">
            <input type="image" src="../img/login_btn.jpg" width="140" height="90" id="login">
            <a href="./member_form.php" class="member_input">회원가입</a>
            </form>
    </div>
<br><br>
</body>
</html>