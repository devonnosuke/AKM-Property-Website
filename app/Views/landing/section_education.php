 <!-- *** Contact Section *** -->
 <section class="scrollspy" id="education">
     <div class="container">
         <div class="row">
             <h3 class="grey-text text-darken-3 center">My Education</h3>
             <ul id="staggered-test1">
                 <?php foreach ($educational as $e) : ?>
                     <li>
                         <div class="col m6 s12 col-card">
                             <div class="card-panel hoverable card-edu">
                                 <table class='edu-table'>
                                     <tr>
                                         <td class="title">Country of Collage:</td>
                                         <td class="item"> <?= $e->country_collage ?></td>
                                     </tr>
                                     <tr>
                                         <td class="title">Collage/University:</td>
                                         <td class="item"> <?= $e->collage_name ?></td>
                                     </tr>
                                     <tr>
                                         <td class="title">Title:</td>
                                         <td class="item"> <?= $e->title ?></td>
                                     </tr>
                                     <tr>
                                         <td class="title">Major:</td>
                                         <td class="item"> <?= $e->major ?></td>
                                     </tr>
                                     <tr>
                                         <td class="title">Year Graduation :</td>
                                         <td class="right-align item">
                                             <h2><?= $e->year_graduation ?></h2>
                                         </td>
                                     </tr>
                                 </table>
                             </div>
                         </div>
                     </li>
                 <?php endforeach; ?>
             </ul>
         </div>
     </div>
 </section>