<?php
    require_once "../library/user_db.php";

    try {
        $b_no = $_GET['b_no'];

        $db = new PDOConfig();

        $sql = 'update board set b_viewed = b_viewed + 1 where b_no = ' . $b_no;
        $stt = $db->prepare($sql);
        $stt->execute();

        $sql = 'select * from board where b_no = ' . $b_no;
        $stt = $db->prepare($sql);
        $stt->execute();
        $row = $stt->fetch();

    }catch(PDOException $e){
        exit("에러 발생 : {$e->getMessage()}");
    }
?>
<!doctype html>
<html>
<head>
    <title>Q & A 작성</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
    <script>
        function check(argString){
            if(confirm('정말로 삭제 하시겠습니까?')){
                if(argString == "board") {
                    location.href = 'board_delete.php?b_no=<?php echo $b_no ?>';
                }else{
                    location.href = 'comment_delete.php?c_no='+argString;
                }
            }else{

            };
        }
    </script>
</head>
<body>
    <div id="header">
        <?php
        require_once '../library/nav2.php'
        ?>
    </div>
    <div class="body">
    <table style="width:800px; margin: auto;">
        <tr>
            <td style="text-align: center">
                <h1><?php echo $row['b_title']?></h1>
                <br>
            </td>
        </tr>
        <tr>
            <td>
                <table style="margin-left:550px; width: 250px">
                    <tr>
                        <td style="padding-right: 20px; width: 50px">
                            작성자
                        </td>
                        <td style="text-align: right;">
                            <?php echo $row['b_writer']?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            작성일
                        </td>
                        <td style="text-align: right;">
                            <?php echo $row['b_date']?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            조회수
                        </td>
                        <td style="text-align: right;">
                            <?php echo $row['b_viewed']?>
                        </td>
                    </tr>
                </table>
                <br>
                <hr>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; vertical-align: top; padding: 10px 10px 10px 10px; height: 300px;">
                <?php echo $row['b_content']?>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
                <br>
                첨부 파일 :
                <span style="margin-left: 50px;">
                    <a href="down_load.php?down_file=<?php echo $row['b_file']?>">
                        <?php echo $row['b_file']?>
                    </a>
                </span>
            </td>
        </tr>
    </table>
    <div style="text-align: right; margin-right: 50px;">
        <?php
            if(isset($_SESSION['login_user']) ? $_SESSION['login_user'] : "" == 'root'||
                $row['b_writer'] == isset($_SESSION['login_user']) ? $_SESSION['login_user'] : "") {
        ?>
                <a href="board_form.php?b_no=<?php echo $b_no ?>">수정</a>
                <a onclick="check('board')">삭제</a>
        <?php
            }
        ?>
        <a href="./q_a_dis.php" style="margin-right: 25px">목록</a>
    </div>
        <br>
        <?php
            if(isset($_SESSION['login_user'])) {
                ?>
                <div>
                    <form style="text-align: center;" action="comment_insert.php" method="post">
                        <textarea style="resize:none; width: 720px; height: 50px;" name="comment"></textarea>
                        <input type="hidden" name="b_no" value="<?php echo $b_no ?>">
                        <input type="image" src="../img/comment.jpg" width="80" height="50" id="login">
                    </form>
                </div>
        <?php
            }
        ?>
        <br>
        <table style="margin: auto;">
        <?php
            $sql = 'select * from comment where b_no = ' . $b_no;
            $stt = $db->prepare($sql);
            $stt->execute();

            $c_no = 1;
            while($row = $stt->fetch()) {
                ?>
                <tr>
                    <td rowspan="2" style="text-align: center; width:50px; padding-right: 10px">
                        <?php echo $c_no++; ?>
                    </td>
                    <td width="80px">
                        <?php echo $row['c_user']; ?>
                    </td>
                    <td width="500px">
                        <?php echo $row['c_date']; ?>
                    </td>
                    <td width="150px" style="text-align: right; padding-right: 10px">
                        <?php
                        if($row['c_user'] == isset($_SESSION['login_user']) ? $_SESSION['login_user'] : "" ||
                            isset($_SESSION['login_user']) ? $_SESSION['login_user'] : "" == 'root') {
                            ?>
                            <a onclick="check(<?php echo $row['c_no']?>)">삭제</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top: 10px">
                        <?php echo $row['c_comment'];?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <br><hr><br>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    <br>
    <br>
    </div>
</body>
</html>





