<?= $this->extend('landing/templates/base') ?>
<?= $this->section('content') ?>
    <div class="property-single-image">
        <img src="<?= base_url() ?>/assets/img/property/<?= $property['image']; ?>" alt="<?= $property['slug']; ?>">
        <div class="row container">
            <div>
                <h3 class="white-text"><?= $property['type_name']; ?></h3>
                <p class="white-text">Luas Tanah: <?= $property['luas_tanah']; ?>m<sup>2</sup></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-1">
                <ul class="tabs tabs-fixed-width">
                    <li class="tab col s3"><a class="active" href="#detail">Detail</a></li>
                    <li class="tab col s3"><a href="#gallery">Gallery Foto</a></li>
                </ul>
            </div>
            <div id="detail" class="col s12 tabs-property">
                <ul class="collapsible collapsible-property input popout" data-collapsible="expandable">
                    <li class="flow-text">
                        <div class="collapsible-header active"><i class="material-icons">info</i>Info Dasar</div>
                        <div class="collapsible-body">
                            <div id="property-img">
                                <a href="<?= base_url() ?>/assets/img/property/<?= $property['image']; ?>">
                                    <img src="<?= base_url() ?>/assets/img/property/<?= $property['image']; ?>" class="responsive-img" alt="<?= $property['slug']; ?>">
                                </a>
                                <a href="<?= base_url() ?>/assets/img/property/<?= $property['denah']; ?>">
                                    <img src="<?= base_url() ?>/assets/img/property/<?= $property['denah']; ?>" class="hide-img" alt="<?= $property['slug']; ?>">
                                </a>
                            </div>
                            <ul>
                                <li><span>Nama/Tipe: </span><?= $property['type_name']; ?></li>
                                <li><span>Alamat: </span><?= $property['address']; ?></li>
                                <li><span>Deskripsi: </span><?= $property['description']; ?></li>
                                <li><span>Luas Tanah: </span><?= $property['luas_tanah']; ?> m<sup>2</sup> </li>
                            </ul>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header"><i class="material-icons">layers</i>Spesifikasi</div>
                        <div class="collapsible-body">
                            <ul>
                                <?php $specc =  specGetByProIdSeparate($property['id']); ?>
                                <?php $i = 0; ?>
                                <?php foreach($specc['spec_name'] as $spec_name): ?>
                                    <li><span><?= $spec_name; ?>: </span><?= $specc['spec'][$i] ?></li>
                                <?php $i++; endforeach; ?>
                            </ul>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header"><i class="material-icons">local_hotel</i>Fasilitas</div>
                        <div class="collapsible-body">
                            <?php $facilities = splitString($property['features'], ',') ?>
                            <?php foreach($facilities as $f): ?>
                                <div class="chip"><i class="bi bi-check-circle left"></i><?= $f; ?></div>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header"><i class="material-icons">home</i>Denah Rumah</div>
                        <div class="collapsible-body">
                            <div id="property-denah">
                                <a href="<?= base_url() ?>/assets/img/property/<?= $property['denah']; ?>">
                                    <img src="<?= base_url() ?>/assets/img/property/<?= $property['denah']; ?>" class="responsive-img" alt="<?= $property['slug']; ?>">
                                </a>
                                <a href="<?= base_url() ?>/assets/img/property/<?= $property['image']; ?>">
                                    <img src="<?= base_url() ?>/assets/img/property/<?= $property['image']; ?>" class="hide-img " alt="<?= $property['slug']; ?>">
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="flow-text">
                        <div class="collapsible-header"><i class="material-icons">local_offer</i>Promo/Bonus</div>
                        <div class="collapsible-body center">
                            <a href="<?= base_url() ?>/promo/<?= $property['slug']; ?>" class="btn more btn-large red darken-2 waves-effect waves-dark z-depth-0 modal-trigger">Lihat Promo!</a>
                            <p>*Klik tombol diatas untuk info promo selengkapnya </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="gallery" class="col s12 tabs-property">
                <div class="row">
                    <div id="property-gallery" class="col s12 m4">
                        <?php foreach ($gallery as $gal) : ?>
                            <a href="<?= base_url() ?>/assets/img/property/<?=$gal->image_name?>" class="col-md-2">
                            <img class="responsive-img" src="<?= base_url() ?>/assets/img/property/<?=$gal->image_name?>" alt="<?= $property['slug']; ?>" />
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->include('landing/section_wa') ?>

    </div>
</section>
<?= $this->endSection() ?>