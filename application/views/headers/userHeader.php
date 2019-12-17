<!DOCTYPE html>
<html>
     <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/CSS/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>

   <body>
        <nav class="navbar navbar-expand-lg negativ" id="header">
            <div class="collapse navbar-collapse" id="nav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('User/logout')?>" class="dugme">Izloguj se</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Stranice/kontakt')?>">Kontakt</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Stranice/cenovnik')?>">Cenovnik</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Stranice/tim')?>">Naš tim</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Stranice/oNama')?>">O nama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('User')?>">Pocetna</a>
                </li>
              </ul>   
	    <div>   
        </div>
        <div class="navbar-brand"><img id="brand-image" src="<?php echo base_url()?>images/logo_header.png" alt="logo" class="logo"></div>
    </nav>  
    
    