<?php
    $con = mysqli_connect("localhost", "root", "1234", "sqlDB") or
    die("MariaDB 접속 실패");

    // 'userID' 매개변수를 받아옴
    $userID = isset($_GET['userID']) ? $_GET['userID'] : null;

    if ($userID === null) {
        // 'userID' 매개변수가 전달되지 않았거나 null인 경우
        die("회원 아이디가 전달되지 않았습니다.");
    }

    $sql = "SELECT * FROM usertbl WHERE userID='$userID'";

    $ret = mysqli_query($con, $sql);

    if (!$ret) {
        die("데이터 조회 실패"."<br>실패 원인 :".mysqli_error($con)."<br><a href='test.html'> <--초기화면</a>");
    }

    $count = mysqli_num_rows($ret);

    if ($count == 0) {
        echo $userID." 아이디의 회원이 없음"."<br><br><a href='test.html'> <--초기화면</a> ";
        exit();
    }

    $row = mysqli_fetch_array($ret);
    $userID = $row["userID"];
    $name = $row["name"];
    $birthYear = $row["birthYear"];
    $addr = $row["addr"];
    $mobile1 = $row["mobile1"];
    $mobile2 = $row["mobile2"];
    $height = $row["height"];
    $mDate = $row["mDate"];

    mysqli_close($con);
?>


<HTML>
    <HEAD>
        <META http-equiv="content-type" content="text/html; charset=utf-8">
    </HEAD>
    <BODY>
        <h1> 회원 정보 수정 </h1>
        <FORM METHOD="post"  ACTION="update_result.php">
            아이디 : <INPUT TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
            이름 : <INPUT TYPE ="text" NAME="name" VALUE=<?php echo $name ?>> <br> 
            출생년도 : <INPUT TYPE ="text" NAME="birthYear" VALUE=<?php echo $birthYear ?>> <br>
            지역 : <INPUT TYPE ="text" NAME="addr" VALUE=<?php echo $addr ?>> <br>
            휴대폰 국번 : <INPUT TYPE ="text" NAME="mobile1" VALUE=<?php echo $mobile1 ?>> <br>
            휴대폰 전화번호 : <INPUT TYPE ="text" NAME="mobile2" VALUE=<?php echo $mobile2 ?>> <br>
            신장 : <INPUT TYPE ="text" NAME="height" VALUE=<?php echo $height ?>> <br>
            회원가입일 : <INPUT TYPE ="text" NAME="mDate" VALUE=<?php echo $mDate ?> READONLY><br>
            <BR><BR>
            <INPUT TYPE="submit"  VALUE="정보 수정">
        </FORM>
    </BODY>
</HTML>