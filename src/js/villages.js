async function villagesAPI(){
    try {
        const rawData = await fetch('../src/assets/listeVillages.json');
        if (!rawData.ok || rawData.status !== 200) {
            console.error(rawData.statusText);
            return;
        }
        const data = await rawData.json();

        // Village markers
        data.villages.forEach(village => {
            if(village.nom != "" || village.latitude != "" || village.longitude != ""){
                const marker = L.marker([village.latitude, village.longitude]).addTo(map);
                    marker.bindPopup('<a href="#">' + village.nom + '</a>',{ closeButton: false , className: 'villagePopup' });
            };
        });

    } catch (error) {
        console.error(error);
    };
};
const map = L.map('carteVillages').setView([42.77436, 2.04929], 11);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

villagesAPI()

const polygon = L.polygon([
    [42.802958, 1.818924],
    [42.753567, 1.869049],
    [42.766675, 1.906128],
    [42.735918, 1.95076],
    [42.733396, 2.003632],
    [42.749029, 2.070923],
    [42.688492, 2.170486],
    [42.658707, 2.167053],
    [42.650122, 2.187653],
    [42.700604, 2.265244],
    [42.771715, 2.28653],
    [42.776755, 2.217178],
    [42.815048, 2.227478],
    [42.873448, 2.130661],
    [42.880493, 2.011185],
    [42.850799, 1.877975]
]).addTo(map);

