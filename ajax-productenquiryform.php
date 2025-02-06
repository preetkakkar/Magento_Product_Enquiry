<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require '/home/site/public_html/vendor/autoload.php';

if (isset($_GET['action']) && ($_GET['action'] == 'prodquery')) {

if (isset($_POST['prod_name']) && $_POST['prod_name'] && isset($_POST['user_name']) && $_POST['user_name'] && isset($_POST['user_email']) && $_POST['user_email'] && isset($_POST['user_phone']) && $_POST['user_phone']) {

  $prod_name = $_POST["prod_name"];
  $prod_sku = $_POST["prod_sku"];	
  $user_name = $_POST["user_name"];
  $user_email = $_POST["user_email"];
  $user_phone = $_POST["user_phone"];
  $enquiry_type = $_POST["enquiry_type"];
  $company = $_POST["company"];	
  $quantity = $_POST["quantity"];
  $nearestLocation = $_POST["location"];
  $contact_method = $_POST["contact_method"];	
  $user_message = nl2br($_POST["user_message"]); // Converts newlines to <br>
  $to_email_address = "youremail@address";


  $body = '<strong>A new product enquiry has been submitted. See the following details below</strong>';
	
  $body .= '<h3>Customer Details</h3>
        <strong>Enquiry Type: </strong>'.$enquiry_type.'<br>';
	
  if(isset($_POST['user_name']) && $_POST['user_name'] != ''){
    $body .= '<strong>Name: </strong>'.$user_name.'<br>';
  }

  if(isset($_POST['user_email']) && $_POST['user_email'] != ''){
    $body .= '<strong>Email: </strong>'.$user_email.'<br>';
  }

  if(isset($_POST['company']) && $_POST['company'] != ''){
    $body .= '<strong>Company: </strong>'.$company.'<br>';
  }
	
  $body .= '<strong>Phone no:: </strong>'.$user_phone.'<br>';

  $body .= '<h3>Product Enquiry Details</h3>
  		<strong>Product Code: </strong>'.$prod_sku.'<br>
        <strong>Product Name: </strong>'.$prod_name.'<br>
		<strong>Nearest location: </strong>'.$location_text.'<br>
		<strong>Quantity: </strong>'.$quantity.'<br>
		<strong>Preferred Contact Method: </strong>'.$contact_method.'<br>';

  if (isset($_POST['user_message']) && $_POST['user_message'] != ''){
    $usr_msg = nl2br($_POST["user_message"]);  
    $body .= '<strong>Message: </strong>'.$usr_msg.'<br>';
  }        
        
  $body .= '<br><br>
  		Thank you,<br><br>
      </body>
      </html>';
	
 $bodytxt = 'A new product enquiry has been submitted. See the following details below.
	
Customer Details

Enquiry Type: '.$enquiry_type.'
Name: '.$user_name.'
Email: '.$user_email.'
Phone no:'.$user_phone.'
Company: '.$company.'
	
Product Details
	
Product Code: '.$prod_sku.'
Product Name: '.$prod_name.'
Nearest location: '.$location_text.'
Quantity: '.$quantity.'
Preferred Contact Method: '.$contact_method.'
Message: '.$user_message.'

Thank you.';
	
  $email = new PHPMailer();
  $email->isHTML(true); // Enables HTML on the mail body
  $email->From      = "";
  $email->FromName  = "";
  $email->Subject   = "Product enquiry";
  $email->Body      = $body;
  $email->AltBody   = $bodytxt;	
  $email->AddAddress($to_email_address);

  if($email->Send()){
    echo json_encode(array('success' => 1));
  } else {
    echo json_encode(array('success' => 0));
  }

} 
}else {

  echo "You do not have permission to access this page. Please contact website administration for further information.";

}

?>