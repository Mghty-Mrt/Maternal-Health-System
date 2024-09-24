<?php

class Midwife_model extends CI_Model {

    public function getUserLogSess($user_id){

        $sql = "Select acc.*, acc.id as accid, su.*, su.id as suid, r.name as rname, r.code as rcode
                    from account as acc
                    left join system_users as su on su.account_id = acc.id
                    left join role as r on acc.role_id = r.id
                    where acc.status = 1 and acc.id = '".$user_id."'";
            $query = $this->db->query($sql);
            return $query->result();
    }

    public function getNewPatients($facilities_id){

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime,
                    f.id as fid, l.pre_registration_id as lpre_id,

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
                    left join system_users as su on pr.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where pr.status in(1,2,3,4) and pr.checkUpStatus = 0
                    and su.facilities_id = '".$facilities_id."'
                    order by pr.id ASC ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getNewPatientsInfo($pre_patient_id)
    {

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus,
                    f.id as fid,

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

    public function getpreg($p_id)
    {

        $sql = "Select pr.*, pr.id as prid, pr.status as prstatus, pr.createdAt as prdatetime, r.*,
                    f.id as fid, f.name as fname, ad.city,

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

    public function getPatientInfoItr($pre_patient_id)
    {

        $sql = "Select pr.*, pr.id as prid, r.*, f.id as fid, f.name as bname,
                    
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
                    and pr.id = '" . $pre_patient_id . "'";
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

    public function insertlab($jsonData, $prid, $impre, $reffby, $f_visit)
    {

        $data = array(
            "pre_registration_id" => $prid,
            "impression" => $impre,
            "reffered_by" => $reffby,
            "lab_request" => $jsonData,
            "followUp_visit	" => $f_visit,
            "createdAt" => date('Y-m-d H:i:s')
        );

        $this->db->insert('laboratory', $data);
        return $this->db->insert_id();
    }

    public function getPatientsTodayData($facilities_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, preg.id as prid,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where p.status = 1 and p.checkUpStatus = 0 and p.followUp_checkUp = '" . date('Y-m-d') . "'
                    and su.facilities_id = '" . $facilities_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTotalTodayPatients($facilities_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, preg.id as prid,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where p.status = 1 and p.checkUpStatus = 0 and p.followUp_checkUp = '" . date('Y-m-d') . "'
                    and su.facilities_id = '" . $facilities_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getFT()
    {
        $sql = "Select ft.*
                    from facility_type as ft
                    where ft.id in (2,3,5)";
        $query = $this->db->query($sql);
        return $query->result();
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

    public function getPatientItr($facilities_id)
    {

        $sql = "Select p.*, p.id as pid, r.*, pi.*, pi.id as piid, pi.createdAt as picreated,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patients_itr as pi on pi.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where pi.status = 1 and p.patient_type_id = 4 and su.facilities_id = '" . $facilities_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPatientInfo($patient_id)
    {

        $sql = "Select p.*, p.id as pid, pr.*, pr.id as prid, r.*, f.id as fid, f.name as bname, ad.street as adstreet, pi.*,

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

    public function getUCPatientsData($facilities_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, preg.id as prid, ad.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where p.status = 1 and p.followUp_checkUp < '" . date('Y-m-d') . "' and p.checkUpStatus =  0
                    and su.facilities_id = '" . $facilities_id . "'
                    order by p.id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getUncheckTodayPatients($facilities_id)
    {

        $sql = "Select p.*, p.pre_registration_id as pppre, p.createdAt as pdate, p.id as pid, r.*, pt.name as ptname, preg.id as prid, ad.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join patient_type as pt on p.patient_type_id = pt.id
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join address as ad on ad.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where p.status = 1 and p.followUp_checkUp < '" . date('Y-m-d') . "' and p.checkUpStatus =  0
                    and su.facilities_id = '" . $facilities_id . "'
                    order by p.id ASC";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPrenatal($facilities_id)
    {

        $sql = "Select p.*, ppre.status as pprestatus, ppre.createdAt as ppredate, ppre.id as ppreid, r.*,

                    CONCAT_WS(' ', r.firstname, oreg.firstname) AS firstname,
                    CONCAT_WS(' ', r.middlename, oreg.middlename) AS middlename,
                    CONCAT_WS(' ', r.lastname, oreg.lastname) AS lastname,
                    CONCAT_WS(' ', r.birthdate, oreg.birthdate) AS birthdate,
                    CONCAT_WS(' ', r.age, oreg.age) AS age,
                    CONCAT_WS(' ', r.civilStatus, oreg.civilStatus) AS civilStatus,
                    CONCAT_WS(' ', r.mobileno, oreg.mobileno) AS mobileno,
                    CONCAT_WS(' ', r.email, oreg.email) AS email

                    from patients as p
                    left join pre_registration as preg on p.pre_registration_id = preg.id
                    left join online_registration as oreg on preg.online_registration_id = oreg.id
                    left join residents as r on preg.residents_id = r.id
                    left join patient_prenatal as ppre on ppre.patients_id = p.id
                    left join system_users as su on preg.system_users_id = su.id
                    left join facilities as f on su.facilities_id = f.id
                    where ppre.status = 1 and su.facilities_id = '" . $facilities_id . "'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
