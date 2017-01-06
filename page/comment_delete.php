<?php
require_once '../library/user_db.php';

try {
    $db = new PDOConfig();

    if (isset($_GET['c_no'])) {
        $c_no = $_GET['c_no'];

        $sql = 'delete from comment where c_no = ' . $c_no;
        $stt = $db->prepare($sql);
        $stt->execute();

        if ($stt) {
            echo "<script>window.alert('정상적으로 댓글이 삭제 되었습니다.')</script>";
            echo "<script>
                      window.alert('아이디 혹은 비밀번호가 잘못되었습니다.');
                      history.go(-1);
                   </script>";
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
