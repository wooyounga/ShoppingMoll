<!doctype html>
<html>
<head>
    <title>회원가입</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login_form.css">
    <link rel="stylesheet" href="../css/member_form.css">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <!--제이쿼리임폴트는맨위제이쿼리임폴트는맨위제이쿼리임폴트는맨위제이쿼리임폴트는맨위-->
    <script>
        $(function(){
            $('#id').on('keyup', idCheck);
        });
        function idCheck(){
            $.ajax({
                url:"check.php",
                type:"POST",
                data:{"id":$("#id").val()},
                success:function(data){
                    if(data == 0){
                        $("#idCheck").html('');
                    }
                    else if(data == 1){
                        $("#idCheck").css('color', 'blue');
                        $("#idCheck").html('사용 가능한 아이디 입니다');
                        $("#check").val(true);
                    }else{
                        $("#idCheck").css('color', 'red');
                        $("#idCheck").html('사용할 수 없는 아이디 입니다') ;
                        $("#check").val(false);
                    }
                }
            });
        }

        $(function(){
            $('#passwd').on('keyup', passwdCheck);
            $('#passwd2').on('keyup', passwdCheck);
        });
        function passwdCheck(){
            var passwd = document.getElementById('passwd').value;
            var passwd2 = document.getElementById('passwd2').value;

            if(passwd2 == ''){
                document.getElementById('passwdCheck').innerHTML = '';
            }
            else if(passwd2 == passwd){
                document.getElementById('passwdCheck').style.color = "blue";
                document.getElementById('passwdCheck').innerHTML = '일치합니다';
            }
            else{
                document.getElementById('passwdCheck').style.color = "red";
                document.getElementById('passwdCheck').innerHTML = '일치하지 않습니다';
            }
        }
    </script>
    <script>
        function checkemail(){
            if (member_form.mail.value =="") {
                member_form.email2.readOnly = false;
                member_form.email2.value = '';
                member_form.email2.focus();
            }
            else {
                member_form.email2.readOnly = true;
                member_form.email2.value = member_form.mail.value;
            }
        }
    </script>
</head>
<body>
<div id="header">
    <?php require_once '../library/nav2.php' ?>
</div>
<div class="member_form">
    <form name="member_form" method="post" action="member_insert.php">
        <div>
            <center><h1 style="padding-top: 50px; margin-bottom: 50px">회원가입</h1></center>
        </div>
        <table class="member_table">
            <tr>
                <td width="150px">
                    이름
                </td>
                <td width="20px">
                    :
                </td>
                <td>
                    <input type="text" name="name" size="10">
                </td>
            </tr>
            <tr>
                <td>
                    생년월일
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="year">
                        <option value="">
                            선택
                        </option>
                        <script>
                            for(var i=1970; i<2017;i++){
                                document.write("<option>"+i+"</option>");
                            }
                        </script>
                    </select>
                    <select name="month">
                        <option value="">
                            선택
                        </option>
                        <script>
                            for(var i=1; i<13;i++){
                                document.write("<option>"+i+"</option>");
                            }
                        </script>
                    </select>
                    <select name="day">
                        <option value="">
                            선택
                        </option>
                        <script>
                            for(var i=1; i<31;i++){
                                document.write("<option>"+i+"</option>")
                            }
                        </script>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="id">
                    아이디
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="id" id="id" size="10">
                    <sapn id="idCheck"></sapn>
                    <div>(영문자, 숫자 조합으로 4~8자로 만들어주세요)</div>
                </td>
            </tr>
            <tr>
                <td>
                    비밀번호
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="password" name="passwd" id="passwd" size="10">
                </td>
            </tr>
            <tr>
                <td>
                    비밀번호확인
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="password" name="passwd2" id = 'passwd2' size="10">
                    <span id="passwdCheck"></span>
                </td>
            </tr>
            <tr>
                <td>
                    주소
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="addr" size="29">
                </td>
            </tr>
            <tr>
                <td>
                    휴대폰
                </td>
                <td>
                    :
                </td>
                <td>
                    <select name="phone">
                        <option value="">
                            선택
                        </option>
                        <option value="010">
                            010
                        </option>
                        <option value="011">
                            011
                        </option>
                        <option value="018">
                            018
                        </option>
                        <option value="016">
                            016
                        </option>
                    </select>
                    -
                    <input type="text" name="phone2" size="5"> -
                    <input type="text" name="phone3" size="5">
                </td>
            </tr>
            <tr>
                <td>
                    성별
                </td>
                <td>
                    :
                </td>
                <td>
                    남 <input type="radio" name="gender" value="남">
                    여 <input type="radio" name="gender" value="여">
                </td>
            </tr>
            <tr>
                <td>
                    이메일
                </td>
                <td>
                    :
                </td>
                <td>
                    <input type="text" name="email" size="10"> @
                    <input type="text" name="email2" size="10">
                    <select name="mail" onChange="checkemail()">
                        <option value="">
                            직접입력
                        </option>
                        <option value="daum.net">
                            daum.net
                        </option>
                        <option value="gmail.co.kr">
                            gmail.co.kr
                        </option>
                        <option value="hanmail.net">
                            hanmail.net
                        </option>
                        <option value="naver.com">
                            naver.com
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <br><br>
                    <input type="hidden" name='check' id="check" value="">
                    <center><input type="submit" value="가입"></center>
                </td>
            </tr>
        </table>
        <br><br><br>
    </form>
</div>
<br>
<br>
</body>
</html>