<?php
/*
 * Template Name: Extinction Continuum Template
 */
get_header();

$continuum_options = get_option ( 'rare_continuum_options' );

?>

    <?php
        $args = array(
            'post_type'         => 'species',
            'posts_per_page'    => -1
        );

        $species_query = null;
        $species_query = new WP_Query($args);
        
        $species = array();
        
        if( $species_query->have_posts() ) {

            while ($species_query->have_posts()) : $species_query->the_post(); 
            
                $species[$post->post_name] = $post;
                
            endwhile;
            
        }
        wp_reset_query();
        
    ?>


        <div class="span-20 prepend-1 append-1">

            <?php the_content(); ?>

            <div id="continuum-container">

                <h1 id="continuum-heading">Stages of Species Endangerment</h1>

                <div id="heading-container">
                    <div id="endangered-col">Endangered</div>
                    <div id="critically-col">Critically Endangered</div>
                    <div id="extinct-col">Extinct</div>
                </div>

                <div id="species-container">
                    <map id="species-hover-map" name="species-hover-map">
                        <area id="giraffe" shape="poly" coords="8,64,12,60,15,58,18,55,22,54,27,52,31,51,40,46,44,43,49,40,55,36,59,34,62,33,64,32,75,34,92,36,106,41,115,45,124,50,133,55,138,60,144,59,146,65,147,72,144,80,143,91,142,94,135,84,129,72,123,65,115,60,105,56,98,54,88,55,80,57,74,59,78,68,76,77,72,87,68,98,66,109,65,122,66,130,67,139,69,149,72,157,71,163,68,164,65,165,63,166,62,166,57,162,58,152,57,146,57,124,57,110,52,88,47,90,40,90,34,90,29,98,25,111,23,125,23,136,24,149,26,157,29,166,27,168,24,166,22,161,20,157,15,126,13,128,13,138,12,148,12,155,15,163,14,168,10,166,6,159,7,136,6,122,3,117,1,112,2,108,3,100,5,83,3,76,5,69" alt="<?php echo get_field('popup_content', $species['giraffe']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['giraffe']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['giraffe']->ID) . '</a></span>'; ?>" title="<?php echo $species['giraffe']->post_title . '<em>' . get_field('latin_name', $species['giraffe']->ID) . '</em>'; ?>" href="#" data-target="#species-giraffe"/>
                        <area id="houbara" shape="poly" coords="48,168,44,168,39,168,34,167,32,166,31,165,30,162,32,160,31,158,31,154,31,152,31,150,33,146,42,146,53,150,54,157,50,165" alt="<?php echo get_field('popup_content', $species['houbara']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['houbara']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['houbara']->ID) . '</a></span>'; ?>" title="<?php echo $species['houbara']->post_title . '<em>' . get_field('latin_name', $species['houbara']->ID) . '</em>'; ?>"href="#" data-target="#species-houbara" />
                        <area id="wildcat" shape="poly" coords="97,166,97,163,98,161,99,158,101,156,103,154,103,152,99,153,96,152,87,153,82,155,77,157,76,159,74,164,70,166,82,168,91,168,96,167" alt="<?php echo get_field('popup_content', $species['african-wild-cat']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['african-wild-cat']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['african-wild-cat']->ID) . '</a></span>'; ?>" title="<?php echo $species['african-wild-cat']->post_title . '<em>' . get_field('latin_name', $species['african-wild-cat']->ID) . '</em>'; ?>" href="#" data-target="#species-wildcat" />
                        <area id="ferret" shape="poly" coords="109,168,108,166,107,162,105,159,105,158,104,156,104,154,111,156,120,159,136,164,134,167,126,169" alt="<?php echo get_field('popup_content', $species['black-footed-ferret']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['black-footed-ferret']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['black-footed-ferret']->ID) . '</a></span>'; ?>" title="<?php echo $species['black-footed-ferret']->post_title . '<em>' . get_field('latin_name', $species['black-footed-ferret']->ID) . '</em>'; ?>" href="#" data-target="#species-ferret" />

                        <area id="frog" shape="poly" coords="254.20000457763672,161,263.2000045776367,158,263.2000045776367,166,251.20000457763672,167,252.20000457763672,163" alt="<?php echo get_field('popup_content', $species['gastric-brooding-frog']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['gastric-brooding-frog']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['gastric-brooding-frog']->ID) . '</a></span>'; ?>" title="<?php echo $species['gastric-brooding-frog']->post_title . '<em>' . get_field('latin_name', $species['gastric-brooding-frog']->ID) . '</em>'; ?>" href="#" data-target="#species-frog" />
                        <area id="frog2" shape="poly" coords="266,161,267,151,272,145,275,144,278,154,274,160,270,158,268,160"  alt="<?php echo get_field('popup_content', $species['gastric-brooding-frog']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['gastric-brooding-frog']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['gastric-brooding-frog']->ID) . '</a></span>'; ?>" title="<?php echo $species['gastric-brooding-frog']->post_title . '<em>' . get_field('latin_name', $species['gastric-brooding-frog']->ID) . '</em>'; ?>" href="#" data-target="#species-frog2" />
                        <area id="przewalski" shape="poly" coords="202,168,205,165,206,160,211,159,213,155,210,150,211,141,211,137,210,132,205,125,200,119,190,113,179,113,166,112,157,110,155,108,152,103,146,99,142,95,136,94,129,93,123,95,121,97,120,104,111,115,113,121,122,119,129,116,139,135,131,141,131,152,140,161,141,155,137,150,136,144,141,142,147,140,153,158,151,166,157,165,160,162,158,156,156,146,154,137,163,139,173,138,180,136,188,144,187,150,184,156,185,166,190,162,190,156,195,149,200,155,199,165,197,168" alt="<?php echo get_field('popup_content', $species['przewalskis-horse']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['przewalskis-horse']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['przewalskis-horse']->ID) . '</a></span>'; ?>" title="<?php echo $species['przewalskis-horse']->post_title . '<em>' . get_field('latin_name', $species['przewalskis-horse']->ID) . '</em>'; ?>"  href="#" data-target="#species-przewalski" />
                        <area id="bat" shape="poly" coords="178,88,185,86,187,83,196,78,193,75,189,77,186,77,184,75,177,69,174,68,176,78,176,88" alt="<?php echo get_field('popup_content', $species['bat']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['bat']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['bat']->ID) . '</a></span>'; ?>" title="<?php echo $species['bat']->post_title . '<em>' . get_field('latin_name', $species['bat']->ID) . '</em>'; ?>"  href="#" data-target="#species-bat" />
                        <area id="honeycreeper" shape="poly" coords="242,79,251,75,258,73,256,78,262,87,254,86,248,85,246,89,240,82" alt="<?php echo get_field('popup_content', $species['hawaiian-honeycreeper']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['hawaiian-honeycreeper']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['hawaiian-honeycreeper']->ID) . '</a></span>'; ?>" title="<?php echo $species['hawaiian-honeycreeper']->post_title . '<em>' . get_field('latin_name', $species['hawaiian-honeycreeper']->ID) . '</em>'; ?>"  href="#" data-target="#species-honeycreeper" />
                        <area id="honeycreeper2" shape="poly" coords="236,73,238,71,249,68,245,66,246,64,247,61,246,56,243,55,239,56,239,55,237,54,234,56,234,65,231,66,227,67,234,74" alt="<?php echo get_field('popup_content', $species['hawaiian-honeycreeper']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['hawaiian-honeycreeper']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['hawaiian-honeycreeper']->ID) . '</a></span>'; ?>" title="<?php echo $species['hawaiian-honeycreeper']->post_title . '<em>' . get_field('latin_name', $species['hawaiian-honeycreeper']->ID) . '</em>'; ?>"  href="#" data-target="#species-honeycreeper2"  />

                        <area id="rhino" shape="poly" coords="212.1999969482422,166,214.1999969482422,161,214.1999969482422,156,212.1999969482422,150,213.1999969482422,144,216.1999969482422,138,216.1999969482422,133,212.1999969482422,135,214.1999969482422,128,214.1999969482422,118,216.1999969482422,107,222.1999969482422,100,229.1999969482422,93,235.1999969482422,92,249.1999969482422,93,261.1999969482422,95,278.1999969482422,94,288.1999969482422,89,295.1999969482422,89,303.1999969482422,89,313.1999969482422,89,317.1999969482422,94,320.1999969482422,87,324.1999969482422,92,323.1999969482422,97,332.1999969482422,90,331.1999969482422,94,325.1999969482422,102,329.1999969482422,112,334.1999969482422,114,339.1999969482422,110,339.1999969482422,119,345.1999969482422,120,350.1999969482422,114,354.1999969482422,109,356.1999969482422,100,356.1999969482422,115,351.1999969482422,122,344.1999969482422,131,342.1999969482422,139,334.1999969482422,139,324.1999969482422,135,319.1999969482422,132,314.1999969482422,128,310.1999969482422,133,305.1999969482422,134,304.1999969482422,136,301.1999969482422,137,301.1999969482422,158,306.1999969482422,166,301.1999969482422,168,296.1999969482422,167,292.1999969482422,165,295.1999969482422,161,290.1999969482422,151,289.1999969482422,161,290.1999969482422,166,283.1999969482422,166,280.1999969482422,163,282.1999969482422,159,280.1999969482422,139,268.1999969482422,142,260.1999969482422,142,251.1999969482422,141,247.1999969482422,139,243.1999969482422,135,244.1999969482422,153,252.1999969482422,160,250.1999969482422,163,247.1999969482422,164,240.1999969482422,163,238.1999969482422,162,239.1999969482422,159,234.1999969482422,154,232.1999969482422,151,231.1999969482422,145,230.1999969482422,138,225.1999969482422,145,223.1999969482422,153,221.1999969482422,160,225.1999969482422,167,219.1999969482422,168,217.1999969482422,168" alt="<?php echo get_field('popup_content', $species['northern-white-rhinoceros']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['northern-white-rhinoceros']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['northern-white-rhinoceros']->ID) . '</a></span>'; ?>" title="<?php echo $species['northern-white-rhinoceros']->post_title . '<em>' . get_field('latin_name', $species['northern-white-rhinoceros']->ID) . '</em>'; ?>"  href="#" data-target="#species-rhino"  />
                        <area id="wallaby" shape="poly" coords="348.40000915527344,168.8000030517578,351.40000915527344,167.8000030517578,347.40000915527344,166.8000030517578,346.40000915527344,163.8000030517578,348.40000915527344,161.8000030517578,350.40000915527344,161.8000030517578,351.40000915527344,160.8000030517578,351.40000915527344,159.8000030517578,351.40000915527344,157.8000030517578,353.40000915527344,157.8000030517578,354.40000915527344,155.8000030517578,353.40000915527344,153.8000030517578,351.40000915527344,152.8000030517578,350.40000915527344,151.8000030517578,347.40000915527344,150.8000030517578,347.40000915527344,153.8000030517578,343.40000915527344,153.8000030517578,341.40000915527344,154.8000030517578,339.40000915527344,154.8000030517578,338.40000915527344,156.8000030517578,337.40000915527344,158.8000030517578,335.40000915527344,160.8000030517578,334.40000915527344,165.8000030517578,327.40000915527344,165.8000030517578,320.40000915527344,165.8000030517578,343.40000915527344,168.8000030517578" alt="<?php echo get_field('popup_content', $species['tanami-rufous-hair-wallaby']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['tanami-rufous-hair-wallaby']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['tanami-rufous-hair-wallaby']->ID) . '</a></span>'; ?>" title="<?php echo $species['tanami-rufous-hair-wallaby']->post_title . '<em>' . get_field('latin_name', $species['tanami-rufous-hair-wallaby']->ID) . '</em>'; ?>"  href="#" data-target="#species-wallaby" />
                        <area id="bucardo" shape="poly" coords="380.6000061035156,166,376.6000061035156,165,376.6000061035156,162,376.6000061035156,149,374.6000061035156,150,373.6000061035156,165,371.6000061035156,166,367.6000061035156,166,361.6000061035156,165,359.6000061035156,153,359.6000061035156,144,358.6000061035156,136,362.6000061035156,129,368.6000061035156,127,372.6000061035156,126,374.6000061035156,125,375.6000061035156,123,373.6000061035156,121,371.6000061035156,117,371.6000061035156,113,373.6000061035156,112,370.6000061035156,108,367.6000061035156,107,366.6000061035156,109,364.6000061035156,108,366.6000061035156,104,370.6000061035156,103,377.6000061035156,109,381.6000061035156,108,387.6000061035156,104,392.6000061035156,103,400.6000061035156,104,401.6000061035156,109,398.6000061035156,106,387.6000061035156,108,383.6000061035156,114,389.6000061035156,115,384.6000061035156,121,384.6000061035156,128,388.6000061035156,135,385.6000061035156,142,382.6000061035156,151" alt="<?php echo get_field('popup_content', $species['bucardo']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['bucardo']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['bucardo']->ID) . '</a></span>'; ?>" title="<?php echo $species['bucardo']->post_title . '<em>' . get_field('latin_name', $species['bucardo']->ID) . '</em>'; ?>"  href="#" data-target="#species-bucardo"  />
                        <area id="dodo" shape="poly" coords="422.20001220703125,169,411.20001220703125,169,410.20001220703125,164,415.20001220703125,162,415.20001220703125,160,409.20001220703125,156,405.20001220703125,151,402.20001220703125,143,402.20001220703125,139,404.20001220703125,134,402.20001220703125,134,398.20001220703125,137,396.20001220703125,138,394.20001220703125,136,395.20001220703125,133,398.20001220703125,131,400.20001220703125,129,401.20001220703125,125,408.20001220703125,126,411.20001220703125,136,421.20001220703125,138,429.20001220703125,143,436.20001220703125,143,436.20001220703125,151,431.20001220703125,159,423.20001220703125,161,420.20001220703125,162" alt="<?php echo get_field('popup_content', $species['dodo']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['dodo']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['dodo']->ID) . '</a></span>'; ?>" title="<?php echo $species['dodo']->post_title . '<em>' . get_field('latin_name', $species['dodo']->ID) . '</em>'; ?>" href="#" data-target="#species-dodo" />

                        <area id="pigeon" shape="poly" coords="415,23,409,5,404,8,403,21,400,23,407,29,415,34,430,32" alt="<?php echo get_field('popup_content', $species['passenger-pigeon']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['passenger-pigeon']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['passenger-pigeon']->ID) . '</a></span>'; ?>" title="<?php echo $species['passenger-pigeon']->post_title . '<em>' . get_field('latin_name', $species['passenger-pigeon']->ID) . '</em>'; ?>"  href="#" data-target="#species-pigeon" />
                        <area id="pigeon2" shape="poly" coords="405.3999938964844,51,390.3999938964844,44,390.3999938964844,35,387.3999938964844,30,383.3999938964844,30,379.3999938964844,36,376.3999938964844,41,370.3999938964844,43,369.3999938964844,45,378.3999938964844,48,388.3999938964844,48" alt="<?php echo get_field('popup_content', $species['passenger-pigeon']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['passenger-pigeon']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['passenger-pigeon']->ID) . '</a></span>'; ?>" title="<?php echo $species['passenger-pigeon']->post_title . '<em>' . get_field('latin_name', $species['passenger-pigeon']->ID) . '</em>'; ?>"  href="#" data-target="#species-pigeon2" />
                        <area id="mammoth" shape="poly" coords="393.8000183105469,52,381.8000183105469,65,380.8000183105469,83,386.8000183105469,94,393.8000183105469,98,401.8000183105469,102,412.8000183105469,102,417.8000183105469,115,424.8000183105469,123,437.8000183105469,128,447.8000183105469,123,449.8000183105469,118,447.8000183105469,111,443.8000183105469,109,438.8000183105469,111,436.8000183105469,113,432.8000183105469,115,429.8000183105469,104,431.8000183105469,94,434.8000183105469,90,438.8000183105469,99,445.8000183105469,96,455.8000183105469,95,462.8000183105469,101,460.8000183105469,110,457.8000183105469,126,451.8000183105469,133,449.8000183105469,140,447.8000183105469,148,445.8000183105469,156,443.8000183105469,161,442.8000183105469,165,456.8000183105469,164,463.8000183105469,162,463.8000183105469,153,464.8000183105469,147,475.8000183105469,138,487.8000183105469,121,501.8000183105469,155,496.8000183105469,165,496.8000183105469,169,509.8000183105469,169,518.8000183105469,166,519.8000183105469,162,516.8000183105469,128,528.8000183105469,128,518.8000183105469,153,524.8000183105469,161,533.8000183105469,160,537.8000183105469,158,538.8000183105469,149,539.8000183105469,145,544.8000183105469,136,550.8000183105469,134,549.8000183105469,119,552.8000183105469,108,556.8000183105469,95,561.8000183105469,85,566.8000183105469,75,574.8000183105469,67,559.8000183105469,55,536.8000183105469,44,513.8000183105469,37,503.8000183105469,33,492.8000183105469,32,481.8000183105469,34,474.8000183105469,32,467.8000183105469,24,458.8000183105469,23,447.8000183105469,24,443.8000183105469,29,439.8000183105469,43,435.8000183105469,52,428.8000183105469,62,422.8000183105469,73,415.8000183105469,80,414.8000183105469,87,399.8000183105469,90,396.8000183105469,83,395.8000183105469,72,400.8000183105469,61,407.8000183105469,55,394.6000061035156,64,389.6000061035156,80,387.6000061035156,71,388.6000061035156,61" alt="<?php echo get_field('popup_content', $species['mammoth']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['mammoth']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['mammoth']->ID) . '</a></span>'; ?>" title="<?php echo $species['mammoth']->post_title . '<em>' . get_field('latin_name', $species['mammoth']->ID) . '</em>'; ?>" href="#" data-target="#species-mammoth" />
                        <area id="sloth" shape="poly" coords="552.8000183105469,133,551.8000183105469,117,555.8000183105469,106,559.8000183105469,93,567.8000183105469,78,573.8000183105469,71,578.8000183105469,65,584.8000183105469,57,587.8000183105469,54,591.8000183105469,48,597.8000183105469,43,608.8000183105469,39,616.8000183105469,37,624.8000183105469,41,621.8000183105469,46,628.8000183105469,54,623.8000183105469,57,618.8000183105469,60,614.8000183105469,64,612.8000183105469,65,607.8000183105469,82,607.8000183105469,88,618.8000183105469,88,628.8000183105469,96,631.8000183105469,105,628.8000183105469,112,624.8000183105469,113,621.8000183105469,110,619.8000183105469,110,618.8000183105469,104,598.8000183105469,101,599.8000183105469,112,602.8000183105469,120,610.8000183105469,126,609.8000183105469,136,605.8000183105469,141,604.8000183105469,144,610.8000183105469,151,613.8000183105469,158,610.8000183105469,161,600.8000183105469,162,594.8000183105469,160,587.8000183105469,159,586.8000183105469,152,588.8000183105469,142,579.8000183105469,148,577.8000183105469,152,585.8000183105469,160,588.8000183105469,168,585.8000183105469,169,579.8000183105469,170,570.8000183105469,169,563.8000183105469,167,561.8000183105469,166,559.8000183105469,163,553.8000183105469,161,543.8000183105469,158,538.8000183105469,155,540.8000183105469,152,544.8000183105469,151,550.8000183105469,150,553.8000183105469,148,555.8000183105469,144,554.8000183105469,140" alt="<?php echo get_field('popup_content', $species['giant-sloth']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['giant-sloth']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['giant-sloth']->ID) . '</a></span>'; ?>" title="<?php echo $species['giant-sloth']->post_title . '<em>' . get_field('latin_name', $species['giant-sloth']->ID) . '</em>'; ?>" href="#" data-target="#species-sloth" />
                        <area id="macrauchenia" shape="poly" coords="606.6000366210938,121,620.6000366210938,116,628.6000366210938,114,642.6000366210938,116,652.6000366210938,117,661.6000366210938,116,666.6000366210938,109,672.6000366210938,105,680.6000366210938,106,691.6000366210938,110,692.6000366210938,117,690.6000366210938,118,687.6000366210938,115,680.6000366210938,114,673.6000366210938,115,668.6000366210938,120,662.6000366210938,125,657.6000366210938,131,652.6000366210938,135,650.6000366210938,143,654.6000366210938,149,657.6000366210938,157,656.6000366210938,164,653.6000366210938,166,651.6000366210938,162,653.6000366210938,158,648.6000366210938,154,646.6000366210938,153,647.6000366210938,159,646.6000366210938,164,646.6000366210938,168,642.6000366210938,169,641.6000366210938,167,640.6000366210938,142,636.6000366210938,141,629.6000366210938,139,623.6000366210938,138,619.6000366210938,138,617.6000366210938,144,616.6000366210938,149,612.6000366210938,151,604.6000366210938,145,609.6000366210938,141,610.6000366210938,134,612.6000366210938,128" alt="<?php echo get_field('popup_content', $species['macrauchenia']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['macrauchenia']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['macrauchenia']->ID) . '</a></span>'; ?>" title="<?php echo $species['macrauchenia']->post_title . '<em>' . get_field('latin_name', $species['macrauchenia']->ID) . '</em>'; ?>"  href="#" data-target="#species-macrauchenia" />
                        <area id="dinosaur" shape="poly" coords="711.4000244140625,167,709.4000244140625,166,712.4000244140625,159,717.4000244140625,153,722.4000244140625,151,730.4000244140625,154,732.4000244140625,162,735.4000244140625,160,736.4000244140625,152,732.4000244140625,151,736.4000244140625,149,742.4000244140625,146,744.4000244140625,145,750.4000244140625,144,754.4000244140625,141,758.4000244140625,149,762.4000244140625,144,767.4000244140625,137,769.4000244140625,133,778.4000244140625,142,785.4000244140625,143,783.4000244140625,138,780.4000244140625,132,789.4000244140625,135,789.4000244140625,131,786.4000244140625,127,777.4000244140625,122,772.4000244140625,121,763.4000244140625,124,749.4000244140625,124,734.4000244140625,123,723.4000244140625,124,709.4000244140625,125,699.4000244140625,127,687.4000244140625,125,680.4000244140625,123,673.4000244140625,123,664.4000244140625,124,686.4000244140625,130,694.4000244140625,135,704.4000244140625,138,712.4000244140625,138,716.4000244140625,137,719.4000244140625,145,713.4000244140625,148,707.4000244140625,156,704.4000244140625,165" alt="<?php echo get_field('popup_content', $species['dinosaur']->ID) . '<span class=\'wiki-link\'><a href=\'' . get_field('wiki_link', $species['dinosaur']->ID) . '\' target=\'_blank\'>' . get_field('wiki_link', $species['dinosaur']->ID) . '</a></span>'; ?>" title="<?php echo $species['dinosaur']->post_title . '<em>' . get_field('latin_name', $species['dinosaur']->ID) . '</em>'; ?>"  href="#" data-target="#species-dinosaur" />


                    </map>
                    <div id="species-map">
                        <img class="map" src="<?php echo get_template_directory_uri(); ?>/ui/continuum/hover-map.png" usemap="#species-hover-map" />
                    </div>

                    <div id="species-bat" class="species-hover"></div>
                    <div id="species-bucardo" class="species-hover"></div>
                    <div id="species-dinosaur" class="species-hover"></div>
                    <div id="species-dodo" class="species-hover"></div>
                    <div id="species-ferret" class="species-hover"></div>
                    <div id="species-frog" class="species-hover"></div>
                    <div id="species-frog2" class="species-hover"></div>
                    <div id="species-giraffe" class="species-hover"></div>
                    <div id="species-honeycreeper" class="species-hover"></div>
                    <div id="species-honeycreeper2" class="species-hover"></div>
                    <div id="species-houbara" class="species-hover"></div>
                    <div id="species-macrauchenia" class="species-hover"></div>
                    <div id="species-mammoth" class="species-hover"></div>
                    <div id="species-pigeon" class="species-hover"></div>
                    <div id="species-pigeon2" class="species-hover"></div>
                    <div id="species-przewalski" class="species-hover"></div>
                    <div id="species-rhino" class="species-hover"></div>
                    <div id="species-sloth" class="species-hover"></div>
                    <div id="species-wallaby" class="species-hover"></div>
                    <div id="species-wildcat" class="species-hover"></div>


                </div>

                <div id="status-container">
                    <div id="declining-box">
                        <div class="arrow arrow-right arrow-start"></div>
                        <span>Declining</span>
                        <span>Severe Bottleneck</span>
                        <span>Extinct in the Wild</span>
                        <div class="arrow arrow-right"></div>
                    </div>
                    <div id="degrading-box">
                        <span>Degrading DNA</span>
                        <div class="arrow arrow-right"></div>
                    </div>
                    <div id="nodna-box">
                        <span>No DNA</span>
                        <div class="arrow arrow-right"></div>
                    </div>

                    <div id="recovering-box">
                        <span>Recovering</span>
                        <div class="arrow arrow-left"></div>
                    </div>
                    <div id="reintroduction-box">
                        <span>Reintroduction</span>
                        <div class="arrow arrow-left"></div>
                    </div>
                    <div id="revivable-box">
                        <span>Revivable</span>
                        <div class="arrow arrow-left"></div>
                    </div>


                </div>

                <h2 id="biotech-heading">How Biotechnology Can Help</h2>

                <ul id="biotech-list">
                    <li><a id="bio-listitem1" href="" data-hint="<?php echo htmlentities($continuum_options['listitem1_popup']); ?>"><?php echo $continuum_options['listitem1_heading']; ?></a></li>
                    <li><a id="bio-listitem2" href="" data-hint="<?php echo htmlentities($continuum_options['listitem2_popup']); ?>"><?php echo $continuum_options['listitem2_heading']; ?></a></li>
                    <li><a id="bio-listitem3" href="" data-hint="<?php echo htmlentities($continuum_options['listitem3_popup']); ?>"><?php echo $continuum_options['listitem3_heading']; ?></a></li>
                    <li><a id="bio-listitem4" href="" data-hint="<?php echo htmlentities($continuum_options['listitem4_popup']); ?>"><?php echo $continuum_options['listitem4_heading']; ?></a></li>
                    <li><a id="bio-listitem5" href="" data-hint="<?php echo htmlentities($continuum_options['listitem5_popup']); ?>"><?php echo $continuum_options['listitem5_heading']; ?></a></li>
                    <li><a id="bio-listitem6" href="" data-hint="<?php echo htmlentities($continuum_options['listitem6_popup']); ?>"><?php echo $continuum_options['listitem6_heading']; ?></a></li>
                </ul>
                <br class="clear" />
            </div>
            
            <?php the_field('below_chart'); ?>
            
        </div>

        <script>
            jQuery(document).ready(function(){
                
                
                
                // list item 1
                $('#bio-listitem1')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem1_species1']); ?>",
                            title: $('#giraffe').attr('title')
                        },
                        position: {
                            target: $('#species-giraffe'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem1_species2']); ?>",
                            title: $('#przewalski').attr('title')
                        }, 
                        position: {
                            target: $('#species-przewalski'),
                            my: 'left bottom',
                            at: 'right center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });
                
                // list item 2
                $('#bio-listitem2')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem2_species1']); ?>",
                            title: $('#mammoth').attr('title')
                        },
                        position: {
                            target: $('#species-mammoth'),
                            my: 'bottom left',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem2_species2']); ?>",
                            title: $('#pigeon').attr('title')
                        }, 
                        position: {
                            target: $('#species-pigeon'),
                            my: 'right bottom',
                            at: 'left center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });                
                
                
                // list item 3
                $('#bio-listitem3')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem3_species1']); ?>",
                            title: $('#wildcat').attr('title')
                        },
                        position: {
                            target: $('#species-wildcat'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem3_species2']); ?>",
                            title: $('#rhino').attr('title')
                        }, 
                        position: {
                            target: $('#species-rhino'),
                            my: 'left bottom',
                            at: 'top right'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem3_species3']); ?>",
                            title: $('#ferret').attr('title')
                        }, 
                        position: {
                            target: $('#species-ferret'),
                            my: 'left top',
                            at: 'right bottom'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });    
                
                // list item 4
                $('#bio-listitem4')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem4_species1']); ?>",
                            title: $('#mammoth').attr('title')
                        },
                        position: {
                            target: $('#species-mammoth'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem4_species2']); ?>",
                            title: $('#frog').attr('title')
                        }, 
                        position: {
                            target: $('#species-frog'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });  
                
                // list item 5
                $('#bio-listitem5')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem5_species1']); ?>",
                            title: $('#houbara').attr('title')
                        },
                        position: {
                            target: $('#species-houbara'),
                            my: 'bottom left',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem5_species2']); ?>",
                            title: $('#pigeon').attr('title')
                        }, 
                        position: {
                            target: $('#species-pigeon'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });  
                
                // list item 6
                $('#bio-listitem6')
                    .qtip({ 
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem6_species1']); ?>",
                            title: $('#ferret').attr('title')
                        },
                        position: {
                            target: $('#species-ferret'),
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            text: "<?php echo htmlspecialchars($continuum_options['listitem6_species2']); ?>",
                            title: $('#bucardo').attr('title')
                        }, 
                        position: {
                            target: $('#species-bucardo'),
                            my: 'bottom left',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        }
                    })
                    .removeData('qtip')
                    .qtip({
                        content: {
                            attr: 'data-hint'
                        },
                        position: {
                            my: 'top middle',
                            at: 'bottom middle'
                        },
                        style: {
                            classes: 'qtip-light qtip-shadow qtip-rounded'
                        }
                    });  
                
                
                
                
                $('#species-hover-map area').each(function() {
                    
        
                    $(this).qtip( {

                        content: {
                            text: $(this).attr('alt'),
                            title: $(this).attr('title')
                        },
                        position: {
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-blue qtip-shadow qtip-rounded'
                        },
                        hide: {
                            delay: 300
                        }
                        
                    }); 
                   
                    
                    
                    $(this).mouseover(function() {
                        
                        target = $(this).attr("data-target");
                        $(target).css({ opacity: 1 }); 

                    }).mouseout(function() {
                        
                        target = $(this).attr("data-target");
                        $(target).css({ opacity: .8 }); 
                        
                    }).click(function(){
                        return false;
                    }).focus(function(){
                         $(this).blur();
                    });
                        
                });
                
                
                $('#continuum-heading')
                    .qtip({ 
                        content: {
                            text: "<?php echo $continuum_options['species_instructions_popup']; ?>"
                        },
                        position: {
                            my: 'bottom left',
                            at: 'top left',
                            adjust: {
                                y: 145,
                                x: 45
                            }
                        },
                        style: {
                            classes: 'qtip-dark qtip-shadow qtip-rounded'
                        },
                        show: {
                            ready: true
                        },
                        hide: {
                            target: $('#species-hover-map area'),
                            delay: 500
                        }
                    });
                    
                    $('#biotech-list')
                    .qtip({ 
                        content: {
                            text: "<?php echo $continuum_options['biotech_instructions_popup']; ?>"
                        },
                        position: {
                            my: 'bottom center',
                            at: 'top right',
                            adjust: {
                                y: 5,
                                x: -245
                            }
                        },
                        style: {
                            classes: 'qtip-dark qtip-shadow qtip-rounded'
                        },
                        show: {
                            ready: true
                        },
                        hide: {
                            target: $('#biotech-list li'),
                            delay: 500
                        },
                        events: {
                            hide: function(event, api) {
                                api.destroy();
                            }
                        }
                    });
                                 
                
            });
            
        </script>
        
<?php get_footer();