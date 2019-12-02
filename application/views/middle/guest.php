<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php if($this->session->flashdata('regPoruka')!==null){ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0">
        <strong><?php echo $this->session->flashdata('regPoruka');?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php } ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 pocetna-slider">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor.jpg'?>" alt="First slide">
                    <div class="carousel-caption">
                            <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Stomatološka ordinacija "Unident PRO"</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">
                                 <p>Već 20 godina brinemo o Vašem osmehu</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Login/oNama')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor2.jpg'?>" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Naš tim čine najbolji stručnjaci u zemlji</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">
                                 <p>Iz naše ordinacije se ne izlazi bez osmeha</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Login/tim')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor6.jpg'?>" alt="Third slide">
                    <div class="carousel-caption">
                        <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Nudimo sve vrste usluga na jednom mestu</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">

                                 <p>Smejemo se zajedno sa vama od 1999. godine</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Login/usluge')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
        </div> 
      </div>
    </div>
    
    <div class="row">
        <div class="col-8 offset-2 podnaslov text-center">
            <p style="color:gray">DUGOGODIŠNJE ISKUSTVO - NAJSAVREMENIJA TEHNOLOGIJA - STRUČNJACI OD POVERENJA</p>
            <h1 style="color:#809fff; font-weight: bold;">Ostanite nasmejani i zdravi</h1>
            <p style="color:gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Consectetur, mollitia amet nihil! Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
    </div>
    
    <div class="container marketing">
    <div class="row">
      <div class="col-lg-4 text-center">
          <img src="<?php echo base_url().'/usluge/beljenje.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#809fff">Beljenje</h2>
        <p style="color:gray">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p><a class="btn btn-outline-info" href="<?php echo site_url('Login/usluge')?>#beljenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
        <img src="<?php echo base_url().'/usluge/vadjenje.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#809fff">Vađenje</h2>
        <p style="color:gray">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-outline-info" href="<?php echo site_url('Login/usluge')?>#vadjenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
       <img src="<?php echo base_url().'/usluge/anestezija.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#809fff">Lečenje</h2>
        <p style="color:gray">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-outline-info" href="<?php echo site_url('Login/usluge')?>#lecenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    </div>
    
    <div class="container-fluid" style="padding: 0;" id="oNama">
    <div class="row">
        <div class="col-12" style="padding: 0;">
           
            <div class="parallax">
                 <div class="parallax-unutra">
                     <div class="parallax-sadrzaj">
                         <br/><br/>
                            <div class="row">
                                <div class="col-10 offset-1 text-center">
                                <h1 style="color:white; font-weight: bold">Zbog čega izabrati baš "Unident PRO"</h1>
                                </div>
                            </div>
<!--                         <br/><br/>-->
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/dental-care.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Dve decenije poverenja</h2>
                                 <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/dental.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Lider u protetici</h2>
                                 <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/smile.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Vaš osmeh je naš posao</h2>
                                 <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                           <br/>
                        <div class="row parallax-btn">
                            <div class="col-4 offset-4 text-center">
                                <a href="<?php echo site_url('Login/oNama')?>" class="btn btn-warning">Vise o nama</a>
                            </div>
                         </div> 
                           <br/>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="container-fluid doktori-pocetna">  
     <div class="row">
         <div class="col-10 offset-1 text-center">
             <h1 style="margin-bottom: 30px; color:#809fff">Upoznajte naš tim</h1>
         </div>
     </div>
    <div class="card-group">
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Login/tim')?>#markovic"><h3 class="card-title">Dr Marko Markovic</h3></a>
          <h6 class="card-text"> Specijalista ortopedije vilica</h6>
          
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor4.jpeg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Login/tim')?>#brankovic"><h3 class="card-title">Aleksandra Brankovic</h3></a>
          <h6 class="card-text">Viši zubni tehnicar</h6>
          
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor2.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Login/tim')?>#rasic"><h3 class="card-title">Dr Biljana Rasic</h3></a>
          <h6 class="card-text">Specijalista oralne horurgije</h6>
          
        </div>
      </div>
        <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor5.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Login/tim')?>#glisic"> <h3 class="card-title">Dr Bojan Glisic</h3></a>
          <h6 class="card-text">Decija stomatologija</h6>
          
        </div>
      </div>
    </div>
 </div>
    
    
    <div class="cenovnik container-fluid" id="cenovnik">
        <div class="row">
            <div class="col-12 text-center cenovnik-naslov">
                <h1 style="padding: 10px;">Cenovnik</h1>
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
    
    <div class="container-fluid onlajn-zakazivanje">
        <div class="row">
            <div class="col-12" style="padding: 0">
            <div class="parallax1">
                <div class="row">
                <div class="parallax1-unutra col-lg-6 offset-lg-6 col-md-8 offset-md-4 col-sm-10 offset-sm-2">
                    <div class="parallax1-sadrzaj">
                        <div class="row">
                            <div class="col-10 offset-1">
                                <h2 class="hidden"> Brzo i jednostavno online zakazivanje </h2>
                            </div>
                                
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 col-lg-6 grafika-korak hidden">
                                <span class="broj-korak">
                                    <img src="<?php echo base_url().'/images/registracija.png'?>" class="parallax1-img">
                                </span>
                                
                                <span class="tekst-korak">
                                    <h4>Napravite nalog</h4>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 offset-lg-3 col-lg-6 grafika-korak-desno hidden">
                                <span class="broj-korak-desno">
                                    <img src="<?php echo base_url().'/images/stolica.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak-desno">
                                <h4>Odaberite uslugu</h4>
                                </span>
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 col-lg-6 grafika-korak hidden">
                                <span class="broj-korak">
                                    <img src="<?php echo base_url().'/images/kalendar.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak">
                                <h4>Odaberite termin</h4>
                                </span>
                            </div>                         
                            
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 offset-lg-3 col-lg-6 grafika-korak-desno hidden">
                                <span class="broj-korak-desno">
                                    <img src="<?php echo base_url().'/images/ok.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak-desno">
                                <h4>Rezervisano!</h4>
                                </span>
                            </div>                         
                        </div>
                        <div class="row hidden"> 
                            <div class="col-10 offset-1 text-center">
                                <a href="<?php echo site_url('Registracija')?>" class="btn btn-warning" style="margin-top: 15px;">Registrujte se</a>
                                <br/>
                                <a href="#" onclick="prikaziLogin()"><small class="malo">Vec imate nalog?</small></a>
                            </div>
                        </div>
                        
                    </div> 
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    
     <div class="contact-us" id="kontakt">
         <div class="row">
             <div class="col-12 text-center">
                 <h2 style="margin-bottom: 30px; color: #809fff">Kontakt</h2>
             </div>
         </div>
       <div class="container">
          <div class="contact-form">
           <div class="row">
               <div class="col-sm-7">                  
                    <form id="ajax-contact"  method="post" action="contact-form-mail.php" role="form">
                        <div class="messages" id="form-messages"></div>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Unesite ime *" required="required" data-error="Ime je obavezno">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Unesite prezime *" required="required" data-error="Prezime je obavezno">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Unesite validan email *" required="required" data-error="Validan email je obavezan">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone"  class="form-control" placeholder="Unesite broj telefona *">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Vasa poruka *" rows="4" required="required" data-error="Molimo vas unesite poruku"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-warning" value="Pošalji">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <br>
                                    <small class="text-muted"><strong>*</strong> Obavezna polja</small>
                                </div>
                            </div>
                        </div>

                    </form>
    
               </div>
               <div class="col-sm-5">
                   <div class="row col1">
                       <div class="col-sm-3">
                           <i class="fa fa-map-marker" style="font-size:16px;"></i>   Adresa
                       </div>
                       <div class="col-sm-9">
                            Goce Delčeva 25,<br> 11000 Beograd
                       </div>
                   </div>
                   
                    <div class="row col1">
                        <div class="col-sm-3">
                            <i class="fa fa-phone"></i>   Telefon
                        </div>
                        <div class="col-sm-9">
                             011/245-46-72
                        </div>
                    </div>
                    <div class="row col1">
                        <div class="col-sm-3">
                             <i class="fa fa-fax"></i>    Fax  
                        </div>
                        <div class="col-sm-9">
                              123 123 4567
                        </div>
                    </div>
                    <div class="row col1">
                        <div class="col-sm-3">
                            <i class="fa fa-envelope"></i>   Email
                        </div>
                        <div class="col-sm-9">
                             <a href="mailto:info@yourdomain.com">info@yourdomain.com</a> <br> <a href="mailto:support@yourdomain.com">support@yourdomain.com</a>
                        </div>
                    </div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.54423558349!2d20.413088515407654!3d44.830848879098575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a657496db33af%3A0xdf83e23ece0bd8d4!2z0JPQvtGG0LUg0JTQtdC70YfQtdCy0LAgMjUsINCR0LXQvtCz0YDQsNC0!5e0!3m2!1ssr!2srs!4v1575110300619!5m2!1ssr!2srs" width="450" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
               </div>
           </div>
           
          </div>
       </div>
   </div>
    
    
    
    
</div>

<script>
    
    (function() {
  var elements;
  var windowHeight;

  function init() {
    elements = document.querySelectorAll('.hidden');
    windowHeight = window.innerHeight;
  }

  function checkPosition() {
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      var positionFromTop = elements[i].getBoundingClientRect().top;

      if (positionFromTop - windowHeight <= 0) {
        element.classList.add('fade-in-element-naslov');
        element.classList.remove('hidden');
      }
    }
  }

  window.addEventListener('scroll', checkPosition);
  window.addEventListener('resize', init);

  init();
  checkPosition();
})();
    
    </script>



  

   


