<?php

class Users_model extends CI_model
{
    //everything related to the user
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


    //everything related to the quotes
    public function createQuotes($formData)
    {
        $this->db->insert('quotes', $formData);
    }

    public function loadQuotes()
    {
        return $this->db->get('quotes')->result_array();
    }

    public function getSpecificQuote($quote_id)
    {
        return $this->db->where('quote_id', $quote_id)->get('quotes')->row_array();
    }

    public function updateQuote($quote_id, $formData)
    {
        return $this->db->where('quote_id', $quote_id)->update('quotes', $formData);
    }

    public function delete($quote_id)
    {
        return $this->db->where('quote_id', $quote_id)->delete('quotes');
    }
}
