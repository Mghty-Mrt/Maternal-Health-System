<?php 

class PatientAppointment_model extends CI_Model{

    public function insertappointment($patient_data){

        $this->db->insert('patient_appointment', $patient_data);
        return $this->db->insert_id();
    }

    public function getPatientRequest($getuser_id){
        $q = "Select pa.*, hc.name as hcname , aps.startAt, aps.endAt, usr.id as usid, 
                usr.lastname, usr.firstname, usr.contactno, usr.email
                from patient_appointment as pa
                left join health_center as hc on pa.health_center_id = hc.id
                left join appointment_slot as aps on pa.appointment_slot_id = aps.id
                left join patients as p on pa.patients_id = p.id
                left join users as usr on p.users_id = usr.id
                where p.users_id = '".$getuser_id."' ORDER BY pa.id DESC";
        $query = $this->db->query($q);
        return $query->result();
    }
} 

?>