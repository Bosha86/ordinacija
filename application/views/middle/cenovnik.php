<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 oNama-zaglavlje">
            <div class="oNama-filter">
                <div class="row">
                    <div class="col-5 offset-1">
                        <br/><br/>
                        <h1 style="color:white">CENOVNIK</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cenovnik-sredina">
        <div class="row">
            <div class="col-10 offset-1 text-center">
                <h4 style="color: gray; margin-top: 15px">Prvi pregled je uvek BESPLATAN</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-10 offset-1">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Usluga</th>
                        <th scope="col">Cena(RSD)</th>
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
            </div>
        </div>
    </div>
</div>
