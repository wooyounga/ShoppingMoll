<!doctype html>
<html>
<head>
    <title>Q & A</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/shop.css">
</head>
<body>
<div id="header">
    <?php
    require_once '../library/nav2.php';
    require_once '../library/user_db.php';
    ?>
</div>
<div class="body">
    <center><h1>Q & A</h1></center>
    <br><br>
    <div style="text-align: right; margin-right: 40px;">
        <font color="#6495ed"><b><a href="./q_a_dis.php">Q & A 목록으로 돌아가기</a></b></font>
    </div>
    <br>
    <table class = 'board'>
        <tr>
            <td width="65" style="padding-bottom: 20px">
                번호
            </td>
            <td width="500" style="padding-bottom: 20px">
                제목
            </td>
            <td width="120" style="padding-bottom: 20px">
                작성자
            </td>
            <td width="150" style="padding-bottom: 20px">
                작성일자
            </td>
            <td width="65" style="padding-bottom: 20px">
                조회수
            </td>
        </tr>
        <?php
            try{
                $db = new PDOConfig();

                if(isset($_GET['search']) && $_GET['search'] != ""){
                    $search_content = $_GET['search'];
                    $search_part = $_GET['search_part'];

                    $page = isset($_GET['page']) ? $_GET['page'] : 1;

                    $sql = "select * from board where $search_part like '%$search_content%' order by b_no desc";
                    $stt = $db->prepare($sql);
                    $stt -> execute();
                    $allPost = $stt -> rowCount();

                    $onePage = 20;
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

                    $sql = "select * from board where $search_part like '%$search_content%' order by b_no desc" . $sqlLimit;
                    $stt = $db->prepare($sql);
                    $stt -> execute();

                    while ($row = $stt->fetch()) {
?>
                <tr>
                    <td>
                        <?php echo $row['b_no'] ?>
                    </td>
                    <td>
                        <a href="./board_view.php?b_no=<?php echo $row['b_no'] ?>">
                            <?php echo $row['b_title'] ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $row['b_writer'] ?>
                    </td>
                    <td><?php echo $row['b_date'] ?></td>
                    <td><?php echo $row['b_viewed'] ?></td>
                </tr>
                <?php
            }
                }else{
                    echo "
                       <script>
                         window.alert('검색어를 입력하십시오.');
                         history.go(-1);
                       </script>
                     ";
                }
            }catch(PDOException $e){
                exit("에러 발생 : {$e->getMessage()}");
            }
        ?>
        <tr>
            <td colspan="5">
                <br><br>
                <div id="page_num">
                    <?php
                    if($page != 1) {
                        echo "<a href='./search_view.php?search_part=$search_part&search=$search_content'>처음</a>";
                    }
                    if($currentSection != 1) {
                        echo "<a href='./search_view.php?search_part=$search_part&search=$search_content&page=$prevPage'> 이전 </a>";
                    }
                    for($i = $firstPage; $i <= $lastPage; $i++) {
                        if($i == $page) {
                            echo "<b>".$i."</b>";
                        } else {
                            echo "<a href='./search_view.php?search_part=$search_part&search=$search_content&page=$i'> $i </a>";
                        }
                    }
                    if($currentSection != $allSection) {
                        echo "<a href='./search_view.php?search_part=$search_part&search=$search_content&page=$nextPage'> 다음 </a>";
                    }
                    if($page != $allPage) {
                        echo "<a href='./search_view.php?search_part=$search_part&search=$search_content&page=$allPage'> 끝 </a>";
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<br>
<br>
</body>
</html>
