<?php 
require '../../Class/User.php';
require '../../Connect/Connect.php';
$id = $_GET['id'];
$user = Users::getById($id);
if(empty($user) || empty($id)){
    header('location: ../main/404.php');
}
$errName = "";
$errEmail = "";
$errAddress = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $check = true;
    if(empty($_POST['Name'])){
        $errName = "Vui lòng nhập tên";
        $check = false;
    }
    if(empty($_POST['Email'])){
        $errEmail = "Vui lòng nhập email";
        $check = false;
    }
    if(empty($_POST['Address'])){
        $errAddress = "Vui lòng nhập địa chỉ";
        $check = false;
    }
    if(empty($_POST['Admin']))
        $Admin = 0;
    else
        $Admin = 1;
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    if($check){
        Users::update($Name,$Email,$Address,$id);
        header('location:../User/index.php?update successfully');
    }
    else{
        if(empty($user->Admin)){
            $Admin = 0;
        }
        $Name=$user->Name;
        $Email=$user->Email;
        $Address=$user->Address;
    }
}
?>
<?php require '../IncludeAdmin/header.php'?>
<div class="container">
    <form method="post" enctype="multipart/form-data">
    <h2>CHỈNH SỬA THÔNG TIN TÀI KHOẢN</h2>
    <div>
        <input type="hidden" name="Id" value="<?php echo htmlspecialchars($id); ?>"/>
        
        <label>Họ và tên</label>
        <input type="text" class="form-control" name="Name" placeholder="Họ và tên" value="<?php echo htmlspecialchars($user->Name); ?>" />
        <?php if (!empty($errName)) { echo "<p class='text-danger'>" . htmlspecialchars($errName) . "</p>"; } ?>

        <label>Email</label>
        <input type="text" class="form-control" name="Email" placeholder="Email" value="<?php echo htmlspecialchars($user->Email); ?>" />
        <?php if (!empty($errEmail)) { echo "<p class='text-danger'>" . htmlspecialchars($errEmail) . "</p>"; } ?>

        <label>Địa chỉ</label>
        <input type="text" class="form-control" name="Address" placeholder="Address" value="<?php echo htmlspecialchars($user->Address); ?>" />
        <?php if (!empty($errAddress)) { echo "<p class='text-danger'>" . htmlspecialchars($errAddress) . "</p>"; } ?>
    </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a href="./index.php" class="btn btn-danger">Hủy</a>
    </form>
</div> 
<?php include '../IncludeAdmin/footer.php' ?>