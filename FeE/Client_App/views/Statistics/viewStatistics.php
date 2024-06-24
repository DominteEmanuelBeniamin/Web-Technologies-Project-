<?php
$id = $_GET['id'];

$feedbackUrl = "http://localhost/FeE/List_of_Feedbacks/feedbacks?id=".$id;
$feedbackJson = file_get_contents($feedbackUrl);
$data = json_decode($feedbackJson, true);

$ageGroups = [];
$sexGroups = [];
$emotions = [];
$questionResponses = [];

$totalResponses = count($data);

foreach ($data as $feedback) {
    $age = $feedback['age'];
    if (!isset($ageGroups[$age])) {
        $ageGroups[$age] = 0;
    }
    $ageGroups[$age]++;

    $sex = $feedback['sex'];
    if (!isset($sexGroups[$sex])) {
        $sexGroups[$sex] = 0;
    }
    $sexGroups[$sex]++;

    $emotion = $feedback['emotion'];
    if (!isset($emotions[$emotion])) {
        $emotions[$emotion] = 0;
    }
    $emotions[$emotion]++;

    foreach ($feedback['responses'] as $question => $response) {
        if (!isset($questionResponses[$question])) {
            $questionResponses[$question] = [];
        }
        if (is_array($response)) {
            foreach ($response as $resp) {
                if (!isset($questionResponses[$question][$resp])) {
                    $questionResponses[$question][$resp] = 0;
                }
                $questionResponses[$question][$resp]++;
            }
        } else {
            if (!isset($questionResponses[$question][$response])) {
                $questionResponses[$question][$response] = 0;
            }
            $questionResponses[$question][$response]++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Statistics</title>
<link rel="stylesheet" type="text/css" href="stylesforStatistics.css">
</head>
<body>
<div class="container">
    <h2>Statistics for Form ID: <?php echo $id; ?></h2>

    <h3>Age Group Statistics</h3>
    <ul>
        <?php foreach ($ageGroups as $age => $count): ?>
            <li><?php echo htmlspecialchars($age); ?>: <?php echo round(($count / $totalResponses) * 100, 2); ?>%</li>
        <?php endforeach; ?>
    </ul>

    <h3>Sex Group Statistics</h3>
    <ul>
        <?php foreach ($sexGroups as $sex => $count): ?>
            <li><?php echo htmlspecialchars($sex); ?>: <?php echo round(($count / $totalResponses) * 100, 2); ?>%</li>
        <?php endforeach; ?>
    </ul>

    <h3>Emotion Statistics</h3>
    <ul>
        <?php foreach ($emotions as $emotion => $count): ?>
            <li><?php echo htmlspecialchars($emotion); ?>: <?php echo round(($count / $totalResponses) * 100, 2); ?>%</li>
        <?php endforeach; ?>
    </ul>

    <h3>Question Responses Statistics</h3>
    <?php foreach ($questionResponses as $question => $answers): ?>
        <h4><?php echo htmlspecialchars($question); ?></h4>
        <?php if (count($answers) > 1): ?>
            <ul>
                <?php foreach ($answers as $answer => $count): ?>
                    <li><?php echo htmlspecialchars($answer); ?>: <?php echo round(($count / $totalResponses) * 100, 2); ?>%</li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <ul>
                <?php foreach ($answers as $answer => $count): ?>
                    <li><?php echo htmlspecialchars($answer); ?>: <?php echo $count; ?> responses</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
</body>
</html>
