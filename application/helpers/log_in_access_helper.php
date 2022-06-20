<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->flashdata('warning', 'Anda Belum Login');
        redirect('auth');
    }
}

function role_id_1()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') != 1) {
        redirect('auth/blocked');
    }
}

function role_id_2()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') != 2) {
        redirect('auth/blocked');
    }
}
