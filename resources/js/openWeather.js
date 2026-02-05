 /* use este js para evidenciar el uso de js. Pero es mejor realizarlo con blade directamente en el html y es más sencillo */

 document.addEventListener('DOMContentLoaded', function() {
    const weatherElements = document.querySelectorAll('.weather-city-card');
    weatherElements.forEach(element => {
        element.addEventListener('click', function() {
            loadWeatherFromElement(element);
        });
    });
});

 function loadWeatherFromElement(element) {
    const cityId = element.dataset.cityId;
    const cityName = element.dataset.cityName;
    const imagePath = element.dataset.imagePath;

    loadWeather(cityId, cityName, imagePath);
}


function loadWeather(cityId, cityName, imagePath) {
    const errorAlert = document.querySelector('#ajax-error');
    errorAlert.classList.add('hidden');

    // Reiniciar estados de la interface
    document.querySelector('#welcome-message').classList.add('hidden');
    const widget = document.querySelector('#weather-widget');
    const skeleton = document.querySelector('#weather-skeleton');

    widget.classList.add('hidden');
    widget.classList.remove('widget-fade-in');
    skeleton.classList.remove('hidden');

    document.querySelector('#widget-city-name').innerText = cityName;
    const date = new Date();
    document.querySelector('#widget-date').innerText = date.toLocaleDateString('es-CO', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

    fetch(`/cities/${cityId}/weather`)
        .then(response => response.json())
        .then(data => {
            if (data.main) {
                document.querySelector('#widget-temp').innerText = Math.round(data.main.temp) + '°C';
                document.querySelector('#widget-desc').innerText = data.weather[0].description;
                document.querySelector('#widget-humidity').innerText = data.main.humidity + '%';
                document.querySelector('#widget-pressure').innerText = data.main.pressure + ' hPa';
                document.querySelector('#widget-wind').innerText = data.wind.speed + ' m/s';
                document.querySelector('#widget-clouds').innerText = data.clouds.all + '%';
                document.querySelector('#widget-feels-like').innerText = Math.round(data.main.feels_like) + '°';
                document.querySelector('#widget-visibility').innerText = (data.visibility / 1000).toFixed(1) + ' km';

                const rainContainer = document.querySelector('#widget-rain-container');
                const rainValue = document.querySelector('#widget-rain');
                if (data.rain && (data.rain['1h'] || data.rain['3h'])) {
                    const rainAmount = data.rain['1h'] || data.rain['3h'];
                    rainValue.innerText = rainAmount + ' mm';
                    rainContainer.classList.remove('hidden');
                } else {
                    rainContainer.classList.add('hidden');
                }

                const iconCode = data.weather[0].icon;
                document.querySelector('#widget-icon').src = `https://openweathermap.org/img/wn/${iconCode}@4x.png`;

                // animacion del skeleton
                skeleton.classList.add('hidden');
                widget.classList.remove('hidden');
                setTimeout(() => {
                    widget.classList.add('widget-fade-in');
                }, 50);
            } else {
                const message = data.message ?? 'Error cargando datos del clima';
                document.querySelector('#ajax-error-message').innerText = message;
                errorAlert.classList.remove('hidden');
                skeleton.classList.add('hidden');
                document.querySelector('#welcome-message').classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.querySelector('#welcome-message').classList.remove('hidden');
            document.querySelector('#ajax-error-message').innerText = 'No se pudo conectar con el servicio de clima.';
            errorAlert.classList.remove('hidden');
            skeleton.classList.add('hidden');
        });
}
