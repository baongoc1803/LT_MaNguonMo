<?php 
    require '../../Connect/Connect.php';
    require '../../Class/ProductType.php';
    require'../../Class/Product.php';
    include'/NGUYENTHIBAONGOC/NGUYENTHIBAONGOC/Ampps/www/2001215986_NguyenThiBaoNgoc_DoAn/Admin/IncludeAdmin/header.php';
    $errTenSP = "";
    $errGia = "";
    $errThongTinSP = "";
    $errAnh = "";
    $errSoLuong = "";
    $errMaLoai= "";

    $TenSP = "";
    $GiaBan= "";
    $MoTa = "";
    $AnhSP = "";
    $SoLuong = "";
    $MaLoaiSP= "";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        var_dump($_POST);
        $check=true;
        if(empty($_POST['TenSP'])){
            $errTenSP="Vui lòng nhập tên sản phẩm";
            $check=false;
        }

        if(empty($_POST['GiaBan'])){
            $errGia="Vui lòng nhập giá sản phẩm";
            $check=false;

        }
        else if(!is_numeric($_POST['GiaBan'])){
            $errGia="Vui lòng nhập số";
            $check=false;
        }else if(!($_POST['GiaBan']%1000===0)){
            $errGia="Vui lòng nhập giá chia hết cho 1000";
            $check=false;
        }
        if(empty($_POST['MoTa'])){
            $errThongTinSP="Vui lòng nhập thông tin sản phẩm";
            $check=false;
        }
        
        if(empty($_POST['SoLuong'])){
            $errSoLuong="Vui lòng nhập số lượng sản phẩm";
            $check=false;
        }else if(!is_numeric($_POST['SoLuong'])){
            $errSoLuong="Vui lòng nhập kiểu số cho số lượng sản phẩm";
            $check=false;
        }
        if(empty($_POST['MaLoaiSP']))
        {
            $errMaLoai="Vui lòng nhập kiểu số cho số lượng sản phẩm";
            $check=false;
        }
        if($check){
            $MaSP = $_POST['MaSP'];
            $TenSP = $_POST['TenSP'];
            $GiaBan = $_POST['GiaBan'];
            $MoTa = $_POST['MoTa'];
            $AnhSP = $_FILES['AnhSP'];
            $SoLuong = $_POST['SoLuong'];
            $MaLoaiSP= $_POST['MaLoaiSP'];
            $ImgOld=$_POST['img_old'];
            $file_name = $AnhSP["name"];

            Product::update($MaSP,$TenSP,$GiaBan,$MoTa,$AnhSP,$SoLuong,$MaLoaiSP,$ImgOld);
            header("location: product.php?update=Successfully");
        }
    }
    else{
        
   
        $sql1="SELECT * FROM `producttype`";
        $productType=ProductType::getAllProductType($sql1);
        $id=$_GET['id'];
        $pro=Product::getById($id);
        if(empty($id) || empty($pro)){
            header('location: ../main/404.php');
        }
        $MaSP = $pro->MaSP;
        $TenSP = $pro->TenSP;
        $GiaBan = $pro->GiaBan;
        $MoTa = $pro->MoTa;
        $AnhSP = $pro->AnhSP;
        $SoLuong = $pro->SoLuong;
        $MaLoaiSP= $pro->MaLoaiSP;
        
    }
   
?>


<style>
    .hidden {
        display: none;
    }
</style>
<div class="container">
    <h2>Chỉnh sửa sản phẩm</h2>
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <input type="hidden" name="MaSP" value="<?php echo $id?>" />
            <tr>
                <td><label class="form-label">Tên sản phẩm</label></td>
                <td>
                    <input type="text" value="<?php echo $TenSP; ?>" class="form-control" id="TenSP" placeholder="Tên sản phẩm" name="TenSP" />
                    <?php echo "<p class='text-danger'>$errTenSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Giá</label></td>
                <td>
                    <input type="text" value="<?php echo $GiaBan?>" class="form-control" id="GiaBan" placeholder="Giá tiền" name="GiaBan" />
                    <?php echo "<p class='text-danger'>$errGia</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Thông tin sản phẩm</label></td>
                <td>
                    <input type="text" value="<?php echo $MoTa?>" class="form-control" id="MoTa" placeholder="Thông tin" name="MoTa" />
                    <?php echo "<p class='text-danger'>$errThongTinSP</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Chọn ảnh</label></td>
                <td>
                    <input type="file" class="form-control" id="AnhSP" name="AnhSP"/>
                    <br />
                    
                    <input type="hidden" name="img_old" value="<?php echo $AnhSP?>">
                    <img id="preview" src="../Image/<?php echo $Anh?>" width="150" height="100" />
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Số lượng</label></td>
                <td>
                    <input type="text" value="<?php echo $SoLuong?>" class="form-control" id="SoLuong" placeholder="Số lượng" name="SoLuong" />
                    <?php echo "<p class='text-danger'>$errSoLuong</p>" ?>
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Loại sản phẩm</label></td>
                <td>
                    <select class="form-control" id="MaLoaiSp" name="MaLoaiSP">
                        <option value="">Vui lòng chọn loại</option>
                        <?php foreach($productType as $proType){?>
                            <option value="<?php echo $proType->MaLoaiSP?>"><?php echo $proType->TenLoai?></option>
                        <?php } ?>
                    </select>
                    <?php echo "<p class='text-danger'>$errMaLoai</p>" ?>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Sửa</button>
        <a href="./index.php" class="btn btn-primary">Huỷ</a>
    </form>
</div>
<script>
    Anh.onchange = evt => {
        const [file] = AnhSP.files
        if (file) {
            preview.src = URL.createObjectURL(file);
            $("#preview").removeClass("hidden");
        }
    }
</script>
<?php include '../../include/footer.php'?>