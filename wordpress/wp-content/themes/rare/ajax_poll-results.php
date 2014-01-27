<?php
/*
 * AJAX Poll Results updater
 */
require_once("../../../wp-config.php");



$survey_id = $_GET['survey'];
$species_id = $_GET['species'];

$survey = get_post($survey_id);


require_once(ABSPATH . 'wp-content/plugins/contact-form-7-to-database-extension/CFDBFormIterator.php');
$exp = new CFDBFormIterator();
$exp->export($survey->post_title, array());

$count = 0;

$pie_data = array();
$question = 1;

// setup the data
while ($row = $exp->nextRow()) {
    $question_count++;

    while (array_key_exists("question$question", $row)) {

        $pie_data["question$question"][strtolower($row["question$question"])]++;

        $question++;
    }

    $question = 1;
}


// show the data
$question = 1;
$section = 2;
$q = 1;


while (array_key_exists("question$question", $pie_data)) {
    ?>

    <div class="result-question">
        <h3><strong>Question <?php echo $question; ?></strong></h3>
        <p>
    <?php
    $field_name = "sec{$section}_question{$q}";
    $field = get_field_object($field_name, $species_id);

    if ($field['label'] == '') {

        $section++;
        $q = 1;

        $field_name = "sec{$section}_question{$q}";
        $field = get_field_object($field_name, $species_id);
    }

    echo $field['label'];
    ?>
        </p>

            <?php
            // get percentages

            $total_answers = $pie_data["question$question"]['yes'] + $pie_data["question$question"]['maybe'] + $pie_data["question$question"]['no'];
            ?>
        <span class="pie-legend">
            <span class="pie-legend-yes"><span></span>Yes - <?php echo number_format(( round($pie_data["question$question"]['yes'] / $total_answers * 100)), 0); ?>%</span>
            <span class="pie-legend-maybe"><span></span>Maybe - <?php echo number_format(( round($pie_data["question$question"]['maybe'] / $total_answers * 100)), 0); ?>%</span>
            <span class="pie-legend-no"><span></span>No - <?php echo number_format(( round($pie_data["question$question"]['no'] / $total_answers * 100)), 0); ?>%</span>
        </span>
    </div>
    <canvas class="result-pie-chart" id="canvas_question<?php echo $question; ?>" height="150" width="150"></canvas>

    <hr />
    <script>

        $(document).ready(function(){

            question_data<?php echo $question; ?> = [
                {
                    value: <?php echo array_key_exists('yes', $pie_data["question$question"]) ? $pie_data["question$question"]['yes'] : 0; ?>,
                    color:"#73bf3e"
                },
                {
                    value : <?php echo array_key_exists('maybe', $pie_data["question$question"]) ? $pie_data["question$question"]['maybe'] : 0; ?>,
                    color : "#faca00"
                },
                {
                    value : <?php echo array_key_exists('no', $pie_data["question$question"]) ? $pie_data["question$question"]['no'] : 0; ?>,
                    color : "#cd0d09"
                }

            ];

            var myPie = new Chart(document.getElementById("canvas_question<?php echo $question; ?>").getContext("2d")).Pie(question_data<?php echo $question; ?>);

        });

    </script>

    <?php
    $q++;
    $question++;
}
?>     