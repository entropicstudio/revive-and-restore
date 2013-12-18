<?php
/**
 * Candidate species archive template
 *
 */
get_header(); 
$rare_species_options = get_option ( 'rare_species_options' );

$singleSpecies = $post->ID;

?>

        <script>
            
            
            jQuery(document).ready(function(){
                                
                jQuery('.box-toggle').click(function(){
                                      
                   sheight = jQuery(this).siblings('.section-information').outerHeight();
                   
                   if(sheight > 0){
                       
                       jQuery(this).siblings('.section-information').animate({height: "0"}, 400);
                       jQuery(this).text('Show Section Information');
                        jQuery(this).parent().css('margin-bottom', '-20px');
                       
                   } else {
                       
                        autoHeight = jQuery(this).siblings('.section-information').css('height', 'auto').height();
                        
                        
                        jQuery(this).siblings('.section-information').height(sheight).animate({ height: autoHeight }, 400, function() {
                             jQuery(this).siblings('.section-information').css('height', 'auto'); 
                        });
                       jQuery(this).text('Hide Section Information');
                        jQuery(this).parent().css('margin-bottom', '-4px');
                       
                   }
                   
                });
                
                jQuery('#species-select-form input[name=species-select]').change(function() {
                    jQuery('#species-select-form').submit();
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

            
            <?php
                                
                
                $args = array(
                    'post_type' => 'species',
                    'p'         => $singleSpecies
                );

                $species = null;
                $species = new WP_Query($args);
                if( $species->have_posts() ) {
                    $species->the_post();
                    $section = 1;
                ?>
            
            <table class="species-table" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="species-image"><div><?php echo wp_get_attachment_image(get_field('species_image'), 'species-thumb'); ?></div></td>
                    <td class="species-name"><?php the_title(); ?><em><?php the_field('latin_name'); ?></em></td>
                    <td class="actions"><div class="poll-button"><img src="<?php echo get_template_directory_uri(); ?>/ui/poll-button.png" alt="take our poll" /></div></td>
                </tr>
            </table>
            
            
            
            <?php while($section <= 3 ) { ?>
            
            <div class="criteria-info-box">
                <div class="box-toggle">Show Section Information</div>
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
                               
                                    $answer = get_field("sec{$section}_question{$question}");
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
                                            echo '<td class="answer ' . $answer . ' "></td>';
                                        } else {
                                            if( $answer == 'yes' ){
                                                $answer = '<div class="box-yes"><span>Yes</span></div>';
                                            } elseif ( $answer == 'no' ){
                                                $answer = '<div class="box-no"><span>no</span></div>';
                                            } elseif ( $answer == 'maybe'){
                                                $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                            }
                                            echo '<td class="answer">' . $answer . '</td>';
                                        }
                                        
                                        echo '<td class="comments">' . get_field("sec{$section}_q{$question}_notes") . '</td>';
                                        echo '</tr>';
                                        $question++;
                                        $class == 'odd' ? $class='' : $class='odd';
                                
                            }else{
                                echo '</tbody>';
                                $field_name = "sec{$section}_answer";
                                $field = get_field_object($field_name);
                                echo '<tfoot>';
                                    $answer = get_field("sec{$section}_answer");
                                    if ($answer == 'disabled'){ $disabled = 'disabled'; $answer = ''; }
                                    echo '<tr class="' . $disabled . '">';
                                        echo '<td class="question">' . $field['label'] . '</td>';
                                        if( $answer == 'yes' ){
                                            $answer = '<div class="box-yes"><span>Yes</span></div>';
                                        } elseif ( $answer == 'no' ){
                                            $answer = '<div class="box-no"><span>no</span></div>';
                                        } elseif ( $answer == 'maybe'){
                                            $answer = '<div class="box-maybe"><span>maybe</span></div>';
                                        }
                                        echo '<td class="answer">' . $answer . '</td>';
                                        echo '<td class="comments"></td>';
                                    echo '</tr>';
                                echo '</tfoot>';
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
                    <td><strong>Is this a good candidate for de-extinction?</strong></td>
                    <td class="answer <?php the_field('species_answer'); ?>"><?php the_field('species_answer'); ?></td>
                </tr>
            </table>
            
            <div><?php echo apply_filters('the_content', $rare_species_options['species_scoring_info']); ?></div>
            
            <?php } ?>
            
            
            
        </div>
        
    <?php wp_reset_query(); ?>
        
    <?php get_footer(); ?>