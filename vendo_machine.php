<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENDO</title>
</head>
<body>

<div class="container">
    <h2>VENDO MACHINE</h2>

    <form method="post" action="">
        <fieldset>
            <legend>Choose Your Drinks:</legend>
            <div>
                <input type="checkbox" name="selections[]" value="Coke-15" id="coke-option">
                <label for="coke-option">Coke - ₱15</label>
            </div>
            <div>
                <input type="checkbox" name="selections[]" value="Sprite-20" id="sprite-option">
                <label for="sprite-option">Sprite - ₱20</label>
            </div>
            <div>
                <input type="checkbox" name="selections[]" value="Royal-20" id="royal-option">
                <label for="royal-option">Royal - ₱20</label>
            </div>
            <div>
                <input type="checkbox" name="selections[]" value="Pepsi-15" id="pepsi-option">
                <label for="pepsi-option">Pepsi - ₱15</label>
            </div>
            <div>
                <input type="checkbox" name="selections[]" value="MountainDew-20" id="mountaindew-option">
                <label for="mountaindew-option">Mountain Dew - ₱20</label>
            </div>
        </fieldset>

        <fieldset>
            <legend>Order Details:</legend>
            <div>
                <label for="size_choice">Size:</label>
                <select name="size_choice" id="size_choice">
                    <option value="Standard">Standard</option>
                    <option value="Upgraded">Upgraded (add ₱5)</option>
                    <option value="Jumbo">Jumbo (add ₱10)</option>
                </select>
            </div>
            <div>
                <label for="quantity_input">Quantity:</label>
                <input type="number" name="quantity_input" id="quantity_input" value="0" min="1">
            </div>
            <button type="submit" name="confirm_order">Confirm Order</button>
        </fieldset>
    </form>
</div>

<?php
if (isset($_POST['confirm_order']) && isset($_POST['selections']) && $_POST['quantity_input'] > 0) {
    $chosenItems = $_POST['selections'];
    $chosenSize = $_POST['size_choice'];
    $quantity = (int)$_POST['quantity_input'];
    $totalQuantity = 0;
    $totalCost = 0;

    echo "<div class='summary_section'>";
    echo "<h4>Order Summary:</h4><ul>";

    foreach ($chosenItems as $item) {
        list($drinkName, $price) = explode("-", $item);
        $price = (int)$price;

        // Adjust price based on chosen size
        if ($chosenSize == "Upgraded") {
            $price += 5;
        } elseif ($chosenSize == "Jumbo") {
            $price += 10;
        }

        // Calculate total for each drink
        $totalForItem = $price * $quantity;
        $totalQuantity += $quantity;
        $totalCost += $totalForItem;

        // Display each drink summary
        echo "<li>{$quantity} x {$chosenSize} {$drinkName} - ₱{$totalForItem}</li>";
    }

    echo "</ul>";
    echo "<p><strong>Total Items:</strong> {$totalQuantity}</p>";
    echo "<p><strong>Total Cost:</strong> ₱{$totalCost}</p>";
    echo "</div>";
} elseif (isset($_POST['confirm_order'])) {
    echo "<div>No drinks selected. Please try again.</div>";
}
?>
</body>
</html>
