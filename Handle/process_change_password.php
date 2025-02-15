<?php
require '../Class/User.php';
require '../Class/ForgotPassword.php';
require '../Connect/Connect.php';
$token = $_POST['token'];
$password = $_POST['password'];

$sql = "select customer_id from forgot_password where token = '$token'";
$result = ForgotPassword::getForgot($sql);
echo "<pre>";
print_r($result);
echo "</pre>";

if(count($result) === 0) {
    header("../main/index.php");
    exit;
}
echo $password;
Users::updatePassword($password, $result[0]->customer_id);
ForgotPassword::deleteWithToken($token);

header("location: ../main/login.php");