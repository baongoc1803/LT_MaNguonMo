<?php 
require '../../Connect/Connect.php';
require '../../Class/User.php';
$id = $_GET['id'];
$user = Users::getById($id);
if(empty($id) || empty($user)){
    header('location: ../main/404.php');
}
?>
<?php include'../IncludeAdmin/header.php';?>
<div class="container">
    <h2>THÔNG TIN NGƯỜI DÙNG</h2>
    <table class="table table-bordered">
        <tr>
            <td>Tài khoản</td>
            <td><?php echo $user->UserName ?></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><?php echo $user->Name ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $user->Email ?></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><?php echo $user->Address ?></td>
        </tr>
    </table>
<a href="./index.php" class="btn btn-dark">Quay trở lại trang admin</a>
</div>
<?php include'../IncludeAdmin/footer.php';?>