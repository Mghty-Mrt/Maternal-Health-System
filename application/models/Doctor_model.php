<?php

class Doctor_model extends CI_Model
{

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname, r.code as rcode
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function get_total_referrals($facilities_id){
        $sql = "Select COUNT(rp.refer_to) as total_referrals
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    where f.facility_type_id in (3,5) and rp.refer_from = '". $facilities_id ."'";
            $query = $this->db->query($sql);    
            $result = $query->row();
            return ($result) ? $result->total_referrals : 0;
            // return $query->result();   
    }

    public function getreport($facilities_id){
        $sql = "Select rp.*, rp.id as rp_id, f.name as fname
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    where rp.refer_from = '" . $facilities_id . "'
                    group by rp.refer_to";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gettotal_to($To_tal){
        $sql = "Select rp.*
                    from refer_patient as rp
                    where rp.refer_to = '" . $To_tal . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotal_arrived($facilitiest_id, $refer_to){
        $sql = "Select rs.id, rp.refer_to
                    from referral_status as rs
                    left join refer_patient as rp on rs.refer_patient_id = rp.id
                    where rp.refer_from = '" . $facilitiest_id . "'
                    and rp.refer_to = '". $refer_to ."' and rs.status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotal_unarrived($facilitiest_id, $refer_to){
        $sql = "Select rs.id, rp.refer_to
                    from referral_status as rs
                    left join refer_patient as rp on rs.refer_patient_id = rp.id
                    where rp.refer_from = '" . $facilitiest_id . "'
                    and rp.refer_to = '". $refer_to ."' and rs.status = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_total_hospital_referrals($facilities_id){
        $sql = "Select COUNT(rp.refer_to) as total_hospital_referrals
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    where f.facility_type_id = 3 and rp.refer_from = '". $facilities_id ."'";
            $query = $this->db->query($sql);    
            $result = $query->row();
            return ($result) ? $result->total_hospital_referrals : 0;
            // return $query->result();   
    }

    public function get_total_lyingin_referrals($facilities_id){
        $sql = "Select COUNT(rp.refer_to) as total_lyingin_referrals
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    where f.facility_type_id = 5 and rp.refer_from = '". $facilities_id ."'";
            $query = $this->db->query($sql);    
            $result = $query->row();
            return ($result) ? $result->total_lyingin_referrals : 0;
            // return $query->result();   
    }

    public function get_total_arrived_referrals($facilities_id){
        $sql = "Select COUNT(rs.status) as total_arrived_referrals
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    left join referral_status as rs on rs.refer_patient_id = rp.id
                    where f.facility_type_id in (3,5) 
                    and rp.refer_from = '". $facilities_id ."'
                    and rs.status = 1";
            $query = $this->db->query($sql);    
            $result = $query->row();
            return ($result) ? $result->total_arrived_referrals : 0;
            // return $query->result();   
    }

    public function get_total_unarrived_referrals($facilities_id){
        $sql = "Select COUNT(rs.status) as total_unarrived_referrals
                    from refer_patient as rp
                    left join facilities as f on rp.refer_to = f.id
                    left join referral_status as rs on rs.refer_patient_id = rp.id
                    where f.facility_type_id in (3,5) 
                    and rp.refer_from = '". $facilities_id ."'
                    and rs.status = 0";
            $query = $this->db->query($sql);    
            $result = $query->row();
            return ($result) ? $result->total_unarrived_referrals : 0;
            // return $query->result();   
    }

    public function gettotalpatients($user_id)
    {
        $sql = "Select pr.*, pr.createdAt as prdatetime
                    from pre_registration as pr
                    where pr.system_users_id = '" . $user_id . "'
                    and pr.status = 2";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertnotif($notificationData){

        $this->db->insert('notification', $notificationData);
        return true;
    }

    public function getnotif($user_id){

        $sql = "Select n.*, acc.*, su.*, n.status as n_stat
                    from notification as n
                    left join account as acc on n.notif_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where n.status = 1 and n.notif_to = '".$user_id."'
                    Order By n.id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getnewnotif($user_id){
        $sql = "Select n.*, acc.*, su.*
                    from notification as n
                    left join account as acc on n.notif_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where n.status = 1 and n.notif_to = '".$user_id."'
                    Order By n.id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalNotif($user_id){

        $sql = "Select COUNT(n.status) as total_notif, n.*, acc.*, su.*
                    from notification as n
                    left join account as acc on n.notif_from = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where n.status = 1 and n.notif_to = '".$user_id."'
                    Order By n.id DESC";
        $query = $this->db->query($sql);
        $result = $query->row();
        return ($result) ? $result->total_notif : 0;
    }

    public function rednotif($type_id){
        $data = array(
            'status' => 2,
        );

        $this->db->where('notification_type_id', $type_id);
        $this->db->update('notification', $data);
    }

    public function updatePhoto($system_user_id, $hash_filename)
    {
        $this->db->where('id', $system_user_id);
        $this->db->update('system_users', ['image' => $hash_filename]);
    }

    public function getcurrhc($facilities_id)
    {
        $sql = "Select f.*
                    from facilities as f
                    where f.id = '".$facilities_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getHospitalsData()
    {
        $sql = "Select f.*, ft.name as ftname
                    from facilities as f
                    left join facility_type as ft on f.facility_type_id = ft.id
                    where f.facility_type_id = 3";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getNewPatients($system_users_id)
    {

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime, ad.city,
                    f.id as fid, l.pre_registration_id as lpre_id, pr.registration_type_id as type,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', ad.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join laboratory as l on l.pre_registration_id = pr.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 0
                    and pr.system_users_id = '" . $system_users_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalNewPatients($user_id)
    {

        $sql = "Select COUNT(pr.checkUpStatus) as total_new_patients, pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime, r.*
                    from pre_registration as pr
                    left join residents as r on pr.residents_id = r.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 0
                    and pr.system_users_id = '" . $user_id . "'
                    order by pr.id ASC ";
        $query = $this->db->query($sql);
        $result = $query->row();
        return ($result) ? $result->total_new_patients : 0;
        //return $query->result();
    }

    public function getpreg($p_id)
    {

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime, r.*,
                    f.id as fid, ad.city,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', ad.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.id = '" . $p_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPatientsTodayData($system_users_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, pt.name as ptname, preg.id as prid,
                    p.status as pstat,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    where p.status = 1 and p.patient_type_id in (1, 4) and p.checkUpStatus = 0 and p.followUp_checkUp = '" . date('Y-m-d') . "'
                    and preg.system_users_id = '" . $system_users_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalTodayPatients($user_id)
    {

        $sql = "Select COUNT(p.followUp_checkUp) as total_today_patients, p.*, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, p.status as pstat
                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    where p.status in (1) and p.patient_type_id in (1, 4) and p.followUp_checkUp = '" . date('Y-m-d') . "' and p.checkUpStatus = 0 
                    and preg.system_users_id = '" . $user_id . "'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return ($result) ? $result->total_today_patients : 0;
        //return $query->result();
    }
    public function getPatientInfo($patient_id)
    {

        $sql = "Select p.*, p.id as pid, pr.*, pr.id as prid, f.id as fid, ad.city, pi.*,

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
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patients as p
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join pre_registration as pr on p.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 1
                    and p.id = '" . $patient_id . "'
                    order by pr.id ASC ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPatientInfoItr($pre_patient_id)
    {

        $sql = "Select pr.*, pr.id as prid, f.id as fid, ad.city,
                    
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
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 0
                    and pr.id = '" . $pre_patient_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getNewPatientsInfo($pre_patient_id)
    {

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus,
                    f.id as fid, ad.city,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', ad.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from pre_registration as pr
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 0
                    and pr.id = '" . $pre_patient_id . "'
                    order by pr.id ASC ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertlab($jsonData, $prid, $impre, $reffby, $f_visit)
    {

        $data = array(
            "pre_registration_id" => $prid,
            "impression" => $impre,
            "reffered_by" => $reffby,
            "lab_request" => $jsonData,
            "followUp_visit" => $f_visit,
            "createdAt" => date('Y-m-d H:i:s')
        );

        $this->db->insert('laboratory', $data);
        return $this->db->insert_id();
    }

    public function insertCode($insertAccessCode)
    {

        $this->db->insert('access_code', $insertAccessCode);
        return $this->db->insert_id();
    }

    public function insetPatientData($insertPatient)
    {

        $this->db->insert('patients', $insertPatient);
        return $this->db->insert_id();
    }

    public function insertItrData($itr_Data)
    {

        $this->db->insert('patients_itr', $itr_Data);
        return $this->db->insert_id();
    }

    public function updateResult($pre_patient_id)
    {

        $data = array(
            'createdAt' => date('Y-m-d H:i:s'),
            'status' => 2,
            'checkUpStatus' => 1
        );
        $this->db->where('id', $pre_patient_id);
        $this->db->update('pre_registration', $data);
    }

    public function insertNegativeResult($patient_id)
    {
        try {
            $data = array(
                'createdAt' => date('Y-m-d H:i:s'),
                'status' => 3,
                'checkUpStatus' => 1
            );

            $this->db->where('id', $patient_id);
            $this->db->update('pre_registration', $data);

            if ($this->db->affected_rows() > 0) {
                // Update successful
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            log_message('error', 'Error updating negative result: ' . $e->getMessage());
            return false;
        }
    }

    public function getTodayPatientInfo($patient_id)
    {

        $sql = "Select p.*, p.createdAt as pdate, p.id as pid, pt.name as ptname, preg.id as prid, preg.*,
                    p.pre_registration_id as p_pre_id, pi.*,

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
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patients as p
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    where p.status in (1) and p.id = '" . $patient_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function gethusband($husdata){

        $sql = "Select p.*, pitr.*
                    from patients as p
                    left join patients_itr as pitr on pitr.patients_id = p.id
                    where p.pre_registration_id = '".$husdata."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function insetFCPatientData($insertPatient)
    {

        $this->db->insert('patients', $insertPatient);
        return $this->db->insert_id();
    }

    public function insertFCPrenatalData($prenatalData)
    {

        $this->db->insert('patient_prenatal', $prenatalData);
        return $this->db->insert_id();
    }

    public function updatePatientStatus($patient_id)
    {

        $data = array(
            'checkUpStatus' => 1
        );
        $this->db->where('id', $patient_id);
        $this->db->update('patients', $data);
    }

    public function getUCPatientsData($system_users_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, pt.name as ptname,
                    preg.id as prid, ad.city, p.status as pstat,

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

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id   
                    left join facilities as f on ad.facilities_id = f.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    where p.status in (1) and p.patient_type_id in (1, 4) and p.followUp_checkUp < '" . date('Y-m-d') . "' and p.checkUpStatus =  0
                    and preg.system_users_id = '" . $system_users_id . "'
                    order by p.id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotaluncheckupPatients($user_id)
    {

        $sql = "Select COUNT(p.followUp_checkUp) as total_uncheckup_patients, p.*, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, preg.id as prid
                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    where p.status in (1) and p.patient_type_id in (1, 4) and p.followUp_checkUp < '" . date('Y-m-d') . "' and p.checkUpStatus =  0
                    and preg.system_users_id = '" . $user_id . "'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return ($result) ? $result->total_uncheckup_patients : 0;
        //return $query->result();
    }

    public function getPatientItr($system_users_id)
    {

        $sql = "Select p.*, p.id as pid, pi.*, pi.id as piid, pi.createdAt as picreated,
                    su.firstname as fname, su.lastname as lname, rl.code as rlcode,
                        
                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join account as acc on pi.checkup_by = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as rl on acc.role_id = rl.id
                    where pi.status = 1 and preg.system_users_id = '" . $system_users_id . "'
                    ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getC_by($c_by){

        $sql = "Select su.*, r.code
                    from system_users as su
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.id = '". $c_by ."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPrenatal($system_users_id)
    {

        $sql = "Select p.*, ppre.status as pprestatus, ppre.createdAt as ppredate, ppre.id as ppreid, ppre.checkup_by,
                    su.firstname as fname, su.lastname as lname, rl.code as rlcode, p.status as pstat, p.pre_registration_id as ppre,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join account as acc on ppre.checkup_by = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as rl on acc.role_id = rl.id
                    where ppre.status = 1 and preg.system_users_id = '" . $system_users_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function geteditPrenatal($prenatal_id)
    {

        $sql = "Select p.*, ppre.*, ppre.id as ppreid, ppre.checkup_by,
                    p.id as p_id, preg.id as preg_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,
                    
                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS bname

                    from patient_prenatal as ppre
                    left join patients as p on ppre.patients_id = p.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    left join account as acc on ppre.checkup_by = acc.id
                    left join system_users as su on su.account_id = acc.id
                    left join role as rl on acc.role_id = rl.id
                    where ppre.status = 1 and ppre.id = '" . $prenatal_id . "'
                    group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getFType($facility_type_id)
    {
        $sql = "Select ft.*
                    from facility_type as ft
                    where ft.id = '" . $facility_type_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getFacilities($facility_type_id)
    {
        $sql = "Select f.*, f.id as fid, ft.name as ftname
                    from facilities as f
                    left join facility_type as ft on f.facility_type_id = ft.id
                    where f.facility_type_id = '" . $facility_type_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getAvailableFacilities($facilitiesWithEquipment)
    {
        if (!empty($facilitiesWithEquipment)) {

            // Convert array to a comma-separated string
            $facilitiesWithEquipmentStr = implode(',', $facilitiesWithEquipment);

            $sql = "Select f.*, f.id AS fid, ft.name AS ftname
                        FROM facilities AS f
                        LEFT JOIN facility_type AS ft ON f.facility_type_id = ft.id
                        WHERE f.id IN ($facilitiesWithEquipmentStr)";
            $query = $this->db->query($sql);
            return $query->result();
        } else {

            return array();
        }
    }

    public function getEqipments($case_id)
    {
        $sql = "Select e.*
                    from equipments as e
                    where e.equipment_type_id = '" . $case_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getFT()
    {
        $sql = "Select ft.*
                    from facility_type as ft
                    where ft.id in (3,5)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getET()
    {
        $sql = "Select et.*
                    from equipement_type as et";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getlabinfo($pre_patient_id)
    {
        $sql = "Select lab.*
                    from laboratory as lab
                    where lab.pre_registration_id = '" . $pre_patient_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getreferringfacilityData($facility_id)
    {
        $sql = "Select f.*
                    from facilities as f
                    where f.id = '" . $facility_id . "'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getequips($to, $case_id){
        $sql = "Select e.*
                    from equipments as e
                    where e.facilities_id = '" . $to . "'
                    and e.equipment_type_id = '". $case_id ."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function update_equip_list($id, $eq_data){
        $this->db->where('id', $id);
        $this->db->update('equipments', $eq_data);

    }

    public function getfromfacilityData($facilities_id)
    {
        $sql = "Select f.*
                    from facilities as f
                    where f.id = '" . $facilities_id . "'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getrefer_patiner_data($patient_id)
    {
        $sql = "Select pre.*, pre.id as preid, r.*, addr.*, pi.husband_data,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname
        
                    from pre_registration as pre
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    left join patients as p on p.pre_registration_id = pre.id
                    left join patients_itr as pi on pi.patients_id = p.id
                    where pre.id = '" . $patient_id . "'
                    group by p.pre_registration_id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function update($update_patient, $pre_id){

        $this->db->where('pre_registration_id', $pre_id);
        $this->db->update('patients', $update_patient);
    }

    public function sendRef($Ref_data){

        $this->db->insert('refer_patient', $Ref_data);
        return true;
    }

    public function updatebedslot($slot_id)
    {

        $data = array(
            'createdAt' => date('Y-m-d H:i:s'),
            'slot_status' => 2,
        );
        $this->db->where('id', $slot_id);
        $this->db->update('bed_slot', $data);
    }

    public function getavslot($to){
        $sql="Select bs.* 
                from bed_slot as bs
                where slot_status = 1 and bs.facilities_id = '".$to."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getlyingin($get_id){
        $sql = "Select f.*, f.id as fid, bs.*
                    from facilities as f
                    left join bed_slot as bs on bs.facilities_id = f.id
                    where f.facility_type_id = '".$get_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function gethospitalbed($get_id){
        $sql = "Select f.*, f.id as fid, bs.*
                    from facilities as f
                    left join bed_slot as bs on bs.facilities_id = f.id
                    where f.facility_type_id = '".$get_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getlabrqst($pr_id){
        $sql = "Select lab.*, pr.*,

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
                    
                    from laboratory as lab
                    left join pre_registration as pr on lab.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id   
                    left join facilities as f on ad.facilities_id = f.id
                    where lab.pre_registration_id = '".$pr_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function gethcusers($facilities_id){
        $sql = "Select acc.*, acc.id as accid
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    where su.facilities_id = '".$facilities_id."'
                    and acc.status = 1 and acc.is_verified = 1
                    and acc.role_id = 7";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getsubject(){
        $sql = "Select mt.*
                    from message_type as mt";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function sendmessage($data){

        $this->db->insert('message_content', $data);
        return true;
    }

    public function getusermsg($system_users_id){

        $sql = "Select mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat, acc.*, su.*, su.image as suprofile
                    from message_content as mc
                    left join account as acc on mc.message_to = acc.id
                    left join system_users as su on su.account_id = acc.id
                    where mc.message_from = '".$system_users_id."'
                    and mc.status in (1, 2)
                    ORDER BY mc.id DESC";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function viewmsg($mc_id){

        $sql = "Select mc.*, mc.id as mcid, mc.createdAt as mcdate, mc.status as mcstat, acc.*, su.*, su.image as suprofile,
                    r.name as rname
                    from message_content as mc
                    left join account as acc on mc.message_to = acc.id
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

    public function getpostnatal($system_users_id)
    {

        $sql = "Select pn.*, p.*, pn.createdAt as pndate, pn.id as pnid, pn.status as pnstat, 

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patient_postnatal as pn
                    left join patients as p on pn.patients_id = p.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    where pn.status = 1 and preg.system_users_id = '" . $system_users_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getpostpartum($system_users_id)
    {

        $sql = "Select p.*, dm.*, dn.*, preg.id as preg_id, f.name as fname, f.facility_type_id, dm.status as dmstat,
                    dn.status as dnstat, rp.status as rpstat, rp.id as rp_id, rs.status as rsstatus, rs.report as rsreport,
                    rs.refer_patient_id as rs_rpid,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email
                    
                    from refer_patient as rp
                    left join referral_status as rs on rs.refer_patient_id = rp.id
                    left join facilities as f on rp.refer_to = f.id 
                    left join discharge_mother as dm on dm.refer_patient_id = rp.id
                    left join discharge_newborn as dn on dn.discharge_mother_id = dm.id
                    left join patients as p on rp.patients_id = p.pre_registration_id 

                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    
                    where preg.system_users_id = '" . $system_users_id . "'
                    group by p.pre_registration_id DESC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getnewbornRecord($preg_id)
    {
        $sql = "Select nbr.*, pitr.husband_data, f.name as fname, ad.*, pr.*, r.*, rp.*, nbr.id as nbrid, p.id as pid,

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

                    from newborn_record as nbr
                    left join delivery_record as dr on nbr.delivery_record_id = dr.id
                    left join refer_patient as rp on dr.refer_patient_id = rp.id
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join patients_itr as pitr on pitr.patients_id = p.id
                    left join pre_registration as pr on p.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where p.pre_registration_id = '". $preg_id ."' ";

        $query = $this->db->query("$sql");
        return $query->result();
    }

    public function getnewbornRecord2($preg_id)
    {
        $sql = "Select pitr.husband_data, f.name as fname, ad.*, pr.*, r.*, rp.*, p.id as pid,

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

                    from refer_patient as rp
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join patients_itr as pitr on pitr.patients_id = p.id
                    left join pre_registration as pr on p.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    where p.pre_registration_id = '". $preg_id ."' ";

        $query = $this->db->query("$sql");
        return $query->result();
    }

    public function savePostpartumRecord ($data)
    {
        $this->db->insert("patient_postpartum", $data);
        return true;
    }

    public function c_partum_list($system_users_id)
    {
        $sql = "Select ppo.*, ppo.id as ppo_id, p.pre_registration_id as pre_id, ppo.createdAt as ppo_date, p.id as p_id,
                    pc.id as pc_id,

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

                    from patient_postpartum as ppo
                    left join patients as p on ppo.patients_id = p.id
                    left join pre_registration as pr on p.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join facilities as f on ad.facilities_id = f.id
                    left join patients_completed as pc on pc.patients_id = p.pre_registration_id
                    where ppo.status = 1 and pr.system_users_id	 = '". $system_users_id ."'";

        $query = $this->db->query("$sql");
        return $query->result();
    }

    public function getnatal($system_users_id){
        $sql = "Select dr.*, nr.*, nr.id as nrid, dr.id as drid, dr.createdAt as drdate, dr.refer_patient_id as drrpid, 
                    rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname,
                    
                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email
                    
                    from delivery_record as dr
                    left join newborn_record as nr on nr.delivery_record_id = dr.id
                    left join refer_patient as rp on dr.refer_patient_id = rp.id 
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join facilities as f on rp.refer_to = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where pre.system_users_id = '".$system_users_id."'
                    group by p.pre_registration_id";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function getfeedback($system_users_id){
        $sql = "Select DISTINCT rf.*, rf.createdAt as rfdate, rf.id as rfid, rp.*, p.*, f.name as fname, 

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from referral_feedback as rf
                    left join refer_patient as rp on rf.refer_patient_id = rp.id
                    left join facilities as f on rp.refer_to = f.id
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    where preg.system_users_id = '" . $system_users_id . "'
                    GROUP BY p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function viewfeedback($system_users_id, $rfid){
        $sql = "Select DISTINCT rf.*, rf.createdAt as rfdate, rf.id as rfid, rp.*, p.*, r.id as resi_id, 
                    
                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from referral_feedback as rf
                    left join refer_patient as rp on rf.refer_patient_id = rp.id
                    left join facilities as f on rp.refer_to = f.id
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    where preg.system_users_id = '" . $system_users_id . "' and rf.id = '".$rfid."'
                    GROUP BY p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getmother($dr_id){

        $sql = "Select dr.*
                    from delivery_record as dr
                    where dr.id = '".$dr_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getnewborn($nb_id){

        $sql = "Select nr.*
                    from newborn_record as nr
                    where nr.id = '".$nb_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPatientInfoItrEdit($pi_id)
    {

        $sql = "Select p.*, p.id as p_id, pi.*, pi.id as pi_id, pre.*, addr.*, p.pre_registration_id as p_pre_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from patients as p
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join pre_registration as pre on p.pre_registration_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id - r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where pi.id = '". $pi_id ."'
                    group by p.pre_registration_id";
                   
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updatePatientData($insertPatient, $p_id){

        $this->db->where('id', $p_id);
        $this->db->update('patients', $insertPatient);
    }

    public function updaateItrData($itr_Data, $pi_id){

        $this->db->where('id', $pi_id);
        $this->db->update('patients_itr', $itr_Data);
    }

    public function updateprePatientData($Patient, $p_id){

        $this->db->where('id', $p_id);
        $this->db->update('patients', $Patient);
    }

    public function updateFCPrenatalData($prenatal_Data, $p_pre_id){

        $this->db->where('id', $p_pre_id);
        $this->db->update('patient_prenatal', $prenatal_Data);
    }

    public function updateFCPatientData($insertPatient, $p_id){
        $this->db->where('id', $p_id);   
        $this->db->update('patients', $insertPatient);   
    }
    
    public function updateFCPrenatalData2($prenatalData, $p_pre_id){

        $this->db->where('id', $p_pre_id);
        $this->db->update('patient_prenatal', $prenatalData);
    }

    public function getitrlab($p_pre_id){

        $sql = "Select l.*
                from laboratory as l
                where l.pre_registration_id = '". $p_pre_id ."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function update_patients($pre_id){
        
        $data = array(
            'status' => 0
        );

        $this->db->where('pre_registration_id', $pre_id);
        $this->db->update('patients', $data);

    }

    public function mark_complete($complete_data){

        $this->db->insert('patients_completed', $complete_data);
        return true;
    }

    public function getpusers($system_user_id)
    {
        $sql = "Select ac.*, rl.name as rname, rl.code as r_code, ac.id as acc_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from access_code as ac
                    left join role as rl on ac.role_id = rl.id
                    left join patients as p on p.access_code_id = ac.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where pre.system_users_id = '" . $system_user_id . "'
                    group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getchat($acc_id, $access_id){
        $sql= "Select acc.*, su.*, c.*, c.createdAt as c_date, 
                    r.code, r.name, acc.id as acc_id, c.id as c_id

                    from chat as c
                    left join account as acc on c.chat_from = acc.id
                
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE c.chat_to = '". $access_id. "' and c.chat_from = '". $acc_id ."'";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getreply($acc_id, $access_id){
        $sql= "Select acc.*, su.*, c.*, c.createdAt as c_date, 
                    r.code, r.name, acc.id as acc_id, c.id as c_id

                    from chat as c
                    left join account as acc on c.chat_from = acc.id
                
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id

                    WHERE c.chat_from = '". $access_id. "' and c.chat_to = '". $acc_id ."'
                    order by c.createdAt ASC";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getuser($acc_id){
        $sql = "Select ac.*, rl.name as r_name, rl.code as r_code, ac.id as acc_id,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.occupation, oreg.occupation) AS occupation,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email,

                    CONCAT_WS(' ', addr.street, oreg.street) AS street,
                    CONCAT_WS(' ', f.name, oreg.brgy) AS fname

                    from access_code as ac
                    left join role as rl on ac.role_id = rl.id
                    left join patients as p on p.access_code_id = ac.id
                    left join pre_registration as pre on p.pre_registration_id =  pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    left join address as addr on addr.residents_id = r.id
                    left join facilities as f on addr.facilities_id = f.id
                    where ac.id = '" . $acc_id . "'
                    group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function com($p_id){
        $sql= "Select pc.*

                from patients_completed as pc
                WHERE pc.patients_id = '". $p_id. "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

}
