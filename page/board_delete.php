<?php
    require_once '../library/user_db.php';

    try {
        $db = new PDOConfig();

        if (isset($_GET['b_no'])) {
            $b_no = $_GET['b_no'];

            $sql = 'delete from board where b_no = ' . $b_no;
            $stt = $db->prepare($sql);
            $stt->execute();

            if ($stt) {
                echo "<script>window.alert('정상적으로 글이 삭제 되었습니다.')</script>";
                echo "<script>location.href='./q_a_dis.php'</script>";
            }
        } else {
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
