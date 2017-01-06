<?php
    session_start();
    require_once '../library/user_db.php';

    try{
        $db = new PDOConfig();

        if(isset($_SESSION['login_user']) && isset($_POST['b_no'])) {
            if (isset($_POST['comment'])) {
                $user = $_SESSION['login_user'];
                $b_no = $_POST['b_no'];
                $comment = $_POST['comment'];
                $date = date("Y-m-d (H:i)");

                $sql = "insert into comment values(null,'$user','$comment','$date','$b_no')";
                $stt = $db -> prepare($sql);
                $stt -> execute();

                if($stt){
                    echo "<script>
                                window.alert('댓글이 정상적으로 작성되었습니다.');
                                history.go(-1);
                          </script>";
                }
            }else{
                echo "<script>
                            window.alert('댓글을 작성하지 않으셨습니다.');
                            history.go(-1);
                       </script>";
            }
        }else{
            echo "
               <script>
                 window.alert('잘못된 경로입니다.');
                 history.go(-1);
               </script>
             ";
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }

?>