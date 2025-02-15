<?php 
require '../../Connect/Connect.php';
require '../../Class/User.php';
$Name = "";
$password = "";
$UserName = "";
$Email = "";
$Address = "";
$Admin = "";
$errName="";
$errEmail="";
$errDiaChi="";
$errUsername="";
$errPassword="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $check = true;
    if(empty($_POST['Name'])){
        $errName = 'Vui lòng nhập tên';
        $check = false;
    }
    if(empty($_POST['Email'])){
        $errEmail = 'Vui lòng nhập email';
    }else if(!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
        $errEmail= 'Vui lòng nhập đúng định dạng email';
        $check=false;
    }
    if(empty($_POST['Address'])){
        $errDiaChi = 'Vui lòng nhập địa chỉ';
        $check = false;
    }
    if(empty($_POST['UserName'])){
        $errUsername = "Vui lòng nhập tài khoản";
        $check = false;
    }
    if(empty($_POST['Password'])){
        $errPassword = 'Vui lòng nhập mật khẩu';
        $check = false;
    }
    if(empty($_POST['Admin']))
        $Admin = 0;
    else
        $Admin = 1;   
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Address=$_POST['Address'];
    $UserName=$_POST['UserName'];
    $password=$_POST['Password'];
    if($check){
        Users::insert($UserName, $password, $Name, $Email, $Address, $Admin);
        header("location: ./index.php?insert=Successfully");
    }
}
?>
<?php require '../IncludeAdmin/header.php'?>
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="login">
            <h2>Tạo mới tài khoản</h2>
            <input type="text" class="form-control" name="Name" placeholder="Họ Tên" value="<?php echo $Name ?>"/>
            <?php echo "<p class='text-danger'>$errName</p>" ?>

            <input type="email" class="form-control" name="Email" placeholder="Email của bạn" value="<?php echo $Email ?>" />
            <?php echo "<p class='text-danger'>$errEmail</p>" ?>

            <input type="text" class="form-control" name="Address" placeholder="Address" value="<?php echo $Address ?>" />
            <?php echo "<p class='text-danger'>$errDiaChi</p>" ?>

            <input type="text" class="form-control" name="UserName" placeholder="Tài khoản" value="<?php echo $UserName ?>" />
            <?php echo "<p class='text-danger'>$errUsername</p>" ?>

            <input type="password" class="form-control" name="Password" placeholder="Nhập mật khẩu" value="<?php echo $password ?>" />
            <?php echo "<p class='text-danger'>$errPassword</p>" ?>
            
            <div>
                Admin<?php if($Admin==1){ ?>
                        <input type="checkbox" name="Admin" id="" checked>
                    <?php } else{?>
                        <input type="checkbox" name="Admin" id="">
                    <?php }?>

            </div>
            <div class="action">
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="./index.php" class="btn btn-danger">Quay lại trang user</a>
            </div>
        </div>
    </form>
</div>
<?php include '../IncludeAdmin/footer.php';