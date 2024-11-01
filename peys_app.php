<?php
$defaultSize = 80;
$defaultColor = '#000000';

// Process form data if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $size = isset($_POST['size']) ? (int)$_POST['size'] : $defaultSize;
    $borderColor = isset($_POST['borderColor']) ? $_POST['borderColor'] : $defaultColor;
} else {
    // Use default values if form not submitted
    $size = $defaultSize;
    $borderColor = $defaultColor;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>

<div class="container">
    <h2>Peys App</h2>

    <form method="post" action="">
        <div>
            <label for="size">Select Photo Size:</label>
            <input type="range" id="size" name="size" min="10" max="150" value="<?php echo $size; ?>">
        </div>

        <div>
            <label for="borderColor">Select Border Color:</label>
            <input type="color" id="borderColor" name="borderColor" value="<?php echo $borderColor; ?>">
        </div>

        <button type="submit" name="process">Process</button>
    </form>

    <div class="photo-container">
        <img src="profile.png" alt="Profile Picture" style="width: <?php echo $size; ?>px; height: auto; border: 5px solid <?php echo $borderColor; ?>;">
    </div>
</div>

</body>
</html>
