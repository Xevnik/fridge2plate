<?php
require_once('../vendor/autoload.php');
echo '<h1>IN PHP</h1>';
echo($clientToken = Braintree_ClientToken::generate());
?>