<?php

function user_login()
{
    $ci = get_instance();
    $ci->load->model('Auth_m', 'auth');
    // $this->$ci->load->model('user_m');
    $user_id = $ci->session->userdata('userid');
    $user_data = $ci->auth->get($user_id)->row();
    return $user_data;
}

function is_login()
{
    $ci = get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session) {
        redirect('login');
    }
}

?>
