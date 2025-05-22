<?php
?>
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/private_page.css">


<?php
include "common/connection.php";
include "common/common.php";
function search($check)
{
    # WHERE `name` LIKE $check"
    global $connect, $tbl_phones;
    $sql = ("SELECT * FROM `$tbl_phones`WHERE (`fullname` LIKE '%$check%') OR (`telephone` LIKE '%$check%') OR (`phone1` LIKE '%$check%') OR (`phone1` LIKE '%$check%') ORDER BY `fullname` ASC");
    $result = $connect->query($sql);
    $result->execute();
    if($result->rowCount()){
        return $result ;
    }
    return  false ;
}

function counter($check)
{
    global $connect, $tbl_phones;
    $sql = ("SELECT * FROM `$tbl_phones`WHERE (`fullname` LIKE '%$check%') OR (`telephone` LIKE '%$check%') OR (`phone1` LIKE '%$check%') OR (`phone1` LIKE '%$check%') ORDER BY `fullname` ASC");
    $result = $connect->query($sql);
    $result->execute();
    if($result->rowCount()){
        return $result->rowCount() ;
    }
    return  0 ;
}

function allCounter()
{
    global $connect, $tbl_phones;
    $sql = ("SELECT * FROM `$tbl_phones`");
    $result = $connect->query($sql);
    $result->execute();
    if($result->rowCount()){
        return $result->rowCount() ;
    }
    return  0 ;
}



?>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 card-margin">
            <div class="card search-form">
                <div class="card-body p-0">
                    <form id="search-form">
                        <div class="row">
                            <form method="get" action="" class="row no-gutters">
                                        <div class="col-12" style=" display: flex; justify-content: space-between;" >
                                            <div class="col-lg-11 col-md-10 col-sm-10" >
                                                <input type="text" placeholder="جستجو" class="form-control search" id="search" name="search" style="width: 100%;"/>
                                            </div>
                                            <div class="col-lg-1 col-md-2 col-sm-2" style="margin-right: 0; text-align: center; position: relative" >

                                                <button class="fa fa-search  btn btn-block" type="submit" style="width: 100%;">
                                                </button>

                                            </div>
                                        </div>
                            </form>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <form method="get" action="" name="search_control">
                        <button class=" btn btn-block" type="submit" style="width: 100%;" name="search_control">
                            <input type="checkbox" name="search_control" id="control" style="display: none;">
                            <label for="control" class="">برای باز و یا بستن لیست مشخصات، کلیک کنید.</label>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!isset($_GET["search_control"])){?>
        <div class="row">
            <div class="col-12">
                <div class="card card-margin">
                    <div class="card-body">
                        <div class="row search-body">
                            <div class="col-lg-12">
                                <div class="search-result">
                                    <div class="result-header">
                                        <div class="row">
                                            <div class="col-lg-12" style="display: flex; justify-content: space-between">
                                                <div class="col-lg-6" style="display: flex; justify-content: right;">
                                                    <div class="records">نمایش: <b><?php

                                                            if (isset($_GET['search'])) {
                                                                $search = $_GET["search"];

                                                                echo counter($search);}
                                                            else echo 0;?></b> از <b><?php echo allCounter(); ?></b> مورد</div>
                                                </div>
                                                <div class="col-lg-6" style="display: flex; justify-content: left;">
                                                    <div class="result-actions">
                                                        <div class="result-sorting">
                                                            <span>مرتب سازی بر اساس:</span>
                                                            <select class="form-control border-0" id="exampleOption">
                                                                <option value="1">اسامی (آ-ی)</option>
                                                                <option value="2" disabled>اسامی (ی-آ)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="result-body">
                                        <div class="table-responsive">
                                            <table class="table widget-26">
                                                <tbody style="text-align: center;">


                                                <?php
                                                if(isset($_GET['search'])) {
                                                    $search = $_GET["search"];
                                                    $find = search($search);
                                                    if($find){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <div class="widget-26-job-emp-img"></div>
                                                            </td>
                                                            <td>
                                                                <div class="widget-26-job-title" >
                                                                    <h5>نام و نام خانوادگی</h5>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="widget-26-job-info">
                                                                    <h5 class="type m-0">تلفن منزل</h5>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="widget-26-job-info">
                                                                    <h5 class="type m-0">موبایل اول</h5>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="widget-26-job-info">
                                                                    <h5 class="type m-0">موبایل دوم</h5>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $rows = $find->fetchAll();
                                                        foreach ($rows as $row) {

                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="widget-26-job-emp-img">
                                                                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Company" />
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="widget-26-job-title">
                                                                        <p><?php echo $row["fullname"] ; ?></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="widget-26-job-info">
                                                                        <p class="type m-0"><?php echo $row["telephone"] ; ?></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="widget-26-job-info">
                                                                        <p class="type m-0"><?php echo $row["phone1"]  ; ?></p>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="widget-26-job-info">
                                                                        <p class="type m-0"><?php echo $row["phone2"]; ?></p>
                                                                    </div>
                                                                </td>

                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    else{
                                                        ?>
                                                        <div class="alert alert-danger" style="width: 100%;">
                                                            <span class="close float-right " data-dismiss="alert">&times;</span>
                                                            مشخصات وارد شده موجود نمی باشد
                                                        </div>

                                                        <?php
                                                    }

                                                }
                                                else{
                                                    ?>
                                                    <div class="alert alert-warning" style="width: 100%;">
                                                        <span class="close float-right " data-dismiss="alert">&times;</span>
                                                        هنوز مشخصاتی جستجو نشده است
                                                    </div>
                                                    <?php
                                                }
                                                ?>



                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="d-flex justify-content-center">
                            <ul class="pagination pagination-base pagination-boxed pagination-square mb-0">
                                <li class="page-item">
                                    <a class="page-link no-border" href="#">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link no-border" href="#">1</a></li>
                                <!--                            <li class="page-item"><a class="page-link no-border" href="#">2</a></li>-->
                                <!--                            <li class="page-item"><a class="page-link no-border" href="#">3</a></li>-->
                                <!--                            <li class="page-item"><a class="page-link no-border" href="#">4</a></li>-->
                                <li class="page-item">
                                    <a class="page-link no-border" href="#">
                                        <span aria-hidden="true">»</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>



<!--create new record in DB-->



    <?php
    function createUser($fullname,$telephone,$phone1,$phone2){
        global $connect , $tbl_phones ;
//        $fullname = sanitize($fullname);
//        $telephone = sanitize($telephone);
//        $phone1 = sanitize($phone1);
//        $phone2 = sanitize($phone2);
        $sql = ("INSERT `$tbl_phones` SET `fullname` = ? , `telephone` = ? ,`phone1` = ? ,`phone2`=?");
        $result =  $connect->prepare($sql);
        $result->bindValue(1,$fullname);
        $result->bindValue(2,$telephone);
        $result->bindValue(3,$phone1);
        $result->bindValue(4,$phone2);
        $result->execute();
        return $result ;
    }


    function isUserExist($fullname){
        global $connect, $tbl_phones;
        $fullname = sanitize($fullname);
        $sql = ("SELECT `fullname` FROM `$tbl_phones` WHERE `fullname` = ? ");
        $result = $connect->prepare($sql);
        $result->bindValue(1, $fullname);
        $result->execute();
        if ($result->rowCount()) {
            return $result;
        }
        return false;
    }

    if(isset($_POST["btn_submit"])) {
        $userExist = isUserExist($_POST["fullname"]);
        if(!$userExist) {
            $insert__query = createUser($_POST["fullname"], $_POST["telephone"], $_POST["phone1"], $_POST["phone2"]);
            if ($insert__query) {
                $has_success = true;
                $message = 'کاربر با موفقیت اضافه گردید';
            } else {
                if (empty($_POST["fullname"])) {
                    $has__error = true;
                    $errors[] = "لطفا نام و نام خانوادگی را وارد نمایید";
                }
                if (empty($_POST["phone1"])) {
                    $has__error = true;
                    $errors[] = "لطفا موبایل اول را وارد نمایید";
                }
            }
        ?>
        <div class="alert alert-success" style="width: 100%;">
            <span class="close float-right " data-dismiss="alert">&times;</span>
            اطلاعات با موفقیت ثبت شد.
        </div>
        <?php }else{ ?>
            <div class="alert alert-danger" style="width: 100%;">
                <span class="close float-right " data-dismiss="alert">&times;</span>
                اطلاعات این شخص موجود می باشد.
            </div>
    <?php
    }}

    ?>



</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-margin">
                <div class="card-body">
                    <form method="get" action="" name="add_control">
                        <button class=" btn btn-block" type="submit" style="width: 100%;" name="add_control">
                            <input type="checkbox" name="add_control" id="control2" style="display: none;" disabled>
                            <label for="control2" class="">برای باز و یا بسته شدن فرم ثبت شماره جدید، کلیک کنید.</label>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (!isset($_GET["add_control"])){?>
        <div class="row">
            <div class="col-12">
                <div class="card card-margin">
                    <div class="card-body" style="text-align: right;">
                        <form method="post" action="">
                            <fieldset>
                                <legend>فرم ثبت نام</legend>

                                <div class="form-group">
                                    <label for="">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control" id=""
                                           placeholder="" name="fullname"
                                    >

                                </div>
                                <div class="form-group">
                                    <label for="">تلفن منزل</label>
                                    <input type="text" class="form-control" id="" placeholder="" name="telephone" >
                                </div>

                                <div class="form-group">
                                    <label for="">موبایل اول</label>
                                    <input type="text" class="form-control" id="" placeholder="" name="phone1">
                                </div>


                                <div class="form-group">
                                    <label for="">موبایل دوم </label>
                                    <input type="text" class="form-control" id="" placeholder="" name="phone2">
                                </div>


                                <button type="submit" class="btn btn-block btn-dark" name="btn_submit">ثبت</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>
