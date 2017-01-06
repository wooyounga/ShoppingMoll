<!doctype html>
<html>
<head>
    <title>DVD & BD</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
<div id="header">
    <?php require_once '../library/nav2.php' ?>
</div>
<div class="body">
    <table class="buy_goods">
        <tr>
            <td></td>
            <td class="padding">
                상품명
            </td>
            <td>
                정가
            </td>
            <td>
                회원가
            </td>
            <td>
                수량
            </td>
            <td>
                합계
            </td>
            <td>
                예상 도착일
            </td>
            <td>
                취소
            </td>
        </tr>
        <?php
        try {
            require_once '../library/user_db.php';

            $db = new PDOConfig();

            if($_SESSION['login_user'] != 'root') {
                $user = $_SESSION['login_user'];
                $goods_sum = 0;
                $sql = "select * from buy AS b, goods AS g where b.b_name = g.g_name and b_user =  '$user'";
                $stt = $db->prepare($sql);
                $stt->execute();

                while ($row = $stt->fetch()) {
                    $goods_sum += ($row['b_sum'] * $row['g_price'] * 0.8);
                    ?>
                    <tr>
                        <td width="100px">
                            <img src="../img/<?php echo $row['g_img'] ?>.jpg" style="width: 90px; height: 120px;">
                        </td>
                        <td width="300px;">
                            <h3><?php echo $row['g_name']; ?></h3>
                            <?php
                            echo "작가 : " . $row['g_art'] . "<br><br>";
                            ?>
                        </td>
                        <td width="80px;">
                            <?php echo $row['g_price']; ?>
                        </td>
                        <td width="80px;">
                            <?php echo $row['g_price'] * 0.8; ?>
                        </td>
                        <td width="50px;">
                            <?php echo $row['b_sum']; ?>
                        </td>
                        <td width="100px;">
                            <?php echo $row['g_price'] * 0.8 * $row['b_sum']; ?>
                        </td>
                        <td width="100px;">
                            <?php
                            if ($row['g_sum'] > 0) {
                                echo date("Y-m-d");
                            } else {
                                echo "7일 후";
                            }
                            ?>
                        </td>
                        <td width="50px">
                            <form method="post" action="buy_cancle.php">
                                <input type="hidden" name="g_name" value="<?php echo $row['g_name'] ?>">
                                <input type="hidden" name="b_sum" value="<?php echo $row['b_sum'] ?>">
                                <input type="hidden" name="b_day" value="<?php echo $row['b_day'] ?>">
                                <input type="submit" value="취소">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="8" style="text-align: right; padding-right: 30px;border-top: solid 3px black;">
                        <b>상품 금액 </b>
                        <?php
                        echo $goods_sum . " + ";
                        if ($goods_sum >= 30000) {
                            echo "<b>배송비 </b>무료 = ";
                            echo "<b>주문금액</b> " . $goods_sum;
                        } else {
                            echo "<b>배송비 </b>3000 = ";
                            echo "<b>주문금액</b> " . ($goods_sum + 3000);
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }else{
                echo "
               <script>
                 window.alert('관리자 접근이 불필요한 페이지입니다.');
                 history.go(-1);
               </script>
             ";
            }
        }catch (PDOException $e){
            exit("에러 발생 : {$e->getMessage()}");
        }
        ?>
    </table>
</div>
<br>
<br>
</body>
</html>