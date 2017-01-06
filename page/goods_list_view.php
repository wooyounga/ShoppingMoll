<!doctype html>
<html>
<head>
    <title>상품</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
<div id="header">
    <?php require_once '../library/nav2.php' ?>
</div>
<div class="body">
        <?php
        require_once '../library/user_db.php';

        try {
            $db = new PDOConfig();

            $part = isset($_GET['part']) ? $_GET['part'] : "";

            echo "<center><h1>$part</h1></center>
                <br><hr><br>
                <table>";


            $page = isset($_GET['page']) ? $_GET['page'] : 1;

            $sql = "select * from goods where g_part = '$part'";
            $stt = $db -> prepare($sql);
            $stt -> execute();
            $allPost = $stt -> rowCount();

            $onePage = 4;
            $allPage = ceil($allPost / $onePage);

            if($page < 1 || $page > $allPage) {
                echo "<script>
                                window.alert('존재하지 않는 페이지입니다.');
                                history.back();
                           </script>";
                exit;
            }

            $oneSection = 10;
            $currentSection = ceil($page / $oneSection);
            $allSection = ceil($allPage / $oneSection);

            $firstPage = ($currentSection * $oneSection) - ($oneSection - 1);

            if($currentSection == $allSection) {
                $lastPage = $allPage;
            } else {
                $lastPage = $currentSection * $oneSection;
            }

            $prevPage = (($currentSection - 1) * $oneSection);
            $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1);

            $currentLimit = ($onePage * $page) - $onePage;
            $sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage;

            $sql = "select * from goods where g_part = '$part'" . $sqlLimit;
            $stt = $db -> prepare($sql);
            $stt -> execute();

            while ($row = $stt->fetch()) {
                ?>
                <tr>
                    <td>
                        <a href="goods_view.php?g_name=<?php echo $row['g_name'] ?>">
                            <img src="../img/<?php echo $row['g_img'] ?>" class="goods_img">
                        </a>
                    </td>
                    <td class="goods">
                        <a href="goods_view.php?g_name=<?php echo $row['g_name'] ?>">
                            <h3><?php echo $row['g_name']; ?></h3>
                        </a>
                        <?php
                        echo "작가 : " . $row['g_art'] . "<br><br>";

                        if (isset($_SESSION['login_user'])) {
                            echo "<strike>가격 : " . $row['g_price'] . " 원</strike><br>";
                            echo "<b><font color='#a52a2a'>회원가 : " . $row['g_price'] * 0.8 . " 원</font></b><br>";
                        } else {
                            echo "<br>가격 : <font color='blue'> " . $row['g_price'] . " </font>원<br>";
                        }

                        echo "<br>";

                        if ($row['g_sum'] > 0) {
                            echo "<b>도착 예상일</b> : " . date("Y-m-d");
                        } else {
                            echo "<b>도착 예상일</b>: 7일 후";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row['g_sum'] > 0) {
                            echo "<font color = 'blue'>재고 있음</font>";
                        } else {
                            echo "<font color = 'red'>재고 없음</font>";
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
    <tr>
        <td colspan="3" style="text-align: right; margin-right: 20px">
            <a href="./goods_form.php">
                <input type="submit" value="상품등록">
            </a>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div style="text-align: center">
                <?php
                if($page != 1) {
                    echo "<a href='./goods_list_view.php?g_part=$part'>처음</a>";
                }
                if($currentSection != 1) {
                    echo "<a href='./goods_list_view.php?g_part=$part&page=$prevPage'> 이전 </a>";
                }
                for($i = $firstPage; $i <= $lastPage; $i++) {
                    if($i == $page) {
                        echo "<b>".$i."</b>";
                    } else {
                        echo "<a href='./goods_list_view.php?g_part=$part&page=$i'> $i </a>";
                    }
                }
                if($currentSection != $allSection) {
                    echo "<a href='./goods_list_view.php?g_part=$part&page=$nextPage'> 다음 </a>";
                }
                if($page != $allPage) {
                    echo "<a href='./goods_list_view.php?g_part=$part&page=$allPage'> 끝 </a>";
                }
                ?>
            </div>
            <?php
            }catch (PDOException $e){
                exit("에러 발생 : {$e->getMessage()}");
            }
            ?>
        </td>
    </tr>
    </table>
</div>
<br>
<br>
</body>
</html>