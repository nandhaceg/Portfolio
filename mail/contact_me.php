<?php
    // Check for empty fields
    if(empty($_POST['name']) ||empty($_POST['email'])|| empty($_POST['phone'])||empty($_POST['message'])||!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    	echo "No arguments Provided!";
    	return false;
    }

    $name = strip_tags(htmlspecialchars($_POST['name']));
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $phone = strip_tags(htmlspecialchars($_POST['phone']));
    $message = strip_tags(htmlspecialchars($_POST['message']));


    require 'class.phpmailer.php';
    require 'PHPMailerAutoload.php';     
    $mail = new PHPMailer(true);

    //Send mail using gmail
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier 
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "visitnandha95@gmail.com"; // GMAIL username
    $mail->Password = "gatesopenotm"; // GMAIL password

    $email = 'visitnandha95@gmail.com';
    $mail->isHTML(true);
    //Typical mail data
    $mail->AddAddress($email);
    $mail->Subject = "Website Contact Form:  $name";
    $mail->FromName = "$email_address";
    $mail->Body = "You have received a new message from your website contact form.<br>"."Here are the details:<br>Name: $name<br>Email: $email_address<br>Phone: $phone<br>Message:$message";
    try{
        $mail->Send();
       //echo "Success!";
    } catch(Exception $e){
        //echo "Fail - " . $mail->ErrorInfo;
    }


    $user           =   'aastan7171';
    $password       =   '7299889972';
    $sender_id      =   'MABSKT';
    $sender_mobile  =    '8667328958';
    $message_text   =     'You have received a new message from your website contact form.<br>"."Here are the details:<br>Name: $name<br>Email: $email_address<br>Phone: $phone<br>Message:$message"';
    $priority       =   'ndnd';
    $sms_type       =   'normal';

    // create a new cURL resource
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, "http://bhashsms.com/api/sendmsg.php?user=$user&pass=$password&sender=$sender_id&phone=$sender_mobile&text=$message_text&priority=$priority&stype=$sms_type");

    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);


    // // Create the email and send the message
    // $to = 'visitnandha95@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
    // $email_subject = "Website Contact Form:  $name";
    // $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
    // $headers = "From: noreply@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    // $headers .= "Reply-To: $email_address";
    // mail($to,$email_subject,$email_body,$headers);
    return true;
?>
