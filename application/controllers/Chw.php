<?php

class Chw extends CI_Controller{

    private function ChwUpperIncludes()
    {
        if ($this->session->userdata('loggedin')) {
            $role_id = $this->session->userdata('role_id');
            $facilities_id = $this->session->userdata('facilities_id');
            $user_id = $this->session->userdata('id');
            $is_verified = $this->session->userdata('is_verified');
            $is_updated = $this->session->userdata('is_updated');

            if ($role_id == 7 && $is_verified == 1 && $is_updated == 1) {
                $userlog_data = $this->Midwife_model->getUserLogSess($user_id);
                $data['user_info'] = $userlog_data;

                $get_event = $this->Chw_model->get_sched($user_id);
                $data['events'] = $get_event;

                $this->load->view('chw_includes/header');
                $this->load->view('chw_includes/sidebar', $data);
                $this->load->view('chw_includes/topbar', $data);

            } else {
                if ($is_verified == 0) {
                    redirect('verification/firststep');
                } else if ($is_updated == 0) {
                    redirect('verification/secondstep');
                } else if ($role_id == 1) {
                    redirect('chw/dashboard');
                } else {
                    show_error('Access Denied!!!', 403);
                }
            }
        } else {
            redirect('home');
        }
    }

    private function ChwHeaderInclude()
    {
        $this->load->view('chw_includes/header');
    }

    private function ChwFooterInclude()
    {
        $this->load->view('chw_includes/footer');
    }

    public function dashboard(){

        $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_dashboard');
        $this->ChwFooterInclude();
    }

    public function riskAssessment(){

        $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_risk_assessment');
        $this->ChwFooterInclude();
    }

    public function familyPlanning(){

        $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_family_planning');
        $this->ChwFooterInclude();
    }

    public function sched(){

        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $getsched = $this->Chw_model->getsched($user_id);
        $data['schedules'] = $getsched;
        
        $getschedcat = $this->Chw_model->getschedcat();
        $data['getschedcat'] = $getschedcat;

        $gettime = $this->Chw_model->gettime();
        $data['gettime'] = $gettime;

        $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_scheduler', $data);
        $this->ChwFooterInclude();
    }

    public function savesched(){

        $this->session->userdata('loggedin');
        $user_id = $this->session->userdata('id');

        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $end_stime = $this->input->post('end_stime');

        // Convert date and time to DateTime objects
        $dateObj = new DateTime($date);
        $timeObj = new DateTime($time);
        $end_stimeObj = new DateTime($end_stime);

        // Format date and time
        $formattedDate = $dateObj->format('Y-m-d');
        $formattedTime = $timeObj->format('H:i:s');
        $formattedEndTime = $end_stimeObj->format('H:i:s');

        $sched_data = array(
            'schedule_type_id' => $this->input->post('event_cat'),
            'date' => $formattedDate,
            'time' => $formattedTime,
            'end_time' => $formattedEndTime,
            'event' => $this->input->post('event'),
            'created_by' => $user_id,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1
        );

        $this->Chw_model->saveschedule($sched_data);
    }

    public function que(){

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $getusermsg = $this->Chw_model->getusermsg($system_users_id);
        $data['usermsg'] = $getusermsg;

        // var_dump($getusermsg);

        $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_queries', $data);
        $this->ChwFooterInclude();
    }

    public function latestmessage(){

        $this->session->userdata('loggedin');
        $system_users_id = $this->session->userdata('id');

        $getusermsg = $this->Chw_model->getnewmsg($system_users_id);
        $data['usermsg'] = $getusermsg;

        // var_dump($getusermsg);

        // $this->ChwUpperIncludes();
        $this->load->view('pages/chw/chw_latest_message', $data);
        // $this->ChwFooterInclude();
    }

    public function viewmessage(){

        $mc_id = $this->input->post('mc_id');

        $viewmsg = $this->Chw_model->viewmsg($mc_id);
        $data['usermsg'] = $viewmsg;

        $reply = $this->Chw_model->viewrply($mc_id);
        $data['reply'] = $reply;

        // print_r($reply);

        $this->ChwHeaderInclude();
        $this->load->view('pages/chw/chw_view_message', $data);

    }

    public function latestreply(){

        $mc_id = $this->input->post('mcid');

        $reply = $this->Chw_model->viewnewrply($mc_id);
        $data['reply'] = $reply;

        $this->load->view('pages/chw/chw_feedback_task', $data);
    }

    public function sendreply(){

        $mcid = $this->input->post('mc_id');

        $reply_data = array(
            'message_content_id' => $mcid,
            'title' => 'Feedback',
            'feedback' => $this->input->post('reply'),
            'createdAt' => date('Y-m-d H:i:s'), 
            'status' => 1
        );

        $sendreply = $this->Chw_model   ->sendreply($reply_data);
        if ($sendreply) {
            $data = array('message' => $mcid);
            $this->mhspusher->triggerEvent('new-reply', 'incoming-reply', $data);
        }

    }

}