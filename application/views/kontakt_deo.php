<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="contact-us" id="kontakt">
         <div class="row">
             <div class="col-12 text-center">
                 <h2 style="margin-bottom: 30px; color: #894186">Kontakt</h2>
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
                                    <input type="submit" class="btn btn-pocetna" value="Pošalji">
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