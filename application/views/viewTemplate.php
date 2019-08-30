<?php

 $this->load->view("headers/header");
 $this->load->view($middle, $middle_data ?? []);
 $this->load->view("footers/footer");