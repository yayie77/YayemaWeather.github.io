<?php
// Database connection details
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'yayema';

// Establish a database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// City and API details
$base_url = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=Opelika&appid=07315d9a93a2321f0dc3b18e1b5580aa";

// Array to hold past weather data
$weather_data = array();

// Get current time
$current_time = time();

// Make API request and decode response
$response = file_get_contents($base_url);
$data = json_decode($response, true);

// Get current date in YYYY-MM-DD format
$now = new DateTime();
$currentDate = $now->format('Y-m-d');

// Extract temperature and date
$temp = ($data['main']['temp']);
$date = $currentDate;

// Check if a record with the same date exists in the database
$checkQuery = "SELECT * FROM weather WHERE date = '$date'";
$results = mysqli_query($conn, $checkQuery);

// Retrieve past weather data from the database
$sevenDaysAgo = date('Y-m-d', strtotime('-7 days'));
$sql = "SELECT * FROM weather WHERE date >= '$sevenDaysAgo'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
     $weather_data[] = array(
        'temperature' => $row['temperature'],
        'date' => $row['date']
    );
}


// If no record exists for the current date, insert the temperature into the database
$row = $results->fetch_assoc();
if (!$row) {
    $sql = "INSERT INTO weather (temperature, date) VALUES ('$temp', '$date')";
    mysqli_query($conn, $sql);
}

// Display past weather data
foreach ($weather_data as $object) {
    echo "<div class='card small'>
        <p class='wind mb-8'>Date: {$object['date']}</p>
        <p class='wind'>Temperature: {$object['temperature']}°C</p>
      </div>";
}

?>