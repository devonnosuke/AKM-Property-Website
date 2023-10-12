<!-- *** About Us Section *** -->
<section id="about" class="about scrollspy">
    <div class="container">
        
        <div class="heading-text">    
            <h2 class="light grey-text text-darken-3 left-align">Send us a message</h2>
            <div class="left"></div>
        </div>
   
        <div class="row center valign-wrapper">
            <div class="col s12">
                <div class="card-panel card-contact left white darken-2 grey-text text-darken-2 hoverable">
                    <h6>Kirim pertanyaan langsung ke WA</h6>
                    <form action="<?= base_url() ?>/sendMail" method="POST" class="contact">
                        <div class="input-field">
                            <input type="text" name="name" id="name" required class="validate">
                            <label class="" for="name">nama</label>
                        </div>
                        <div class="input-field">
                            <textarea name="message" rows="55" id="message" class="materialize-textarea" required ></textarea>
                            <label class="" for="message">Tulis pertanyaanmu disini</label>
                        </div>
                        <button class="btn cyan darken-2 waves-effect waves-light right">Kirim WA</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>