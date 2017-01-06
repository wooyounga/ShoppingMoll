<?php session_start(); ?>
</br>
<center><a href="../main.php"><img class="img" src="../img/Untitled-2.gif"  width="25%" height="25%";></a></center>
</br>
<nav id="main-navigation">
    <div class="pull-left">
            <span class="outer-menu-item">
                <a href="../page/goods_list_view.php?part=dvd_bd" class="nav">DVD & BD</a>
            </span>
        <span class="outer-menu-item">
			<a href="../page/goods_list_view.php?part=book" class="nav">BOOK</a>
            </span>
        <span class="outer-menu-item">
                <a href="../page/q_a_dis.php" class="nav">Q & A</a>
						</span>
        <span class = "outer-menu-item2">
                <?php
                if(!isset($_SESSION['login_user']))
                {
                    ?>
                    <a href="../page/login_form.php" class="nav">
                        로그인
                    </a>
                        | <a href="./page/member_form.php" class="nav">
                    회원가입
                </a>
                    <?php
                }
                else {
                    if ($_SESSION['login_user'] != 'root') {
                        ?>
                        <font color="white"><?= $_SESSION['login_user'] ?></font> |
                    <a href="../page/logout.php" class="nav">
                        로그아웃
                    </a>
                        | <a href="../page/buy_view.php" class="nav">
                    구매정보
                </a>
                        <?php
                    }else{
                        ?>
                        <font color="white">관리자님</font> |
                        <a href="../page/logout.php" class="nav">
                            로그아웃
                        </a>
                        <?php
                    }
                }
                ?>
            </span>
    </div>
</nav>
<Br>
<Br>
<br>