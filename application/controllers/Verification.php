<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Verification extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    public function firstStep()
    {
        $this->load->view('includes/header');
        $this->load->view('pages/auth/verification_first_step');
    }

    public function resend()
    {
        $email = $this->session->userdata('email');
        $account_id = $this->session->userdata('id');

        $verification_code = $this->generate_verification_code();

        // update vcode
        $this->Verification_model->updateVerificationCode($account_id, $verification_code);

        // Send vcode
        $this->emailNewCode($email, $verification_code);
    }

    private function generate_verification_code($length = 12)
    {
        $charset = "MATERNAL0123456789";
        $code = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($charset) - 1);
            $code .= $charset[$randomIndex];
        }

        return $code;
    }

    public function emailNewCode($email, $verification_code)
    {

        $to = $email;
        $subject = 'Verification Code';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'maternalhealth389@gmail.com';
            $mail->Password = 'qxcl lekb tqbr ijse';
            $mail->SMTPSecure = 'tls'; // or 'ssl'
            $mail->Port = 587; // or 465 for SSL
            $mail->setFrom('maternalhealth389@gmail.com', 'Maternal Health System');
            $mail->addAddress($to);
            $mail->Subject = $subject;

            $mailContent = "
                            <html>
                            <head>
                            <style>
                            
                                body {
                                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                                }

                                .h2{
                                    color: rgb(17, 82, 114, 1);
                                }
                                .container {
                                    max-width: 700px;
                                    margin: 0 auto;
                                }
                                .header {
                                    background-color: rgb(17, 82, 114, 1);
                                    color: #ffffff;
                                    padding: 5px;
                                    text-align: center;
                                }
                                .header img {
                                    max-width: 70px; /* Adjust the width as needed */
                                    margin-right: 10px; /* Add margin to separate image from text */
                                    border-radius: 50%;
                                }
                                .row {
                                    display: flex;
                                    align-items: center;
                                    justify-content: space-between;
                                    padding: 20px;
                                }
                                .col-md-4 {
                                    flex: 0 0 30%;
                                    max-width: 30%;
                                    text-align: center;
                                }
                                .col-md-8 {
                                    flex: 0 0 70%;
                                    max-width: 70%;
                                    text-align: center;
                                }
                                .content {
                                    padding: 20px;
                                    background-color: #f8f9fa;
                                }
                                ul {
                                    list-style: none;
                                    padding: 0;
                                    margin: 0;
                                }
                                li {
                                    padding-left: 35px;
                                }
                                .footer {
                                    background-color: #f8f9fa;
                                    padding: 10px;
                                    color: gray;
                                    text-align: center;
                                    border-top: 1px solid lightgray;
                                }
                                </style>
                            </head>
                            <body>
                                <div class='container'>
                                    <div class='header'>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <img src='https://maternalhealth-qcdistrict2.com/qcu/assets/images/logos/maternology.png' alt='logo'> 
                                        </div>
                                        <div class='col-md-8'>
                                            <h2>Welcome to Maternal Health System</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class='content'>
                                    <h2 class='h2'>Dear System User,</h2>
                                    <p>Below is your verification code, used this to successfully verify your account.</p>
                                    <ul>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Verification Code:</b> " . $verification_code . "</li>
                                    </ul>
                                </div>
                                <div class='footer'>
                                    <p>All Rights Reserved<br>© 2024 Maternal Health System</p>
                                    <p><i>'https://maternalhealth-qcdistrict2.com/'</i></p>
                                </div>
                                </div>
                            </body>
                            </html>";
            $mail->isHTML(true);
            $mail->Body = $mailContent;

            // Send the email
            $mail->send();

            //print 'Email sent successfully';
            $this->session->set_flashdata('success_mail', 'New code sent to your email successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            $this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        redirect('verification/firststep');
    }

    public function verify()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $submittedCode = $this->input->post('vcode');
            $user_id = $this->session->userdata('id');

            $storedCode = $this->Verification_model->getVerificationCode($user_id);

            if ($submittedCode == $storedCode) {
                // Mark the user account as verified
                $this->Verification_model->verified($user_id);

                $this->session->set_flashdata('success', 'Verification successful.');
            } else {

                $this->session->set_flashdata('error', 'Verification failed! Please double check your code or request new code by clicking resend.');
            }
        } else {
            print "Invalid request.";
        }

        redirect('verification/firststep');
    }

    public function secondStep()
    {
        $user_id = $this->session->userdata('id');
        $accdata = $this->Verification_model->getAcc($user_id);
        $data['account'] = $accdata;

        $this->load->view('includes/header');
        $this->load->view('pages/auth/verification_second_step', $data);
    }

    public function update()
    {

        $account_id = $this->session->userdata('id');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $hashPass = md5($password);

        $updated = $this->Verification_model->updateAcc($account_id, $email, $hashPass);

        if ($updated) {

            $this->session->set_flashdata('success', 'Account Updated Successfully. Please login again using your new Account.');
        } else {

            $this->session->set_flashdata('error', 'Account Failed to Update!');
        }

        redirect('verification/secondstep');
    }
}
