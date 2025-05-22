<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/login_style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>







<?php
include "common/connection.php";
include "common/common.php";


?>

<?php

function doLogin($username , $password){
    global $connect , $tbl_users , $tbl_phones ;

    $password = sanitize($password);
    $password = hash_password($password,'sha1');



    $sql = ("SELECT `id` , `firstname` , `lastname` , `username` ,  `password`, `email` , `mobile`   FROM `$tbl_users` WHERE `username` = ? AND `password` = ? LIMIT 1");
    $result = $connect->prepare($sql);

    $result->bindValue(1,$username);
    $result->bindValue(2,$password);
    $result->execute();
    if($result->rowCount()){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $result = $connect->prepare($sql);
        $userSession = array(
            "signInKey" => true ,
            "id" => $row["id"] ,
            "firstname" => $row["firstname"] ,
            "lastname" => $row["lastname"] ,
            "full_name" => $row["firstname"] . " " . $row["lastname"] ,
            "username" => $row["username"] ,
            "email" => $row["email"] ,
            "mobile" => $row["mobile"] ,
            "password" => $row["password"] ,
        );
        $_SESSION["userInfo"] = $userSession ;
        return $result ;
    }
    return  false ;

}
?>


<?php
$doLogin = null ;
$msgSuccess = false;
$msg = "" ;
$wrongPass = false;
if(isset($_POST["submit_login"])){
    if(!empty($_POST["username"]) and !empty($_POST["password"])){
        $doLogin = doLogin($_POST["username"],$_POST["password"]);
        if($doLogin){
            $msgSuccess = true ;
            $msg = "ورود با موفقیت انجام شد";
            header("location:privatePage.php");
        }
        else $wrongPass = true;
    }

}

?>

<?php
if($wrongPass): ?>
    <div class="message text-right position-fixed" style="direction: rtl;width: 300px;right: 50%;top: 20px; transform: translateX(50%)"  >
        <div class="alert alert-danger" style="width: 100%;">
            <span class="close float-left" data-dismiss="alert">&times;</span>
            نام کاربری و یا رمز عبور صحیح نمی باشد.
        </div>
    </div>
<?php endif ?>

<!------ Include above in your HEAD tag ---------->



<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <h3 class="h4 text-muted p-2">ورود کاربر</h3>
        </div>
        <hr>
        <!-- Login Form -->
        <form method="post" action="" >
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="نام کاربری">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="رمزعبور">
            <input type="submit" name="submit_login" class="fadeIn fourth" value="ورود">
        </form>


    </div>
</div>

</body>
</html>
