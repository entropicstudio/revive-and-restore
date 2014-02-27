<?php
/**
 * Candidate species archive template
 *
 */
get_header(); 
$rare_species_options = get_option ( 'rare_species_options' );
?>

        <script>
            
            
            jQuery(document).ready(function(){
                
                
                <?php if( $_POST['compare-all'] OR $_GET['compare'] ){ ?>
                    var sTableHead = $('#species-compare-head').dataTable( {
                        "sScrollX": "100%",
                        "sScrollXInner": "150%",
                        "bScrollCollapse": true,
                        "bPaginate": false,
                        "bFilter": false,
                        "bInfo": false,
                        "bSort": false
                    } );
                    new FixedColumns( sTableHead, {"iLeftWidth": 390} );

                    var sTableSec1 = $('#species-compare-section1').dataTable( {
                        "sScrollX": "100%",
                        "sScrollXInner": "150%",
                        "bScrollCollapse": true,
                        "bPaginate": false,
                        "bFilter": false,
                        "bInfo": false,
                        "bSort": false
                    } );
                    new FixedColumns( sTableSec1, {"iLeftWidth": 390}  );

                    var sTableSec2 = $('#species-compare-section2').dataTable( {
                        "sScrollX": "100%",
                        "sScrollXInner": "150%",
                        "bScrollCollapse": true,
                        "bPaginate": false,
                        "bFilter": false,
                        "bInfo": false,
                        "bSort": false
                    } );
                    new FixedColumns( sTableSec2, {"iLeftWidth": 390}  );

                    var sTableSec3 = $('#species-compare-section3').dataTable( {
                        "sScrollX": "100%",
                        "sScrollXInner": "150%",
                        "bScrollCollapse": true,
                        "bPaginate": false,
                        "bFilter": false,
                        "bInfo": false,
                        "bSort": false
                    } );
                    new FixedColumns( sTableSec3, {"iLeftWidth": 390}  );
                <?php } ?>
                    
                
                
                jQuery("#species-compare-head_wrapper .dataTables_scrollBody").on('scroll', function() {
                    jQuery(".dataTables_scrollBody").scrollLeft(jQuery(this).scrollLeft());
                });
                jQuery("#species-compare-section1_wrapper .dataTables_scrollBody").on('scroll', function() {
                    jQuery(".dataTables_scrollBody").scrollLeft(jQuery(this).scrollLeft());
                });
                jQuery("#species-compare-section2_wrapper .dataTables_scrollBody").on('scroll', function() {
                    jQuery(".dataTables_scrollBody").scrollLeft(jQuery(this).scrollLeft());
                });
                jQuery("#species-compare-section3_wrapper .dataTables_scrollBody").on('scroll', function() {
                    jQuery(".dataTables_scrollBody").scrollLeft(jQuery(this).scrollLeft());
                });
                         
                jQuery('.box-toggle').click(function(){
                                      
                   sheight = jQuery(this).siblings('.section-information').outerHeight();
                   
                   if(sheight > 0){
                       
                       jQuery(this).siblings('.section-information').animate({height: "0"}, 400);
                       jQuery(this).text('About This Section');
                        jQuery(this).parent().css('margin-bottom', '-20px');
                       
                   } else {
                       
                        autoHeight = jQuery(this).siblings('.section-information').css('height', 'auto').height();
                        
                        
                        jQuery(this).siblings('.section-information').height(sheight).animate({ height: autoHeight }, 400, function() {
                             jQuery(this).siblings('.section-information').css('height', 'auto'); 
                        });
                       jQuery(this).text('Hide This Section');
                        jQuery(this).parent().css('margin-bottom', '-4px');
                       
                   }
                   
                });
                
                jQuery('#species-select-form input[name=species-select]').change(function() {
                    jQuery('#species-select-form').submit();
                });
                
                jQuery('#species-text-select input[name=species-text-select]').change(function() {
                    jQuery('#species-text-select').submit();
                });
                
                post = '<?php echo $_POST['species-select']; ?>';
                
                if(post){
                    jQuery('html, body').animate({
                        scrollTop: jQuery('#select-species').offset().top - 90
                    }, 1000);
                }
                
                
            });
            
            
            
        </script>

        
        <div id="species-container">
            
            <div>
                <?php echo apply_filters('the_content', $rare_species_options['species_intro']); ?>
            </div>
            
            <?php if( !$_POST['compare-all'] AND !$_GET['compare'] ){ ?>
            
                <div id="select-species">
                    <?php

                     $args = array(
                         'post_type'         => 'species',
                         'posts_per_page'   => -1,
                         'orderby'          => 'menu_order',
                         'order'            => 'ASC',
                         'meta_query' => array(
                                array(
                                    'key' => 'in_criteria',
                                    'value' => 'yes',
                                    'compare' => 'LIKE'
                                )
                            )
                    );

                    $species = null;
                    $species = new WP_Query($args);

                    if( $species->have_posts() ) { ?>

                        
                        <h2>Select One Candidate Below</h2>
                        
                        <form id="species-select-form" method="post" action="">
                            <div id="tS2" class="jThumbnailScroller">
                                <div class="jTscrollerContainer">
                                    <div class="jTscroller">
                            
                                        <?php while ( $species->have_posts() ){ 

                                            $species->the_post();

                                            ?>


                                            <a href="#">
                                                <span class="species">
                                                    <label for="species<?php echo $species->post->ID; ?>">
                                                        <input id="species<?php echo $species->post->ID; ?>" type="radio" name="species-select" value="<?php echo $species->post->ID; ?>" />
                                                        <span class="species-image"><?php echo wp_get_attachment_image(get_field('species_image'), 'species-thumb'); ?></span>
                                                        <span class="species-name"><?php the_title(); ?></span>
                                                    </label>
                                                </span>
                                            </a>
                                        
                                

                                        <?php } ?>
                                    </div>
                                </div>
                                <a href="#" class="jTscrollerPrevButton"></a>
                                <a href="#" class="jTscrollerNextButton"></a>
                            </div>
                            
                        </form>
                    
                    
                    <!--    <form id="species-text-select" method="post" action="">
                            <?php while ( $species->have_posts() ){ 
                                $species->the_post(); ?>
                                <label class="species" for="textspecies<?php echo $species->post->ID; ?>">
                                    <input id="textspecies<?php echo $species->post->ID; ?>" type="radio" name="species-text-select" value="<?php echo $species->post->ID; ?>" />
                                    <span class="species-name"><?php the_title(); ?></span>
                                </label>
                            
                            <?php } ?>
                        </form>
                    
                    -->
                    

                    <?php } wp_reset_query(); ?>

                </div>
            
            <?php
            
                $blank = true;
                $species_id = null;
                
                if( $_POST['species-select'] || $_POST['species-text-select'] ) {
                    $_POST['species-select'] ? $species_id = $_POST['species-select'] : $species_id = $_POST['species-text-select'];
                    $blank = false;
                }

                $args = array(
                    'post_type' => 'species',
                    'p'         => $species_id,
                    'post_count'    => 1
                );

                $species = null;
                $species = new WP_Query($args);
                if( $species->have_posts() ) {
                    $species->the_post();
                    $section = 1;
                ?>
            
                
                
            
                <table class="species-table" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="species-image"><div><?php echo $blank ? '' : wp_get_attachment_image(get_field('species_image'), 'species-thumb'); ?></div></td>
                        <td class="species-name"><?php echo $blank ? 'Select a Species Above' : get_the_title() . '<em>' . get_field('latin_name') . '</em>'; ?></td>
                        <td class="actions"><form id="all-species-form" method="post" action="">
                                <input type="hidden" name="compare-all" value="1" />
                                <input type="submit" class="link_button-gray" value="Compare All Candidates" />

                            </form></td>
                    </tr>
                </table>



                <?php while($section <= 3 ) { ?>

                <div class="criteria-info-box">
                    <div class="box-toggle">About This Section</div>
                    <div class="section-information"><?php echo $rare_species_options["section{$section}_info"]; ?></div>
                </div>



                <table class="criteria-table" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <td colspan="3" class="question"><span class="section-number"><?php echo $section; ?></span><?php echo $rare_species_options["section{$section}_heading"]; ?>
                                <span class="comments">Comments</span>
                            </td>
                        </tr>
                    </thead>

                        <?php 


                            $question = 1;
                            $x = 1; 
                            $class = 'odd';

                            echo '<tbody>';

                            while( $x == 1){
                                $field_name = "sec{$section}_question{$question}";
                                $field = get_field_object($field_name);

                                if($field['label']){

                                        if(!$blank){ $answer = get_field("sec{$section}_question{$question}"); }
                                        
                                        if ($answer == 'disabled'){ $disabled = 'disabled'; $answer = ''; }
                                        
                                        echo '<tr class="' . $class . ' ' . $disabled . '">';
                                            echo '<td class="question">' . $field['label'] . '</td>';

                                            if ( $section == 1 ) {
                                                if( $answer == 'yes' ){
                                                    $answer = 'icon-checkmark';
                                                } elseif ( $answer == 'no' ){
                                                    $answer = 'icon-cross';
                                                } elseif ( $answer == 'maybe'){
                                                    $answer = 'icon-questionmark';
                                                }
                                                echo '<td class="answer ' . $answer . ' ">' . ($disabled == 'disabled' ? 'n/a' : '') . '</td>';
                                            } else {
                                                if( $answer == 'yes' ){
                                                    $answer = '<div class="box-yes"><span>Yes</span></div>';
                                                } elseif ( $answer == 'no' ){
                                                    $answer = '<div class="box-no"><span>no</span></div>';
                                                } elseif ( $answer == 'maybe'){
                                                    $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                                } elseif(!$blank) {
                                                    $answer = 'n/a';
                                                }
                                                echo '<td class="answer">' . $answer . '</td>';
                                            }

                                            echo '<td class="comments">';
                                            if($question == 1 AND $section > 1 AND $disabled == 'disabled'){
                                                echo 'This species did not pass section 1.';
                                            }else{
                                                if(!$blank){ echo get_field("sec{$section}_q{$question}_notes"); }
                                            }
                                            echo '</td>';
                                            
                                            echo '</tr>';
                                            $question++;
                                            $class == 'odd' ? $class='' : $class='odd';

                                }else{
                                    echo '</tbody>';
                                    
                                    if($section == 1){
                                        $field_name = "sec{$section}_answer";
                                        $field = get_field_object($field_name);
                                        echo '<tfoot>';
                                            if(!$blank){ $answer = get_field("sec{$section}_answer"); }
                                            if ($answer == 'disabled'){ $disabled = 'disabled'; $answer = ''; }
                                            echo '<tr class="' . ($section == 1 ? '' : $disabled) . '">';
                                                echo '<td class="question">' . $field['label'] . '</td>';
                                                if( $answer == 'yes' ){
                                                    $answer = '<div class="box-yes"><span>Yes</span></div>';
                                                } elseif ( $answer == 'no' ){
                                                    $answer = '<div class="box-no"><span>no</span></div>';
                                                } elseif ( $answer == 'maybe'){
                                                    $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                                } else {
                                                    if( $section == 1 AND !$blank ){
                                                        $answer = '<div class="box-no"><span>no</span></div>';
                                                    }
                                                }
                                                echo '<td class="answer">' . $answer . '</td>';
                                                echo '<td class="comments"></td>';
                                            echo '</tr>';
                                        echo '</tfoot>';
                                    }
                                    $x=0;
                                    $section++;
                                    $question=1;
                                }
                            }
                        ?>
                </table>

                <? } ?>



                <table class="species-score" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="question"><strong>Is this a good candidate for de-extinction?</strong></td>
                        <td class="answer <?php echo $blank ? '' : get_field('species_answer'); ?>"><?php  echo $blank ? '' : get_field('species_answer'); ?></td>
                        <td class="survey">
                            
                            <?php if(!$blank) : ?>
                            
                                <div class="poll-button">
                                    <a href="#species-poll-popup" class="fancybox-inline">
                                        <img src="<?php echo get_template_directory_uri(); ?>/ui/poll-button.png" alt="take our poll" />
                                    </a>
                                </div>

                                <div style="display:none" class="fancybox-hidden">
                                    <div id="species-poll-popup" class="hentry">
                                        
                                        <?php 
                                        
                                            $post_object = get_field('survey');

                                            $survey_id = $post_object->ID; 
                                            
                                        ?>
                                        
                                        <div id="species-poll-results" style="display: none;">
                                            
                                            <h2><?php the_title(); ?> Poll Results</h2>
                                            <hr />
                                            
                                            <div id="poll-results">
                                                
                                            </div>
                                                
                                        </div>
                                            
                                        
                                        <script>
                                        
                                            $(document).ready(function(){
                                                                
                                                $.ajaxSetup({cache:false});

                                                $('#show_poll_results').click(function(){
                                                    $('#species-poll-survey').hide();
                                                    $('#species-poll-results').show();
                                                    $("#poll-results").html('<img class="ajax-loader" src="<?php echo site_url(); ?>/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Loading Poll Results..." />');
                                                    $("#poll-results").load('<?php echo get_template_directory_uri(); ?>/ajax_poll-results.php?survey=<?php echo $survey_id; ?>&species=<?php echo $species_id; ?>');
                                                    return false;
                                                }) ;
                                               
                                            });
                                    
                                        </script>
                                        
                                        <div id="species-poll-survey">
                                            <h2><?php the_title(); ?> Survey</h2>
                                            <p>Take our species survey below and let us know what you think.</p>

                                            <hr />
                                            <?php

                                            echo do_shortcode("[contact-form-7 id='$survey_id']");

                                            ?>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            
                            <?php endif; ?>
                            
                        </td>
                    </tr>
                </table>
            
                
                

            <?php } 
            
            
            
            
            
            
            
            
            
            
            
            
            } else { // show all comparison table 
                
                
                $args = array(
                    'post_type'         => 'species',
                     'posts_per_page'   => -1,
                     'orderby'          => 'menu_order',
                     'order'            => 'ASC'
                );

                $species = null;
                $species = new WP_Query($args);
                
                if( $species->have_posts() ) { ?>
                   
                
                    <div class="comparison-table">
                        
                        
                                <form id="species-select-form" method="post" action="">
                                    <table cellpadding="0" cellspacing="0" border="0" class="display species-table comparison" id="species-compare-head">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <?php
                                                while ($species->have_posts()) {

                                                    $species->the_post();
                                                    ?>
                                                    <th></th>
                                                    <?php
                                                }

                                                rewind_posts();
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="table-heading">Candidate Species<em>Full Comparison Chart</em></td>
                                                            
                                                <?php
                                                while ($species->have_posts()) {

                                                    $species->the_post();
                                                    ?>

                                                    <td class="species-image">
                                                                    
                                                        <span class="species">
                                                            <label for="species<?php echo $species->post->ID; ?>">
                                                                <input id="species<?php echo $species->post->ID; ?>" type="radio" name="species-select" value="<?php echo $species->post->ID; ?>" />
                                                                <span class="species-image"><?php echo wp_get_attachment_image(get_field('species_image'), 'species-thumb'); ?></span>
                                                                <span class="species-name"><?php the_title(); ?></span>
                                                            </label>
                                                        </span>

                                                    </td>

                                                    <?php
                                                }

                                                rewind_posts();
                                                ?>
                                                            
                                            </tr>
                                        </tbody>
                                    </table>
                                                
                                                
                                </form>

                                            
                        
                        
                        
                        
                        
                        <?php $section = 1; ?>
                        
                        <?php while($section <= 3 ) { ?>

                        
                        
                        
                            <div class="criteria-info-box comparison">
                                <div class="box-toggle">About This Section</div>
                                <div class="section-information"><?php echo $rare_species_options["section{$section}_info"]; ?></div>
                            </div>

                            
                        <div class="section-question">
                            <span class="section-number"><?php echo $section; ?></span><?php echo str_ireplace('this', 'these', $rare_species_options["section{$section}_heading"] ); ?>
                        </div>
                            
                            <table cellpadding="0" cellspacing="0" border="0" class="display criteria-table comparison" id="species-compare-section<?php echo $section; ?>">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <?php while ( $species->have_posts() ){ 

                                            $species->the_post(); ?>
                                        
                                                <th></th>
                                            
                                            <?php } rewind_posts(); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr class="species-heading">
                                        <td></td>
                                        <?php while ( $species->have_posts() ){ 

                                            $species->the_post(); ?>
                                        
                                                <td><?php the_title(); ?></td>
                                            
                                            <?php } rewind_posts(); ?>
                                    </tr>
                                  
                                    <?php 
                                    
                                    $question = 1;
                                    $x=0;
                                    
                                    while($x == 0) { 
                                        
                                        $labeled = 0;
                                    
                                        $field_name = "sec{$section}_question{$question}";
                                        $field = get_field_object($field_name);
                                        
                                        if($field['label'] ) { ?>
                                            <tr>

                                                <?php while ( $species->have_posts() ){ 
                                                    $disabled = '';
                                                    $species->the_post(); 



                                                    if ($labeled == 0){
                                                        echo '<td class="question">' . $field['label'] . '</td>';
                                                        $labeled = 1;
                                                    }



                                                    $answer = get_field("sec{$section}_question{$question}");
                                                    if ($answer == 'disabled'){ $disabled = 'disabled'; $answer = ''; }
                                                    
                                                    if ( $section == 1 ) {
                                                        if( $answer == 'yes' ){
                                                            $answer = '<div class="icon-checkmark"></div>';
                                                        } elseif ( $answer == 'no' ){
                                                            $answer = '<div class="icon-cross"></div>';
                                                        } elseif ( $answer == 'maybe'){
                                                            $answer = '<div class="icon-questionmark"></div>';
                                                        }
                                                        echo '<td class="answer">' . $answer . ($disabled == 'disabled' ? '<div class="disabled">n/a</div>' : '') . '</td>';
                                                    } else {
                                                        
                                                        $sec1answer = get_field("sec1_answer");
                                                        if($sec1answer == 'no'){$disabled = true;}
                                                        if( $answer == 'yes' ){
                                                            $answer = '<div class="box-yes"><span>Yes</span></div>';
                                                        } elseif ( $answer == 'no' ){
                                                            $answer = '<div class="box-no"><span>no</span></div>';
                                                        } elseif ( $answer == 'maybe'){
                                                            $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                                        } elseif ( $disabled == TRUE ){
                                                            $answer = '<div class="disabled">n/a</div>';
                                                        }
                                                        echo '<td class="answer">' . $answer . '</td>';
                                                    }


                                                } 

                                                rewind_posts(); 
                                                $question++; ?>

                                            </tr>
                                            
                                        <?php } else {
                                            
                                            $x = 1;
                                            
                                            if($section == 1){
                                                echo '<tr>';
                                                $labeled = 0; 

                                                while ( $species->have_posts() ){ 

                                                    $species->the_post();

                                                    $field_name = "sec{$section}_answer";
                                                    $field = get_field_object($field_name);

                                                    if ($labeled == 0){
                                                        echo '<td class="question sec-final">' . str_ireplace('this', 'these', $field['label'] ) . '</td>';
                                                        $labeled = 1;
                                                    }

                                                    $answer = get_field("sec{$section}_answer");

                                                    if( $answer == 'yes' ){
                                                        $answer = '<div class="box-yes"><span>Yes</span></div>';
                                                    } elseif ( $answer == 'no' ){
                                                        $answer = '<div class="box-no"><span>no</span></div>';
                                                    } elseif ( $answer == 'maybe'){
                                                        $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                                    } else {
                                                        $answer = '<div class="box-no"><span>no</span></div>';
                                                    }
                                                    echo '<td class="answer">' . $answer . '</td>';

                                                } 

                                                echo '</tr>';
                                                
                                                rewind_posts();
                                                
                                            }
                                            
                                        }
                                            
                                    } 
                                    
                                    if($section == 3){
                                    echo '<tr>';
                                        echo '<td class="question sec-final"><strong>Is this a good candidate for de-extinction?</strong></td>';

                                        while ( $species->have_posts() ){ 

                                            $species->the_post();
                                            $answer = get_field('species_answer');
                                            
                                                    if( $answer == 'yes' ){
                                                        $answer = '<div class="box-yes"><span>Yes</span></div>';
                                                    } elseif ( $answer == 'no' ){
                                                        $answer = '<div class="box-no"><span>no</span></div>';
                                                    } elseif ( $answer == 'maybe'){
                                                        $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                                    } else {
                                                        $answer = '<div class="box-no"><span>no</span></div>';
                                                    }
                                                    echo '<td class="answer">' . $answer . '</td>';

                                        }

                                    echo '</tr>';
                                    }
                                    
                                    ?>
                                        
                                </tbody>
                                
                            </table>

                        
                        
                        
                        <?php 
                        
                            rewind_posts();
                            $section++;       
                        } 
                        
                        
                        
                        ?>
                        
                        
                    </div>
                
                
                <?php } ?>
                
                
                
                
            <?php } ?>
                
                
                
                
                <div id="scoring-information" class="clear"><?php echo apply_filters('the_content', $rare_species_options['species_scoring_info']); ?></div>
                
        </div>
        
    <?php wp_reset_query(); ?>
        
    <?php get_footer(); ?>