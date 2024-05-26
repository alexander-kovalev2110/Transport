<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Transport Parameters</title>
</head>
<body>
    <form action="calculate.php" method="post">
        <label for="passengers">Passengers:</label>
        <input type="number" id="passengers" name="passengers" required><br><br>
        
        <label for="baggage">Baggage (kg): </label>
        <input type="number" id="baggage" name="baggage" required><br><br>
        
        <label for="distance">Distance (km):</label>
        <input type="number" id="distance" name="distance" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
