<?php
require 'vendor/autoload.php';

class Encoder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function eUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $facilities_id = $this->session->userdata('facilities_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 5 && $is_verified == 1 && $is_updated == 1 || $role_id == 12 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Midwife_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;
          
                $minor_data = $this->Encoder_model->countminor($facilities_id);
                $total = count($minor_data);
                $data['total_minor'] = $total;

                $this->load->view('encoder_includes/header');
                $this->load->view('encoder_includes/sidebar', $data);
                $this->load->view('encoder_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1 || $role_id == 12) {
                    redirect('encoder/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function eHeaderIncludes()
    {

        $this->load->view('encoder_includes/header');
    }

    private function eFooterIncludes()
    {

        $this->load->view('encoder_includes/footer');
    }

    public function dashboard()
    {
        //tyr---------------------------------
        $Msg = $this->Encoder_model->getMsg();
        $data['msg'] = $Msg;
        //end try-----------------------------

        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $positive_patients = $this->Encoder_model->getpositivepatients($facilities_id);
        $data['positive_patients'] = $positive_patients;

        $negative_patients = $this->Encoder_model->getnegativepatients($facilities_id);
        $data['negative_patients'] = $negative_patients;

        $pending_patients = $this->Encoder_model->getpendingpatients($facilities_id);
        $data['pending_patients'] = $pending_patients;

        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_dashboard', $data);
        $this->eFooterIncludes();
    }

    public function latestmsg(){

        $Msg = $this->Encoder_model->getLstMsg();
        $data['lmsg'] = $Msg;

        $this->load->view('pages/encoder/encoder_latest_msg', $data);
    }

    public function today()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $resident_data = $this->Encoder_model->getResidents($facilities_id);
        $data['residents'] = $resident_data;

        $pre_register_data = $this->Encoder_model->getPreRegisterPatients($facilities_id);
        $data['PreRegisterPatients'] = $pre_register_data;

        $Spe_data = $this->Encoder_model->getSpeData($facilities_id);
        $data['speData'] = $Spe_data;

        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_patient_today', $data);
        $this->eFooterIncludes();
    }

    public function minor(){

        $facilities_id = $this->session->userdata('facilities_id');
        $minor_data = $this->Encoder_model->getminor($facilities_id);
        $data['minor'] = $minor_data;

        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_minor', $data);
        $this->eFooterIncludes();
    }

    public function counseling(){
        
        $facilities_id = $this->session->userdata('facilities_id');
        $minor_data = $this->Encoder_model->getminor($facilities_id);
        $data['minor'] = $minor_data;

        $this->eUpperIncludes();
        $this->load->view('pages/encoder/counseling_minor_list', $data);
        $this->eFooterIncludes();
    }

    public function submitcounseling(){

        $coinseling_data = array(
            'online_registration_id' => $this->input->post('id'),
            'residents_id' => 0,
            'remarks' => $this->input->post('remarks'),
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id'),
        );
        $this->Encoder_model->savecounseling($coinseling_data);

        $update_pre = array(
            'status' => 1
        );
        $this->Encoder_model->update_oreg($update_pre, $this->input->post('id'));

    }

    public function preRegister()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $residentIds = $this->input->post('residentIds');
            $sendTo = $this->input->post('sendTo');

            if (!empty($residentIds)) {
                $inserted = $this->Encoder_model->insertPreRegister($residentIds, $sendTo);
                if ($inserted) {
                    print json_encode(array("message" => "Patient/s Sent Successfully."));
                } else {
                    print json_encode(array("message" => "Failed to Sent Patient/s."));
                }
            }
        }
    }

    public function newp(){

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        
        $resident_data = $this->Encoder_model->getResidents($facilities_id);
        $data['residents'] = $resident_data;

        $Spe_data = $this->Encoder_model->getSpeData($facilities_id);
        $data['speData'] = $Spe_data;
        
        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_newp', $data);
        $this->eFooterIncludes();
    }

    public function submitIndex()
    {
        
        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $residentId = $this->input->post('residentId');
            $sendTo = $this->input->post('sendTo');
            $weight = $this->input->post('weight');
            $height = $this->input->post('height');
            $temp = $this->input->post('temp');
            $bp = $this->input->post('bp');

            if (!empty($residentId)) {
                $inserted = $this->Encoder_model->insertIndex($residentId, $sendTo, $weight, $height, $temp, $bp, $user_id);
                if ($inserted) {
                    print json_encode(array("message" => "Patient/s Sent Successfully."));
                } else {
                    print json_encode(array("message" => "Failed to Sent Patient/s."));
                }
            }
        }
    }

    public function newponline(){

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
        
        $appointment = $this->Encoder_model->getappointment($facilities_id);
        $data['appointment'] = $appointment;

        $Spe_data = $this->Encoder_model->getSpeData($facilities_id);
        $data['speData'] = $Spe_data;
        
        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_newp_online', $data);
        $this->eFooterIncludes();
    }

    public function submitonlineIndex()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $oregid = $this->input->post('oregid');
            $sendTo = $this->input->post('sendTo');
            $weight = $this->input->post('weight');
            $height = $this->input->post('height');
            $temp = $this->input->post('temp');
            $bp = $this->input->post('bp');

            if (!empty($oregid)) {
                $inserted = $this->Encoder_model->insertOnlineIndex($oregid, $sendTo, $weight, $height, $temp, $bp);
                if ($inserted) {
                    print json_encode(array("message" => "Patient/s Sent Successfully."));
                } else {
                    print json_encode(array("message" => "Failed to Sent Patient/s."));
                }
            }
        }
    }

    public function fill(){

        
    }

    public function viewindex(){
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $pre_id = $this->input->post('pre_id');

        $getindex = $this->Encoder_model->getindexform($pre_id);
        $data['index'] = $getindex;

        $Spe_data = $this->Encoder_model->getSpeData($facilities_id);
        $data['speData'] = $Spe_data;

        $this->eHeaderIncludes();
        $this->load->view('pages/encoder/encoder_view_index', $data);
    }

    public function archive(){

        $id = $this->input->post('prid');
        $this->Encoder_model->updatedata($id);
    }

    public function profile()
    {
        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_profile_settings');
        $this->eFooterIncludes();
    }

    public function account()
    {
        $this->eUpperIncludes();
        $this->load->view('pages/encoder/encoder_account_settings');
        $this->eFooterIncludes();
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

        redirect('encoder/account');
    }

    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../encoder/confirm_logout";
                } else {
                    window.location.href = "../encoder/dashboard";
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
