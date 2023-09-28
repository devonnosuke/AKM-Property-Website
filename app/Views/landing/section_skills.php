<!-- *** Skills Section *** -->
<div class="parallax-container scrollspy" id="skills">
    <div class="parallax">
        <img src="<?= base_url() ?>/assets/img/parallax/qqq.png" alt="Paralax Image">
    </div>
    <div class="row">
        <h3 class="center white-text">My Skills</h3>
        <div class="card-panel skills-panel">
            <div class="row">
                <div class="col m9 s12">
                    <ul id="staggered-test">
                        <?php foreach ($skills as $skill) : ?>
                            <li>
                                <p class="light"><?= $skill->skill_name ?> <b><?= $skill->skill_value ?>%</b></p>
                                <div class="progress blueen-4">
                                    <div class="determinate blue" style="width: <?= $skill->skill_value ?>%;"></div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col m3 hide-on-small-only center">
                    <img src="<?= base_url() ?>/assets/img/person.png" class="person" alt="Person">
                </div>
            </div>
        </div>
    </div>
</div>