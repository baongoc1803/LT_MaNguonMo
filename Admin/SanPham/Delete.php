<?php 
    require '../../Connect/Connect.php';
    require '../../Class/Product.php';
    include'/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Admin/IncludeAdmin/header.php';
    $id=$_GET['id'];
    $pro=Product::getById($id);
    if(empty($id) || empty($pro)){
        header('location: ../../main/404.php');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(!empty($_POST['MaSP']))
        {
            $MaSP=$_POST['MaSP'];
            Product::delete($MaSP);
            header("location: ./product.php?delete=Successfully");
        }
    }
?>
<style>
    img {
    width: 100%;
}

.product__price {
    color: #E02207;
}

.product__info {
    margin-bottom: 24px;
}

.list-action {
    display: flex;
    justify-content: space-between;
}
</style>

<div class="container">
    <h2>Xóa sản phẩm</h2>
    <form  method="post" enctype="multipart/form-data" class="d-flex">
        <div class="product">
            <input type="hidden" name="MaSP" value="<?php echo $id?>" />
            <div class="row">
                <h2>Tên sản phẩm: <?php echo $pro->TenSP?></h2>
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="../../Image/<?php echo $pro->AnhSP?>" />
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="product__price">
                        Giá tiền:<?php echo number_format($pro->GiaBan, 0, ".", ",")?> đ
                    </h3>
                    <h3 class="product__price">
                        Số lượng: <?php echo $pro->SoLuong?>
                    </h3>
                    <div class="product__info">
                        <h4>Thông tin sản phẩm</h4>
                        <?php echo $pro->MoTa?>
                    </div>
                    <h2>Bạn có muốn xoá ?</h2>
                    <ul class="list-action">
                            <button class="btn buy btn-danger" type="submit">Xoá</button>
                            <a href="../../main/index.php" class="btn btn-dark">Huỷ</a>
                       
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include '../IncludeAdmin/footer.php'; 