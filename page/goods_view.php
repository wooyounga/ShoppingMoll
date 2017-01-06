<?php
require_once "../library/user_db.php";

try {
    $g_name = $_GET['g_name'];

    $db = new PDOConfig();

    $sql = "select * from goods where g_name = '$g_name'";
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
    <title>BOOK</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
    <script>
        function sum(arg){
            if(shop_sum.sum.value < 1){
                shop_sum.sum.value = 1;
                alert('1개 이하로는 구매하실 수 없습니다.');
            }else if(shop_sum.sum.value >= <?php echo $row['g_sum']?>){
                shop_sum.sum.value -= 1;
                alert('재고가 부족합니다.');
            }
            if(arg == 'plus'){
                shop_sum.sum.value++;
            }else{
                shop_sum.sum.value--;
            }
        }
    </script>
</head>
<body>
<div id="header">
    <?php require_once '../library/nav2.php' ?>
</div>
<div class="body">
    <table style="margin: 0 auto">
        <tr>
            <td class="shop2">
                <img src="../img/<?php echo $row['g_img']?>" style="width: 280px"><br>
            </td>
            <td class="shop2">
                <?php
                echo "<h1>".$row['g_name']."</h1><br>";
                echo "<h3>감독  ::  ".$row['g_art']."</h3>";
                ?>
                <br><br>
                <p>
                    <?php
                    if(isset($_SESSION['login_user'])){
                        echo "정    가 : <strike>".$row['g_price']."</strike> 원<br>";
                        echo "회 원 가 : <b><font color='#a52a2a'>".$row['g_price']*0.8."</font></b> 원";
                    }else{
                        echo "<br>정    가 : <font color='blue'>".$row['g_price']." </font>원";
                    }
                    ?>
                    <br>
                    <br><br>
                    배 송 비 : 3000원 ( 3만원 이상 구매시 무료배송 )<br>
                    <?php
                    if($row['g_sum']>0){
                    echo "<b>도착 예상일</b> : ".date("Y-m-d")."<br><br>";

                    if(isset ($_SESSION['login_user'])){
                    ?>
                <form name="shop_sum" method="post" action="buy.php">
                    <?php
                    if($_SESSION['login_user'] != 'root') {
                        if (isset($g_name)) {
                            echo "<input type='hidden' name='g_name' value='$g_name'>";
                        }
                        ?>
                        <a name="minus" onclick="sum('minus')">-</a>
                        <input type="text" size="5" value="1" readonly name="sum">
                        <a name="plus" onclick="sum('plus')">+</a>
                        <input type="submit" value="구매하기">
                        </form>;
                    <?php
                    }else{
                        echo "</form>";
                        echo "<form action='goods_form.php' method='post'>";
                        echo "<font color='#6495ed' size='5'><b>현재 재고 : ".$row['g_sum']."</b></font>";
                        echo "<input type='hidden' name='g_name' value='".$row['g_name']."'>";
                        echo "<br>";
                        echo "<input type='submit' value='수정하기'>";
                        echo "</form>";
                    }
                    ?>

            <?php
            }
            }else{
                echo "<b>도착 예상일</b>: 7일 후 ";
                echo "<font color='red'> 재고 없음 </font><br><br>";

            }
            ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr/>
                <center>
                    <img src="../img/<?php echo $row['g_img']?>" style="padding: 30px" width="700px">
                </center>
            </td>
        </tr>
    </table>
    <br>
    <hr>
</div>
<br>
<br>
</body>
</html>