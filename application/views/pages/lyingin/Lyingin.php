<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


class Lyingin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function lyUpperIncludes()
    {

        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 8 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Lyingin_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $this->load->view('lyingin_includes/header');
                $this->load->view('lyingin_includes/sidebar');
                $this->load->view('lyingin_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 8) {
                    redirect('lyingin/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function lyHeaderIncludes()
    {
        $this->load->view('lyingin_includes/header');
    }

    private function lyFooterIncludes()
    {
        $this->load->view('lyingin_includes/footer');
    }

    public function dashboard()
    {
        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_dashboard');
        $this->lyFooterIncludes();
    }

    public function bedslot()
    {
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getSlot = $this->Lyingin_model->getSlot($facilities_id);
        $data['slots'] = $getSlot;

        
        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_bedslot', $data);
        $this->lyFooterIncludes();
    }


    public function add()
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
        $this->Lyingin_model->insert_slot($data);

        redirect("lyingin/bedslot");
    }

    public function docschedule()
    {

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_docschedule');
        $this->lyFooterIncludes();  
    }

    public function referlist(){
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getRefPatient = $this->Lyingin_model->getRefPatientData($facilities_id);
        $data['ReferPatients'] = $getRefPatient;

        // print_r($getRefPatient);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_refer_patients', $data);
        $this->lyFooterIncludes();
    }

    public function lyfeedback()
    {

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $ref_id = $this->input->get('id');
        $getRefPatient = $this->Lyingin_model->getRefData($facilities_id, $ref_id);
        $data['ReferPatients'] = $getRefPatient;

        $get_facilities = $this->Lyingin_model->getfaci();
        $data['facilities'] = $get_facilities;

        //print_r($get_facilities);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_feedback_form', $data);
        $this->lyFooterIncludes();
    }

    public  function referfeedback(){

        $referral_id = $this->input->post('ref_id');
        $this->Lyingin_model->updateReferral($referral_id);

        $feedback_data = array(
            'refer_patient_id' => $referral_id,
            'feedback_to' => $this->input->post('feedbackto'),
            'patient_info' => $_POST['personal_data_Json'],
            'outcome' => $_POST['outcome_Json'],
            'final_diagnos' => $this->input->post('final_diagnos'),
            'recommendation	' => $this->input->post('recommendations'),
            'createdAt' => date('Y-m-d H:i:s')
        );

        $feeback_sent = $this->Lyingin_model->sendFeedback($feedback_data);
        if ($feeback_sent) {
            $data = array('message' => 'Feedback from Referral !!!');
            $this->mhspusher->triggerEvent('referral-feedback', 'patients-feedback', $data);
        }
    }

    public function postnatallist(){
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getpostnatal = $this->Lyingin_model->getPostnatalRec($facilities_id);
        $data['PostnatalList'] = $getpostnatal;

        // print_r($getpostnatal);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_postnatal_record', $data);
        $this->lyFooterIncludes();
    }

    public function postnatal()
    {

        $get_patientinfo = $this->Lyingin_model->getpatientinfo();
        $data['patientinfo'] = $get_patientinfo;


        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_postnatal_form', $data);
        $this->lyFooterIncludes();
    }

    public function submitPostNatal()
    {
        $ppreid = $this->input->post('ppreid');
        $post_id = $this->input->post('access_code_id');
        $patient_data = array(
            'pre_registration_id' => $ppreid,
            'patient_type_id' => 3,
            'access_code_id' => $post_id,
            'followUp_checkUp' => $this->input->post('followUp_date'),
            'time' => $this->input->post('followUp_time'),
            'visits' => '1st Checkup',
            'checkUpStatus' => 0,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $patients_id = $this->Lyingin_model->getSubmitPatient($patient_data);

        $postnatal_data = array(
            'patients_id' => $patients_id,
            'patient_info' => $_POST['patient_info_json'],
            'dr_order' => $this->input->post('dr_order'),
            'notes' => $_POST['notes_json'],
            'advice_counsel' => $_POST['advice_counsel_json'],
            'advice_counsel_postpartum_dsign' => $_POST['advice_counsel_dsign_json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Lyingin_model->savePostNatal($postnatal_data);
    }

    public function deliveryrecordlist(){
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getdeliveryrecords = $this->Lyingin_model->getdeliveryrecords($facilities_id);
        $data['DeliveryRecords'] = $getdeliveryrecords;

        // print_r($getRefPatient);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_delivery_record', $data);
        $this->lyFooterIncludes();
    }

    public function delivery(){

        $refer_id = $this->input->get('id');
        $data['refer_id'] = $refer_id;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_delivery_form', $data);
        $this->lyFooterIncludes();
    }

    public function saveDeliveryRecord(){

        $delivery_record = array(
            'refer_patient_id' => $this->input->post('refer_id'),
            'record' => $_POST['record_data_Json'],
            'diagnose' => $this->input->post('diagnosis'),
            'attending_physicians' => $_POST['attending_pysicians_data_Json'],
            'md_order_1' => $_POST['md_order1_data_Json'],
            'md_notes_1' => $_POST['md_notes1_data_Json'],
            'md_order_2' => $_POST['md_order2_data_Json'],
            'md_notes_2' => $_POST['md_notes2_data_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Lyingin_model->submitDeliveryRecord($delivery_record);
    }

    public function newbornlist(){
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

        $getnewborn = $this->Lyingin_model->getnewborn($facilities_id);
        $data['NewbornRecords'] = $getnewborn;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_newborn_record_list', $data);
        $this->lyFooterIncludes();
    }

    public function newbornrecord(){

        $refer_id = $this->input->get('id');
        $data['refer_id'] = $refer_id;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_newborn_record', $data);
        $this->lyFooterIncludes();        
    }

    public function submitnewbornrecord(){

        $newborn_record = array(
            'delivery_record_id' => $this->input->post('refer_id'),
            'baby_info' => $_POST['baby_data_Json'],
            'general_apperance' => $_POST['general_apperance_data_Json'],
            'apgar_score' => $_POST['apgar_score_data_Json'],
            'maturation_index' => $_POST['maturation_index_data_Json'],
            'routine_newborn_care' => $_POST['routine_newborn_care_data_Json'],
            'initial_diagnosis' => $this->input->post('initial_diagnosis'),
            'abnormal_findings' => $this->input->post('abnormal_findings'),
            'md_order' => $_POST['md_order_data_Json'],
            'md_notes' => $_POST['md_notes_data_Json'],
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Lyingin_model->saveNewbornRecord($newborn_record);

    }

    public function dischargem(){

        $ref_id = $this->input->get('id');
        $patient_record = $this->Lyingin_model->getPatient($ref_id);
        $data['patient_record'] = $patient_record;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_discharge_mother', $data);
        $this->lyFooterIncludes();        
    }

    public function savedischargem(){

        $dis_mother = array(
            'refer_patient_id' => $this->input->post('ref_id'),
            'records' => $_POST['discharge_record_Json'],
            'physical_internal_examination' => $_POST['combinedDataJson'],
            'followup_date' => $this->input->post('return_date'),
            'followup_time' => $this->input->post('return_time'),
            'other_findings' => $this->input->post('other_findings'),
            'medications' => $this->input->post('medications'),
            'final_discharge_diagnosis' => $this->input->post('final_diagnosis'),
            'examined_by' => $this->input->post('examined_by'),
            'discharge_by' => $this->input->post('discharge_by'),
            'patient_sign' => $this->input->post('patient_sign'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Lyingin_model->insertDischargeMotherRecord($dis_mother);
    }

    public function dischargenb(){

        $ref_id = $this->input->get('id');
        $discharge_mother = $this->Lyingin_model->getdischargemother($ref_id);
        $data['discharge_mother'] = $discharge_mother;

        // print_r($discharge_mother);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_discharge_newborn', $data);
        $this->lyFooterIncludes();        
    }

    public function savedischargenewb(){

        $dis_newb = array(
            'discharge_mother_id' => $this->input->post('dm_id'),
            'refer_patient_id' => $this->input->post('ref_id'),
            'general_apperance' => $this->input->post('general_appearance'),
            'vital_signs' => $_POST['vital_signs_Json'],
            'pentinent_pe_findings' => $this->input->post('pentinent_pe_findings'),
            'cord' => $_POST['cord_Json'],
            'newborn_screening' => $_POST['newborn_screening_Json'],
            'birth_certificate' => $this->input->post('birth_certificate'),
            'medications' => $this->input->post('medications'),
            'remarks' => $this->input->post('remarks'),
            'final_diagnosis' => $this->input->post('final_diagnosis'),
            'examined_by' => $this->input->post('Examined_by'),
            'discharge_by' => $this->input->post('Discharge_by'),
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Lyingin_model->insertDischargeNewbRecord($dis_newb);
    }

    public function profile()
    {
        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_profile_settings');
        $this->lyFooterIncludes();
    }

    public function account()
    {
        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_account_settings');
        $this->lyFooterIncludes();
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

        redirect('lyingin/account');
    }

    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../lyingin/confirm_logout";
                } else {
                    window.location.href = "../lyingin/dashboard";
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
