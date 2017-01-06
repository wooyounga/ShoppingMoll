<?php
    require_once '../library/user_db.php';

    try {
        if (isset($_GET['b_no'])) {
            $b_no = isset($_GET['b_no']) ? $_GET['b_no'] : "";

            $db = new PDOConfig();

            $sql = 'select b_title, b_content from board where b_no = ' . $b_no;
            $stt = $db->prepare($sql);
            $stt->execute();
            $row = $stt->fetch();
        }
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
</head>
<body>
    <div id="header">
        <?php
        require_once '../library/nav2.php'
        ?>
    </div>
    <div class="body">
        <h1 style="margin-left: 60px">Q & A</h1>
        <br>
        <br>
        <form action="board_insert.php" method="post" style="margin-right: 50px; text-align: right;" enctype="multipart/form-data">
            <?php
            if(isset($b_no)) {
                echo "<input type='hidden' name='b_no' value='$b_no'>";
            }
            ?>
        <table style="width: 900px; margin: 0 auto;">
            <tr>
                <td width="100" class="board">
                    제목
                </td>
                <td class="board">
                    <input type="text" name="b_title" size="112" style="margin-bottom: 10px" value="<?php echo isset($b_no) ? $row['b_title'] : ''?>">
                    <br>
                </td>
            </tr>
            <tr>
                <td class="board">
                    내용
                </td>
                <td class="board">
                    <textarea name="b_content" style="resize:none; width: 700px; height: 400px;"><?php echo isset($b_no) ? $row['b_content'] : ''?></textarea>
                    <br>
                </td>
            </tr>
            <tr>
                <td class="board">
                    파일 
                </td>
                <td style="text-align: left; padding-left: 50px">
                    <input type="hidden" name="MAX_FILE_SIZE" value="9000000000000000000000000000000000000" />
                    <input type="file" name="user_file">
                </td>
            </tr>
        </table>
        <br>
            <input type="submit" value="작성완료">
        </form>
    </div>
    <br>
    <br>
</body>
</html>