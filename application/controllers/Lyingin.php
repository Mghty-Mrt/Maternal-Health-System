<?php

require 'vendor/autoload.php';
require_once APPPATH . 'libraries/fpdf/fpdf.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
            $facilities_id = $this->session->userdata('facilities_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 8 || $role_id == 10 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Lyingin_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $notif = $this->Hospital_model->getnotif($facilities_id);
                $data['notif'] = $notif;

                $notif_count = $this->Hospital_model->getTotalNotif($facilities_id);
                $data['notif_count'] = $notif_count;

                $this->load->view('lyingin_includes/header');
                $this->load->view('lyingin_includes/sidebar');
                $this->load->view('lyingin_includes/topbar', $data);
            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 8 || $role_id == 10) {
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

    public function latestnotif(){

        $facilities_id = $this->input->post('facilities_id');
        $notif = $this->Hospital_model->getnotif($facilities_id);
        $data['notif'] = $notif;

        $notif_count = $this->Hospital_model->getTotalNotif($facilities_id);
        $data['notif_count'] = $notif_count;
        
        $this->load->view('pages/lyingin/lyingin_latest_notif', $data);
    }

    public function bedslot()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');

            // Check the role_id for specific access levels
            if ($role_id == 10) {

                $this->session->userdata('loggedin');
                $facilities_id = $this->session->userdata('facilities_id');

                $getSlot = $this->Lyingin_model->getSlot($facilities_id);
                $data['slots'] = $getSlot;

                $total_avai = $this->Lyingin_model->getavai($facilities_id);
                $data['total_avai'] = $total_avai;

                $total_occu = $this->Lyingin_model->getoccu($facilities_id);
                $data['total_occu'] = $total_occu;

                $total_not_avai = $this->Lyingin_model->getnot_avai($facilities_id);
                $data['total_not_avai'] = $total_not_avai;

                $this->lyUpperIncludes();
                $this->load->view('pages/lyingin/lyingin_bedslot', $data);
                $this->lyFooterIncludes();
            } else {
                show_error('Access Denied!!!', 403);
            }
        } else {
            redirect('home');
        }
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

        
        $getfacilitytype = $this->Lyingin_model->getFT();
        $data['facilityType'] = $getfacilitytype;

        // print_r($getRefPatient);

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_refer_patients', $data);
        $this->lyFooterIncludes();
    }

    public function findfacilities()
    {
        $facilities_id = $this->session->userdata('facilities_id');
        $facility_type_id = $this->input->post('ftId');
        $patient_id = $this->input->post('ppreId');
        $rpid = $this->input->post('rpid');
        $data['rp_id'] = $rpid;

        $data['currhc'] = $this->Doctor_model->getcurrhc($facilities_id);

        $data['facilityType'] = $this->Doctor_model->getFType($facility_type_id);
        $data['facilities'] = $this->Doctor_model->getFacilities($facility_type_id);

        foreach ($data['facilityType'] as $facility) {
            if ($facility->id == 3) {
                $data['hospitalbed'] = $this->Doctor_model->gethospitalbed($facility->id);
                break;
                // print_r($data['hospitalbed']);
            }
        }

        // Calculate distances for other facilities
        $data['patient_id'] = $patient_id;
        $data['equipmentType'] = $this->Doctor_model->getET();

        // print_r($data['facilities']);exit;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_facility_finder', $data);
        $this->lyFooterIncludes();
    }

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
        $rp_id = $this->input->post('rp_id');
        $data['rp_id'] = $rp_id;
    
        // Get equipment for selected case
        $equipments = $this->Doctor_model->getEqipments($case_id);
        $data['equipments'] = $equipments;
    
        // Check if equipments are retrieved successfully
        if (!$equipments) {
            // Handle the case if no equipments are found
            $data['facilities'] = array();
            $data['distances'] = array();
            $this->lyHeaderIncludes();
            $this->load->view('pages/lyingin/lyingin_facilities', $data);
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
            $this->lyHeaderIncludes();
            $this->load->view('pages/lyingin/lyingin_facilities', $data);
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
            $this->lyHeaderIncludes();
            $this->load->view('pages/lyingin/lyingin_facilities', $data);
            return;
        }
    
        // $distances = $this->calculate_distances2($currhc_address[0]->address, $facilities);
    
        // $data['distances'] = $distances;
    
        // Load view
        $this->lyHeaderIncludes();
        $this->load->view('pages/lyingin/lyingin_facilities', $data);
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

        $rp_id = $this->input->get('rp_id');
        $data['rp_id'] = $rp_id;

        $length = 8;
        $charset = "0123456789";
        $code = "";

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = mt_rand(0, strlen($charset) - 1);
            $code .= $charset[$randomIndex];
        }

        $data['refnumber'] = $code;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_referral_form', $data);
        $this->lyFooterIncludes();
    }

    public function sendReferral()
    {
        
        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');
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

        // $rp_id = $this->input->post('rp_id');

        // $this->Lyingin_model->updateref_patients($rp_id);

        $this->updatebedslot($to);

        $case_id = $this->input->post('case_id');
        $f_type = $this->input->post('f_type');
         if($f_type == 3){
            $this->updateequipments($to, $case_id);
         }

         $this->updatebedslot2($facilities_id);
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

        $rp_id = $this->input->get('id');

        $get_patientinfo = $this->Lyingin_model->getpatientinfo($rp_id);
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

    public function submitPostNatal2()
    {
        $ppreid = $this->input->post('ppreid');
        $post_id = $this->input->post('access_code_id');
        $patient_data = array(
            'pre_registration_id' => $ppreid,
            'patient_type_id' => 3,
            'access_code_id' => $post_id,
            'followUp_checkUp' => $this->input->post('followUp_date'),
            'time' => $this->input->post('followUp_time'),
            'visits' => $this->input->post('visits'),
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

    public function submitfetalrecord(){

        $newborn_record = array(
            'delivery_record_id' => $this->input->post('dr_id'),
            'baby_info' => $_POST['baby_data_Json'],
            'general_apperance' => '',
            'apgar_score' => '',
            'maturation_index' => '',
            'routine_newborn_care' => '',
            'initial_diagnosis' => '',
            'abnormal_findings' => '',
            'md_order' => '',
            'md_notes' => '',
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 0
        );

        $this->Lyingin_model->saveNewbornRecord($newborn_record);

    }

    public function fetal_death(){

        $facilities_id = $this->session->userdata('facilities_id');
        $fetal_data = $this->Lyingin_model->get_fetal_death($facilities_id);
        $data['fetal'] = $fetal_data;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_fetal_record', $data);
        $this->lyFooterIncludes();
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

        $this->session->userdata('loggedin');
        $facilities_id = $this->session->userdata('facilities_id');

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

        
        $this->updatebedslot2($facilities_id);
    }

    private function updatebedslot2($facilities_id){

        $get_bed = $this->Lyingin_model->getoccuslot($facilities_id);
            $slot_id =$get_bed[0]->id;
            $this->Lyingin_model->updatebedslot2($slot_id);
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

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_view_referral', $data);
        $this->lyFooterIncludes();
    }

    public function editPostnatal()
    {
        
        $postnatal_id = $this->input->get('id');
        $editpostnatalrecords = $this->Lyingin_model->editPostnatalRecord($postnatal_id);
        $data['PostnatalRecords'] = $editpostnatalrecords;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_edit_postnatal_form', $data);
        $this->lyFooterIncludes();
    }

    public function followup()
    {
        
        $postnatal_id = $this->input->get('id');
        $editpostnatalrecords = $this->Lyingin_model->editPostnatalRecord($postnatal_id);
        $data['PostnatalRecords'] = $editpostnatalrecords;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_followup_postnatal', $data);
        $this->lyFooterIncludes();
    }

    public function editNewbornrecord(){
        $newborn_id = $this->input->get('id');
        $editnewbornrecords = $this->Lyingin_model->updateNewbornRecord($newborn_id);
        $data['NewbornRecords'] = $editnewbornrecords;
 
         $this->lyUpperIncludes();
         $this->load->view('pages/lyingin/lyingin_edit_newborn_record', $data);
         $this->lyFooterIncludes();    
 
     }

     public function editDelivery()
    {
        $delivery_id = $this->input->get('id');
        $editdeliveryrecords = $this->Lyingin_model->editDeliveryRecord($delivery_id);
        $data['DeliveryRecords'] =   $editdeliveryrecords;

        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_edit_delivery_form', $data);
        $this->lyFooterIncludes();
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
        
        redirect('lyingin/referlist');
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

        redirect('lyingin/referlist');
    }

    public function birth_form()
    {
        $this->lyUpperIncludes();
        $this->load->view('pages/lyingin/lyingin_birth_from');
        $this->lyFooterIncludes();
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

    public function generate_fetal_death_certificate(){
        $templatePath = APPPATH . '../assets/pdf/Certificate-of-Fetal-Death-COFD.pdf'; // Path to your existing PDF file
        $pdf = new \setasign\Fpdi\Fpdi();
    
        // Use FPDI to import pages from existing PDF
        $pageCount = $pdf->setSourceFile($templatePath);
    
        // Iterate over each page and add it to the generated PDF
        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNumber);
            $pdf->useTemplate($tplIdx, 0, 0, 210, 297, true);
        }
    
        // Add additional content using FPDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(50, 50);
        // $pdf->Cell(0, 10, 'Hello, World!', 0, 1);
    
        // Add another text
        $pdf->SetXY(50, 70);
        // $pdf->Cell(0, 10, 'This is another line of text.', 0, 1);
    
        // Output the PDF
        $pdf->Output();
    }

    public function generate_death_certificate(){
        $templatePath = APPPATH . '../assets/pdf/death_certificate.pdf'; // Path to your existing PDF file
        $pdf = new \setasign\Fpdi\Fpdi();
    
        // Use FPDI to import pages from existing PDF
        $pageCount = $pdf->setSourceFile($templatePath);
    
        // Iterate over each page and add it to the generated PDF
        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNumber);
            $pdf->useTemplate($tplIdx, 0, 0, 210, 297, true);
        }
    
        // Add additional content using FPDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(50, 50);
        // $pdf->Cell(0, 10, 'Hello, World!', 0, 1);
    
        // Add another text
        $pdf->SetXY(50, 70);
        // $pdf->Cell(0, 10, 'This is another line of text.', 0, 1);
    
        // Output the PDF
        $pdf->Output();
    }

    public function generate_birth_certificate(){
        $templatePath = APPPATH . '../assets/pdf/Certificate-of-Live-Birth-COLB.pdf'; // Path to your existing PDF file
        $pdf = new \setasign\Fpdi\Fpdi();
    
        // Use FPDI to import pages from existing PDF
        $pageCount = $pdf->setSourceFile($templatePath);
    
        // Iterate over each page and add it to the generated PDF
        for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
            $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNumber);
            $pdf->useTemplate($tplIdx, 0, 0, 210, 297, true);
        }
    
        // Add additional content using FPDF
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(50, 50);
        // $pdf->Cell(0, 10, 'Hello, World!', 0, 1);
    
        // Add another text
        $pdf->SetXY(50, 70);
        // $pdf->Cell(0, 10, 'This is another line of text.', 0, 1);
    
        // Output the PDF
        $pdf->Output();
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
