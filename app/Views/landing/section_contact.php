 <!-- *** Contact Section *** -->
 <section class="contact scrollspy" id="contact">
     <div class="container">
         <div class="row">
             <h3 class="grey-text text-darken-3 center">My Social</h3>
             <ul>
                 <?php foreach ($social as $s) : ?>
                     <li>
                         <div class="col m4 s6">
                             <div class="card-panel hoverable center card-contact">
                                 <a class="contact-link" target="_blank" href="<?= $s->link ?>">
                                     <i class="bi bi-<?= $s->contact_type ?> contact-icons"></i>
                                     <h5 class="flow-text contact-link"><?= ($s->contact_type == 'envelope') ? 'Email' : $s->contact_type ?></h5>
                                 </a>
                             </div>
                         </div>
                     </li>
                 <?php endforeach; ?>
             </ul>
         </div>
     </div>
 </section>