<!-- Judul Konten -->
<div>
    <h1 class="h1 text-gray-900 mb-0 mt-4 text-center"><b>Daftar Pasangan Calon</b></h1>
    <h1 class="h4 text-gray-900 mb-0 text-center">Presiden dan Wakil Presiden Politeknik Negeri Tanah Laut</h1>
</div>

<!-- Garis pembatas -->
<div class="mt-3" style="width: 70%; margin:0 auto">
    <hr>
</div>

<!-- Slide Paslon -->
<div class="list-paslon" style="width: 70%; height:650px;margin:0 auto">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php if (sizeof($paslon) > 0) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for ($i = 1; $i < (sizeof($paslon)); $i++) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                <?php } ?>
            <?php } else { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" style="height:650px !important; width: 100% !important; margin:0 auto;">

            <?php if (sizeof($paslon) > 0) { ?>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url().'assets/voting_assets/image/paslon/' . $paslon[0]['visi'] ?>">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() .'assets/voting_assets/image/paslon/'. $paslon[0]['misi'] ?>">
                </div>
                <?php for ($i = 1; $i < (sizeof($paslon)); $i++) { ?>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url() .'assets/voting_assets/image/paslon/'. $paslon[$i]['visi'] ?>">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url().'assets/voting_assets/image/paslon/' . $paslon[$i]['misi'] ?>">
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
</div>

<!-- Biodata Paslon -->
<div class="biodata h5  " style="width: 70%; margin:0 auto;">
    <div class="title-biodata">
        <h1 class="h5 text-gray-900 mb-2 mt-2 text-left">Biodata Paslon</h1>
        <hr class="mb-5" style="width:100%; margin:0 auto">
    </div>
    <?php for ($i = 0; $i < sizeof($paslon); $i++) { ?>
        <div class="row mb-5" style="height: 450px;">
            <div class="col-4" style="height:100%; background-image:url('<?= base_url() .'assets/voting_assets/image/paslon/'. $paslon[$i]['foto'] ?>'); background-size:cover"></div>
            <div class="col-8" style="height:100%; padding:30px">
                <table>
                    <tr>
                        <td><b>Calon Presiden Mahasiswa</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $presma[$i]['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $presma[$i]['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td><?= $presma[$i]['jurusan'] ?></td>
                    </tr>
                    <tr>
                        <td>Angkatan</td>
                        <td>:</td>
                        <td><?= $presma[$i]['angkatan'] ?></td>
                    </tr>
                    <tr>
                        <td><b>Calon Wakil Presiden Mahasiswa</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Wapresma</td>
                        <td>:</td>
                        <td><?= $wapresma[$i]['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><?= $wapresma[$i]['nim'] ?></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td><?= $wapresma[$i]['jurusan'] ?></td>
                    </tr>
                    <tr>
                        <td>Angkatan</td>
                        <td>:</td>
                        <td><?= $wapresma[$i]['angkatan'] ?></td>
                    </tr>
                </table>
                <div class="des h5 mt-4">
                   
                </div>
            </div>
        </div>
        <hr>
    <?php } ?>
</div>

<!-- Grafik Statistik Paslon -->
<div class="total-suara" style="width: 70%; margin:0 auto;">
    <figure class="highcharts-figure">
        <div id="container"></div>
        <p class="highcharts-description text-center">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis excepturi iusto ut optio neque dolore vel minus quia consequatur ea consequuntur provident, accusamus nobis esse. Tempore officiis nihil iure accusantium.
        </p>
    </figure>
</div>