<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="kalendar-wrap container-fluid">
    <div class="row">
    <div id="kalendar-div" class="col-5 offset-2">
<?php
 echo $kalendar;
?>
    </div>
    <div id="termini-div" class="col-4 offset-1">
        
    </div>
    </div>
</div>

<script>

    function prikaziDan(datum){
        var doktorProvera = document.getElementById("doktor");
        if(doktorProvera == null){
            var doktor = 1;
        }else{
            var doktor = doktorProvera.value;
        }
//        console.log(datum);
         xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                document.getElementById('termini-div').innerHTML = (this.responseText);
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('Rezervacija/prikaziTermine') ?>?datum="+datum+"&doktor="+doktor, true);
                xmlhttp.send();
    }
    </script>
