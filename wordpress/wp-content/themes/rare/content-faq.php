<?php
/**
 * content template for FAQ
 */
?>


        <div class="span-11 prepend-1 append-1 padtop-20" id="faq-column">
            <h2 class="section-heading">FREQUENTLY ASKED QUESTIONS</h2>
            <hr />
            
            <?php the_field('faq_section'); ?>

        </div>

        <div class="span-8 last append-1 padtop-20" id="reading-column">
            <h2 class="section-heading">ETHICAL QUESTIONS</h2>
            <hr />
            
            <?php the_field('ethical_questions'); ?>

        </div>