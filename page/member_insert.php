<?php
    require_once '../library/user_db.php';

    try {
        $db = new PDOConfig();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $name = $_POST['name'];
            $id = $_POST['id'];
            $passwd = $_POST['passwd'];
            $addr = $_POST['addr'];
            $gender = $_POST['gender'];
            $joinDate = date("Y-m-d (H:i)");
            $check = $_POST['check'];

            if ($_POST['year'] != '' && $_POST['month'] != '' && $_POST['day'] != '')
                $birth = $_POST['year'] . $_POST['month'] . $_POST['day'];
            if ($_POST['phone'] != '' && $_POST['phone2'] != '' && $_POST['phone3'] != '')
                $phone = $_POST['phone'] . $_POST['phone2'] . $_POST['phone3'];
            if ($_POST['email'] != '' && $_POST['email2'] != '')
                $email = $_POST['email'] . '@' . $_POST['email2'];

            if (isset($name) && isset($birth) && isset($id) && isset($passwd) && isset($_POST['passwd2'])
                && isset($addr) && isset($phone) && isset($gender) && isset($email)) {

                if($passwd == $_POST['passwd2'] && $check == 'true') {
                    $sql = "insert into member values('$name','$birth','$id',";
                    $sql .= "'$passwd','$addr','$phone','$gender','$email','$joinDate')";
                    $stt = $db->prepare($sql);
                    $stt->execute();

                    echo "<script>window.alert('회원가입이 완료되었습니다.')</script>";
                    echo "<script>location.href='./login_form.php'</script>";
                }else if($passwd != $_POST['passwd2']){
                    echo "<script>alert('확인 비밀번호가 일치하지 않습니다.');
                                    history.go(-1);
                            </script>";
                }else{
                    echo "<script>alert('사용 불가능한 아이디입니다.');
                                    history.go(-1);
                            </script>";
                }
            } else {
                echo "<script>alert('작성하지 않은 항목이 있습니다.');
                   history.go(-1);
                   </script>";
            }

        }
    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>