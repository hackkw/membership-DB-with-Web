<?php
$con = mysqli_connect("localhost", "root", "1234", "sqlDB") or die("MariaDB 실행 실패!!");

$userID = $_GET['userID'];
$sql = "SELECT * FROM userTBL WHERE userID='$userID'";

$ret = mysqli_query($con, $sql);
if($ret) {
    $count = mysqli_num_rows($ret);
    if ($count == 0) {
        echo "$userID 아이디에 해당하는 회원이 없습니다."."<br>";
        echo "<br> <a href='main.html'> <--초기 화면</a> ";
        exit();
    }
} else {
    echo "데이터 조회 실패 !!!"."<br>";
    echo "실패 원인 : ".mysqli_error($con);
    echo "<br> <a href='main.html'> <--초기 화면</a>";
    exit();
}

$row = mysqli_fetch_array($ret);
$userID = $row['userID'];
$name = $row["name"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <title>회원 삭제 확인</title>
</head>
<body>
    <h1>회원 삭제 확인</h1>

    <?php
    echo "<p>아이디: $userID, 이름: $name 를 삭제하시겠습니까?</p>";
    echo "<a href='delete_result.php?userID=$userID'>예</a>";
    echo "<br>";
    echo "<a href='main.html'>아니오</a>";
    ?>

</body>
</html>
