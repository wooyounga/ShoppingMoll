<?php
    require_once '../library/user_db.php';
    session_start();

    try {
        $db = new PDOConfig();

        if (isset($_POST['id']) && isset($_POST['passwd'])) {
            $id = $_POST['id'];
            $passwd = $_POST['passwd'];

            $sql = "SELECT user_id FROM member WHERE user_id = '$id' and user_pw = '$passwd'";
            $stt = $db->prepare($sql);
            $stt->execute();
            $temp = $stt->rowCount();

            if ($temp == 1) {
                $_SESSION['login_user'] = $id;

                header('location:../main.php');
            } else {
                echo "
               <script>
                 window.alert('아이디 혹은 비밀번호가 잘못되었습니다.');
                 history.go(-1);
               </script>
             ";
            }
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>