<?php get_header() ?>
<main class="site__main">
    <!-- <h1>------category.php------</h1> -->
    <?php if(is_category(array('cours', 'creation-3d', 'web', 'jeu', 'design', 'utilitaire', 'video'))) : ?>
    <?php wp_nav_menu(array(
        "menu" => "categorie_cours",
        "container" => "nav")); ?>
    <?php if(have_posts()): ?>
        <section class="cours">
            <?php while(have_posts()): the_post(); ?>
            <?php get_template_part('gabarit/content', 'cours') ?>
            <article class="cours__carte <?= $categories[1]->slug; ?>">
                <?php
                    $titre = get_the_title();
                    $titreCourt = substr(get_the_title(), 8);
                    $titreCourt = substr($titreCourt, 0, strrpos($titreCourt, '('));

                    $posDebutHeures = strrpos($titre, '(') + 1;
                    $posFinHeures = strrpos($titre, ')');
                    $nbHeures = substr($titre, $posDebutHeures, $posFinHeures - $posDebutHeures);
                ?>
                <h2 class="carte__titre">
                    <a href="<?= get_permalink(); ?>">
                        <?= $titreCourt; ?>
                    </a>
                </h2>
                <?php the_post_thumbnail("thumbnail"); ?>
                <p class="carte__code"><?= substr(get_the_title(), 0, 7) ?></p>
                <p><?= $nbHeures; ?></p>
                <p class="carte__description"><?= get_the_excerpt() ?></p>
            </article>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
    <?php endif; ?><!-- if is category cours -->
</main>
<?php get_footer() ?>