<!DOCTYPE html>

<?php 
$sviZauzetiTermini = [];
foreach ($zauzetiTermini as $termin){
 $datum = $termin['datum'];
 $vreme = $termin['vreme'];
 $idKor = $termin['idKor'];
 $idDok = $termin['idDok'];
 $idUsl = $termin['idUsl'];
 $naziv = $termin['naziv'];
 $imeKor = $termin['korisnikIme'];
 $prezKor = $termin['korisnikPre'];
 $imeDok = $termin['ime'];
 $prezDok = $termin['prezime'];
 array_push($sviZauzetiTermini, $vreme);
}



?>

<div class="termini-admin">
    <?php 
    foreach ($sati as $sat){
        $satZaIspis=date("H:i", strtotime($sat));
         if(!empty($sviZauzetiTermini)){
        if(in_array($sat, $sviZauzetiTermini)){ 
    ?>
        <div class="termin-admin-zauzeto"><?php echo $satZaIspis."<br/>".$idUsl?></div>
        <?php 
        }else{ ?>
        <div class="termin-admin"><?php echo $satZaIspis?></div>
    <?php 
        }
        }else{ ?>
         <div class="termin-admin"><?php echo $satZaIspis?></div>
        <?php }
    }?>
</div>