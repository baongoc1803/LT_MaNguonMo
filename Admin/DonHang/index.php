<?php 
require '../../Connect/Connect.php';
require '../../Class/User.php';
require '../../Class/DonHang.php';
$sql = "SELECT * FROM `donhang`";
$result = DonHang::getOrder($sql);
?>
<?php include'../IncludeAdmin/header.php';?>
<style>
    h2 {
    color: #E02207;
}

.row {
    margin-bottom: 24px;
}

.insBreadcrumbs ul {
    display: flex;
    background-color: #3333;
    padding: 4px 8px;
}

    .insBreadcrumbs ul li {
        padding: 0 12px;
    }

.img-banner {
    width: 100%;
}

.brand-item img {
    height: 24px;
    border-radius: 30%;
}

.loai-item {
    display: flex;
    flex-wrap: wrap;
}

    .loai-item li {
        padding: 4px 8px;
        background-color: #f4f8fa;
        border-radius: 10px;
        margin: 8px;
    }

.card-product {
    padding: 12px 0;
}

    .card-product a {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color 0.5s;
    }

    .card-product :hover {
        color: #E02207;
    }

    .card-product .card {
        border-radius: unset;
    }
    .login {
    display: flex;
    flex-direction: column;
    align-items:center;
}

    .login input {
        padding: 4px 24px;
        margin-bottom: 12px;
    }

    .login button {
        border: 0.5px solid #E02207;
        border-radius: 0;
        color: white;
        background-color: #E02207;
        border-radius: 5px;
    }

        .login button:hover {
            background: white;
            color: #E02207;
            border: 0.5px solid #E02207;
        }
.action {
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.action-1 {
    background: #E02207;
    color: white;
    
    margin-bottom:0;
}

    .action-1:hover {
        
        background: white;
        color: #E02207;
    }

.action-2 {
    background: white;
    color: #E02207;
    border: 1px solid #E02207;
}
.action-2:hover {
        background: #E02207;
        color: white;
    }

.row {
    margin-bottom: 24px;
}
</style>
<div class="container">
    <h2>DANH SÁCH ĐƠN HÀNG</h2>
    <table class="table table-bordered">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tài khoản</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
        </tr>
        <?php foreach($result as $order){?>
            <tr>
                <td><a href="./order_detail.php?id=<?php echo $order->MaDH?>"><?php echo $order->MaDH?></a></td>
                <td><a href="<?php echo $order->MaUser?>"><?php echo Users::getById($order->MaUser)->UserName ?></a></td>
                <td><?php echo (new DateTime($order->NgayDat))->format('d-m-Y'); ?></td>
                <td><?php echo number_format($order->TongTien, 0, ".", ",")?> đ</td>
                <td>
                    <form action="../DonHang/order_suceess.php" method="post">
                        <input type="hidden" name="MaDH" value="<?php echo $order->MaDH?>">
                        <button class="btn" type="submit">Giao thành công</button>
                    </form>
                </td>
            </tr>
        <?php }?>
    </table>
</div>