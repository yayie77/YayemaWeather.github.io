const apiKey = '07315d9a93a2321f0dc3b18e1b5580aa';

 
const defaultCity = 'Opelika';


function fetchWeatherData(city) {
  const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      if (data.cod === '404') {
        displayWeatherError('City not found.');
      } else {
        displayWeatherData(data);
      }
    })
    .catch(error => {
      displayWeatherError('An error occurred while fetching weather data.');
    });
}

// Function to display weather data on the webpage
function displayWeatherData(data) {
  const weatherInfoDiv = document.getElementById('weatherInfo');
  weatherInfoDiv.innerHTML = `
    <h2>${data.name}</h2>
    <p>Temperature: ${data.main.temp} &deg;C</p>
    <p>Humidity: ${data.main.humidity}%</p>
    <p>Weather: ${data.weather[0].description}</p>
  `;
}

// Function to display weather error message on the webpage
function displayWeatherError(errorMessage) {
  const weatherInfoDiv = document.getElementById('weatherInfo');
  weatherInfoDiv.innerHTML = `
    <p>${errorMessage}</p>
  `;
}

// Function to handle the search button click event
function searchWeather() {
  const cityInput = document.getElementById('cityInput');
  const city = cityInput.value.trim();

  if (city !== '') {
    fetchWeatherData(city);
  }
}

// Load weather data for the default city when the app loads
fetchWeatherData(defaultCity);