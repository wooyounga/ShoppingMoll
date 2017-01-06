<?php
    session_start();
    require_once '../library/user_db.php';

    try {
        if (isset($_SESSION['login_user']) && isset($_POST['g_name']) && $_SESSION['login_user'] != 'root') {
            $db = new PDOConfig();

            $user = $_SESSION['login_user'];
            $g_name = $_POST['g_name'];
            $sum = $_POST['sum'];
            $day = date('ymdhis');

            $sql = "insert into buy values('$user','$g_name','$sum','$day')";
            $stt = $db->prepare($sql);
            $stt->execute();

            $sql = "update goods set g_sum = g_sum - $sum where g_name = '$g_name'";
            $stt = $db->prepare($sql);
            $stt->execute();

            if ($stt) {
                echo "<script>
                        if(confirm('구매가 완료되었습니다. 구매확인을 하시겠습니까?')){
                            location.href='./buy_view.php';
                        }else{
                            history.go(-1)
                        }
                </script>";
            }
        } else {
            echo "
           <script>
             window.alert('구매진행이 이루어지지 않았습니다.');
             history.go(-1);
           </script>
         ";
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>