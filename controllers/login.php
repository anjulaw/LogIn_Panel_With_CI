<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Anjulaw
 * Date: 11/26/2014
 * Time: 12:49 PM
 */

class Login extends CI_Controller{



    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('captcha');
        //load the login model
        $this->load->model('model_login');
    }

    public function index()
    {
        $this->load->view('view_home');
    }

    public function goHome(){
        //echo "this is home page";
        $this->load->view('view_cus_home');
    }

    public function signup(){
        $this->load->view('view_signup');
    }

    public function login_Page(){

        //$this->load->view('view_login');

        //get the posted values
        $username = $this->input->post("txt_username");
        $password = $this->input->post("txt_password");

        //set validations
        $this->form_validation->set_rules("txt_username", "Username", "trim|required");
        $this->form_validation->set_rules("txt_password", "Password", "trim|required");

        if ($this->form_validation->run() == FALSE)
        {
            //validation fails
            $this->load->view('view_Login');
        }
        else
        {
            //validation succeeds
            if ($this->input->post('btn_login') == "Login")
            {
                //check if username and password is correct
                $this->load->model('model_login');

                if($this->model_login->can_log_in()==true) {
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);

                    redirect('login/goHome');
                }
                /*$usr_result = $this->model_login->get_user($username, $password);
                if ($usr_result > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array(
                        'username' => $username,
                        'loginuser' => TRUE
                    );
                    $this->session->set_userdata($sessiondata);
                    redirect("index");
                }*/
                elseif($this->model_login->can_log_in()==false)
                {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                    redirect('login/login_Page');
                }
            }
            else
            {
                redirect('login/login_Page');
            }
        }
    }




    public function signup_validation(){

        $this->form_validation->set_rules('inputEmail','Email','required|trim|valid_email');
        $this->form_validation->set_rules('inputPassword','Password','required|trim');
        $this->form_validation->set_rules('confirmPassword','Confirm Password','required|trim|matches[inputPassword]');
        $this->form_validation->set_rules('fullName','Full Name','required|trim');
        $this->form_validation->set_rules('userName','User Name','required|trim');
        $this->form_validation->set_rules('captcha','Captcha','required');




        if($this->form_validation->run()){
            //generate a random key

            $key = md5(uniqid());

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'waaanjula@gmail.com',
                'smtp_pass' => 'anjula@1234',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $this->load->library('email',$config);

            $this->load->model('model_login');

            $this->email->set_newline("\r\n");
            $this->email->from('waaanjula@gmail.com',"Anjula");
            $this->email->to($this->input->post('inputEmail'));
            $this->email->subject('Confirm your Registration');

            $message = "<p> Thank you for Registering with us</p>";
            $message.="<p><a href='http://localhost/Registration/index.php/login/register_user/$key'>Click here</a> to activate your account</p>";

            $this->email->message($message);

            //get the capture value entered by user
            $userCapcha = $this->input->post('captcha');
            $word = $this->session->userdata('captchaword');




            // send mail to the users
            if($this->model_login->add_temp_user($key)){
                if($this->email->send()){
                    echo "Email has been successfully send ";
                }else{
                    echo "Error sending email";
                }
            }else{
                echo "Error adding user to the database";
            }

        }
        else{
            //echo "Fill required filed";
            $this->load->view('view_signup');
        }

        // add them to the temp table

    }

    public function register_user($key){
        $this->load->model('model_login');

        if($this->model_login->is_valid_key($key)){
            if($this->model_login->add_user($key)){
                echo "Your account has been activated";
            }else{
                echo "Error inserting data to user table";
            }

        }else{
            echo "Invalid confirmation URL";
        }
    }

    public function subscribe(){

        $this->load->view('view_subscribe');
    }

    public function subscribe_validation(){

        $this->form_validation->set_rules('phoneNo','Phone No','required|trim');
        $this->form_validation->set_rules('fullName','Full Name','required|trim');

        if($this->form_validation->run()){

        }else{
            $this->load->view('view_subscribe');
        }

    }

    public function captcha(){
        // set captcha
        $captcha = array(
            'captchaword' => 'Random 123',
            'img_path' => '.captcha',
            'img_url'=>'http://localhost/Registration/index.php/login/signup_validation',
            'font_path'=>'.fonts/impact.ttf',
            'img_width'=>'300',
            'img_height'=>'50',
            'experation'=>'3600'
        );

        $img = create_captcha($captcha);
        $data['image']=$img['image'];

        $this->load->view('view_captcha',$data);
    }



    /*public function sendMail()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'waaanjula@gmail.com',
            'smtp_pass' => 'anjula@1234',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $message = 'test message';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('waaanjula@gmail.com');
        $this->email->to('waaanjula@gmail.com');
        $this->email->subject('Your Subject');
        $this->email->message($message);

        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }

    }*/
}