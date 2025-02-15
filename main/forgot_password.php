<?php 
require '../Connect/Connect.php';
include '../include/header.php';
?>
<div class="container">
<div class="row justify-content-center pt-5">
        <div class="card-body p-5">
            <form class="user" method="post" action="../Handle/process_forgot_password.php">
                <div class="form-group mb-4">
                    <label for="email">Please Enter Your Email</label>
                    <input type="email" class="form-control form-control-user mt-3" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" />
                </div>
                <div class="row">
                    <div class="text-start">
                        <button class="btn btn-success">Send</button>
                        <a href="index.php" class="btn btn-danger">Back To Store</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include '../include/footer.php'; ?>
