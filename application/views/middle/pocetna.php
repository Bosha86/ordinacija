<!--<div>
    <?php //echo '..   ' ?>        
</div>-->
<?php
//$user = $this->session->userdata('user');
foreach ($users as $user){
$korisnicko = $user['korisnicko'];
$ime = $user['ime'];
$prezime = $user['prezime'];
$email = $user['email'];
$tel = $user['telefon'];
$rodjendan = $user['rodjen'];
$month = date("m",time());
$year = date("Y",time()); 
}
?>
<div class="container" id="pocetnaUser">
    <div class="row">
        <div class="col-6">
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
            <?php if($korisnicko == $this->session->userdata('user')['korisnicko']){ ?>
            <a href="<?php echo site_url('Rezervacija/index') ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Rezervisi termin</a>
            <?php } ?>
            <button class="btn btn-danger btn-lg float-right" id="dugmePrikazi">Termini</button>
            
        </div>
        <div class="col-6" id="termini">
            <h5>Termini</h5>
          <div class="termini-unutra" id="skrol">
            <table class="table table-bordered tabela-termini">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Vreme</th>
                        <th scope="col">Zakazana usluga</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                     $rbr = 0; 
                    foreach ($termini as $t) {
                       $rbr +=1;
                        $idTer = $t['idTer'];
                        $datum = $t['datum'];
                        $vreme = $t['vreme'];
                        $status = $t['stanje'];
                        $usluga = $t['naziv'];
                     
                        ?>     
                        <tr>
                            <th scope="row"><?php echo $rbr; ?></th>
                            <td><?php echo $datum ?></td>
                            <td><?php echo $vreme ?></td>
                            <td><?php echo $usluga ?></td>
                            <td><?php
                                if ($status == 'u') {


                                    echo "<a href= '#' onmouseover='termin($idTer)' ><p style='color:blue'>uradjeno</p></a>";

                                } else if ($status == 'z') {
                                    echo '<p style="color:green">'.'zakazano'.'</p>'
                                             ."<a href= '#' onclick='otkazi($idTer); window.location.reload() '><p style='color:lightgreen'>otkaži</p></a>";
                                } else if ($status == 'o') {
                                    echo '<p style="color:red">'.'otkazano'.'</p>';
                                }
                                ?></td>
                           
                        </tr>
<?php } ?>

                </tbody>
            </table>
           
            </div>
        </div>
    </div>
    
     <div id="usluge"></div>
</div>
<script>
               function termin(idTer) {
               
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                document.getElementById('usluge').innerHTML = (this.responseText);
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('User/usluge') ?>?idTer=" +idTer, true);
                xmlhttp.send();
           
            } 
            
            function otkazi(idTer) {
               
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                };
                xmlhttp.open("GET", "<?php echo site_url('User/otkazTermina') ?>?idTer=" +idTer, true);
                xmlhttp.send();
           
            } 
            
            var terminiDiv = document.getElementById("termini");
            var dugmePrikazi = document.getElementById("dugmePrikazi");
            dugmePrikazi.onclick = function(){
                terminiDiv.style.display = "block";
            };


           </script>

        </div>
    </div>
</div>
