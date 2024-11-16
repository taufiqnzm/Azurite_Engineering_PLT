<?php
    require_once("includes/config.php");
    session_start();
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $senderEmail = $_POST['email'];
        $phone = $_POST['phone'];
        $note = $_POST['note'];
        $service = $_POST['service'];
        $companyLogo = 'img\azurite-logo.png';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'azuritengineering@gmail.com';                     //SMTP username
            $mail->Password   = 'jnby ohll yvdj atbh';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('azuritengineering@gmail.com', $name);          //Sender(cannot use the sender email as gmail disallows it)
            $mail->addReplyTo($senderEmail, $name); // User's email and name
            $mail->addAddress('azuritengineering@gmail.com', 'Azurite Engineering PLT');     //Add a recipient

            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addAttachment($companyLogo, 'azurite-logo.png');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            // For img in the email body. put above header 
            // <img src="'.$companyLogo.'" alt="Azurite Engineering Logo" style="max-width: 150px; display: block; margin: 0 auto 20px;">

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New enquiry - Azurite Engineering PLT Quote Form';
            $mail->Body    = '
                <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif;">
                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 5px;">
                        <img src="cid:azurite-logo" alt="Azurite Engineering Logo" style="max-width: 150px; display: block; margin: 0 auto 20px; width: 75px;">
                        <h2 style="color: #333333;">New Enquiry Received</h2>
                        <p style="font-size: 16px;">Dear Team,</p>
                        <p style="font-size: 16px;">You have received a new enquiry:</p>
                        <hr style="border-top: 1px solid #ccc;">
                        <h3 style="color: #007bff;">Details:</h3>
                        <ul>
                            <li><strong>Name:</strong> '.$name.'</li>
                            <li><strong>Email:</strong> <a href="mailto:'.$senderEmail.'" style="color: #007bff;">'.$senderEmail.'</a></li>
                            <li><strong>Phone:</strong> '.$phone.'</li>
                            <li><strong>Service Requested:</strong> '.$service.'</li>
                        </ul>
                        <h3 style="color: #007bff;">Message:</h3>
                        <p style="font-size: 16px;">'.$note.'</p>
                        <hr style="border-top: 1px solid #ccc;">
                        <p style="font-size: 14px; color: #777777;">This special note was sent via the Azurite Engineering PLT Quote Form.</p>
                    </div>
                </div>
            ';

            $mail->addEmbeddedImage($companyLogo, 'azurite-logo');
                
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if ($mail->send()){
                $_SESSION['status'] = 'Thank you for contacting us - Azurite Engineering PLT';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            } else {
                $_SESSION['status'] = 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
                header("Location: {$_SERVER['HTTP_REFERER']}");
                exit();
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        header('Location: index.php');
        exit();
    }

    