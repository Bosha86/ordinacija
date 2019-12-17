<!DOCTYPE html>

<?php 
//foreach ($zauzetiTermini as $termin){
//    $imeDok = $termin['doktor.ime'];

var_dump($zauzetiTermini);


?>

<table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                          
                         <th scope='col'><?php echo $ime?></th>;   
                          
                        
                      </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($usluge as $usluga){
                            $naziv = $usluga['naziv'];
                            $cena = $usluga['cena'];          
                        ?>
                      <tr>
                        <td><?php echo $naziv ?></td>
                        <td><?php echo $cena ?></td>
                      </tr> 
                        <?php } ?>
                      
                    </tbody>
                </table> 
