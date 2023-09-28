 <!-- *** Contact Section *** -->
 <section class="scrollspy" id="faq">
     <div class="container">
         <div class="row">
             <div class="col s12">
                 <h3 class="grey-text text-darken-3">FAQ</h3>
                 <h5 class="grey-text text-darken-3">Frequently Asked Questions.</h5>
             </div>
             <div class="col s12">
                 <ul class="collapsible popout" data-collapsible="accordion">
                     <?php foreach ($faqs as $faq) : ?>
                         <li>
                             <div class="collapsible-header"><?= $faq->questions ?></div>
                             <div class="collapsible-body"><span class="flow-text"><?= $faq->answer ?></span></div>
                         </li>
                     <?php endforeach; ?>
                 </ul>
             </div>
         </div>
     </div>
 </section>