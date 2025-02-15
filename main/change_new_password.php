<?php
    require '../Connect/Connect.php';
    require '../Class/Forgot_Password.php';
    if (!isset($_GET['token'])) {
        echo "Token not provided.";
        exit;
    }
    $token = $_GET['token'];
    $sql = "select * from forgot_password where token = '$token'";
    $result = ForgotPassword::getForgot($sql);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    if(count($result) === 0) {
        header("../main/index.php");
        exit;
    }

?>

<?php include '../include/header.php';?>

<div class="container pt-5">
    <!-- Outer Row -->
    <div class="row justify-content-center pt-5">
        <div class="col-lg-12 p-5">
            <div class=" card o-hidden border-0 my-5">
                <div class="card-body p-5">
                    <form class="user" method="post" action="../../Handle/process_change_password.php">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <div class="form-group mb-4">
                            <label for="password">Vui lòng nhập mật khẩu mới</label>
                            <input type="password" class="form-control form-control-user mt-3" name="password" />
                        </div>
                        <div class="text-start">
                            <button class="btn action-1">Lưu lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './include/footer.php';?>