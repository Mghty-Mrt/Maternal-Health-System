<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Doctor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function DrUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 2 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Doctor_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $notif = $this->Doctor_model->getnotif($user_id);
                $data['notif'] = $notif;

                $notif_count = $this->Doctor_model->getTotalNotif($user_id);
                $data['notif_count'] = $notif_count;

                $new_patients_count = $this->Doctor_model->getTotalNewPatients($user_id);
                $data['total_new_patients'] = $new_patients_count;

                $today_patients_count = $this->Doctor_model->getTotalTodayPatients($user_id);
                $data['total_today_patients'] = $today_patients_count;

                $uncheckup_patients_count = $this->Doctor_model->getTotaluncheckupPatients($user_id);
                $data['total_uncheckup_patients'] = $uncheckup_patients_count;

                $this->load->view('doctor_includes/header', $data);
                $this->load->view('doctor_includes/sidebar', $data);
                $this->load->view('doctor_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1) {
                    redirect('doctor/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function DrHeaderInclude()
    {
        $this->load->view('doctor_includes/header');
    }

    private function DrTopbarInclude()
    {
        $user_id = $this->session->userdata('id');

        $userlog_data = $this->Doctor_model->getUserLogSess($user_id);
        $data['user_info'] = $userlog_data;

        $notif = $this->Doctor_model->getnotif($user_id);
        $data['notif'] = $notif;

        $notif_count = $this->Doctor_model->getTotalNotif($user_id);
        $data['notif_count'] = $notif_count;

        $new_patients_count = $this->Doctor_model->getTotalNewPatients($user_id);
        $data['total_new_patients'] = $new_patients_count;

        $today_patients_count = $this->Doctor_model->getTotalTodayPatients($user_id);
        $data['total_today_patients'] = $today_patients_count;

        $uncheckup_patients_count = $this->Doctor_model->getTotaluncheckupPatients($user_id);
        $data['total_uncheckup_patients'] = $uncheckup_patients_count;

        $facilities_id = $this->session->userdata('facilities_id');
        $report = $this->Doctor_model->getreport($facilities_id);
        $data['report'] = $report;
        
            foreach($report as $r){
                $To_tal = $r->refer_to;
                $total_to = $this->Doctor_model->gettotal_to($To_tal);
                $data['total_to'] = $total_to;
                
                // print_r($rp_id); 
            }

        $Total_arrived = $this->Doctor_model->getTotal_arrived($facilities_id, $To_tal);
        $data['Total_arrived'] = $Total_arrived; 

        $Total_unarrived = $this->Doctor_model->getTotal_unarrived($facilities_id, $To_tal);
        $data['Total_unarrived'] = $Total_unarrived; 

        // print_r($Total_unarrived);

        $this->load->view('doctor_includes/header', $data);
        $this->load->view('doctor_includes/topbar', $data);
    }

    private function DrFooterInclude()
    {
        $this->load->view('doctor_includes/footer');
    }

    public function insertnotif()
    {

        $notif_data = array(
            'notification_type_id' => 1,
            'notif_to' => $this->input->post('userid'),
            'notif_from' => $this->input->post('from_id'),
            'content' => 'You Have New Patient',
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Doctor_model->insertnotif($notif_data);
    }

    public function latestnotif(){

        $user_id = $this->input->post('user_id');
        $new_notif = $this->Doctor_model->getnewnotif($user_id);
        $data['new_notif'] = $new_notif;

        $notif_count = $this->Doctor_model->getTotalNotif($user_id);
        $data['notif_count'] = $notif_count;
        
        $this->load->view('pages/doctor/doctor_latest_notif', $data);
    }

    public function readNotif(){
        $type_id = $this->input->post('type_id');
        $this->Doctor_model->rednotif($type_id);
    }

    public function report(){

        $this->DrTopbarInclude();
        $this->load->view('pages/doctor/doctor_report');
        $this->DrFooterInclude();
    }

    public function dashboard()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        $user_id = $this->session->userdata('id');

        $total_referrals = $this->Doctor_model->get_total_referrals($facilities_id);
        $data['total_referrals'] = $total_referrals;

        $total_hospital_referrals = $this->Doctor_model->get_total_hospital_referrals($facilities_id);
        $data['total_hospital_referrals'] = $total_hospital_referrals;

        $total_lyingin_referrals = $this->Doctor_model->get_total_lyingin_referrals($facilities_id);
        $data['total_lyingin_referrals'] = $total_lyingin_referrals;

        $total_arrived_referrals = $this->Doctor_model->get_total_arrived_referrals($facilities_id);
        $data['total_arrived_referrals'] = $total_arrived_referrals;

        $total_unarrived_referrals = $this->Doctor_model->get_total_unarrived_referrals($facilities_id);
        $data['total_unarrived_referrals'] = $total_unarrived_referrals;

        $total_patients = $this->Doctor_model->gettotalpatients($user_id);
        $data['total_patients'] = $total_patients;

        // print_r($total_patients);exit;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_dashboard', $data);
        $this->DrFooterInclude();
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

    public function profile()
    {
        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_profile_settings');
        $this->DrFooterInclude();
    }

    public function account()
    {
        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_account_settings');
        $this->DrFooterInclude();
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

        redirect('doctor/account');
    }

    public function savelab_img() {
        // Upload path folder
        $upload_path = '../mhs_micro/lab_result/';
        
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

    public function updatePass(){

        $acc_id = $this->input->post('acc_id');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $hashPass = md5($pass);

        $this->Admin_model->updatepassword($acc_id, $email, $hashPass);

            $this->session->set_flashdata('success', 'Password updated successfully.');
            //$this->session->set_flashdata('failed', 'Failed to updated Password!');
            // print "Insertion failed!";

        redirect('doctor/account');
    }

    public function hospitalSuggestion()
{
    $this->session->userdata('loggedin');
    $facilities_id = $this->session->userdata('facilities_id');

    $currhc = $this->Doctor_model->getcurrhc($facilities_id);
    $data['currhc'] = $currhc;

    $getHospitals = $this->Doctor_model->getHospitalsData();
    $data['Hospitals'] = $getHospitals;

    // Main address
    $address1 = $currhc[0]->address;

    // Initialize an array to store distances
    $distances = [];

    foreach ($getHospitals as $hospital) {
        // Target address
        $address2 = $hospital->address;

        // Geocode the addresses using OpenCage Geocoding API
        $coordinates = $this->geocode_addresses([$address1, $address2]);

        if ($coordinates) {
            // Calculate distance using the Haversine formula
            $distance = $this->calculate_haversine_distance($coordinates[0], $coordinates[1]);

            // Store the distance along with the hospital data
            $distances[] = [
                'hospital' => $hospital,
                'distance' => $distance
            ];
        } else {
            echo "Failed to obtain coordinates for address: $address2.";
        }
    }

    // Pass the distances to the view
    $data['distances'] = $distances;
    $data['address1'] = $address1;

    $this->DrUpperIncludes();
    $this->load->view('pages/doctor/doctor_hospital_suggestion', $data);
    $this->DrFooterInclude();
}


    private function geocode_addresses($addresses)
    {
        // OpenCage Geocoding API endpoint
        $api_url = "https://api.opencagedata.com/geocode/v1/json";

        // Your API key
        $api_key = "3b6ea487b6634f36ae97a9f0d6f0994c";

        // Initialize an array to store the coordinates
        $coordinates = [];

        // Loop through each address
        foreach ($addresses as $address) {
            // Make a request to the API
            $response = $this->make_api_request($api_url, ['q' => $address, 'key' => $api_key]);

            // Decode the JSON response
            $data = json_decode($response, TRUE);

            // Extract latitude and longitude
            if (!empty($data['results'])) {
                $coordinates[] = [
                    'lat' => $data['results'][0]['geometry']['lat'],
                    'lng' => $data['results'][0]['geometry']['lng']
                ];
            } else {
                return FALSE; // Failed to obtain coordinates for one of the addresses
            }
        }

        return $coordinates;
    }

    private function make_api_request($url, $params)
    {
        // Initialize cURL
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url . '?' . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        // Execute cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        return $response;
    }

    private function calculate_haversine_distance($coord1, $coord2)
    {
        $lat1 = $coord1['lat'];
        $lon1 = $coord1['lng'];
        $lat2 = $coord2['lat'];
        $lon2 = $coord2['lng'];

        $delta_lat = deg2rad($lat2 - $lat1);
        $delta_lon = deg2rad($lon2 - $lon1);

        $a = sin($delta_lat / 2) * sin($delta_lat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($delta_lon / 2) * sin($delta_lon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $earth_radius = 6371; // Earth's radius in kilometers

        $distance = $earth_radius * $c;

        return round($distance, 2); // Distance rounded to 2 decimal places
    }

    public function newPatients()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $new_patients_data = $this->Doctor_model->getNewPatients($system_users_id);
        $data['NewPatients'] = $new_patients_data;

        // print_r($new_patients_data);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_new_patients', $data);
        $this->DrFooterInclude();
    }

    public function editnewp()
    {

        $p_id = $this->input->get('id');

        $get_preg = $this->Doctor_model->getpreg($p_id);
        $data['preg'] = $get_preg;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_edit_new_patients', $data);
        $this->DrFooterInclude();
    }

    public function today()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $getPatientsToday = $this->Doctor_model->getPatientsTodayData($system_users_id);
        $data['patientstoday'] = $getPatientsToday;

        $getfacilitytype = $this->Doctor_model->getFT();
        $data['facilityType'] = $getfacilitytype;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_patients_today', $data);
        $this->DrFooterInclude();
    }

    public function rqstLab()
    {

        $pre_patient_id = $this->input->get('pre_patient_id');
        //var_dump ($pre_patient_id);
        $new_patients_info = $this->Doctor_model->getNewPatientsInfo($pre_patient_id);
        $data['PatientsInfo'] = $new_patients_info;

        $userlog_data = $this->Doctor_model->getUserLogSess($this->session->userdata['id']);
        $data['user_info'] = $userlog_data;

        $this->DrHeaderInclude();
        $this->load->view('pages/doctor/doctor_rqst_lab_details', $data);
    }

    public function preItrCheckup()
    {

        $patient_id = $this->input->get('id');
        $pre_patients_info = $this->Doctor_model->getPatientInfo($patient_id);
        $data['PatientInfo'] = $pre_patients_info;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_prenitr_checkup', $data);
        $this->DrFooterInclude();
    }

    public function submitrstlab()
    {
        $prid = $this->input->post('prid');
        $impre = $this->input->post('impre');
        $reffby = $this->input->post('reffby');
        $f_visit = $this->input->post('f_visit');
        $jsonData = $_POST['jsonData'];

        $this->Doctor_model->insertlab($jsonData, $prid, $impre, $reffby, $f_visit);
    }

    public function ItrCheckup()
    {

        $pre_patient_id = $this->input->get('id');

        $new_patients_info = $this->Doctor_model->getPatientInfoItr($pre_patient_id);
        $data['PatientInfo'] = $new_patients_info;

        $lab_info = $this->Doctor_model->getlabinfo($pre_patient_id);
        $data['Labs'] = $lab_info;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_itr_checkup', $data);
        $this->DrFooterInclude();
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
        $access_code_id = $this->Doctor_model->insertCode($insertAccessCode);

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
        $patients_id = $this->Doctor_model->insetPatientData($insertPatient);

        $itr_Data = array(
            'patients_id' => $patients_id,
            'doctor_order' => $this->input->post('drorder'),
            'husband_data' => $_POST['hasbund_Json'],
            'notes' => $_POST['notes_Json'],
            'medical_history' => $_POST['medical_history_Json'],
            'personal_social_history' => $_POST['personal_social_history_Json'],
            'laboratory_exam' => $_POST['lab_result_Json'],
            'dental_record' => $_POST['dental_decord_Json'],
            'counseling' => '',
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
            'checkup_by' => $this->session->userdata['id'],
        );
        $this->Doctor_model->insertItrData($itr_Data);

        $pre_patient_id = $this->input->post('prid');
        $this->Doctor_model->updateResult($pre_patient_id);

        $this->email($email, $acc_code);

        //redirect('doctor/newpatients');
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
        $patients_id = $this->Doctor_model->insetPatientData($insertPatient);

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
        $this->Doctor_model->insertFCPrenatalData($prenatal_Data);

        $patient_id = $this->input->post('pid');
        $this->Doctor_model->updatePatientStatus($patient_id);
    }

    public function negative()
    {

        $patient_id = $this->input->post('id');
        //print $patient_id;

        $updated = $this->Doctor_model->insertNegativeResult($patient_id);

        if ($updated) {
            $this->session->set_flashdata('success', 'Negative Result Submitted Successfully.');
        } else {
            $this->session->set_flashdata('failed', 'Failed to Submit Negative Result!');
        }

        redirect('doctor/newpatients');
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

            $lab_info = $this->Doctor_model->getlabinfo($husdata);
            $data['Labs'] = $lab_info;

            // print_r($gethusband);
        }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_prefollowUp_checkup', $data);
        $this->DrFooterInclude();
    }

    public function fcitr(){
        
        $Patient_data = array(
            'pre_registration_id' => $this->input->post('p_id'),
            'patient_type_id' => 1,
            'access_code_id ' => $this->input->post('access_id'),
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => $this->input->post('visit'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
        );
        $patients_id = $this->Doctor_model->insetPatientData($Patient_data);

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
            'edited_by' => 0,
        );
        $this->Doctor_model->insertItrData($itr_Data);

        $p_id = $this->input->post('pid');
        $this->Doctor_model->updatePatientStatus($p_id);

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

        redirect('doctor/prenatal');
    } 

    public function updateFollowUpCheckUp(){

        $p_id = $this->input->post('p_id');
        $p_pre_id = $this->input->post('p_pre_id');

        $insertPatient = array(
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => $this->input->post('visit'),
        );
        $this->Doctor_model->updateFCPatientData($insertPatient, $p_id);

        $prenatalData = array(
            'dr_order' => $this->input->post('cnotes'),
            'createdAt' => date('Y-m-d H:i:s'),
            'edited_by' => $this->session->userdata['id']
        );
        $this->Doctor_model->updateFCPrenatalData2($prenatalData, $p_pre_id);
        
        print '<script>window.location.href="../doctor/editprenatal2?id='.$p_pre_id.'"</script>';
    }

    public function uncheckupPatients()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $getUCPatients = $this->Doctor_model->getUCPatientsData($system_users_id);
        $data['uncheckpatientst'] = $getUCPatients;

        $getfacilitytype = $this->Doctor_model->getFT();
        $data['facilityType'] = $getfacilitytype;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_uncheckup_patients', $data);
        $this->DrFooterInclude();
    }

    public function referralForm()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getfromfacility = $this->Doctor_model->getfromfacilityData($facilities_id);
        $data['fromfacility'] = $getfromfacility;

        $facility_id = $this->input->get('id');
        $getreferringfacility = $this->Doctor_model->getreferringfacilityData($facility_id);
        $data['getreferringfacility'] = $getreferringfacility;

        $patient_id = $this->input->get('patient_id');
        $refer_patiner_info = $this->Doctor_model->getrefer_patiner_data($patient_id);
        $data['refer_patiner_info'] = $refer_patiner_info;

        $case_id = $this->input->get('case_id');
        $data['case_id'] = $case_id;

        $length = 8;
        $charset = "0123456789";
        $code = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($charset) - 1);
            $code .= $charset[$randomIndex];
        }

        $data['refnumber'] = $code;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_referral_form', $data);
        $this->DrFooterInclude();
    }

    public function sendReferral()
    {
        
        $this->session->userdata('loggedin');
        $form_id = $this->session->userdata('id');

        $pre_id = $this->input->post('patient_id');
        $update_patient = array(
            'status' => 2
        );
        $this->Doctor_model->update($update_patient, $pre_id);

        $to = $this->input->post('to');

        $Ref_data = array(
            'patients_id' => $this->input->post('patient_id'),
            'refer_from' => $this->input->post('from'),
            'refer_to' => $to,
            'referral_details' => $_POST['referral_details_Json'],
            'danger_sign' => $_POST['danger_sign_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
        );
        $this->Doctor_model->sendRef($Ref_data);

            $notificationData = array(
                'notification_type_id' => 2,
                'notif_to' => $to,
                'notif_from' => $form_id,
                'content' => 'Referral (Incoming Patient)',
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1
            );
            $send = $this->Doctor_model->insertnotif($notificationData);

        if ($send) {
            $data = array('message' => 'Incoming Patient !!!', 'to_id' => $to);
            $this->mhspusher->triggerEvent('patient-referral-'.$to, 'incoming-patients', $data);
        }

        $this->updatebedslot($to);

        $case_id = $this->input->post('case_id');
        $f_type = $this->input->post('f_type');
         if($f_type == 3){
            $this->updateequipments($to, $case_id);
         }
    }

    private function updatebedslot($to){

        $get_bed = $this->Doctor_model->getavslot($to);
            $slot_id =$get_bed[0]->id;
            $this->Doctor_model->updatebedslot($slot_id);
    }

    private function updateequipments($to, $case_id) {
        $get_equips = $this->Doctor_model->getequips($to, $case_id); 
        
        foreach ($get_equips as $e) {
            $e_list = $e->available_qty;
            $minus_equi = $e_list - 1;

            $use_qty = $e->used_qty;
            $used_e = $use_qty + 1;
            $id = $e->id;

            $updates = array(
                'id' => $id, 
                'available_qty' => $minus_equi,
                'used_qty' => $used_e,
                'usedAt' => date('Y-m-d H:i:s'), 
            );
            $this->Doctor_model->update_equip_list($id, $updates);
        }
    }

    public function prenatal()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $getPrenatalPatients = $this->Doctor_model->getPrenatal($system_users_id);
        $data['prenatalpatients'] = $getPrenatalPatients;

        $getfacilitytype = $this->Doctor_model->getFT();
        $data['facilityType'] = $getfacilitytype;

        // foreach($getPrenatalPatients as $by){
        //     $c_by = $by->checkup_by;
        //     $data['checkup_by'] = $this->Doctor_model->getC_by($c_by);
        // }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_prenatal_patients', $data);
        $this->DrFooterInclude();
    }

    public function editprenatal(){

        $prenatal_id =$this->input->get('id');
        $getprenatal = $this->Doctor_model->geteditPrenatal($prenatal_id);
        $data['edit_prenatal'] = $getprenatal;

        foreach($getprenatal as $p){
            $id = $p->preg_id;
            $husband = $this->Patient_model->gethusband($id);
            $data['husband'] = $husband;
        }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_edit_prenatal', $data);
        $this->DrFooterInclude();   
    }

    public function editprenatal2(){
        $prenatal_id =$this->input->get('id');
        $getprenatal = $this->Doctor_model->geteditPrenatal($prenatal_id);
        $data['edit_prenatal2'] = $getprenatal;

        foreach($getprenatal as $p){
            $id = $p->preg_id;
            $husband = $this->Patient_model->gethusband($id);
            $data['husband'] = $husband;
        }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_edit_prenatal_2', $data);
        $this->DrFooterInclude();   
    }

    public function updateprenatal(){

        $p_id  = $this->input->post('p_id');
        $p_pre_id  = $this->input->post('p_pre_id');

        $Patient = array(
            'followUp_checkUp' => $this->input->post('followUp'),
            'time' => $this->input->post('time'),
            'visits' => '2nd Visit',
            'createdAt' => date('Y-m-d H:i:s')
        );
        $this->Doctor_model->updateprePatientData($Patient, $p_id);

        $prenatal_Data = array(
            'dr_order' => $this->input->post('drorder'),
            'patient_other' => $_POST['patient_other_Json'],
            'midwives_notes' => $_POST['midwives_notes_Json'],
            'ob_hx' => $_POST['obhx_Json'],
            'medical_history' => $_POST['medical_history_Json'],
            'family_medical_history' => $_POST['family_medical_history_Json'],
            'personal_social_history' => $_POST['personal_social_history_Json'],
            'dental_record' => $_POST['dental_record_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'edited_by' => $this->session->userdata['id'],
        );
        $this->Doctor_model->updateFCPrenatalData($prenatal_Data, $p_pre_id);
    }

    public function Itr()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $patients_itr = $this->Doctor_model->getPatientItr($system_users_id);
        $data['PatientsItr'] = $patients_itr;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_patients_ITR', $data);
        $this->DrFooterInclude();
    }

    public function findfacilities()
    {
        $facilities_id = $this->session->userdata('facilities_id');
        $facility_type_id = $this->input->post('ftId');
        $patient_id = $this->input->post('ppreId');

        $data['currhc'] = $this->Doctor_model->getcurrhc($facilities_id);

        $data['facilityType'] = $this->Doctor_model->getFType($facility_type_id);
        $data['facilities'] = $this->Doctor_model->getFacilities($facility_type_id);

        // Fetch lying-in facilities if applicable
        foreach ($data['facilityType'] as $facility) {
            if ($facility->id == 5) {
                $data['lyingin'] = $this->Doctor_model->getlyingin($facility->id);
                // $distances = $this->calculate_distances($data['currhc'][0]->address, $data['lyingin']);
                // $data['lyinginDistances'] = $distances; // Store lying-in distances separately
                // print_r($data['lyinginDistances']);
                break;
            }
        }

        foreach ($data['facilityType'] as $facility) {
            if ($facility->id == 3) {
                $data['hospitalbed'] = $this->Doctor_model->gethospitalbed($facility->id);
                break;
                // print_r($data['hospitalbed']);
            }
        }


        // Calculate distances for other facilities
        $distances = $this->calculate_distances($data['currhc'][0]->address, $data['facilities']);
        $data['distances'] = $distances;
        $data['patient_id'] = $patient_id;
        $data['equipmentType'] = $this->Doctor_model->getET();

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_facility_finder', $data);
        $this->DrFooterInclude();
    }

    private function calculate_distances($address1, $facilities)
    {
        $distances = [];

        foreach ($facilities as $facility) {
            $address2 = $facility->address;
            $coordinates = $this->geocode_addresses([$address1, $address2]);

            if ($coordinates) {
                $distance = $this->calculate_haversine_distance($coordinates[0], $coordinates[1]);
                $distances[] = ['facility' => $facility, 'distance' => $distance];
            } else {
                log_message('error', "Failed to obtain coordinates for address: $address2.");
            }
        }

        return $distances;
    }


    // public function findfacilities()
    // {
    //     // Retrieve session data
    //     $facilities_id = $this->session->userdata('facilities_id');

    //     // Retrieve input data
    //     $facility_type_id = $this->input->post('ftId');
    //     $patient_id = $this->input->post('ppreId');

    //     // Fetch facility types and facilities
    //     $data['facilityType'] = $this->Doctor_model->getFType($facility_type_id);
    //     $data['facilities'] = $this->Doctor_model->getFacilities($facility_type_id);

    //     // Fetch lying-in facilities if applicable
    //     foreach ($data['facilityType'] as $facility) {
    //         if ($facility->id == 5) {
    //             $data['lyingin'] = $this->Doctor_model->getlyingin($facility->id);
    //             break;
    //         }
    //     }

    //     // Fetch current healthcare facility
    //     $data['currhc'] = $this->Doctor_model->getcurrhc($facilities_id);

    //     // Calculate distances
    //     $distances = $this->calculate_distances($data['currhc'][0]->address, $data['facilities']);

    //     // Pass data to the view
    //     $data['distances'] = $distances;
    //     $data['patient_id'] = $patient_id;
    //     $data['equipmentType'] = $this->Doctor_model->getET();

    //     // Load view
    //     $this->DrUpperIncludes();
    //     $this->load->view('pages/doctor/doctor_facility_finder', $data);
    //     $this->DrFooterInclude();
    // }

    // private function calculate_distances($address1, $facilities)
    // {
    //     $distances = [];

    //     foreach ($facilities as $facility) {
    //         $address2 = $facility->address;
    //         $coordinates = $this->geocode_addresses([$address1, $address2]);

    //         if ($coordinates) {
    //             $distance = $this->calculate_haversine_distance($coordinates[0], $coordinates[1]);
    //             $distances[] = ['hospital' => $facility, 'distance' => $distance];
    //         } else {
    //             log_message('error', "Failed to obtain coordinates for address: $address2.");
    //         }
    //     }

    //     return $distances;
    // }

    public function filterFacilities()
    {
        $facility_type_id = 3;

        $data['facilityType'] = $this->Doctor_model->getFType($facility_type_id);
        foreach ($data['facilityType'] as $facility) {
            if ($facility->id == 3) {
                $data['hospitalbed'] = $this->Doctor_model->gethospitalbed($facility->id);
                break;
                // print_r($data['hospitalbed']);
            }
        }

        $facilities_id = $this->session->userdata('facilities_id');
        $case_id = $this->input->post('case_id');
        $data['case_id'] = $case_id;
        $patient_id = $this->input->post('patient_id');
        $data['patient_id'] = $patient_id;
    
        // Get equipment for selected case
        $equipments = $this->Doctor_model->getEqipments($case_id);
        $data['equipments'] = $equipments;
    
        // Check if equipments are retrieved successfully
        if (!$equipments) {
            // Handle the case if no equipments are found
            $data['facilities'] = array();
            $data['distances'] = array();
            $this->DrHeaderInclude();
            $this->load->view('pages/doctor/doctor_facilities', $data);
            return;
        }
    
        // Get facilities associated with the equipment
        $facilitiesWithEquipment = array();
        foreach ($equipments as $equipment) {
            $facilitiesWithEquipment[] = $equipment->facilities_id;
        }
    
        // Retrieve available facilities
        $facilities = $this->Doctor_model->getAvailableFacilities($facilitiesWithEquipment);
        
        // Check if $facilities is retrieved successfully
        if (!$facilities) {
            // Handle the case if no facilities are found
            $data['facilities'] = array();
            $data['distances'] = array();
            $this->DrHeaderInclude();
            $this->load->view('pages/doctor/doctor_facilities', $data);
            return;
        }
    
        $data['facilities'] = $facilities;
    
        // Calculate distances
        $currhc_address = $this->Doctor_model->getcurrhc($facilities_id);

        // $current_add = $currhc_address[0]->address; // new method
        
        // Check if current healthcare address is retrieved successfully
        if (!$currhc_address) {
            // Handle the case where current healthcare address is not found
            $data['distances'] = array();
            $this->DrHeaderInclude();
            $this->load->view('pages/doctor/doctor_facilities', $data);
            return;
        }
    
        $distances = $this->calculate_distances2($currhc_address[0]->address, $facilities);
    
        $data['distances'] = $distances;
    
        // Load view
        $this->DrHeaderInclude();
        $this->load->view('pages/doctor/doctor_facilities', $data);
    }

    private function calculate_distances2($currhc_address, $facilities)
    {
        $distances = [];

        foreach ($facilities as $facility) {
            $address2 = $facility->address;
            $coordinates = $this->geocode_addresses([$currhc_address, $address2]);

            if ($coordinates) {
                $distance = $this->calculate_haversine_distance($coordinates[0], $coordinates[1]);
                $distances[] = ['hospital' => $facility, 'distance' => $distance];
            } else {
                log_message('error', "Failed to obtain coordinates for address: $address2.");
            }
        }

        return $distances;
    }
    
    public function postnatallist()
    {
        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $postnatal = $this->Doctor_model->getpostnatal($system_users_id);
        $data['postnatal'] = $postnatal;

        // var_dump($postnatal);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_postnatal_records', $data);
        $this->DrFooterInclude();
    }

    public function discharge()
    {
        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $postpartum = $this->Doctor_model->getpostpartum($system_users_id);
        $data['postpartum'] = $postpartum;

        // var_dump($postnatal);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_postpartum_records', $data);
        $this->DrFooterInclude();
    }

    public function feedback()
    {
        
        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $postpartum = $this->Doctor_model->getpostpartum($system_users_id);
        $data['postpartum'] = $postpartum;

        // var_dump($postnatal);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_referral_feddback', $data);
        $this->DrFooterInclude();
    }

    public function postPartumform(){
        $preg_id = $this->input->get('id');
        $getnewbornRecord = $this->Doctor_model->getnewbornRecord($preg_id);
        $data['newbornrecord'] = $getnewbornRecord;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_postpartum', $data);
        $this->DrFooterInclude();
    }

    public function postPartumform2(){
        $preg_id = $this->input->get('id');
        $getnewbornRecord2 = $this->Doctor_model->getnewbornRecord2($preg_id);
        $data['newbornrecord2'] = $getnewbornRecord2;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_postpartum_2', $data);
        $this->DrFooterInclude();
    }

    public function submitPostpartum()
    {
        $data = array(
            'newborn_record_id' => $this->input->post('nbrid'),
            'patients_id' => $this->input->post('pid'),
            'baby_info' => $_POST['baby_info_json'],
            'parents_info' => $_POST['parents_info_json'],
            'patients_records' => $_POST['patients_records_json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
          $this->Doctor_model->savePostpartumRecord($data);
    }

    public function postpartumlist(){
        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $c_partum = $this->Doctor_model->c_partum_list($system_users_id);
        $data['c_partum'] = $c_partum;

        // foreach ($c_partum as $c){
        //     $p_id =  $c->pre_id;
        //     $com = $this->Doctor_model->com($p_id);
        //     $data['com'] = $com;   
        // }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_postpartum_list', $data);
        $this->DrFooterInclude();
    }

    public function natallist()
    {
        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $natal = $this->Doctor_model->getnatal($system_users_id);
        $data['natal'] = $natal;

        // var_dump($natal);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_natal_records', $data);
        $this->DrFooterInclude();
    }

    public function referral_feedback()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $feedback = $this->Doctor_model->getfeedback($system_users_id);
        $data['feedback'] = $feedback;

        // print_r($feedback);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_referral_feedback', $data);
        $this->DrFooterInclude();
    }

    public function viewreffeedback()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');
        $rfid = $this->input->get('id');

        $viewfeedback = $this->Doctor_model->viewfeedback($system_users_id, $rfid);
        $data['feedback'] = $viewfeedback;

        // foreach ($viewfeedback as $feed){

        //     $resi_id = $feed->resi_id;
        //     $getaddress = $this->Doctor_model->getaddress($resi_id);
        //     $data['address'] = $getaddress;

        //     $feed_to = $feed->feedback_to;
        //     $feedto = $this->Doctor_model->feedto($feed_to);
        //     $data['feedbackTo'] = $feedto;

        // }

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_view_referral_feedback', $data);
        $this->DrFooterInclude();
    }

    public function viewpostnatal()
    {
        $postnatal_id = $this->input->get('id');
        $editpostnatalrecords = $this->Lyingin_model->editPostnatalRecord($postnatal_id);
        $data['PostnatalRecords'] = $editpostnatalrecords;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_view_post_natal', $data);
        $this->DrFooterInclude();
    }

    public function viewmother()
    {
        $dr_id = $this->input->get('id');
        $mother_record = $this->Doctor_model->getmother($dr_id);
        $data['mother']= $mother_record;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_view_mother', $data);
        $this->DrFooterInclude();
    }

    public function viewnewborn()
    {
        $nb_id = $this->input->get('id');
        $newborn_record = $this->Doctor_model->getnewborn($nb_id);
        $data['newborn']= $newborn_record;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_view_newborn', $data);
        $this->DrFooterInclude();
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
        
        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_edit_itr_checkup', $data);
        $this->DrFooterInclude();
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

    public function chwTasks()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        $system_users_id = $this->session->userdata('id');

        $gethcusers = $this->Doctor_model->gethcusers($facilities_id);
        $data['hcusers'] = $gethcusers;

        $getsubjects = $this->Doctor_model->getsubject();
        $data['subjects'] = $getsubjects;

        $getUCPatients = $this->Doctor_model->getUCPatientsData($system_users_id);
        $data['uncheckpatientst'] = $getUCPatients;

        // var_dump($gethcusers);

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_chw_task', $data);
        $this->DrFooterInclude();
    }

    public function viewmessage()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        $system_users_id = $this->session->userdata('id');

        $gethcusers = $this->Doctor_model->gethcusers($facilities_id);
        $data['hcusers'] = $gethcusers;

        $getsubjects = $this->Doctor_model->getsubject();
        $data['subjects'] = $getsubjects;

        $getUCPatients = $this->Doctor_model->getUCPatientsData($system_users_id);
        $data['uncheckpatientst'] = $getUCPatients;

        $getusermsg = $this->Doctor_model->getusermsg($system_users_id);
        $data['usermsg'] = $getusermsg;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_chw_sentmsg', $data);
        $this->DrFooterInclude();
    }

    public function viewsentmessage()
    {

        $mc_id = $this->input->post('mc_id');
        $viewmsg = $this->Doctor_model->viewmsg($mc_id);
        $data['usermsg'] = $viewmsg;

        $reply = $this->Doctor_model->viewrply($mc_id);
        $data['reply'] = $reply;

        $this->load->view('pages/doctor/doctor_chw_viewsent', $data);
    }

    public function viewinbox()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        $system_users_id = $this->session->userdata('id');

        $gethcusers = $this->Doctor_model->gethcusers($facilities_id);
        $data['hcusers'] = $gethcusers;

        $getsubjects = $this->Doctor_model->getsubject();
        $data['subjects'] = $getsubjects;

        $getUCPatients = $this->Doctor_model->getUCPatientsData($system_users_id);
        $data['uncheckpatientst'] = $getUCPatients;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_chw_inbox', $data);
        $this->DrFooterInclude();
    }

    public function sendmessage()
    {

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $data = array(
            'message_type_id' => $this->input->post('subject'),
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'message_from' => $system_users_id,
            'message_to' => $this->input->post('emmail_id'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $sendmessage = $this->Doctor_model->sendmessage($data);

        if ($sendmessage) {
            $data = array('message' => 'New Message!!!');
            $this->mhspusher->triggerEvent('new-message', 'incoming-message', $data);
        }
    }

    public function complete(){

        $pre_id = $this->input->post('pre_id');
        $this->Doctor_model->update_patients($pre_id);

        $complete_data = array(
            'patients_id' => $pre_id,
            'createdAt' => date('Y-m-d H:i:s'), 
            'status' => 1
        );
        $this->Doctor_model->mark_complete($complete_data);
    }

    public function chat(){
        $this->session->userdata('loggedin');
        $system_user_id = $this->session->userdata('id');

        // $regi= $this->Doctor_model->getregi($access_code);
        // $facilities_id = $regi[0]->facilities_id;
        
        $users = $this->Doctor_model->getpusers($system_user_id);
        $data['users'] = $users;

        $this->DrUpperIncludes();
        $this->load->view('pages/doctor/doctor_medical_chat', $data);
        $this->DrFooterInclude();
    }

    public function send(){
        $this->session->userdata('loggedin');
        $access_id = $this->session->userdata('id');
        $acc_id = $this->input->post('acc_id');

        $chat1 = array(
            'content' => $this->input->post('reply'),
            'chat_from' => $access_id,
            'chat_to' => $acc_id,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $sendmessage = $this->Patient_model->sendchat($chat1);
        if ($sendmessage) {
            $data = array('message' => 'New chat!!!', 'acc_id' => $acc_id, 'access_id' => $access_id);
            $this->mhspusher->triggerEvent('new-chat2', 'incoming-chat2', $data);
        }

        $this->latest_chat($acc_id, $access_id);
    }

    private function latest_chat($acc_id, $access_id){

        $chat = $this->Doctor_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Doctor_model->getreply($acc_id, $access_id);
        $data['reply'] = $reply;

        // print_r($reply); exit;
        $this->load->view('pages/doctor/doctor_chat_reply_latest', $data);
    }

    public function live_chat(){
        $acc_id = $this->input->post('acc_id');
        $access_id = $this->input->post('access_id');
        
        $chat = $this->Doctor_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Doctor_model->getreply($acc_id, $access_id);
        $data['reply'] = $reply;

        // print_r($reply); exit;
        $this->load->view('pages/doctor/doctor_chat_reply_live', $data);
    }
 
    public function viewchat(){
    
        $this->session->userdata('loggedin');
        $access_id = $this->session->userdata('id');

        $acc_id = $this->input->post('acc_id');

        $chat = $this->Doctor_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Doctor_model->getreply($acc_id, $access_id);
        $data['reply'] = $reply;

        $users = $this->Doctor_model->getuser($acc_id);
        $data['user'] = $users;
        $data['acc_id'] = $acc_id;

        $this->load->view('pages/doctor/doctor_chat_content', $data);
    }

    public function saveitrcopy()
    {

        // Upload path folder
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/print/';
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $image_data = $_POST["image"];
        $image_data = str_replace('data:image/png;base64,', '', $image_data);
        $image_data = base64_decode($image_data);

        // Generate a unique filename
        $file_name = uniqid('screenshot_') . '.png';

        $file_path = $upload_path . $file_name;
        file_put_contents($file_path, $image_data);

        print $file_name;
    }

    public function saveprecopy()
    {

        // Upload path folder
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/print/';
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $image_data = $_POST["image"];
        $image_data = str_replace('data:image/png;base64,', '', $image_data);
        $image_data = base64_decode($image_data);

        // Generate a unique filename
        $file_name = uniqid('screenshot_') . '.png';

        $file_path = $upload_path . $file_name;
        file_put_contents($file_path, $image_data);

        print $file_name;
    }

    public function saverefcopy()
    {

        // Upload path folder
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . '/mhs_micro/print/';
        if (!file_exists($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $image_data = $_POST["image"];
        $image_data = str_replace('data:image/png;base64,', '', $image_data);
        $image_data = base64_decode($image_data);

        // Generate a unique filename
        $file_name = uniqid('screenshot_') . '.png';

        $file_path = $upload_path . $file_name;
        file_put_contents($file_path, $image_data);

        print $file_name;
    }

    public function printLab()
    {
        $pr_id = $this->input->get('id');
        $getlabrqst = $this->Doctor_model->getlabrqst($pr_id);
        $data['lab_rqst'] = $getlabrqst;

        $html = $this->load->view('pages/doctor/doctor_print_lab', $data, true);

        // Check if $html is a non-empty string before proceeding
        if (!empty($html) && is_string($html)) {
            $mpdfConfig = [
                'mode' => 'utf-8',
                'format' => 'A5',
                'font-size' => 12,
                'default_font' => 'helvetica',
                'orientation' => 'P',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
                'margin_header' => 10,
                'margin_footer' => 10,
            ];

            $mpdf = new \Mpdf\Mpdf($mpdfConfig);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else {
            print "Error: Unable to generate PDF. HTML content is not valid.";
        }
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
                                            <img src='https://maternalhealth-qcdistrict2.com/assets/images/logos/maternology.png' alt='logo'> 
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

        redirect('doctor/newpatients');
    }

    public function logout()
    {
        // confirmation dialog before logout
        print '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../doctor/confirm_logout";
                } else {
                    window.location.href = "../doctor/dashboard";
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
