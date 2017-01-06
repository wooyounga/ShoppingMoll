<?php
    session_start();
    require_once '../library/user_db.php';

    try{
        $db = new PDOConfig();

        if($_POST['b_title'] != "" && $_POST['b_content'] != ""){
            $file_dir= '../upload/';
            $today = Date("ymdhis");
            $file_name = "";
            $file_server_name = $file_dir.$today.basename($_FILES['user_file']['name']);

            if(isset($_FILES['user_file']['name']) && $_FILES['user_file']['name'] != "") {
                $file_name = $today.$_FILES['user_file']['name'];
                move_uploaded_file($_FILES['user_file']['tmp_name'], $file_server_name);
            }

            $title = $_POST['b_title'];
            $content = $_POST['b_content'];
            $user = $_SESSION['login_user'];
            $date = date("Y-m-d (H:i)");

            if(isset($_POST['b_no'])){
                $b_no = $_POST['b_no'];

                $sql = "update board set b_title = '$title' , b_content = '$content', b_file = '$file_name' where b_no = " . $b_no;
                $stt = $db->prepare($sql);
                $stt->execute();
            }else{
                $sql = "insert into board values(null,'$title','$content','$user','$date',0,'$file_name')";
                $stt = $db -> prepare($sql);
                $stt -> execute();
            }
            if($stt) {
                echo "<script>window.alert('글이 정상 등록 되었습니다.')</script>";
                echo "<script>location.href='./q_a_dis.php'</script>";
            }
        }else{
            echo "
           <script>
             window.alert('제목 혹은 내용은 반드시 작성하여야합니다.');
             history.go(-1);
           </script>
         ";
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>