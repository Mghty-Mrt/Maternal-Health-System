<?php

class Encoder_model extends CI_Model{

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname, r.code as rcode
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getpositivepatients($facilities_id)
    {
        $sql = "Select pr.*, pr.createdAt as prdatetime
                    from pre_registration as pr
                    left join system_users as su on pr.system_users_id = su.id
                    where pr.status = 2 and su.facilities_id = '". $facilities_id ."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getnegativepatients($facilities_id){
        $sql = "Select pr.*, pr.createdAt as prdatetime
                    from pre_registration as pr
                    left join system_users as su on pr.system_users_id = su.id
                    where pr.status = 3 and su.facilities_id = '". $facilities_id ."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getpendingpatients($facilities_id){
        $sql = "Select pr.*, pr.createdAt as prdatetime
                    from pre_registration as pr
                    left join system_users as su on pr.system_users_id = su.id
                    where pr.status = 1 and su.facilities_id = '". $facilities_id ."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getResidents($facilities_id){

        $sql = "Select r.*, ad.id as adid, ad.street, ad.city, f.id as fid, f.name as bname 
                    from residents as r
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where r.status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getappointment($facilities_id){

        $sql = "Select oreg.*, oreg.id as oregid, oreg.brgy as bname 
                    from online_registration as oreg
                    where oreg.facilities_id = '".$facilities_id."' and oreg.status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertPreRegister($residentIds, $sendTo){
        // $user_id = $this->session->userdata('id');
        $insertedCount = 0;

        foreach ($residentIds as $residentId) {
            $data = array(
                'residents_id' => $residentId,
                'system_users_id' => $sendTo,
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 1,
                'checkUpStatus' => 0
            );
            $this->db->insert('pre_registration', $data);
            //$inserted = $inserted || ($this->db->affected_rows() > 0);
            if ($this->db->affected_rows() > 0) {
                $insertedCount++;
            }

            if ($insertedCount){
                $data = array('message' => 'You have ' . $insertedCount . ' new Patient/s!');
                $this->mhspusher->triggerEvent('pre-registration-'.$sendTo, 'new-patients', $data);
               }
        }
        return $insertedCount;
    }

    public function getPreRegisterPatients($facilities_id){

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime,
                    f.id as fid,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    left join system_users as su on pr.system_users_id = su.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus in (0,1) and su.facilities_id = '".$facilities_id."'
                    order by pr.id ASC ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getSpeData($facilities_id){

        $sql = "Select sp.*, acc.role_id, r.code as rcode, f.id as fid
                    from system_users as sp
                    left join facilities as f on sp.facilities_id = f.id
                    left join account as acc on sp.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.role_id in(2) and f.id in ('".$facilities_id."')";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getMsg(){

        $sql = "Select * from try
                    ORDER BY date DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getLstMsg(){

        $sql = "Select * from try
                    ORDER BY date DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertIndex($residentId, $sendTo, $weight, $height, $temp, $bp, $user_id){
        $insertedCount = 0;
    
        $data = array(
            'residents_id' => $residentId,
            'system_users_id' => $sendTo,
            'registration_type_id' => 2,
            'weight' => $weight,
            'height' => $height,
            'temp' => $temp,
            'bp' => $bp,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
            'checkUpStatus' => 0
        );
        
        $this->db->insert('pre_registration', $data);
        
        if ($this->db->affected_rows() > 0) {
            $insertedCount++;
    
            if ($insertedCount){
                // Save notification to database
                $notificationData = array(
                    'notification_type_id' => 1,
                    'notif_to' => $sendTo,
                    'notif_from' => $user_id,
                    'content' => 'You have ' . $insertedCount . ' new Patient/s!',
                    'createdAt' => date('Y-m-d H:i:s'),
                    'status' => 1
                );
                $this->db->insert('notification', $notificationData);

                $pusherData = array(
                    'to_id' => $sendTo,
                    'from_id' => $user_id
                );
                $this->mhspusher->triggerEvent('pre-registration-'.$sendTo, 'new-patients', $pusherData);
            }
        }
    
        return $insertedCount;
    }

    public function insertOnlineIndex($oregid, $sendTo, $weight, $height, $temp, $bp){
        $user_id = $this->session->userdata('id');
        $insertedCount = 0;
    
        $data = array(
            'residents_id' => 0,
            'online_registration_id' => $oregid,
            'system_users_id' => $sendTo,
            'registration_type_id' => 1,
            'weight' => $weight,
            'height' => $height,
            'temp' => $temp,
            'bp' => $bp,
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 1,
            'checkUpStatus' => 0
        );
        
        $this->db->insert('pre_registration', $data);
        
        if ($this->db->affected_rows() > 0) {
            $insertedCount++;
    
            if ($insertedCount){
                // Save notification to database
                $notificationData = array(
                    'notification_type_id' => 1,
                    'notif_to' => $sendTo,
                    'notif_from' => $user_id,
                    'content' => 'You have ' . $insertedCount . ' new Patient/s!',
                    'createdAt' => date('Y-m-d H:i:s'),
                    'status' => 1
                );
                $this->db->insert('notification', $notificationData);

                $pusherData = array(
                    'to_id' => $sendTo,
                    'from_id' => $user_id
                );
                $this->mhspusher->triggerEvent('pre-registration-'.$sendTo, 'new-patients', $pusherData);
            }
        }
    
        return $insertedCount;
    }

    public function getindexform($pre_id){

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime,
                    f.id as fid, ad.city,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', ad.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.id = '".$pre_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updatedata($id) {
        $data = array(
            'status' => 0,
            'createdAt' => date('Y-m-d H:i:s') 
        );

        $this->db->where('id', $id);
        $this->db->update('pre_registration', $data);
    }

    public function getminor($facilities_id){

        $sql = "Select oreg.*, pg. *, oreg.id as oreg_id, oreg.status as o_status, mc.remarks

                    from online_registration as oreg
                    left join patient_guardian as pg on pg.online_registration_id = oreg.id
                    left join minor_counseling as mc on mc.online_registration_id = oreg.id
                    where oreg.facilities_id = '".$facilities_id."'
                    and oreg.id in (pg.online_registration_id)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function countminor($facilities_id){

        $sql = "Select oreg.*, pg. *, oreg.id as oreg_id, oreg.status as o_status, mc.remarks

                    from online_registration as oreg
                    left join patient_guardian as pg on pg.online_registration_id = oreg.id
                    left join minor_counseling as mc on mc.online_registration_id = oreg.id
                    where oreg.facilities_id = '".$facilities_id."'
                    and oreg.id in (pg.online_registration_id) and oreg.status = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function savecounseling($coinseling_data){

        $this->db->insert('minor_counseling', $coinseling_data);
        return true;
    }

    public function update_oreg($update_pre, $oreg_id){

        $this->db->where('id', $oreg_id);
        $this->db->update('online_registration', $update_pre);
    }

}

?>