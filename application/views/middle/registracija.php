<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


        <form name="registracija" method="POST" action="<?php site_url('Registracija/regKor') ?>">

            <div class="row">
                <div class="form-group col-md-3 offset-2">
                    <input type="text" name='ime' class="form-control" placeholder="Ime">
                    <input type="text" name='korisnicko' class="form-control" placeholder="Korisnicko ime">
                    <input type="password" name="lozinka" class="form-control" placeholder="Lozinka">
                    <input type="text" name="telefon" class="form-control", placeholder="Broj telefona">
                    <button type="submit" class="btn btn-primary">Registruj se</button>      
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name='prezime' class="form-control" placeholder="Prezime">
                    <input type="email" name='email' class="form-control" placeholder="E-mail adresa">
                    <input type="password" name='ponLozinka' class="form-control" placeholder="Ponovi lozinku">
                    <input type="date" name='rodjen' class="form-control" placeholder="Datum rodjenja">


                </div>

            </div>


        </form>


    </body>
</html>
