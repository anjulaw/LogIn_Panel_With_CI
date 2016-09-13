<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_login extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //get the username & password from tbl_usrs
    /*function get_user($usr, $pwd)
    {
        $sql = "select * from tbl_usrs where username = " . $usr . " and password = " . md5($pwd) . " and status = 'active'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }*/

    public function can_log_in(){

        $this->db->where('username',$this->input->post('txt_username'));
        $this->db->where('password',md5($this->input->post('txt_password')));
        //$this->db->where('status','active');
        $query = $this->db->get('tbl_users');

        if($query->num_rows()== 1){
            return true;

        }else{
            return false;
        }
    }

    public function add_temp_user($key){
        $data = array(
            'email'=> $this->input->post('inputEmail'),
            'password'=>md5($this->input->post('inputPassword')),
            'fullname'=>$this->input->post('fullName'),
            'username'=>$this->input->post('userName'),
            'key'=>$key
        );

        $query = $this->db->insert('temp_user',$data);
        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function is_valid_key($key){
        $this->db->where('key',$key);
        $query = $this->db->get('temp_user');

        if($query->num_rows()== 1){
            return true;

        }else{
            return false;
        }
    }

    public function add_user($key){
        $this->db->where('key',$key);
        $temp_user_rec = $this->db->get('temp_user');

        if($temp_user_rec){
            $row = $temp_user_rec->row();

            $user_data = array(
                'email'=>$row->email,
                'password'=>$row->password,
                'username'=>$row->username,
                'name'=>$row->fullname,
            );

            $did_add_user = $this->db->insert('tbl_users',$user_data);

            if($did_add_user){
                $this->db->where('key',$key);
                $this->db->delete('temp_user');
                return true;
            }else return false;
        }
    }

}?>