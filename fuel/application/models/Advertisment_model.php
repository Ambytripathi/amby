<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Advertisment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getClinicDetails($id)
    {
		
        $where = '';
        if ($id == 1) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Shearbridge"';
        } else if ($id == 2) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Oxford"';
        } else if ($id == 3) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Willesden"';
        } else if ($id == 4) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Isleworth"';
        } else if ($id == 5) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Nottingham"';
        } else if ($id == 6) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Bristol"';
        } else if ($id == 7) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Roundhay"';
        } else if ($id == 8) {
            $where = 'cl_clinic_name = "MedicSpot Clinic East Kilbride"';
        } else if ($id == 9) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Glasgow Centre"';
        } else if ($id == 10) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Edinburgh"';
        } else if ($id == 11) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Wicker"';
        } else if ($id == 12) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Cambridge"';
        } else if ($id == 13) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Dundee"';
        } else if ($id == 14) {
            $where = 'cl_clinic_name = "MedicSpot Clinic Sheppey Hospital"';
        }
        $sql = "select * from ea_clinics where $where";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->row();
        }

    }
}

/* End of file appointments_model.php */
/* Location: ./application/models/appointments_model.php */
