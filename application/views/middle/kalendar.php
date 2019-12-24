<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="kalendar-wrap container-fluid">
    <div class="kalendar-filter">
    
    
    <div id="myModal" class="modal">
                <div class="modal-content" id="modal-content">

                    <div class="modal-header">
                        <h4>Potvrdite zakazivanje termina</h4>
                        <span class="close">&times;</span>
                    </div>
                    
                    <div class="modal-body" id="modal-body">
                        Datum: <span id="datumZakazivanje"></span>
                        <br/>
                        Vreme: <span id="vremeZakazivanje"></span>
                        <br/>
                        Usluga: <span id="uslugaZakazivanje"></span>
                        <br/>
                        Odabrani doktor: <span id="doktorZakazivanje"></span>
                        <br/>
                    </div>


                    <div class="modal-footer">
                        <div id="modal-buttons">
                            <button id="zakazivanjeDugme" class="btn btn-success">Zakazi</button>
                            <button id="odustajanjeDugme" class="btn btn-danger">Odustani</button>
                        </div>
                    </div>

                </div>
            </div>
        
        <div class="loader-pozadina" id="loader">
            <div class="lds-dual-ring"></div>
        </div>
    
    
    
    <div class="row">
    <div id="kalendar-div" class="col-5 offset-2">
        <div class="kalendar-front">
            <input type="hidden" id="usluga" value="<?php echo $usluga?>">
             <input type="hidden" id="nazivUsluge" value="<?php echo $naziv?>">
<?php
 echo $kalendar;
?>
            
            <div id="termini-div"></div>
        </div>
    </div>
    </div>
    </div>
</div>

<script>

    function prikaziDan(datum){
//        FUNKCIJA ZA PRIKAZIVANJE SLOBODNIH I ZAUZETIH TERMINA ZA ODREDJENU DAN
//        IZVRSAVA SE KAD KLIKNEMO NA NEKI DAN NA KALENDARU
            var danas = new Date();
            var odabraniDan = new Date(datum);
//        AKO SMO KLIKNULI NA PRAZNO POLJE (NEMA DATUMA)
//        ONDA CE NAM PRIKAZATI SLEDECU PORUKU
        if(datum == ""){
            alert("Molimo vas, odaberite validan datum.");
//            U SUPROTONM, AKO SMO KLIKNULI NA DAN KOJI JE VECI OD DANAS
//            DAKLE NIJE U PROSLOSTI
//            ONDA CE UCI U FUNKCIJU
        }else if(odabraniDan >= danas){
//            KAZE AKO NISMO ODABRALI DOKTORA
//            ONDA MI AUTOMATSLI POKAZI SLOBODNE TERMINE ZA DOKTORA
//            SA ID-JEM 1
        var doktorProvera = document.getElementById("doktor");
        if(doktorProvera == null){
            var doktor = 1;
        }else{
//            U SUPROTONOM, AKO JESMO ODABRALI DOKTORA U PADAJUCOJ LISTI
//            PRIKAZI MI PODATKE ZA DOKTORA KOG SMO ODABRALI
            var doktor = doktorProvera.value;
        }
         xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
//                        DOBIJENI ODGOVOR AJAX-A ISPISUJEM U DIVU SA ID-JEM "TERMINI-DIV"
                document.getElementById('termini-div').innerHTML = (this.responseText);
                 }
                };
//                SVE PODATKE SALJEM U KONTROLER REZERVACIJE, U METODU PRIKAZItERMINE
                xmlhttp.open("GET", "<?php echo site_url('Rezervacija/prikaziTermine') ?>?datum="+datum+"&doktor="+doktor, true);
                xmlhttp.send();
            }else{
//                U SUPROTNOM, AKO SMO ODABRALI DATUM KOJI JE U PROSLOSTI
//                KAZE SLEDECE:
                alert("Molimo vas, odaberite drugi datum. Termine je moguce zakazivati najmanje dan unapred.");
            }
    }
    
    function zakaziTermin(datum){
//        FUNKCIJA ZA ZAKAZIVANJE TERMINA
        var terminProvera = document.querySelector('input[name="vreme"]:checked');
        if(terminProvera == null){
//            AKO NISAM KLIKNULA NI NA JEDAN TRMIN
//            ONDA MI POKAZI OVU PORUKU
            alert("Morate odabrati vreme da biste zakazali termin");
        }else{
//            U SUPROTON, POKUPI SVE PODATKE 
            var doktor = document.getElementById("doktor").value;
            var usluga = document.getElementById("usluga").value;
            var termin = terminProvera.value; 
//            POZOVI MI F-JU ZA POTVRDU ZAKAZIVANJA
//            F-JA ZA POTVRDU ZAKAZIVANJA PRIKAZUJE MODAL
//            U KOM SE ISPISUJU SVI PODACI ZA TERMIN
//            I TRAZI NAM DA POTVRDIMO ILI ODUSTANEMO
            potvrdiZakazivanje(datum, termin);
            
            document.getElementById("zakazivanjeDugme").onclick = function(){
                    xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function(){
                        if(this.readyState!==4){
                            document.getElementById("loader").style.display = "flex";
                        }
                        
                        else if(this.readyState==4&&this.status==200){ 
                            document.getElementById("loader").style.display = "none";
                            document.getElementById("modal-body").innerHTML=this.responseText;
                            document.getElementById("modal-buttons").innerHTML = "";
                        }
                    };
            xmlhttp.open("POST", "<?php echo site_url('Rezervacija/rezervisi'); ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("datum="+datum+"&doktor="+doktor+"&usluga="+usluga+"&termin="+termin);
            
            };

            document.getElementById("odustajanjeDugme").onclick = function(){
                document.getElementById("myModal").style.display = "none";
            }; 
        }
    }
    
    function potvrdiZakazivanje(datum, termin){
        
       var selectLista = document.getElementById("doktor");
       var imeDoktora = selectLista.options[selectLista.selectedIndex].innerHTML;
       var nazivUsluge = document.getElementById("nazivUsluge").value;
       
        var modal = document.getElementById("myModal");  
        modal.style.display = "block";
        
        document.getElementById("datumZakazivanje").innerHTML = datum;
        document.getElementById("vremeZakazivanje").innerHTML = termin;
        document.getElementById("uslugaZakazivanje").innerHTML = nazivUsluge;
        document.getElementById("doktorZakazivanje").innerHTML = imeDoktora;
    }
    
   
    var modal = document.getElementById("myModal"); 
    var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";   
        };
        

    
 


    </script>
