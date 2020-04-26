<!-- Judul Konten -->
<div>
    <h1 class="h1 text-gray-900 mb-0 mt-4 text-center"><b>History</b></h1>
    <h1 class="h4 text-gray-900 mb-0 text-center">Kepengurusan KPUM Politeknik Negeri Tanah Laut</h1>
</div>

<!-- Tahun kepengurusan yang tersedia -->
<div class="kepengurusan" style="width: 70%; margin:0 auto">
    <hr>
    <form action="<?= base_url() ?>home/history" method="get">
        <label for="tahun">Tahun</label>
        <select id="tahun" name="year" class="custom-select ml-3" required style="max-width: 15%">
            <?php for ($i = 0; $i < sizeof($year); $i++) { ?>
                <option value="<?= $year[$i]['tahun'] ?>"><?= $year[$i]['tahun'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary btn-user">
            Lihat
        </button>
    </form>
</div>

<!-- Foto Struktur Kepengurusan KPUM -->
<div class="kepengurusan" style="width: 70%; margin:0 auto">
    <div class="title-kepengurusan">
        <h1 class="h5 text-gray-900 mb-2 mt-5 text-left">Kepengurusan</h1>
        <hr class="mb-5" style="width:100%; margin:0 auto">
    </div>
    <div class="img-kepengurusan mb-5" style="width: 100%; height:600px; background-color:#333; background-image:url('<?= base_url() .'assets/voting_assets/image/kpum/' . $kpum[0]['struktur_kepengurusan']  ?>');background-size:cover">
    </div>
</div>

<!-- Foto Visi KPUM -->
<div class="visi" style="width: 70%; margin:0 auto">
    <div class="title-visi">
        <h1 class="h5 text-gray-900 mb-2 mt-5 text-left">Visi</h1>
        <hr class="mb-5" style="width:100%; margin:0 auto">
    </div>
    <div class="img-visi mb-5" style="width: 100%; height:600px; background-color:#333; background-image:url('<?= base_url() .'assets/voting_assets/image/kpum/' . $kpum[0]['visi']  ?>');background-size:cover">
    </div>
</div>

<!-- Foto Misi KPUM -->
<div class="misi" style="width: 70%; margin:0 auto">
    <div class="title-misi">
        <h1 class="h5 text-gray-900 mb-2 mt-5 text-left">Misi</h1>
        <hr class="mb-5" style="width:100%; margin:0 auto">
    </div>
    <div class="img-misi mb-5" style="width: 100%; height:600px; background-color:#333; background-image:url('<?= base_url() .'assets/voting_assets/image/kpum/' . $kpum[0]['misi']  ?>');background-size:cover">
    </div>
</div>

<!-- Slide Dokumentasi -->
<div class="dokumentasi-kpum" style="width: 70%; height:650px;margin:0 auto">
    <div class="title-dokumentasi-kpum">
        <h1 class="h5 text-gray-900 mb-2 mt-5 text-left">Dokumentasi</h1>
        <hr class="mb-5" style="width:100%; margin:0 auto">
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php if (sizeof($kpum) > 0) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php for ($i = 1; $i < (sizeof($kpum) - 1); $i++) { ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>"></li>
                <?php } ?>
            <?php } else { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner" style="height:650px !important; width: 100% !important; margin:0 auto;">

            <?php if (sizeof($kpum) > 0) { ?>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url() . 'assets/voting_assets/image/kpum/' . $kpum[0]['dokumentasi']  ?>">
                </div>
                <?php for ($i = 1; $i < (sizeof($kpum) - 1); $i++) { ?>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?= base_url() .'assets/voting_assets/image/kpum/' . $kpum[0]['dokumentasi']  ?>">
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url() . "assets/image/no-image.jpg" ?>">
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