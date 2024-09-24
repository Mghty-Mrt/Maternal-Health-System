<?php

class Lyingin_model extends CI_Model
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
    
    public function insert_slot($data)
    {
        $this->db->insert("bed_slot", $data);
        return $this->db->insert_id();
    }

    public function getSlot($facilities_id)
    {
        $sql = "Select bs.*
            from bed_slot as bs
            where bs.facilities_id='" . $facilities_id . "'
            and bs.status=1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getavai($facilities_id)
    {
        $sql = "Select bs.slot_status
            from bed_slot as bs
            where bs.facilities_id='" . $facilities_id . "'
            and bs.status=1 and bs.slot_status = 1";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getoccu($facilities_id)
    {
        $sql = "Select bs.slot_status
            from bed_slot as bs
            where bs.facilities_id='" . $facilities_id . "'
            and bs.status=1 and bs.slot_status = 2";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getnot_avai($facilities_id)
    {
        $sql = "Select bs.slot_status
            from bed_slot as bs
            where bs.facilities_id='" . $facilities_id . "'
            and bs.status=1 and bs.slot_status = 0";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getRefPatientData($facilities_id){
        $sql = "Select rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*, rp.createdAt as rp_date,
                    pre.id as pppre,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from refer_patient as rp
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."'";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function getRefData($facilities_id, $ref_id){
        $sql = "Select rp.*, rp.id as rpid, f.name as fname, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from refer_patient as rp
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."' and rp.id = '".$ref_id."' 
                    and rp.status in (0,1)";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function getfaci(){
        $sql = "Select su.*, su.id as suid, r.code
                    from system_users as su
                    left join account as acc on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id 
                    where acc.status = 1";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function updateReferral($referral_id){
        $data = array (
                'status' => 2,
        );
        $this->db->where('id', $referral_id);
        $this->db->update('refer_patient', $data);
    }

    public function sendFeedback($feedback_data){

        $this->db->insert('referral_feedback', $feedback_data);
        return true;
    }

    public function getpatientinfo($rp_id)
    {
        $sql = "Select rp.*, r.*, ad.*, f.name as fname, p.pre_registration_id as ppreid, p.access_code_id,

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

                    from refer_patient as rp
                    left join patients as p on rp.patients_id = p.pre_registration_id
                    left join pre_registration as pr on p.pre_registration_id = pr.id
                    left join online_registration as oreg on pr.online_registration_id = oreg.id
                    left join residents as r on pr.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id   
                    left join facilities as f on ad.facilities_id = f.id
                    where rp.id = '". $rp_id ."' group by p.pre_registration_id";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPostnatalRec($facilities_id){

        $sql = "Select ppn.*, ppn.id as ppnid, ppn.status as ppnstat, r.firstname, r.middlename, r.lastname,
                    rp.id as rpid, ppn.createdAt as ppndate,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patient_postnatal as ppn
                    left join patients as p on ppn.patients_id = p.id
                    left join refer_patient as rp on p.pre_registration_id = rp.patients_id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."'
        ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getSubmitPatient($patient_data)
    {
         $this->db->insert('patients', $patient_data);
        return $this->db->insert_id();
    }

    public function savePostNatal($postnatal_data)
    {
        $this->db->insert('patient_postnatal', $postnatal_data);
        return true;
    }

    public function getdeliveryrecords($facilities_id){
        $sql = "Select dr.*, dr.id as drid, dr.createdAt as drdate, dr.refer_patient_id as drrpid, rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from delivery_record as dr
                    left join refer_patient as rp on dr.refer_patient_id = rp.id 
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."'";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function editDeliveryRecord($delivery_id){

        $sql = "Select dr.*, dr.id as drid, dr.createdAt as drdate, dr.refer_patient_id as drrpid, rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from  delivery_record as dr
                    left join refer_patient as rp on dr.refer_patient_id = rp.id
                    left join  facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where dr.id = '".$delivery_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function submitDeliveryRecord($delivery_record){

        $this->db->insert('delivery_record ', $delivery_record);
        return true;
    }

    public function getnewborn($facilities_id){
        $sql = "Select nr.*, nr.id as nrid, nr.createdAt as nrdate, nr.delivery_record_id as nrdrid, dr.*, dr.id as drid, dr.createdAt as drdate, dr.refer_patient_id as drrpid, 
                    rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email
                    
                    from newborn_record as nr
                    left join delivery_record as dr on nr.delivery_record_id = dr.id
                    left join refer_patient as rp on dr.refer_patient_id = rp.id 
                    left join facilities as f on rp.refer_from = f.id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.refer_to = '".$facilities_id."'";
            $query = $this->db->query($sql);
            return $query->result();        
    }

    public function saveNewbornRecord($newborn_record){

        $this->db->insert('newborn_record ', $newborn_record);
        return true;
    }

    public function getPatient($ref_id){

        $sql = "Select ppn.*, ppn.id as ppnid, ppn.status as ppnstat, r.firstname, r.middlename, r.lastname,
                    rp.id as rpid, ppn.createdAt as ppndate,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patient_postnatal as ppn
                    left join patients as p on ppn.patients_id = p.id
                    left join refer_patient as rp on p.pre_registration_id = rp.patients_id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where rp.id = '".$ref_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertDischargeMotherRecord($dis_mother){

        $this->db->insert('discharge_mother ', $dis_mother);
        return true;
    }

    public function getdischargemother($ref_id){

        $sql = "Select dm.*, dm.id as dmid
                    from discharge_mother as dm
                    where dm.refer_patient_id = '".$ref_id."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertDischargeNewbRecord($dis_newb){

        $this->db->insert('discharge_newborn ', $dis_newb);
        return true;
    }

    public function editPostNatalRecord($postnatal_id){

        $sql = "Select ppn.*, ppn.id as ppnid, ppn.status as ppnstat, r.firstname, r.middlename, r.lastname,
                    rp.id as rpid, ppn.createdAt as ppndate, p.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patient_postnatal as ppn
                    left join patients as p on ppn.patients_id = p.id
                    left join refer_patient as rp on p.pre_registration_id = rp.patients_id
                    left join pre_registration as pre on rp.patients_id = pre.id
                    left join online_registration as oreg on pre.online_registration_id = oreg.id
                    left join residents as r on pre.residents_id = r.id
                    where ppn.id = '".$postnatal_id."' ";

        $query = $this->db->query($sql);
        return $query->result();

    }

    public function updateNewbornRecord($newborn_id){

        $sql = "Select nr.*, nr.id as nrid, nr.createdAt as nrdate, nr.delivery_record_id as nrdrid, dr.*, dr.id as drid, dr.createdAt as drdate, dr.refer_patient_id as drrpid, 
                       rp.*, rp.status as rpstatus, rp.id as rpid, f.name as fname, r.*,

                        CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                        CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                        CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                        CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                        CONCAT_WS(' ', r.age, oreg.age) AS age,
                        CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                        CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                        CONCAT_WS(' ', r.email, oreg.email) AS email
                        
                        from newborn_record as nr
                        left join delivery_record as dr on nr.delivery_record_id = dr.id
                        left join refer_patient as rp on dr.refer_patient_id = rp.id 
                        left join facilities as f on rp.refer_from = f.id
                        left join pre_registration as pre on rp.patients_id = pre.id
                        left join online_registration as oreg on pre.online_registration_id = oreg.id
                        left join residents as r on pre.residents_id = r.id
                        where nr.id = '".$newborn_id."'";
        $query = $this->db->query($sql);
        return $query->result();  
    }

    public function getoccuslot($to){
        $sql="Select bs.* 
                from bed_slot as bs
                where slot_status = 2 and bs.facilities_id = '".$to."'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updatebedslot2($slot_id)
    {

        $data = array(
            'createdAt' => date('Y-m-d H:i:s'),
            'slot_status' => 1,
        );
        $this->db->where('id', $slot_id);
        $this->db->update('bed_slot', $data);
    }

    public function getFT()
    {
        $sql = "Select ft.*
                    from facility_type as ft
                    where ft.id in (3)";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function updateref_patients($rp_id){

        $data = array(
            'status' => 3,
            'createdAt' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $rp_id);
        $this->db->update('refer_patient', $data);
    }

    public function get_fetal_death($facilities_id){

        $sql = "Select rp.*, dr.*, nr.*, nr.status as nr_stat, nr.id as nr_id, nr.createdAt as nr_date

                    from refer_patient as rp
                    left join delivery_record as dr on dr.refer_patient_id = rp.id
                    left join newborn_record as nr on nr.delivery_record_id = dr.id
                    where rp.refer_to = '".$facilities_id."' and nr.status = 0";
            $query = $this->db->query($sql);
            return $query->result(); 
    }
    
}
