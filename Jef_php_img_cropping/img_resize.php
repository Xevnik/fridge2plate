<!---->
<!--<img src="/images/resized/abc.jpg">;-->
<?php
//.htaccess in /images/resized;
//RewriteEngine on;
//RewriteCond %{REQUEST_FILENAME} !-f;
//RewriteRule (.*) generate_image.php?img_name=$1;
//?>
<!---->
<!---->
<!---->
<!--    <img src="/images/resized/get_image.php?template=/image.jpg">  /images/resized/abc.jpg-->
<?php
//$img_url_unesc = $_GET['img'];//''http://www.example.com/image.jpg';
//$url_parts_unesc = parse_url($img_url_unesc);
//if ($url_parts_unesc['host'] != 'www.recipeapisite.com') {
//    #someone might be trying to use us to attack someone else, exit/error here
//}else {
//    #fetch image from remote server
//    $image_data_unesc = file_get_contents($img_url_unesc);
//    #allow_url_fopen = On
//
//
//    $img_path_unesc = $url_parts_unesc['path'];
//    $img_name_unesc = basename($img_path_unesc);
//    #save full quality image data to a file
//    file_put_contents(__DIR__ . $img_name_unesc /*path goes here*/), $image_data_unesc;
//   #create resized file and save to the appropriate location
//}
//#redirect to the file
//header('Location: /images/resized/' . $_GET['img']);
//exit;
//
//in get_image.php
//#do I already have a resized version of abc.jpg that was sized down from the original large image?
//#if so, redirect to it using
//#if not,