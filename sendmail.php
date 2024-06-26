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
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tzumi.10@gmail.com';                     //SMTP username
            $mail->Password   = 'jgibvjryvcsstltz';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //ENCRYPTION_SMTPS 465 - Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tzumi.10@gmail.com', $name);          //Sender(cannot use the sender email as gmail disallows it)
            $mail->addReplyTo($senderEmail, $name); // User's email and name
            $mail->addAddress('tzumi.10@gmail.com', 'Azurite Engineering PLT');     //Add a recipient

            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New enquiry - Azurite Engineering PLT Contact Form';
            $mail->Body    = '<h3>Hello, you got a new enquiry</h3>
                <h4>Fullname: '.$name.'</h4>
                <h4>Email: '.$senderEmail.'</h4>
                <h4>Subject: '.$subject.'</h4>
                <h4>Message: '.$message.'</h4>
            ';
                
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

    