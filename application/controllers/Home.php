<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    public function appointment()
    {
        $resident_data = $this->Home_model->getResidents();
        $data['residents'] = $resident_data;

        $brgy_data = $this->Admin_model->getBrgy();
        $data['barangay'] = $brgy_data;

        $hc_data = $this->Home_model->gethc();
        $data['healthcenter'] = $hc_data;

        $getsched = $this->Home_model->getsched();
        $data['schedules'] = $getsched;

        $this->load->view('pages/appointment', $data);
    }

    public function events(){

        $get_all_events = $this->Home_model->all_events();
        $data['all_events'] = $get_all_events;

        $this->load->view('pages/event', $data);
    }

    public function about(){

        $this->load->view('pages/about');
    }

    public function contact(){

        $this->load->view('pages/contact');
    }

    public function view()
    {
        $getAdmin = $this->Home_model->getAddminstatus();
        $data['adminstatus'] = $getAdmin;

        $resident_data = $this->Home_model->getResidents();
        $data['residents'] = $resident_data;

        $hc_data = $this->Home_model->gethc();
        $data['healthcenter'] = $hc_data;

        $this->load->view('pages/home_view', $data);
    }

    public function emailrqst()
    {

        $getEmail = $this->Home_model->Emaillist();
        $data['emaillist'] = $getEmail;

        $this->load->view('pages/email_requirement', $data);
    }

    public function resetVerif()
    {
        $this->load->view('pages/reset_verif_code');
    }

    public function reset()
    {
        $data['success'] = $this->session->userdata('success_message');
        $data['account'] = $this->session->userdata('account_data');

        // Clear the session data
        // $this->session->unset_userdata('success_message');
        // $this->session->unset_userdata('account_data');

        $this->load->view('pages/reset_password', $data);
    }

    public function login()
    {
        $this->load->view('pages/home_view');
    }

    public function checkuserlog()
    {
        //check if the user exist
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user_data = $this->Home_model->getuserlogin($email, $password);

        if (count($user_data) > 0) {
            $users_data = $user_data[0];

            $loginsession = array(
                //'id'  => $users_data->id,
                'email' => $users_data->email,
                'mobileno' => $users_data->mobileno,
                'is_verified' => $users_data->is_verified,
                'is_updated' => $users_data->is_updated,
                'role_id' => $users_data->role_id,
                'facilities_id' => $users_data->facilities_id,
                'id' => $users_data->suid,
                'code' => $users_data->code,
                'loggedin' => TRUE
            );

            $this->session->set_userdata($loginsession);
            $role_id = $this->session->userdata('role_id');
            $mobileno = $this->session->userdata('mobileno');

            // Check if user is not verified yet then send verification code
            if ($users_data->is_verified == 0) {
                $verification_code = $this->generate_verification_code();

                // Insert vcode
                $this->Home_model->insertVerificationCode($users_data->id, $verification_code);

                // Send vcode
                $this->sendVerificationCodeEmail($email, $verification_code);

                // send sms
                $this->smsAdminAcc($mobileno, $verification_code);
            }

            if ($role_id == 1) {
                print "<script>location.href='../admin/dashboard';</script>";
            } else if ($role_id == 4) {
                print "<script>location.href='../barangay/dashboard';</script>";
            } else if ($role_id == 2) {
                print "<script>location.href='../doctor/dashboard';</script>";
            } else if ($role_id == 5 || $role_id == 12) {
                print "<script>location.href='../encoder/dashboard';</script>";
            } else if ($role_id == 3) {
                print "<script>location.href='../midwife/dashboard';</script>";
            } else if ($role_id == 7) {
                print "<script>location.href='../chw/dashboard';</script>";
            } else if ($role_id == 8 || $role_id == 10) {
                print "<script>location.href='../lyingin/dashboard';</script>";
            } else if ($role_id == 9 || $role_id == 11) {
                print "<script>location.href='../hospital/ddashboard';</script>";
            }
        } else {
            $data['error'] = "Email or Password did not match.";
            print "<script>location.href='../home?error=" . $data['error'] . "';</script>";
        }
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

    // private function generate_appointment_conf_code($length = 4)
    // {
    //     $charset = "0123456789";
    //     $code = "";

    //     for ($i = 0; $i < $length; $i++) {
    //         $randomIndex = mt_rand(0, strlen($charset) - 1);
    //         $code .= $charset[$randomIndex];
    //     }

    //     return $code;
    // }

    public function save_img() {
        // Upload path folder
        $upload_path = '../mhs_micro/guardian_id/';
        
        // Check if the upload directory exists, if not, create it
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }
    
        // Array to store success and failure counts
        $success_count = 0;
        $failed_count = 0;
    
        // Loop through each uploaded file
        foreach ($_FILES['img_file']['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($_FILES['img_file']['name'][$key]);
            $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $hash_filename = $file_name;
    
            // Move the file to the upload directory
            if (move_uploaded_file($_FILES['img_file']['tmp_name'][$key], $upload_path . $hash_filename)) {
                $success_count++;
            } else {
                $failed_count++;
            }
        }
    
        if ($success_count > 0) {
            $this->session->set_flashdata('success', $success_count . ' image(s) uploaded successfully.');
        }
    
        if ($failed_count > 0) {
            $this->session->set_flashdata('failed', $failed_count . ' image(s) failed to upload.');
        }
    }    

    public function submitappointment()
    {

        // $code = $this->generate_appointment_conf_code();
        $code = $this->input->post('code');
        $email = $this->input->post('email');
        $mno = $this->input->post('mno');

        $bdate = $this->input->post('bdate');
        $formatted_bdate = date('Y-m-d', strtotime($bdate));

        $selected_date = $this->input->post('selected_date');
        $formatted_date = date('Y-m-d', strtotime($selected_date));

        $app_data = array(
            // 'residents_id' => $this->input->post('resi_id'),
            'facilities_id' => $this->input->post('hc'),
            'confirmation_code' => $code,
            'firstname' => $this->input->post('fname'),
            'middlename' => $this->input->post('mname'),
            'lastname' => $this->input->post('lname'),
            'birthdate' => $formatted_bdate,
            'age' => $this->input->post('age'),
            'street' => $this->input->post('st'),
            'brgy' => $this->input->post('brgy'),
            'civilStatus' => $this->input->post('cstatus'),
            'occupation' => $this->input->post('occu'),
            'email' => $email,
            'mobileno' => $mno,
            'reason' => $this->input->post('reason'),
            'visit_date' => $formatted_date,
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        if($this->input->post('age') < 18 && $this->input->post('age') >= 9){
            $oreg_id = $this->Home_model->submitappointment($app_data);

            $guard_data = array(
                'online_registration_id' => $oreg_id,
                'name' => $this->input->post('in_name'),
                'relationship' => $this->input->post('in_r'), 
                'identification' => $this->input->post('in_file'),
                'identification_2' => $this->input->post('in_file2'),
                'mobileno' => $this->input->post('in_no'),
                'address' => $this->input->post('in_add'),
                'createdAt' => date('Y-m-d H:i:s'),
            );

            $this->Home_model->submitguard($guard_data);

            $this->Home_model->update_oreg($oreg_id);
        } else {
            $this->Home_model->submitappointment($app_data);            
        }

        $this->emailAppointmentCode($code, $email);
        $this->smsAdminAcc($mno, $code);
    }

    public function sendVerificationCodeEmail($email, $verification_code)
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
            //$this->session->set_flashdata('success', 'Email sent successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            //$this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        //redirect('home');
    }

    public function email()
    {

        $to = 'crislloyd.dalina06@gmail.com';
        $subject = 'Account Activation';
        // $mailContent = 'Account Activation
        //                 Email: superadmin@email.com
        //                 Password: sadmin123';

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
                                    <h2 class='h2'>Dear Admin User,</h2>
                                    <p>Account Details:</p>
                                    <ul>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Email:</b> crislloyd.dalina06@gmail.com</li>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Password:</b> Sadmin.123</li>
                                    </ul>
                                    <p><i>Please go to this link and login 'https://maternalhealth-qcdistrict2.com/'</i></p>
                                </div>
                                <div class='footer'>
                                    <p>All Rights Reserved<br>© 2024 Maternal Health System</p>
                                </div>
                                </div>
                            </body>
                            </html>";
            $mail->isHTML(true);
            $mail->Body = $mailContent;

            // Send the email
            $mail->send();

            //print 'Email sent successfully';
            $this->session->set_flashdata('success', 'Email sent successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            $this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        redirect('home');
    }


    public function forgotpass()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages/email_requirement');
        } else {
            $enteredEmail = $this->input->post('email');
            $user = $this->Home_model->getUserByEmail($enteredEmail);

            if (!empty($user)) {

                $token = $this->generateRandomString();

                $this->Home_model->savePasswordResetToken($user[0]->id, $token);

                // Send a password reset email with the token
                $this->emailforgotpass($enteredEmail, $token);

                $data['success'] = 'Verification code sent successfully to your email.';
                $this->load->view('pages/email_requirement', $data);
            } else {
                $data['error'] = 'Invalid Email Account! Please enter your valid & registered account.';
                $this->load->view('pages/email_requirement', $data);
            }
        }
    }

    function generateRandomString($length = 20)
    {
        return bin2hex(openssl_random_pseudo_bytes($length / 2));
    }

    public function emailforgotpass($enteredEmail, $token)
    {

        $to = $enteredEmail;
        $subject = 'Forgot Password';

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
                                    <h2 class='h2'>Dear User,</h2>
                                    <p>Verification Code Details:</p>
                                    <p style='margin-left: 25px; font-weight: bolder;'>" . $token . "</p>
                                    <p><i>Please go to this link to verify your account.(live) <a href='https://maternalhealth-qcdistrict2.com/qcu/home/resetVerif?token=$token'>Click here</a>.</i></p>
                                </div>
                                <div class='footer'>
                                    <p>All Rights Reserved<br>© 2024 Maternal Health System</p>
                                </div>
                                </div>
                            </body>
                            </html>";
            $mail->isHTML(true);
            $mail->Body = $mailContent;

            // Send the email
            $mail->send();

            //print 'Email sent successfully';
            // $this->session->set_flashdata('success', 'Email sent successfully');
        } catch (Exception $e) {
            print '<script>console.log("Email delivery failed. Error: ' . $mail->ErrorInfo . '");</script>';
        }
    }

    public function verifyfpcode()
    {
        $this->form_validation->set_rules('vcode', 'Verification Code', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pages/reset_verif_code');
        } else {
            $enteredCode = $this->input->post('vcode');
            $expectedCode = $this->Home_model->getVerificationCode($enteredCode);

            if ($expectedCode !== false && is_object($expectedCode)) {

                $this->session->set_userdata('success_message', 'Verified Successfully.');
                $this->session->set_userdata('account_data', $expectedCode);
                redirect('home/reset');

                // var_dump ($expectedCode);
                // $data['success'] = 'Verified Successfully.';
                // $data['account'] = $expectedCode;
                // $this->load->view('pages/reset_password', $data);
            } else {
                $data['error'] = 'Invalid verification code.';
                $this->load->view('pages/reset_verif_code', $data);
            }
        }
    }

    public function updatepass()
    {

        $account_id = $this->input->post('acc_id');
        $npass = $this->input->post('npass');
        $hash = md5($npass);
        $this->Home_model->updateAcc($account_id, $hash);

        $this->session->set_flashdata('success', 'Account Updated Successfully. Please login again using your new Account.');
        redirect('home/reset');
    }

    public function emailAppointmentCode($code, $email)
    {
        $to = $email;
        $subject = 'Appointment Code';

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
                                    <h2 class='h2'>Dear User,</h2>
                                    <p>Below is your appointment code, save this and present it to your choosen Health Center Triage to successfully verify that your appointment is valid.</p>
                                    <ul>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Appointment Code:</b> " . $code . "</li>
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
            //$this->session->set_flashdata('success', 'Email sent successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            //$this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        //redirect('home');
    }

    public function smsAdminAcc($mobileno, $verification_code)
    {

        $sms = "Nice! Thank you for registering to the maternal health system. Here is your appointment code: " . $verification_code . ", save this and present it to your choosen health center triage to successfully verify that your appointment is valid. \n\n";

        $sms .= "If your minor please bring your guardian or parents together with the valid ID of your guardian/parents. \n\n";

        $sms .= "Appointment Code: " . $verification_code . " \n\n";
     
        $sms .= "If this wasn't you, disregard this message.";
        $data = array(
            'ToNum' => $mobileno,
            'SMSCont' => $sms,
        );

        $jsonPayload = json_encode($data);
        $url = 'https://maker.ifttt.com/trigger/criscapstone/json/with/key/n7m3Yj3MdWgNfcG0PbqOtTmlaXV-M7G5x-JayX2fNzQ';
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonPayload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        if ($response === false) {
            $error = curl_error($curl);
            print "error : " . $error;
        } else {
            print 'success';
        }

        curl_close($curl);
    }

    public function logout()
    {
        // Display a confirmation dialog before logout
        print '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../home/confirm_logout";
                } else {
                    window.location.href = "../barangay/dashboard";
                }
              </script>';
    }

    public function confirm_logout()
    {
        $this->session->unset_userdata('loggedin');
        //$this->session->sess_destroy('loggedin');

        redirect('home');
    }
}
