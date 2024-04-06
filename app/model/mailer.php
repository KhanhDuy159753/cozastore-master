<?php

namespace App\model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

class Mailer
{
    public $iduser;
    public $lastname;
    public $email;

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }

    public function getIduser()
    {
        return $this->iduser;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function sendMailer()
    {
        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0; // Enable verbose debug output //SMTP::DEBUG_SERVER
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'khanhduytran1803@gmail.com'; // SMTP username
            $mail->Password = 'vqpq gfih xgur zyoy'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            //Recipients
            $mail->setFrom('khanhduytran1803@gmail.com', 'cozastore');
            $mail->addAddress($this->email, $this->lastname);            // Add a recipient
            // $mail->addAddress('ellen@example.com'); // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            //  $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            // Attachments
            //  $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $mail->Subject = 'Thay đổi mật khẩu';

            $mail->Body = '
            <p>Chào ' . $this->lastname . ',</p>
            <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px 20px"
                                            align="center" class="m_1545948272645075730mdv2rw"><img
                                                src="https://ci3.googleusercontent.com/meips/ADKq_NZa00tQPIx4fdFGtuHSHzYQ-whZFD7HWD3OhXR05fT4XqJ_Wca2erL9R9_382bPBUom-sDOVfi4G3FXbYaZsHsGqQUAL6-JIKgEzWlarZbeNSLveyc6EKOURFQhphfzG2ZAwLiyrJsC=s0-d-e1-ft#https://www.gstatic.com/images/branding/googlelogo/2x/googlelogo_color_74x24dp.png"
                                                width="74" height="24" aria-hidden="true" style="margin-bottom:16px" alt="Google"
                                                class="CToWUd" data-bit="iit">
                                            <div
                                                style="font-family:"Google Sans",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                                <div style="font-size:24px">Thay đổi mật khẩu để đăng nhập vào tài khoản của bạn
                                                </div>
                                                <table align="center" style="margin-top:8px">
                                                    <tbody>
                                                        <tr style="line-height:normal">
                                                            <td align="right" style="padding-right:8px">
                                                                <img width="20" height="20" style="width:20px;height:20px;vertical-align:sub;border-radius:50%" src="https://iconape.com/wp-content/png_logo_vector/user-circle.png" alt="">
                                                            </td>
                                                            <td>
                                                                <a
                                                                    style="font-family:"Google Sans",Roboto,RobotoDraft,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);font-size:14px;line-height:20px">' . $this->email . '</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div
                                                style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">
                                                Nếu bạn không phải là người đã quên mật khẩu này, thì rất có thể ai đó đang sử dụng tài
                                                khoản của bạn. Hãy kiểm tra và bảo mật tài khoản của bạn ngay bây giờ.<div
                                                    style="padding-top:32px;text-align:center"><a
                                                        href="index.php?pg=reset-pass&id=' . $this->iduser . '"
                                                        style="line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#4184f3;border-radius:5px;min-width:90px"
                                                        target="_blank"
                                                        data-saferedirecturl="https://www.google.com/url?q=https://accounts.google.com/AccountChooser?Email%3Dduytkps30235@fpt.edu.vn%26continue%3Dhttps://myaccount.google.com/alert/nt/1701238210453?rfn%253D20%2526rfnc%253D1%2526eid%253D5598478726088715367%2526et%253D0&amp;source=gmail&amp;ust=1701917788010000&amp;usg=AOvVaw1BSSzxTKx0dsjavSKAfh_5">
                                                        Thay đổi mật khẩu mới</a></div>
                                            </div>
                                            <div
                                                style="padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">
                                                Bạn cũng có thể xem hoạt động bảo mật tại<br><a
                                                    style="color:rgba(0,0,0,0.87);text-decoration:inherit">https://halosports.site/<wbr>notifications</a>
                                            </div>
                                        </div>
                                        <div style="text-align:left">
                                            <div
                                                style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center">
                                                <div>Chúng tôi gửi email này để thông báo cho bạn biết về những thay đổi quan trọng đối với
                                                    Tài khoản và dịch vụ của bạn.</div>
                                                <div style="direction:ltr">© 2023 HALO Sports, <a class="m_1545948272645075730afal"
                                                        style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;padding-top:12px;text-align:center"> Công Viên Phần mềm Quang Trung Toà nhà GenPacific, 
                                                        Lô 3 đường 16, Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh, Việt Nam</a></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
            ';


            $mail->AltBody = '';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
