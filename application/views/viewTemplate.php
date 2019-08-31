<?php

if ($this->session->user == null) {
    $this->load->view("headers/header");
    $this->load->view($middle, $middle_data ?? []);
    $this->load->view("footers/footer");
} else if ($this->session->userdata('user')) {
    $this->load->view("headers/userHeader");
    $this->load->view($middle, $middle_data ?? []);
    $this->load->view("footers/footer");
}