<?php
    require_once '../library/user_db.php';

    try {
        $db = new PDOConfig();

        $check_id = "(^[0-9a-zA-Z]{4,8}$)";

        if (isset($_POST['id'])) {
            $id = $_POST["id"];

            $sql = "select user_id from member where user_id = '$id'";

            $stt = $db->prepare($sql);
            $stt->execute();
            $data = $stt->rowCount();

            if ($id == '') {
                echo 0;
            } else if ($data == 0 && preg_match($check_id, $id)) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>