<?php 
require '../../Class/User.php';
require '../../Connect/Connect.php';
require '../../Class/Cart.php';
$id = $_GET['id'];
$user = Users::getById($id);
if(empty($id) || empty($user)){
    header("location: ./index.php");
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['Id'];
    $cart = "SELECT * FROM `cart` WHERE IdUser = $id";
    $result = Cart::getCart($cart);
    if(count($result) > 0 ){
        header("location: ./index.php?Error: The user cannot be deleted because it is in the shopping cart");
    }
    Users::delete($id);
    mysqli_close($conn);
    header("location ./index.php?Delete successfully");
}
?>
<?php require'../IncludeAdmin/header.php' ?>
<div class="container">
    <form method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
            <h2>Xóa tài khoản</h2>
            <table class="table table-bordered">
                <input type="hidden" name="Id" value="<?php echo $id?>" />
                <tr>
                    <td>Tài khoản</td>
                    <td><?php echo $user->UserName?></td>
                </tr>
                <tr>
                    <td>Họ tên</td>
                    <td><?php echo $user->Name?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user->Email?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?php echo $user->Address?></td>
                </tr>
            </table>
            <div class="action">
                <button type="submit" class="btn btn-danger">Xóa</button>
                <a href="./index.php" class="btn btn-success">Quay lại trang user</a>
            </div>
    </form>
</div>
<?php include'../IncludeAdmin/footer.php'?>