<?php

$result="";
  if (isset($_POST['submit'])) {
      require 'php-mailer/PHPMailerAutoload.php';
      require 'php-mailer/class.smtp.php';
      require 'php-mailer/class.phpmailer.php';
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 465;
      $mail->SMTPAuth = truex;
      $mail->SMTPSecure = 'ssl';

      // Gmail ID which you want to use as SMTP server
      $mail->Username = 'info@chemallinternational.com';
      // Gmail Password
      $mail->Password = 'Proj$ct123';
      $mail->setFrom('prakrutipathak06@gmail.com');
      // Recipient Email ID where you want to receive emails
      $mail->addAddress('prakrutipathak06@gmail.com');
      $mail->addReplyTo($_POST['email'],$_POST['name']);

      $mail->isHTML(true);
      $mail->Subject = 'Form Submission:' .$_POST['subject'];
      $mail->Body='<h1 align=center>Name:' .$_POST['name']. '<br>Email:' .$_POST['email']. '<br> Message:' .$_POST['message']. '</h1>' ;


      if(!$mail->send()){
      $result = "something went wrong";
                
    } else {
      $result = "THANKS".$_POST['name']."for contacting us";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Using PHPMailer & Gmail SMTP</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
</head>

<body class="bg-info">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card border-danger shadow">
          <div class="card-header bg-danger text-light">
             
            <h3 class="card-title">Contact Us</h3>
          </div>
          <div class="card-body px-4">
            <form action="#" method="POST">
              <div class="form-group">
                <?= $result; ?>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>