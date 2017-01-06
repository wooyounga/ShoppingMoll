<?php
    session_start();
    require_once '../library/user_db.php';

    try{
        $db = new PDOConfig();

        if($_SESSION['login_user'] != 'root') {
            $g_name = $_POST['g_name'];
            $b_sum = $_POST['b_sum'];
            $user = $_SESSION['login_user'];
            $b_day = $_POST['b_day'];

            $sql = "delete from buy where b_name = '$g_name' and b_sum = $b_sum and b_user = '$user' and b_day='$b_day'";
            $stt = $db->prepare($sql);
            $stt->execute();

            $sql = "update goods set g_sum = g_sum + $b_sum where g_name = '$g_name'";
            $stt = $db->prepare($sql);
            $stt->execute();

            if ($stt) {
                echo "<script>window.alert('정상적으로 취소가 완료되었습니다.')</script>";
                echo "<script>location.href='./buy_view.php'</script>";
            }
        }else{
            echo "
               <script>
                 window.alert('관리자의 접근이 불필요한 페이지입니다.');
                 history.go(-1);
               </script>
             ";
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>