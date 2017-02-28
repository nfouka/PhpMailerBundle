<?php

namespace PhpMailer\SendMailerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        print_r(($this->container->getParameter('List'))) ; 
        
        $mail = $this->container->get('php_mailer_send_mailer.send') ; 
        
        $mail->isSMTP();                                     
        $mail->Host     = $this->container->getParameter('Host') ; 
        $mail->SMTPAuth = $this->container->getParameter('SMTPAuth')      ;             
        $mail->Username = 'symfony.tutorials2017@gmail.com';                
        $mail->Password = 'symfony.tutorials2017symfony.tutorials2017';                          
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;    
        

        foreach ($this->container->getParameter('List')  as $key => $value) {
            $mail->addAddress($value );  
        }

        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
        
        return $this->render('PhpMailerSendMailerBundle:Default:index.html.twig');
    }
}
