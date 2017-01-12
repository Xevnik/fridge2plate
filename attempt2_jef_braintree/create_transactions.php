<?php
$_POST['first_name'] = $transaction->customerDetails->firstName;
$_POST['last_name'] = "juls";
$_POST['company'] = "alls";
$_POST['user_email'] = "Balls@yourma.com";
$_POST['user_phone'] = "2374678236";
$_POST['full_name'] = "Balls McGuyver";
$_POST['card_number'] = "5105105105105100";
$_POST['expiry_month'] = "12";
$_POST['expiry_year'] = "2020";
$_POST['card_cvv'] = "234";
#Function to store customer's information and credit card to BrainTree Vault
function create_customer(){

    #Set timezone if not specified in php.ini
    //date_default_timezone_set('America/Los_Angeles');
    require_once '_environment.php';
    $includeAddOn = false;

    /* First we create a new user using the BT API */
    $result = Braintree_Customer::create([
        'firstName' => $_POST['first_name'],
        'lastName' => $_POST['last_name'],
        'company' => $_POST['company'],
        'email' => $_POST['user_email'],
        'phone' => $_POST['user_phone'],

        // we can create a credit card at the same time
        'creditCard' => [
            'cardholderName' => $_POST['full_name'],
            'number' => $_POST['card_number'],
            'expirationMonth' => $_POST['expiry_month'],
            'expirationYear' => $_POST['expiry_year'],
            'cvv' => $_POST['card_cvv'],
            'billingAddress' => [
                'firstName' => $_POST['first_name'],
                'lastName' => $_POST['last_name']
                ]
            ]
    ]);
                /*Optional Information you can supply
'company' => mysqli_real_escape_string($_POST['company']),
                 'streetAddress' => mysqli_real_escape_string($_POST['user_address']),
                 'locality' => mysqli_real_escape_string($_POST['user_city']),
                 'region' => mysqli_real_escape_string($_POST['user_state']),
                 //'postalCode' => mysqli_real_escape_string($_POST['zip_code']),
                 'countryCodeAlpha2' => mysqli_real_escape_string($_POST['user_country'])
*/
//            )
//        )
//    ]);
    if ($result->success) {
//        Do your stuff
        $creditCardToken = $result->customer->creditCards[0]->token;
        echo("Customer ID: " . $result->customer->id . "<br />");
        echo("Credit card ID: " . $result->customer->creditCards[0]->token . "<br />");
    } else {
        foreach ($result->errors->deepAll() as $error) {
            $errorFound = $error->message . "<br />";
        }
        echo $errorFound ;
        exit;
    }
}

create_customer();
?>


