<?php

class Hospital extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function hUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $facilities_id = $this->session->userdata('facilities_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 9 || $role_id == 11 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Hospital_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $notif = $this->Hospital_model->getnotif($facilities_id);
                $data['notif'] = $notif;

                $notif_count = $this->Hospital_model->getTotalNotif($facilities_id);
                $data['notif_count'] = $notif_count;

                $this->load->view('hospital_includes/header');
                $this->load->view('hospital_includes/sidebar', $data);
                $this->load->view('hospital_includes/topbar', $data);

            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 9 || $role_id == 11) {
                    redirect('hospital/ddashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function hHeadncludes()
    {
        $this->load->view('hospital_includes/header');
    }

    private function hFooterIncludes()
    {
        $this->load->view('hospital_includes/footer');
    }

    public function Ddashboard()
    {
        $this->hUpperIncludes();
        $this->load->view('pages/hospital/doctor_dashboard');
        $this->hFooterIncludes();
    }

    public function latestnotif(){

        $facilities_id = $this->input->post('facilities_id');
        $notif = $this->Hospital_model->getnotif($facilities_id);
        $data['notif'] = $notif;

        $notif_count = $this->Hospital_model->getTotalNotif($facilities_id);
        $data['notif_count'] = $notif_count;
        
        $this->load->view('pages/hospital/hospital_latest_notif', $data);
    }

    public function referList()
    {
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getRefPatient = $this->Hospital_model->getRefPatientData($facilities_id);
        $data['ReferPatients'] = $getRefPatient;

        // print_r($getRefPatient);

        $this->hUpperIncludes();
        $this->load->view('pages/hospital/doctor_refer_patients', $data);
        $this->hFooterIncludes();
    }

    public function viewrefer()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $ref_id = $this->input->get('id');
        $getRefPatient = $this->Hospital_model->getRefData($facilities_id, $ref_id);
        $data['ReferPatients'] = $getRefPatient;

            foreach($getRefPatient as $getadd){
                $fac_id = $getadd->refer_to;
                
                $getfac = $this->Hospital_model->facilits($fac_id);
                $data['recifaciity'] = $getfac;
            }

        $this->hUpperIncludes();
        $this->load->view('pages/hospital/doctor_view_referral', $data);
        $this->hFooterIncludes();
    }

    public function feedback()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $ref_id = $this->input->get('id');
        $getRefPatient = $this->Hospital_model->getRefData($facilities_id, $ref_id);
        $data['ReferPatients'] = $getRefPatient;

        $get_facilities = $this->Hospital_model->getfaci();
        $data['facilities'] = $get_facilities;

        //print_r($get_facilities);

        $this->hUpperIncludes();
        $this->load->view('pages/hospital/doctor_feedback_form', $data);
        $this->hFooterIncludes();
    }

    public function referral_report_positive(){

        $referral_id = $this->input->post('ref_id');
        $this->Hospital_model->reportReferral($referral_id);

        $report_data = array(
            'refer_patient_id' => $referral_id,
            'Report' => '',
            'status' => 1,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $feeback_sent = $this->Hospital_model->sendReport($report_data);
        if ($feeback_sent) {
            $data = array('message' => 'Report from Referral !!!');
            $this->mhspusher->triggerEvent('referral-feedback', 'patients-feedback', $data);
        }
        
        redirect('hospital/referList');
    }

    public function referral_report_negative(){

        $referral_id = $this->input->post('ref_id');
        $this->Hospital_model->reportReferral($referral_id);

        $report_data = array(
            'refer_patient_id' => $referral_id,
            'Report' => $this->input->post('days'),
            'status' => 0,
            'createdAt' => date('Y-m-d H:i:s')
        );

        $feeback_sent = $this->Hospital_model->sendNReport($report_data);
        if ($feeback_sent) {
            $data = array('message' => 'Report from Referral !!!');
            $this->mhspusher->triggerEvent('referral-feedback', 'patients-feedback', $data);
        }

        redirect('hospital/referList');
    }

    public  function referfeedback(){

        $referral_id = $this->input->post('ref_id');
        $this->Hospital_model->updateReferral($referral_id);

        $feedback_data = array(
            'refer_patient_id' => $referral_id,
            'feedback_to' => $this->input->post('feedbackto'),
            'patient_info' => $_POST['personal_data_Json'],
            'outcome' => $_POST['outcome_Json'],
            'final_diagnos' => $this->input->post('final_diagnos'),
            'recommendation	' => $this->input->post('recommendations'),
            'createdAt' => date('Y-m-d H:i:s')
        );

        $feeback_sent = $this->Hospital_model->sendFeedback($feedback_data);
        if ($feeback_sent) {
            $data = array('message' => 'Feedback from Referral !!!');
            $this->mhspusher->triggerEvent('referral-feedback', 'patients-feedback', $data);
        }
    }

    public function archiveref(){

        $id = $this->input->post('rpid');
        $this->Hospital_model->updateref($id);
    }

    public function equipments()
    {
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getET = $this->Hospital_model->getETData();
        $data['EquipmentType'] = $getET;

        $getEqp = $this->Hospital_model->getEqpData($facilities_id);
        $data['Equipments'] = $getEqp;

        $this->hUpperIncludes();
        $this->load->view('pages/hospital/equipment', $data);
        $this->hFooterIncludes();
    }

    public function add(){
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $data = array(
            "facilities_id" => $facilities_id,
            "equipment_type_id" => $this->input->post('eqtyp'),
            "name" =>  $this->input->post('name'),
            "descriptions" =>  $this->input->post('desc'),
            "total_qty" =>  $this->input->post('tqty'),
            "available_qty" => $this->input->post('tqty'),
            "used_qty" => '',
            "usedAt" => '',
            "addAt" => '',
            "createdAt" => date('Y-m-d H:i:s'),
            "status" => 1
        );

        $this->Hospital_model->insertEquipment($data);
        redirect('hospital/equipments');
    }

    public function viewequi(){
        // $this->session->userdata('loggedin');
        // $facilities_id = $this->session->userdata('facilities_id');

        $equi_id = $this->input->post('equi_id');

        $getET = $this->Hospital_model->getETData();
        $data['EquipmentType'] = $getET;

        $getequi = $this->Hospital_model->getEqui($equi_id);
        $data['equipments'] = $getequi;

        // print_r($getequi);

        $this->hHeadncludes();
        $this->load->view('pages/hospital/hospital_edit_equi', $data);
    }

    // public function updateequi() {

    //     $eq_id = $this->input->post('eq_id');
    //     $name = $this->input->post('name');
    //     $desc = $this->input->post('desc');
    //     $eqtyp = $this->input->post('eqtyp');
    //     $tqty = $this->input->post('tqty');
    
    //     $update_data = array(
    //         'name' => $name,
    //         'descriptions' => $desc,
    //         'equipment_type_id' => $eqtyp,
    //         'total_qty' => $tqty
    //     );
    
    //     $this->Hospital_model->updateEquipment($eq_id, $update_data);
    // }

    public function archive(){

        $id = $this->input->post('eqid');
        $this->Hospital_model->updatedata($id);
    }

    public function bedSlot()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $user_id = $this->session->userdata('id');

            // Check the role_id for specific access levels
            if ($role_id == 11) {

                $this->session->userdata('loggedin');
                $facilities_id = $this->session->userdata('facilities_id');

                $getSlot = $this->Hospital_model->getSlot($facilities_id);
                $data['slots'] = $getSlot;

                $total_avai = $this->Lyingin_model->getavai($facilities_id);
                $data['total_avai'] = $total_avai;

                $total_occu = $this->Lyingin_model->getoccu($facilities_id);
                $data['total_occu'] = $total_occu;

                $total_not_avai = $this->Lyingin_model->getnot_avai($facilities_id);
                $data['total_not_avai'] = $total_not_avai;

                $this->hUpperIncludes();
                $this->load->view('pages/hospital/hospital_bedslot', $data);
                $this->hFooterIncludes();
            } else {
                show_error('Access Denied!!!', 403);
            }
        } else {
            redirect('home');
        }
    }

    public function addslot()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $data = array(
            "facilities_id" => $facilities_id,
            "slots" => $this->input->post('slot'),
            "slot_status" => 1,
            "status" => 1,
            "createdAt" => date("Y-m-d H:i:s"),
        );
        $this->Hospital_model->insert_slot($data);

        redirect("hospital/bedslot");
    }

    public function profile()
    {
        $this->hUpperIncludes();
        $this->load->view('pages/hospital/hospital_profile_settings');
        $this->hFooterIncludes();
    }

    public function account()
    {
        $this->hUpperIncludes();
        $this->load->view('pages/hospital/hospital_account_settings');
        $this->hFooterIncludes();
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

        redirect('hospital/account');
    }

    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../hospital/confirm_logout";
                } else {
                    window.location.href = "../hospital/ddashboard";
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
