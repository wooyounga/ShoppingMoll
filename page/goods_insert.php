<?php
session_start();
require_once '../library/user_db.php';

try{
    $db = new PDOConfig();

    if(isset($_POST['part']) && isset($_POST['g_name']) && isset($_POST['g_price']) && isset($_POST['g_sum'])){
        $g_img = $_POST['goods_img'];

        if(isset($_FILES['g_file']['name']) && $_FILES['g_file']['name'] != "") {
            $file_dir= '../img/';
            $today = Date("ymdhis");
            $g_img = $today.$_FILES['g_file']['name'];
            $file_server_name = $file_dir.$today.basename($_FILES['g_file']['name']);
            $file_server_name = iconv("UTF-8","EUC-KR",$file_server_name);
            move_uploaded_file($_FILES['g_file']['tmp_name'], $file_server_name);
        }

        $g_part = $_POST['part'];
        $g_name = $_POST['g_name'];
        $g_art = isset($_POST['g_art']) ? $_POST['g_art'] : "";
        $g_price = $_POST['g_price'];
        $g_sum = $_POST['g_sum'];

        if($_POST['goods_name']){
            $goods_name = $_POST['goods_name'];

            $sql = "update goods set g_name = '$g_name', g_art = '$g_art', g_price = '$g_price', ";
            $sql .= "g_sum = '$g_sum', g_img = '$g_img', g_part = '$g_part' where g_name = '$goods_name'";
            $stt = $db->prepare($sql);
            $stt->execute();
        }else{
            $sql = "insert into goods values('$g_name','$g_art','$g_price','$g_sum','$g_img','$g_part')";
            $stt = $db -> prepare($sql);
            $stt -> execute();
        }
        if($stt) {
            echo "<script>window.alert('글이 정상 등록 되었습니다.')</script>";
            echo "<script>location.href='./goods_view.php?g_name=$g_name'</script>";
        }
    }else{
        echo "
           <script>
             window.alert('작성하지 않은 상품 내역이 있습니다.');
             history.go(-1);
           </script>
         ";
    }
}catch(PDOException $e){
    exit("에러 발생 : {$e->getMessage()}");
}
?>