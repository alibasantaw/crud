<?php
    class Data_model extends CI_Model {

        public function __construct()
        {
             parent::__construct();
             $CI =& get_instance();
        }

        public static function get_profil(){
            $CI     =& get_instance();
            return $CI->db->get_where("data_profil")->result_array();;
        }

        public static function get_profil_by_id($profil){
            $CI     =& get_instance();
            $where  = array("id" => $profil);
            return $CI->db->get_where("data_profil", $where)->result_array();;
        }
        
       public static function update_profil($id, $nama, $bod, $address, $email, $foto){
            $CI     =& get_instance();
            $profil  =   array("nama" => $nama, 
                            "bod" => $bod,
                            "address" => $address,
                            "email" => $email,
                            "foto" => $foto);
            $where  = array("id" => $id);
            
            $CI->db->where($where);
            if($CI->db->update("data_profil", $profil)){
                $activity   =   "mengupdate kelas untuk kelas ID #".$id;
                return true;
            }
            else{
                return false;
            }
        }

        public static function hapus_profil($profil){
            $CI     =& get_instance();

            $where  =   array("id" => $profil);

            $CI->db->where($where);
            $CI->db->delete("data_profil", $where);
    }}
?>