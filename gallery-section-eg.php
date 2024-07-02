<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Azurite Engineering PLT</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <style>
        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        }
        .column {
            grid-column: span 3 ;
            width: auto;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }        
        .container-xxl {
            padding-left: 50px;
            padding-right: 50px;
        }
    </style>

  </head>
  <body class="bg-dark py-5">
    <div class="container-xxl px-2 mt-5">
        <div class="heading py-4 border-bottom border-light">
            <h1 class="text-white text-center">Gallery</h1>
            <h5 class="text-light py-2 text-center">Projects Pictures</h5>

        </div>

        <div class="row py-2">
            <div class="column">
                <img src="img/gallery/img-1.jpg" alt="" srcset="">
                <img src="img/gallery/img-2.jpg" alt="" srcset="">
                <img src="img/gallery/img-3.jpg" alt="" srcset="">
                <img src="img/gallery/img-4.jpg" alt="" srcset="">
                <img src="img/gallery/img-5.jpg" alt="" srcset="">
                <img src="img/gallery/img-6.jpg" alt="" srcset="">
                
            </div>
            <div class="column">
                <img src="img/gallery/img-7.jpg" alt="" srcset="">
                <img src="img/gallery/img-8.jpg" alt="" srcset="">
                <img src="img/services/haha.jpg" alt="" srcset="">
                <img src="img/services/handAuger.jpg" alt="" srcset="">
                <img src="img/services/idk.jpg" alt="" srcset="">
                <img src="img/services/idk2.jpg" alt="" srcset="">
                
                
            </div>
            <div class="column">
                <img src="img/services/inclinometer.jpg" alt="" srcset="">
                <img src="img/services/settlement monitoring.jpg" alt="" srcset="">
                <img src="img/services/some student.jpg" alt="" srcset="">
                <img src="img/services/tah batang apa.jpg" alt="" srcset="">
                <img src="img/services/tktau.jpg" alt="" srcset="">
                <img src="img/services/geological/1.jpg" alt="" srcset="">
                
            </div>
            <div class="column">
                <img src="img/services/geological/2.jpg" alt="" srcset="">
                <img src="img/services/geological/3.jpg" alt="" srcset="">
                <img src="img/services/geological/4.jpg" alt="" srcset="">
                <img src="img/services/geological/5.jpg" alt="" srcset="">
                <img src="img/services/geological/6.jpg" alt="" srcset="">
                <img src="img/services/geological/7.jpg" alt="" srcset="">                
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>