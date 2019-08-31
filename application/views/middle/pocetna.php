<div>
    <?php echo '..   ' ?>        
</div>

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
        <div class="col-6 col-sm">

            <h5>Usluge</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Vreme</th>
                        <th scope="col">Status</th>
                        <th scope="col">Naziv</th>
                        <th scope="col">Cena</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                     $rbr = 0; 
                    foreach ($prethodneUsluge as $p) {
                       $rbr +=1;
                        $datum = $p['datum'];
                        $vreme = $p['vreme'];
                        $status = $p['stanje'];
                        $naziv = $p['naziv'];
                        $cena = $p['cena'];
                        ?>     
                        <tr>
                            <th scope="row"><?php echo $rbr; ?></th>
                            <td><?php echo $datum ?></td>
                            <td><?php echo $vreme ?></td>
                            <td><?php
                                if ($status == 'u') {
                                    echo '<p style="color:blue">'.'uradjeno'.'</p>';
                                } else if ($status == 'z') {
                                    echo '<p style="color:green">'.'zakazano'.'</p>';
                                } else if ($status == 'o') {
                                    echo '<p style="color:red">'.'otkazano'.'</p>';
                                }
                                ?></td>
                            <td><?php echo $naziv ?></td>
                            <td><?php echo $cena ?></td>
                        </tr>
<?php } ?>

                </tbody>
            </table>



        </div>
    </div>
</div>
