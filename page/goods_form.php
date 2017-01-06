<?php
    require_once '../library/user_db.php';

    try {
        if (isset($_POST['g_name'])) {
            $g_name = isset($_POST['g_name']) ? $_POST['g_name'] : "";

            $db = new PDOConfig();

            $sql = "select * from goods where g_name = '$g_name'";
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
    <title>상품 등록</title>
    <script>
        function part_change(){
            if (document.goods_form.part_select.value === "추가하기") {
                document.goods_form.part.readOnly = false;
                document.goods_form.part.value = '';
                document.goods_form.part.focus();
            }
            else {
                document.goods_form.part.readOnly = true;
                document.goods_form.part.value = document.goods_form.part_select.value;
            }
        }
    </script>
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
    <center><h1 style="margin-left: 60px">상품 등록</h1></center>
    <br>
    <br>
    <form action="goods_insert.php" name="goods_form" method="post" style="margin-right: 50px; text-align: right;" enctype="multipart/form-data">
        <?php
        if(isset($_POST['g_name'])) {
            echo "<input type='hidden' name='goods_name' value='".$_POST['g_name']."'>";
            echo "<input type='hidden' name='goods_img' value='".$row['g_img']."'>";
        }
        ?>
        <table style="width: 600px; margin: 0 auto;">
            <tr>
                <td>
                    상품파트
                </td>
                <td style="text-align: center">
                    :
                </td>
                <td style="text-align: left">
                    <select name="part_select"  onchange="part_change()">
                        <option value="추가하기">추가하기</option>
                        <?php
                            require_once "../library/user_db.php";

                            try {
                                $db = new PDOConfig();

                                $part_sql = "select DISTINCT g_part from goods";
                                $part_stt = $db->prepare($part_sql);
                                $part_stt->execute();

                                while ($part_row = $part_stt->fetch()) {
                                    ?>
                                    <option value="<?php echo $part_row['g_part'];?>"><?php echo $part_row['g_part'];?></option>;
                        <?php
                                }
                            }catch(PDOException $e){
                                exit("에러 발생 : {$e->getMessage()}");
                            }
                        ?>
                    </select>
                    <input type="text" name="part" size="47" value="<?php echo isset($_POST['g_name']) ? $row['g_part'] : ''?>">
                </td>
            </tr>
            <tr>
                <td width="100" >
                    상품명
                </td>
                <td style="text-align: center">
                    :
                </td>
                <td >
                    <input type="text" name="g_name" size="60" style="margin-bottom: 10px" value="<?php echo isset($_POST['g_name']) ? $row['g_name'] : ''?>">
                    <br>
                </td>
            </tr>
            <tr>
                <td width="200" >
                    작가
                </td>
                <td style="text-align: center">
                    :
                </td>
                <td >
                    <input type="text" name="g_art" size="60" style="margin-bottom: 10px" value="<?php echo isset($_POST['g_name']) ? $row['g_art'] : ''?>">
                    <br>
                </td>
            </tr>
            <tr>
                <td width="200" >
                    가격
                </td>
                <td style="text-align: center">
                    :
                </td>
                <td >
                    <input type="text" name="g_price" size="60" style="margin-bottom: 10px" value="<?php echo isset($_POST['g_name']) ? $row['g_price'] : ''?>">
                    <br>
                </td>
            </tr>
            <tr>
                <td width="200" >
                    수량
                </td>
                <td width="50" style="text-align: center">
                    :
                </td>
                <td >
                    <input type="text" name="g_sum" size="60" style="margin-bottom: 10px" value="<?php echo isset($_POST['g_name']) ? $row['g_sum'] : ''?>">
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    상품 이미지
                </td>
                <td style="text-align: center">
                    :
                </td>
                <td style="text-align: left; >
                    <input type=">
                    <input type="hidden" name="MAX_FILE_SIZE" size="9000000000000000000000000000000">
                    <input type="file" name="g_file" value="<?php echo isset($_POST['g_name']) ? $row['g_file'] : ''?>">
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