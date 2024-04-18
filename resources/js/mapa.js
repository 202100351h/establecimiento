document.addEventListener('DOMContentLoaded', () => {

    if(document.querySelector('#mapa')){
    
            const lat =  -13.632654;
            const lng =  -72.887214;
        
            const mapa = L.map('mapa').setView([lat, lng], 16);
        
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapa);
        
            let marker;
        
            // Agregar el pin
            marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true
            }).addTo(mapa);
        
            // Detectar movimiento del marker
            marker.on('moveend', function(e) {
            const marker = e.target;
            const posicion = marker.getLatLng();
            // Centrar automáticamente
            mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));
        });
      
    }
});