<?php
require_once 'Exception.php';
require_once 'PHPMailer.php';
require_once 'SMTP.php';
$SERVER_DATA = stripslashes(file_get_contents("php://input"));
$mdata = json_decode($SERVER_DATA, true);
$email = (string) $mdata["email"];
$otp = (string) $mdata['otp'];
$subject = (string) $mdata['subject'];
// $email = $_POST["user"];
// $otp = $_POST['uotp'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->isHTML(true);
$mail->setFrom("lbrdcsoftware@gmail.com", "LBRDC");
$mail->addAddress($email);
$mail->Subject = $subject;
$mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Code Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            width: 150px; /* Adjust the logo size */
        }
        .content {
            text-align: left;
            padding: 20px;
        }
        .otp {
            font-size: 24px;
            font-weight: bold;
            color: #0072b5; /* Landbank blue color */
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.imgur.com/Y9q2JG1_d.png?maxwidth=520&shape=thumb&fidelity=high">
        </div>
        <div class="content">
            <h2>Welcome to LBRDC!</h2>
            <p>Dear User,</p>
            <p>We have received a request to send you a One-Time Password (OTP) for your account verification.</p>
            <p>Your OTP code is:</p>
            <div class="otp">' . $otp . '</div> 
            <p>Please use this code to complete your verification process.</p>
            <p>If you did not request this code, please ignore this email.</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 LBP Resources and Development Corp.</p>
        </div>
    </div>
</body>
</html>';
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "lbrdcsoftware@gmail.com";
$mail->Password = "omvwvrmtemckjtcd";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$data = array();
$raw_data = array();
if ($mail->send()) {
    $raw_data['Error'] = false;
    array_push($data, $raw_data);
} else {
    $raw_data['Error'] = $mail->ErrorInfo;
    $raw_data['Data'] = $email;
    array_push($data, $raw_data);
}
echo json_encode($data);