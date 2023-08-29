<!DOCTYPE html>
<html>
<head>
  <title>Weather App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #77bfe0;
    }

    h1 {
      margin-top: 0;
      text-align: center;
    }

    .search-container {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #794c4c;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
      background-color: #4caf50;
      color: white;
      cursor: pointer;
    }

    .weather-info {
      max-width: 400px;
      margin: 0 auto;
      background-color: rgb(16, 126, 61);
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .weather-info h2 {
      margin-top: 0;
    }

    .weather-info p {
      margin: 10px 0;
    }

    .weather-error {
      color: red;
      text-align: center;
      margin-top: 20px;
    }
    </style>
    
</head>
<body>
  <h1>Weather App</h1>

  <div>
    <input type="text" id="cityInput" placeholder="Enter city name">
    <button onclick="searchWeather()">Search</button>
  </div>

  <div id="weatherInfo"></div>
  <p class="history">Need Previous data?<a href="history.php"> Click me</a></p> 
  <script src="Weather.js"></script>

</body>
</html>