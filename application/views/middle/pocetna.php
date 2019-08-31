<?php
$user = $this->session->userdata('user');
$korisnicko = $user['korisnicko'];
$ime = $user['ime'];
$prezime = $user['prezime'];
$email = $user['email'];
$tel = $user['telefon'];
$rodjendan = $user['rodjen'];
?>

<div class="container">
    <div class="row">
        <div class="col-6 col-sm">
        <h5> Dobrodosao/la,   <?php echo $korisnicko ?> </h5>
            <div class="licniPodaci">
                <table class="table table-bordered">
  <thead>
    <tr>
      
      <th scope="col" colspan="2">Lični podaci</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Ime</th>
      <td> <?php echo $ime ?></td>   
    </tr>
    <tr>
      <th scope="row">Prezime</th>
      <td> <?php echo $prezime ?></td>
    </tr>
    <tr>
      <th scope="row">E-mail adresa</th>
      <td> <?php echo $email ?></td>
      
    </tr>
     <tr>
      <th scope="row">Kontakt telefon</th>
      <td colspan="2"> <?php echo $tel ?></td>
   
    </tr>
     <tr>
      <th scope="row">Datum rođenja</th>
      <td colspan="2"> <?php echo $rodjendan ?></td>
   
    </tr>
  </tbody>
</table>
            </div>
        </div>
    </div>
</div>
