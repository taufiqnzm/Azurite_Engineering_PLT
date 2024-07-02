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

        <div class="row py-2" id="gallery">
            <!-- JavaScript will inject the columns here -->
        </div>
    </div>

    <script>
        const basePath = 'img/gallery/';
        const baseName = 'img-';
        const fileExtension = '.jpg';
        const imageCount = 94; // Number of images in the gallery directory
        const images = [];

        // Generate image paths based on the pattern
        for (let i = 1; i <= imageCount; i++) {
            images.push(`${basePath}${baseName}${i}${fileExtension}`);
        }

        // Additional images from another directory
        const additionalImages = [
            'img/services/service-vaneshear.jpg', 'img/services/service-terrain.jpg', 'img/services/service-seismic.jpg',
            'img/services/service-pit.jpg', 'img/services/service-piezometer.jpg', 'img/services/service-mackintosh.jpg',
            'img/services/service-inclonometer.jpg', 'img/services/service-g-sampling.jpg', 'img/services/service-geo-mapping.jpg',
            'img/services/service-ert.jpg', 'img/services/service-drill.jpg', 'img/services/service-auger.jpg',
        ];

        images.push(...additionalImages);

        const gallery = document.getElementById('gallery');

        // Create columns based on image array
        const columns = [[], [], [], []];
        images.forEach((src, index) => {
            columns[index % 4].push(`<img src="${src}" alt="" srcset="">`);
        });

        // Insert columns into gallery
        columns.forEach(column => {
            const div = document.createElement('div');
            div.className = 'column';
            div.innerHTML = column.join('');
            gallery.appendChild(div);
        });
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
