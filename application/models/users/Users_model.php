<?php

class Users_model extends CI_model
{
    public function create($formArray)
    {
        $this->db->insert('users', $formArray);
    }

    public function checkUser($login_email)
    {
        return $user = $this->db->where('email', $login_email)->get('users')->row_array();
    }

    public function showData($user_id)
    {
        return $user = $this->db->where('user_id', $user_id)->get('users')->row_array();
    }

    public function createQuotes($formData)
    {
        $this->db->insert('quotes', $formData);
    }
}
