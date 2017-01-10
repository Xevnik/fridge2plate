<?php
session_start();
//$redirect_uri = "https://" . $_SERVER['HTTP_HOST'] . "/google_login/g_login.php";
$recipePages = [
    'home'=>['header'=>'main_header.php','body'=>'main.php'],
    'login'=>['nav'=>'OUR MACARONS','body'=>'our_macarons.php'],
    'payment'=>[],
    'receipt'=>[],
    'feature-recipe'=>['nav'=>'GIFTS & PARTIES', 'body'=>'gifts_parties.php'],
    'about-us'=>['nav'=>'CONTACT','body'=>'contact.php']
];
$urlRequest = $_GET['page'];
if(empty($_REQUEST)){
    $theHeader = $recipePages['home']['header'];
    $theBody =$recipePages['home']['body'];
}else{
    $theHeader = $recipePages['home']['header'];
    $theBody =$recipePages['home']['body'];
}
?>

<!DOCTYPE html>
<html>

<?php
include_once($theHeader);
include_once($theBody);
?>

</html>