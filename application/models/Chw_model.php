<?php

class Chw_model extends CI_Model{

    public function getusermsg($system_users_id){

        $sql = "Select mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat, acc.*, su.*, su.image as suprofile
                    from message_content as mc
                    left join account as acc on mc.message_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    where mc.message_to = '".$system_users_id."'
                    ORDER BY mc.id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function get_sched($user_id){

        $current_date = date('Y-m-d');
        $sql = "Select s.*, st.name as st_name, f.name as fname
                    from schedule as s
                    left join schedule_type as st on s.schedule_type_id = st.id
                    left join system_users as su on s.created_by = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where s.schedule_type_id = 2
                    and s.created_by = '". $user_id ."'
                    and date > '". $current_date ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getnewmsg($system_users_id){

        $sql = "Select mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat, acc.*, su.*, su.image as suprofile
                    from message_content as mc
                    left join account as acc on mc.message_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    where mc.message_to = '".$system_users_id."'
                    ORDER BY mc.id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function viewmsg($mc_id){

        $sql = "Select mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat, acc.*, su.*, su.image as suprofile,
                    r.name as rname
                    from message_content as mc
                    left join account as acc on mc.message_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where mc.id = '".$mc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function viewrply($mc_id){

        $sql = "Select mf.feedback, mf.title as mftitle, mf.createdAt as mfdate, mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat
                    from message_feedback as mf
                    left join message_content as mc on mf.message_content_id = mc.id
                    where mf.message_content_id = '".$mc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function viewnewrply($mc_id){

        $sql = "Select mf.feedback, mf.title as mftitle, mf.createdAt as mfdate, mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat
                    from message_feedback as mf
                    left join message_content as mc on mf.message_content_id = mc.id
                    where mf.message_content_id = '".$mc_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function sendreply($reply_data){

        $this->db->insert('message_feedback', $reply_data);
        return true;
    }

    public function saveschedule($sched_data){

        $this->db->insert('schedule', $sched_data);
        return true;
    }

    public function getschedcat(){

        $sql = "Select st.*
                    from schedule_type as st";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function gettime(){

        $sql = "Select stm.*
                    from schedule_time as stm";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getsched($user_id){

        $sql = "Select s.*, st.*
                    from schedule as s
                    left join schedule_type as st on s.schedule_type_id = st.id
                    where s.created_by = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }
}

?>