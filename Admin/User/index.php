<?php
require '../../Connect/Connect.php';
require '../../Class/User.php';
    $sql="SELECT * FROM `user`";
    $result=Users::getUsers($sql);
?>
<?php include '../IncludeAdmin/header.php';?>
<style>
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
</style>

<div class="container">

    <a href="./user_insert.php" class="btn btn-dark" style="color:#E0FFFF">Thêm tài khoản mới</a>
    <h2>DANH SÁCH NGƯỜI DÙNG</h2>
    <table class="table table-bordered">
        <tr>
            <th>Tài khoản</th>
            <th>Họ Tên</th>
            <th>Chức năng</th>
        </tr>
        <?php foreach($result as $user){?>
            <tr>
                <td><a href="./user_detail.php?id=<?php echo $user->Id ?>"><?php echo $user->UserName ?></a></td>
                <td><?php echo $user->Name ?></td>
                <td><a href="./user_update.php?id=<?php echo $user->Id ?>" class="btn btn-info">Sửa</a> | <a href="./user_delete.php?id=<?php echo $user->Id ?>" class="btn btn-info">Xóa</a></td>
            </tr>
        <?php }?>
    </table>
</div>
<?php include '../IncludeAdmin/footer.php' ?>