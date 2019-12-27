<?php


?>

<h5>Usluge</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Usluga</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Komentar</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $rbr = 0;
                     $sum = 0;
                    foreach($usluge as $u){
                        $rbr +=1;
                        $idRad = $u['idRad'];
                        $datum = $u['datum'];
                        $usluga = $u['naziv'];
                        $cena = $u['cena'];
                        $komentar = $u['komentar'];
                        $sum += $cena;
                     ?>
                    <tr>
                            <th scope="row"><?php echo $rbr; ?></th>
                            <td><?php echo $datum ?></td>
                            <td><?php echo $usluga ?></td>
                            <td><?php echo $cena ?></td>
                            <td id="<?php echo $idRad ?>"><?php if($komentar !== null) echo $komentar; else{?><input type="button" value="Ostavi komentar" class="btn btn-primary" onclick="ostaviKomentar( <?php echo $idRad ?>)"><?php } ?></td>
                            
                     </tr>
                 <?php } ?>
                      
<!--                      PROVERI-->
                
                           <th scope="row" colspan="3">Ukupno</th>
                           <td><?php echo $sum; ?></td>
                </tbody>
            </table>