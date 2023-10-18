<!-- *** About Us Section *** -->
<section id="about" class="about property scrollspy">
    <div class="container">
        
        <div class="heading-text">    
            <h2 class="light grey-text text-darken-3 left-align">Project Kami</h2>
            <div class="left"></div>
        </div>
   
        <div class="row services">
        <?php foreach ($services as $service) : ?>
            <div class="col m4 s12 services">
                <div class="card medium hoverable">
                    <div class="card-image waves-effect waves-light waves-block">
                    <img src="assets/img/exp/exp_20200325-204.jpg" class="activator">
                    </div>
                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Nama Properti<i class="material-icons right">more_vert</i></span>
                    <p>Alamat: Jl apalah</p>
                    <p>Lt/lb: 34, 21</p>
                    <a href="https://rajawalicargo.co.id">Lihat Selengkapnya</a>
                    </div>
                    <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Nama Properti <i class="material-icons right">close</i></span>
                        <p>deskripsi promo</p>
                        <p><a href="">Lihat Promo selengkapnya</a></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col m4 s12 services">
            <div class="card-panel bg-nav waves-effect waves-light">
                <a href="<?= base_url() ?>/properti">
                    <div class="wrapper">
                        <i class="bi bi-arrow-right-square-fill white-text"></i>
                        <span class="white-text">Lainya...</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>