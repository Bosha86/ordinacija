<!DOCTYPE html>
<html>
     <head>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/CSS/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg negativ" id="header">
            <div class="collapse navbar-collapse" id="nav">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Login')?>#kontakt">Kontakt</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Login')?>#cenovnik">Cenovnik</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Login/tim')?>">Naš tim</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Login/oNama')?>">O nama</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Login')?>">Početna</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link dugme" href="<?php echo site_url('Registracija')?>">Registracija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dugme" href="#" onclick="prikaziLogin()">Login</a>
                </li>
              </ul>   
	    <div>   
        </div>
        <div class="navbar-brand"><img id="brand-image" src="<?php echo base_url()?>images/logo_header.png" alt="logo" class="logo"></div>
    </nav>  
        
        <div id="myModal" class="modal">
                <div class="modal-content" id="modal-content">

                    <div class="modal-header">
                        <h4>Login</h4>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body" id="modal-body">
                        <?php if($this->session->flashdata('log') == "false") echo "Pogresni podaci. Pokusajte ponovo. <br/><br/>"?>
                         <form  name="loginForma" method="POST" action="<?php echo site_url('Login/login')?>">
                            <div class="form-row">
                                <div class="col-8 offset-2">
                                    <input class="form-control" type="text" name="korisnicko" placeholder="Korisničko ime" required oninvalid="this.setCustomValidity('Unesite korisnicko ime')" oninput="this.setCustomValidity('')" />
                                    <div id="korisnicko-greska"></div>       
                            <br/>
                            <input class="form-control" type="password" placeholder="Lozinka" name="lozinka" required oninvalid="this.setCustomValidity('Unesite lozinku')" oninput="this.setCustomValidity('')" />
                            <div id="lozinka-greska"></div>  
                            <small><a href="<?php echo site_url('Reset_lozinke')?>">Zaboravili ste lozinku?</a></small>
                                </div>
                            </div>
                            <br/>
                            <button class="btn btn-outline-warning" type="submit">Login</button>
                         </form>
                    </div>
                    <div class="modal-footer">
                        <img src="<?php echo base_url()?>images/logo_header.png" style="max-width: 200px;">
                    </div>

                </div>
        </div>
        
        <script>
            function prikaziLogin(){
            var modal = document.getElementById("myModal");  
            modal.style.display = "block";
        }
    
            var modal = document.getElementById("myModal"); 
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
                modal.style.display = "none";   
            };
     
        <?php if($this->session->flashdata('log') == "false"){ ?>
            prikaziLogin();
        <?php } ?>
           </script>
    
    