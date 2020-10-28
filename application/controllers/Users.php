<?php

class Users extends CI_Controller
{
    //Everything related to user authentication
    //*******************************************************************************************************************
    //index functionality
    public function index()
    {
        //blocking manual redirection
        if (!empty($this->session->userdata['isLoggedIn'])) {
            $this->load->model('users/Users_model');
            $this->load->view('users/dashboard');
            redirect(base_url() . 'index.php/Users/login');
        } else {
            $this->load->view('users/index');
        }
    }

    //register functionality
    public function register()
    {
        //blocking manual redirection
        if (!empty($this->session->userdata['isLoggedIn'])) {
            $this->load->model('users/Users_model');
            $this->load->view('users/dashboard');
            redirect(base_url() . 'index.php/Users/login');
        } else {
            $this->load->model('users/Users_model');

            //validation
            $this->form_validation->set_rules('full_name', 'Full Name: ', 'required');
            $this->form_validation->set_rules('email', 'E-mail: ', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password: ', 'required');

            //check if valid
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('users/register');
            } else {
                //save data to database
                $formArray = array();
                $formArray['full_name'] = $this->input->post('full_name');
                $formArray['email'] = $this->input->post('email');
                $hashedPassword = $this->input->post('password');
                $formArray['password'] = password_hash($hashedPassword, PASSWORD_DEFAULT);
                $formArray['created_at'] = date('Y-m-d H:i:s');
                $this->Users_model->create($formArray);
                redirect(base_url() . 'index.php/Users/login');
            }
        }
    }


    //login functionality
    public function login()
    {
        //loading model
        $this->load->model('users/Users_model');

        //check for session login
        if (!empty($this->session->userdata['isLoggedIn'])) {
            $returnedUser['user'] = $this->Users_model->showData($this->session->userdata['user_id']);
            redirect(base_url() . 'index.php/Users/dashboard');
        } else {
            //form validation
            $this->form_validation->set_rules('login_email', 'E-mail: ', 'required|valid_email');
            $this->form_validation->set_rules('login_password', 'Password: ', 'required');

            //getting input values
            $login_email =  $this->input->post('login_email');
            $login_password = $this->input->post('login_password');

            //check if valid
            if ($this->form_validation->run() == false) {
                $this->load->view('users/login');
            } else {
                //check if user exists in database
                $returnedUser['user'] = $this->Users_model->checkUser($login_email);
                if (!empty($returnedUser['user'])) {
                    if (!empty(password_verify($login_password, $returnedUser['user']['password']))) {
                        $this->session->set_userdata('user_id', $returnedUser['user']['user_id']);
                        $this->session->set_userdata('isLoggedIn', true);
                        redirect(base_url() . 'index.php/Users/dashboard');
                    } else {
                        $this->load->view('users/login');
                        echo "<script>alert('Wrong username or password!')</script>";
                    }
                } else {
                    $this->load->view('users/login');
                    echo "<script>alert('Wrong username or password!')</script>";
                }
            }
        }
    }

    //logout functionality
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/Users/index');
    }


    public function dashboard()
    {
        //bloacking manual redirection
        if (!empty($this->session->userdata['isLoggedIn'])) {
            $this->load->model('users/Users_model');
            $returnedUser['user'] = $this->Users_model->showData($this->session->userdata['user_id']);
            $data['user'] = $returnedUser['user'];
            //loading the quotes in the dashboard
            $allQuotes['quotes'] = $this->Users_model->loadQuotes();
            $data['quotes'] = $allQuotes['quotes'];
            $allData['data'] = $data;
            $this->load->view('users/dashboard', $allData);
        } else {
            redirect(base_url() . 'index.php/Users/login');
        }
    }

    //User authentication finished
    //*************************************************************************************************************************


    //Everything related to the quotes collection

    public function createQuote()
    {
        $this->load->model('users/Users_model');
        $this->form_validation->set_rules('quote_body', 'Quote', 'required|is_unique[quotes.quote_body]');
        $this->form_validation->set_rules('quote_author', 'Author', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('quotes/create');
        } else {
            $formData = array();
            $formData['quote_body'] = $this->input->post('quote_body');
            $formData['quote_author'] = $this->input->post('quote_author');
            $formData['created_at'] = date('Y-m-d H:i:s');

            $this->Users_model->createQuotes($formData);
            redirect(base_url() . 'index.php/Users/dashboard');
        }
    }

    //updating
    public function edit($quote_id)
    {
        $this->load->model('users/Users_model');
        $quote['quote'] = $this->Users_model->getSpecificQuote($quote_id);

        $this->form_validation->set_rules('quote_body', 'Quote', 'required|is_unique[quotes.quote_body]');
        $this->form_validation->set_rules('quote_author', 'Author', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('quotes/edit', $quote);
        } else {
            $formData = array();
            $formData['quote_body'] = $this->input->post('quote_body');
            $formData['quote_author'] = $this->input->post('quote_author');

            $this->Users_model->updateQuote($quote_id, $formData);
            redirect(base_url() . 'index.php/Users/dashboard');
        }
    }

    //deleting
    public function delete($quote_id)
    {
        $this->load->model('users/Users_model');
        $this->Users_model->delete($quote_id);
        redirect(base_url() . 'index.php/Users/dashboard');
    }
}
