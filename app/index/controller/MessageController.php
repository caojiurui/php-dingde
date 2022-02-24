<?php

namespace app\index\controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MessageController extends IndexBaseController
{

    public function __construct()
    {
        parent::initialize();
        $this->met_module = "7";
    }

    public function index()
    {
        $this->assign([
            'classnow' => "25",
        ]);
        return $this->fetch();
    }

    public function sendEmail()
    {
        //Server settings
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.163.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'caojiurui3@163.com';                     //SMTP username
        $mail->Password = 'IWSVCXANTJACUOAZ';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('caojiurui3@163.com', '邮件机器人');
        $mail->addAddress('904981950@qq.com', '网站管理者大人');     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '【鼎德】新留言：' . (request()->param("留言内容") || '');
        $body = "<table style='text-align:left;border-collapse:collapse;border-color:#cccc;border:solid 1px#B4B4B4;margin-left:10px;font-size:13px;'>";
        foreach (request()->param() as $key => $value) {
            $body .= "<tr style='border:solid 1px#B4B4B4;'>" .
                "<td width='10%' style='border:solid 1px#B4B4B4;padding:10px;'>" . $key . "</td>" .
                "<td width='90%' style='border:solid 1px#B4B4B4;padding:10px;'>" . $value . "</td>" .
                "</tr>";
        }
        $body .= "</table>";

        $mail->Body = $body;
        $mail->send();
        return json(['success' => true]);
    }


}
