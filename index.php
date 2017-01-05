<?php
session_start();
//$redirect_uri = "https://" . $_SERVER['HTTP_HOST'] . "/google_login/g_login.php";
$mboutiquePages = [
    'home'=>['header'=>'main_header.php','url'=>'main.php'],
    'login'=>['nav'=>'OUR MACARONS','url'=>'our_macarons.php'],
    'payment'=>[],
    'receipt'=>[],
    'feature-recipe'=>['nav'=>'GIFTS & PARTIES', 'url'=>'gifts_parties.php'],
    'about-us'=>['nav'=>'CONTACT','url'=>'contact.php']
];
$urlRequest = $_GET['page'];
if(empty($_REQUEST)){
    print("hello");
}
?>

<!DOCTYPE html>
<html>

<?php
include_once('main_header.php');
include_once('main.php');
?>

</html>