        <!-- Begin::Slide -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                if (sizeof($doc_img) > 0) {
                ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                    for ($i = 1; $i < sizeof($doc_img); $i++) {
                    ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                    <?php } ?>
                <?php } else { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php } ?>
            </ol>
            <div class="carousel-inner" style="height:650px !important; width: 100% !important; margin:0 auto;">

                <?php if (sizeof($doc_img) > 0) { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url() . $doc_img[0]['src'] . $doc_img[0]['file'] ?>">
                    </div>
                    <?php for ($i = 1; $i < sizeof($doc_img); $i++) { ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url() . $doc_img[$i]['src'] . $doc_img[$i]['file'] ?>">
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url() . "assets/img/no-image.jpg" ?>">
                    </div>
                <?php } ?>
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
        <!-- End::Slide -->

        <!-- Deskripsi dalam slide -->
        <div class="txt-cousel" style="position: relative; top:-650px;">
            <h1 class="h1 text-gray-100 mb-0 mt-4 text-center">Selamat Datang di Website</h1>
            <h1 class="h3 text-gray-100 mb-0 text-center">E-Voting Presiden dan Wakil Presiden Mahasiswa</h1>
            <h1 class="h3 text-gray-100 mb-4 text-center">Politeknik Negeri Tanah Laut</h1>
        </div>

        <!-- Title Grafik -->
        <h1 class="h5 text-gray-900 mb-2 text-center">Grafik Pencoblosan / Tahun</h1>
        <hr class="mb-4" style="width:60%; margin:0 auto">

        <!-- Deskripsi pada grafik -->
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description text-center">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis excepturi iusto ut optio neque dolore vel minus quia consequatur ea consequuntur provident, accusamus nobis esse. Tempore officiis nihil iure accusantium.
            </p>
        </figure>