<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Midwife extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function mdUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $facilities_id = $this->session->userdata('facilities_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 3 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Midwife_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $today_patients_count = $this->Midwife_model->getTotalTodayPatients($facilities_id);
                $counted_today = count($today_patients_count);
                $data['total_today_patients'] = $counted_today;

                $uncheck_patients_count = $this->Midwife_model->getUncheckTodayPatients($facilities_id);
                $counted_uncehck = count($uncheck_patients_count);
                $data['total_uncheck_patients'] = $counted_uncehck;

                $this->load->view('midwife_includes/header');
                $this->load->view('midwife_includes/sidebar', $data);
                $this->load->view('midwife_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1) {
                    redirect('midwife/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function mdHeaderIncludes()
    {
        $this->load->view('midwife_includes/header');
    }

    private function mdFooterIncludes()
    {
        $this->load->view('midwife_includes/footer');
    }

    public function dashboard()
    {
        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_dashboard');
        $this->mdFooterIncludes();
    }

    public function account()
    {
        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_account_settings');
        $this->mdFooterIncludes();
    }

    public function updatePass(){

        $acc_id = $this->input->post('acc_id');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $hashPass = md5($pass);

        $this->Admin_model->updatepassword($acc_id, $email, $hashPass);

            $this->session->set_flashdata('success', 'Password updated successfully.');
            //$this->session->set_flashdata('failed', 'Failed to updated Password!');
            // print "Insertion failed!";

        redirect('midwife/account');
    }

    public function saveprofile()
    {

        $system_user_id = $this->input->post('suid');

        // upload path folder
        $upload_path = '../mhs_micro/profile/';
        // Check if the upload directory exists
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $file_name = basename($_FILES["profile"]["name"]);
        $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $hash = md5($system_user_id);

        $hash_filename = $hash . '.' . $imageFileType;

        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $upload_path . $hash_filename)) {
            $this->Admin_model->updatePhoto($system_user_id, $hash_filename);

            $this->session->set_flashdata('success', 'Profile updated successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Failed to updated profile!');
            // print "Insertion failed!";
        }

        redirect('midwife/account');
    }

    public function newPatients(){

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $new_patients_data = $this->Midwife_model->getNewPatients($facilities_id);
        $data['NewPatients'] = $new_patients_data;

        // print_r($new_patients_data);

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_new_patients', $data);
        $this->mdFooterIncludes();
    }

    public function viewnewp(){

        $p_id = $this->input->get('id');

        $get_preg = $this->Midwife_model->getpreg($p_id);
        $data['preg'] = $get_preg;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_view_new_patients', $data);
        $this->mdFooterIncludes();
    }

    public function rqstLab()
    {

        $pre_patient_id = $this->input->get('pre_patient_id');
        //var_dump ($pre_patient_id);
        $new_patients_info = $this->Midwife_model->getNewPatientsInfo($pre_patient_id);
        $data['PatientsInfo'] = $new_patients_info;

        $userlog_data = $this->Midwife_model->getUserLogSess($this->session->userdata['id']);
        $data['user_info'] = $userlog_data;

        $this->mdHeaderIncludes();
        $this->load->view('pages/midwife/midwife_rqst_lab_details', $data);
    }

    public function submitrstlab()
    {
        $prid = $this->input->post('prid');
        $impre = $this->input->post('impre');
        $reffby = $this->input->post('reffby');
        $f_visit = $this->input->post('f_visit');
        $jsonData = $_POST['jsonData'];

        $this->Midwife_model->insertlab($jsonData, $prid, $impre, $reffby, $f_visit);
    }

    public function ItrCheckup()
    {

        $pre_patient_id = $this->input->get('id');
        $new_patients_info = $this->Midwife_model->getPatientInfoItr($pre_patient_id);
        $data['PatientInfo'] = $new_patients_info;

        $lab_info = $this->Midwife_model->getlabinfo($pre_patient_id);
        $data['Labs'] = $lab_info;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_itr_checkup', $data);
        $this->mdFooterIncludes();
    }

    public function itrEdit()
    {

        $pi_id = $this->input->get('id');
        $new_patients_info = $this->Doctor_model->getPatientInfoItrEdit($pi_id);
        $data['editPatientInfo'] = $new_patients_info;
        
        foreach($new_patients_info as $itr){
            $p_pre_id = $itr->p_pre_id;

            $lab_info = $this->Doctor_model->getitrlab($p_pre_id);
            $data['Labs'] = $lab_info;

            // print_r($lab_info); exit;
        }
        
        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_edit_itr', $data);
        $this->mdFooterIncludes();
    }

    
    public function updateitr()
    {
        $p_id = $this->input->post('p_id');
        $pi_id = $this->input->post('pi_id');

        $insertPatient = array(
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $this->Doctor_model->updatePatientData($insertPatient, $p_id);

        $itr_Data = array(
            'doctor_order' => $this->input->post('drorder'),
            'husband_data' => $_POST['hasbund_Json'],
            'notes' => $_POST['notes_Json'],
            'medical_history' => $_POST['medical_history_Json'],
            'personal_social_history' => $_POST['personal_social_history_Json'],
            'dental_record' => $_POST['dental_decord_Json'],
            'counseling' => $_POST['counseling_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'edited_by' => $this->session->userdata['id'],
        );
        $this->Doctor_model->updaateItrData($itr_Data, $pi_id);

        //redirect('doctor/newpatients');
    }

    public function positive()
    {

        $acc_code = $this->generateAcode();
        $email = $this->input->post('email');

        $insertAccessCode = array(
            'role_id' => 6,
            'code' => $acc_code,
            'email' => $email,
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $access_code_id = $this->Midwife_model->insertCode($insertAccessCode);

        $insertPatient = array(
            'pre_registration_id' => $this->input->post('prid'),
            'patient_type_id' => 4,
            'access_code_id ' => $access_code_id,
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => '1st Visit',
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $patients_id = $this->Midwife_model->insetPatientData($insertPatient);

        $itr_Data = array(
            'patients_id' => $patients_id,
            'doctor_order' => $this->input->post('drorder'),
            'husband_data' => $_POST['hasbund_Json'],
            'notes' => $_POST['notes_Json'],
            'medical_history' => $_POST['medical_history_Json'],
            'personal_social_history' => $_POST['personal_social_history_Json'],
            'laboratory_exam' => $_POST['lab_result_Json'],
            'dental_record' => $_POST['dental_decord_Json'],
            'counseling' => $_POST['counseling_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
            'checkup_by' => $this->session->userdata['id'],
        );
        $this->Midwife_model->insertItrData($itr_Data);

        $pre_patient_id = $this->input->post('prid');
        $this->Midwife_model->updateResult($pre_patient_id);

        $this->email($email, $acc_code);

        //redirect('midwife/newpatients');
    }
    
    public function negative()
    {

        $patient_id = $this->input->post('id');
        //print $patient_id;

        $updated = $this->Midwife_model->insertNegativeResult($patient_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Negative Result Submitted Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Failed to Submit Negative Result!');
        }

        redirect('midwife/newpatients');
    }

    public function followup(){

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getPatientsToday = $this->Midwife_model->getPatientsTodayData($facilities_id);
        $data['patientstoday'] = $getPatientsToday;

        // print_r($getPatientsToday);

        $getfacilitytype = $this->Midwife_model->getFT();
        $data['facilityType'] = $getfacilitytype;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_followup_checkup', $data);
        $this->mdFooterIncludes();
    }

    public function Itr()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $patients_itr = $this->Midwife_model->getPatientItr($facilities_id);
        $data['PatientsItr'] = $patients_itr;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_itr_record', $data);
        $this->mdFooterIncludes();
    }

    public function preItrCheckup()
    {

        $patient_id = $this->input->get('id');
        $pre_patients_info = $this->Midwife_model->getPatientInfo($patient_id);
        $data['PatientInfo'] = $pre_patients_info;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_prenitr_checkup', $data);
        $this->mdFooterIncludes();
    }

    public function prenatalcheckup()
    {

        $insertPatient = array(
            'pre_registration_id' => $this->input->post('prid'),
            'patient_type_id' => 1,
            'access_code_id ' => $this->input->post('acc_code_id'),
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => '2nd Visit',
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $patients_id = $this->Midwife_model->insetPatientData($insertPatient);

        $prenatal_Data = array(
            'patients_id' => $patients_id,
            'dr_order' => $this->input->post('drorder'),
            'patient_other' => $_POST['patient_other_Json'],
            'midwives_notes' => $_POST['midwives_notes_Json'],
            'ob_hx' => $_POST['obhx_Json'],
            'medical_history' => $_POST['medical_history_Json'],
            'family_medical_history' => $_POST['family_medical_history_Json'],
            'personal_social_history' => $_POST['personal_social_history_Json'],
            'dental_record' => $_POST['dental_record_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'checkup_by' => $this->session->userdata['id'],
            'status' => 1,
        );
        $this->Midwife_model->insertFCPrenatalData($prenatal_Data);

        $patient_id = $this->input->post('pid');
        $this->Midwife_model->updatePatientStatus($patient_id);
    }

    public function PrefollowupCheckup()
    {

        $patient_id = $this->input->get('id');
        $patients_info = $this->Doctor_model->getTodayPatientInfo($patient_id);
        $data['PatientInfo'] = $patients_info;

        foreach($patients_info as $husd){
            $husdata = $husd->p_pre_id;

            $gethusband = $this->Doctor_model->gethusband($husdata);
            $data['husband'] = $gethusband;

            // print_r($gethusband);
        }

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_prefollowUp_checkup', $data);
        $this->mdFooterIncludes();
    }

    public function submitFollowUpCheckUp(){

        $insertPatient = array(
            'pre_registration_id' => $this->input->post('id'),
            'patient_type_id' => 1,
            'access_code_id ' => $this->input->post('acid'),
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => $this->input->post('visit'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $patients_id = $this->Doctor_model->insetFCPatientData($insertPatient);

        $prenatalData = array(
            'patients_id' => $patients_id,
            'dr_order' => $this->input->post('cnotes'),
            'createdAt' => date('Y-m-d H:i:s'),
            'checkup_by' => $this->session->userdata['id'],
            'status' => 1,
        );
        $this->Doctor_model->insertFCPrenatalData($prenatalData);

        $patient_id = $this->input->post('pid');
        $this->Doctor_model->updatePatientStatus($patient_id);

        redirect('midwife/prenatal');
    } 
    public function uncheckup(){

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getUCPatients = $this->Midwife_model->getUCPatientsData($facilities_id);
        $data['uncheckpatientst'] = $getUCPatients;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_uncheckup_patients', $data);
        $this->mdFooterIncludes();
    }

    public function prenatal()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getPrenatalPatients = $this->Midwife_model->getPrenatal($facilities_id);
        $data['prenatalpatients'] = $getPrenatalPatients;

        $this->mdUpperIncludes();
        $this->load->view('pages/midwife/midwife_prenatal_list', $data);
        $this->mdFooterIncludes();
    }

    private function generateAcode($length = 14)
    {

        $charset = "MATERNAL0123456789";
        $code = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($charset) - 1);
            $code .= $charset[$randomIndex];
        }

        return $code;
    }

    public function email($email, $acc_code)
    {
        $to = $email;
        $subject = 'Patient Access Code';

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
                                    <h2 class='h2'>Dear Patient,</h2>
                                    <p>Below is your access code. Used this to see your recods and other details about pregnancy.</p>
                                    <ul>
                                        <li><b style='color: rgb(17, 82, 114, 1);'>Access Code:</b> " . $acc_code . "</li>
                                    </ul>
                                    <p><i>Please go to this link and enter your access code 'https://maternalhealth-qcdistrict2.com/qcu/patient/dashboard'</i></p>
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
            //$this->session->set_flashdata('success_mail', 'New code sent to your email successfully');
        } catch (Exception $e) {
            //print 'Email delivery failed.  Error: ' . $mail->ErrorInfo;
            //$this->session->set_flashdata('error', 'Email delivery failed. Error: ' . $mail->ErrorInfo);
        }

        redirect('midwife/newpatients');
    }


    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../midwife/confirm_logout";
                } else {
                    window.location.href = "../midwife/dashboard";
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
