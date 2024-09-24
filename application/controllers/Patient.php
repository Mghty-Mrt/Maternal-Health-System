<?php
class Patient extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Manila');
    }

    private function pUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $access_id = $this->session->userdata('id');

            if ($role_id == 6) {
                $userlog_data = $this->Patient_model->getUserLogSess($access_id);
                $data['user_info'] = $userlog_data;

                $this->load->view('includes/header', $data);
                $this->load->view('includes/sidebar', $data);
                $this->load->view('includes/topbar', $data);
            } else {
                show_error('Access Denied !!! Forbidden Routes... Careful!', 403);
            }
        } else {
            redirect('patient/auth');
        }
    }

    private function pHeaderIncludes()
    {
        $this->load->view('includes/header');
    }

    private function pFooterIncludes()
    {
        $this->load->view('includes/footer');
    }


    public function auth()
    {
        $this->pHeaderIncludes();
        $this->load->view('pages/patient/patient_authentication');
    }

    public function verifyAuth()
    {
        $code = $this->input->post('code');
        $patient_data = $this->Patient_model->getpatientaccess($code);

        if (count($patient_data) > 0) {
            $patient_data = $patient_data[0];

            $loginsession = array(
                'id'  => $patient_data->id,
                'code' => $patient_data->code,
                'role_id' => $patient_data->role_id,
                'loggedin' => TRUE
            );

            $this->session->set_userdata($loginsession);
            $role_id = $this->session->userdata('role_id');

            if ($role_id == 6) {
                print "<script>location.href='../patient/dashboard';</script>";
            }
        } else {
            $data['error'] = "Invalid Access Code!!!";
            print "<script>location.href='../patient/auth?error=" . $data['error'] . "';</script>";
        }
    }

    public function dashboard()
    {
        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_dashboard');
        $this->pFooterIncludes();
    }

    public function record_list()
    {
        $this->session->userdata('loggedin');
        $access_code = $this->session->userdata('id');
        $record_list= $this->Patient_model->getRecord($access_code);
        $data['record']=$record_list;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_record_list', $data);
        $this->pFooterIncludes();
    }

    public function record()
    {
        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_record');
        $this->pFooterIncludes();
    }

    public function itrrecord(){

        $patient_id = $this->input->get('id');
        $getitrrecord = $this->Patient_model->getitrrecord($patient_id);
        $data['itrRecord'] = $getitrrecord;

        foreach($getitrrecord as $itr){
            $p_pre_id = $itr->p_pre_id;

            $lab_info = $this->Doctor_model->getitrlab($p_pre_id);
            $data['Labs'] = $lab_info;

            // print_r($lab_info); exit;
        }

        // print_r($getitrrecord);

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_itr_record', $data);
        $this->pFooterIncludes();
    }

    public function prenrecord(){

        $pren_id = $this->input->get('id');
        $prenatal = $this->Patient_model->getPrenatal($pren_id);
        $data['prenatal'] = $prenatal;

        foreach($prenatal as $p){
            $id = $p->ppre_id;
            $husband = $this->Patient_model->gethusband($id);
            $data['husband'] = $husband;
        }

        // print_r($prenatal); exit;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_prenatal_record', $data);
        $this->pFooterIncludes();
    }

    public function postpartum(){

        $pp_id = $this->input->get('id');
        $partum = $this->Patient_model->getPartum($pp_id);
        $data['postpartum'] = $partum;

        // print_r($pp_id); exit;

        foreach($partum as $p){
            $id = $p->ppre_id;
            $husband = $this->Patient_model->gethusband($id);
            $data['husband'] = $husband;
        }

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_postpartum_record', $data);
        $this->pFooterIncludes();
    }

    public function fupre(){

        $pren_id = $this->input->get('id');
        $prenatal = $this->Patient_model->getfupre($pren_id);
        $data['prenatal'] = $prenatal;

        foreach($prenatal as $p){
            $id = $p->ppre_id;
            $husband = $this->Patient_model->gethusband($id);
            $data['husband'] = $husband;
        }

        // print_r($prenatal); exit;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_fuprenatal_record', $data);
        $this->pFooterIncludes();
    }

    public function editPostnatal()
    {
        
        $postnatal_id = $this->input->get('id');
        $editpostnatalrecords = $this->Lyingin_model->editPostnatalRecord($postnatal_id);
        $data['PostnatalRecords'] = $editpostnatalrecords;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_postnatal_record', $data);
        $this->pFooterIncludes();
    }

    public function viewmother()
    {
        $dr_id = $this->input->get('id');
        $mother_record = $this->Doctor_model->getmother($dr_id);
        $data['mother']= $mother_record;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_view_mother', $data);
        $this->pFooterIncludes();
    }

    public function viewnewborn()
    {
        $nb_id = $this->input->get('id');
        $newborn_record = $this->Doctor_model->getnewborn($nb_id);
        $data['newborn']= $newborn_record;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_view_newborn', $data);
        $this->pFooterIncludes();
    }

    public function schedule()
    {
        $this->session->userdata('loggedin');
        $access_code = $this->session->userdata('id');
        $schedule=$this->Patient_model->getSchedule($access_code);
        $data['schedule']=$schedule;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_schedule', $data);
        $this->pFooterIncludes();
    }

    public function history()
    {
        $this->session->userdata('loggedin');
        $access_code = $this->session->userdata('id');

        $done_record = $this->Patient_model->getdoneRecord($access_code);
        $data['done_record'] = $done_record;
    
        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_medical_history', $data);
        $this->pFooterIncludes();
    }

    public function details()
    {
        $this->session->userdata('loggedin');
        $access_code = $this->session->userdata('id');
        $record_list= $this->Patient_model->getRecordOld($access_code);
        $data['record']=$record_list;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_record_details', $data);
        $this->pFooterIncludes();
    }

    public function chat(){
        $this->session->userdata('loggedin');
        $access_code = $this->session->userdata('id');

        $regi= $this->Patient_model->getregi($access_code);
        $facilities_id = $regi[0]->facilities_id;
        
        $users = $this->Patient_model->getusers($facilities_id);
        $data['users'] = $users;

        $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_medical_chat', $data);
        $this->pFooterIncludes();
    }

    public function viewmessage(){

        
        $this->session->userdata('loggedin');
        $access_id = $this->session->userdata('id');

        $acc_id = $this->input->post('acc_id');

        $chat = $this->Patient_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Patient_model->getreply($acc_id, $access_id);
        $data['reply'] = $reply;

        $users = $this->Patient_model->getuser($acc_id);
        $data['user'] = $users;
        $data['acc_id'] = $acc_id;

        // $this->pUpperIncludes();
        $this->load->view('pages/patient/patient_chat_content', $data);
        // $this->pFooterIncludes();
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
            $this->mhspusher->triggerEvent('new-chat1', 'incoming-chat1', $data);
        }

        $this->latest_chat($acc_id, $access_id);
    }

    private function latest_chat($acc_id, $access_id){

        $chat = $this->Patient_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Patient_model->getreply2($acc_id, $access_id);
        $data['reply'] = $reply;
        // print_r($reply); exit;
        $this->load->view('pages/patient/patient_chat_reply_latest', $data);
    }

    public function live_chat(){
        $acc_id = $this->input->post('acc_id');
        $access_id = $this->input->post('access_id');
        
        $chat = $this->Patient_model->getchat($acc_id, $access_id);
        $data['chat'] = $chat;

        $reply = $this->Patient_model->getreply2($acc_id, $access_id);
        $data['reply'] = $reply;

        // print_r($reply); exit;
        $this->load->view('pages/patient/patient_chat_reply_live', $data);
    }

    public function logout()
    {
        // confirmation dialog before logout
        echo '<script>
                if (confirm("Are you sure you want to logout?")) {
                    window.location.href = "../patient/confirm_logout";
                } else {
                    window.location.href = "../patient/dashboard";
                }
              </script>';
    }

    public function confirm_logout()
    {
        $this->session->unset_userdata('loggedin');
        //$this->session->sess_destroy('loggedin');
        redirect('patient/auth');
    }
}
