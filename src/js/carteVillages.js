const villages = [{nom: 'Espezel', lat: '42.8212', lon: '2.0249'}, {nom: 'Belcaire', lat: '42.8156', lon: '1.9583'}];

const map = L.map('carteVillages').setView([42.80182, 2.06732], 11);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

villages.forEach(village => {
    const marker = L.marker([village.lat, village.lon]).addTo(map);
    marker.bindPopup('<a>' + village.nom + '</a>',{ closeButton: false , className: 'villagePopup' });
});
