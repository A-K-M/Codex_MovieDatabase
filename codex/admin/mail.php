<?php
                include 'config.php';
              require 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['send']))
                  {
                    $email = 'database.codex@gmail.com';                    
                    $password = 'codex@123';
                    $to_id = $_POST['toid'];
                    $id = $_POST['id'];
                    $admin = $_POST['admin_id'];
                    $message = $_POST['message'];
                    $subject = $_POST['subject'];

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->Host = 'smtp.gmail.com';

                    $mail->Port = 587;

                    $mail->SMTPSecure = 'tls';

                    $mail->SMTPAuth = true;

                    $mail->Username = $email;

                    $mail->Password = $password;

                    $mail->setFrom('from@example.com', 'Codex Team');

                    $mail->addReplyTo('replyto@example.com', 'Codex Team');

                    $mail->addAddress($to_id);

                    $mail->Subject = $subject;

                    $mail->msgHTML($message);

                    if (!$mail->send()) {
                       $error = "Mailer Error: " . $mail->ErrorInfo;
                        ?><script>alert('<?php echo $error ?>');</script><?php
                    } 
                    else {
                        mysql_query("UPDATE `codex`.`tbl_report` SET `is_replyed`='1', `admin_id`='$admin' WHERE `id`='$id';");
                       echo '<script>alert("Message sent!"); window.location="userreport.php";</script>';
                    }
               }
        ?>