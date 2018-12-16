<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create</title>

        <!-- Fonts -->

       <link rel='stylesheet' id='admin-css'  href='admin.css' type='text/css' media='all' />
        <link rel='stylesheet' id='colors-fresh-css'  href='colors-fresh.css' type='text/css' media='all' />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" /> 

         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Styles -->
    </head>
    <body>

<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Ubah Profil</h1>
    </div>
</div>

<section>
    <div class="container">
        <div class="row reg-heading head2">
            <?php
                if($this->session->flashdata("message") != ''){
                    echo $this->session->flashdata("message");
                }
            ?> 
        </div>
    </div>
</section>

<?php
        if(is_array($profil)){
            foreach($profil as $data){
?>
<section class="form-reg">
    <div class="container">
        <form class="form-group" role="form" name="myForm" id="formedprofil" action="<?php echo base_url('beranda/doUbah')?>" method="post"  enctype="multipart/form-data" onsubmit="return validateForm()">

            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="nama" class="control-label">Nama</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data['nama']; ?>">
                </div>
            </div>


            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="bod" class="control-label">Bod</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="bod" class="form-control" id="datepicker" value="<?php echo $data['bod']; ?>">
                </div>
            </div>

            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="address" class="control-label">Address</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="address" class="form-control" id="address" value="<?php echo $data['address']; ?>">
                </div>
            </div>

            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="email" class="control-label">Email</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo $data['email']; ?>">
                </div>
            </div>


            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="foto" class="control-label">Foto</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="file" name="foto" class="form-control" id="foto" value="<?php echo $data['foto']; ?>">
                </div>
            </div>
           
             <div class="col-md-offset-3">
                <input type="submit" name="submit" value="submit" class="btn btn-success">
            </div>
        </form>
    </div>
</section>
<?php
            }
    } else {
?>
<div class="container">
    <div class="row materi-msg">
        <div class="item-reg text-center">
                <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
        </div>
    </div>
</div>
<?php
    }
?>

        <script>
          $( function() {
            $( "#datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: 'yy-mm-dd'
            });
          } );
         </script>

        <script>
        function validate(evt) {
          var theEvent = evt || window.event;

          // Handle paste
          if (theEvent.type === 'paste') {
              key = event.clipboardData.getData('text/plain');
          } else {
          // Handle key press
              var key = theEvent.keyCode || theEvent.which;
              key = String.fromCharCode(key);
          }
          var regex = /[0-9]|\./;
          if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
          }
        }

        function validateForm() {
            var nama = document.forms["myForm"]["nama"].value;
            var bod = document.forms["myForm"]["bod"].value;
            var address = document.forms["myForm"]["address"].value;
            var email = document.forms["myForm"]["email"].value;
            var foto = document.forms["myForm"]["foto"].value;
            
            
            if (nama == "" || bod == "" || address == "" || email == "" || foto == "") {
                alert("semua form harus diisi");
                return false;
            }
           
            else
            {
                var myform = document.getElementById("myForm");
                var fd = new FormData(myForm );

                    $.ajax({
                    type: 'post',
                    url: '/send',
                    data: fd,
                    success: function(data) {
                        alert(data);
                    }
                });
            }
        }
        </script>
</body>
</html>