@extends('layouts.app')

@section ('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

<link
rel="stylesheet"
href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/>

@section('content')
<div class="container">
    <h1 class="text-center mt-4">Registrar Establecimiento</h1>
    <div class="row justify-content-center mt-5">
        <form class="col-md-9 col-xs-12 card card-body">
            <fieldset class="border p-4">
                <legend class="text-primary">Nombre y Categoría</legend>
                <div class="form-group">
                    <label for="nombre">Nombre Establecimiento</label>
                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre Establecimiento" name="nombre" value="{{ old('nombre') }}">
                    @error('nombre')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categoria">
                        <option value="" selected disabled>-- Seleccione --</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}"
                                 {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}
                                 >{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen_principal">Imagen Principal</label>
                    <input id="imagen_principal" 
                    type="file" 
                    class="form-control @error('imagen_principal') is-invalid @enderror" 
                    name="nombre" value="{{ old('imagen_principal') }}">
                    @error('imagen_principal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </fieldset>
            <fieldset class="border p-4">
                <legend class="text-primary">Ubicacion</legend>
                <div class="form-group">
                    <label for="nombre">Coloca la direecion del establecimiento</label>
                    <input id="formbuscador" 
                    type="text" 
                    class="form-control @error('nombre') is-invalid @enderror" 
                    placeholder="Calle del Negocio o establecimiento"
                    class="form-control"><p class="text-secondary mt-5 mb-3 text-center">El asistente colocara una direecion estimada, mueve el PIN hacia el lugar correcto</p>
                </div>

                <div class="form-group">
                    <div id ="mapa" style="height: 400px;"></div>

                    <p class="informacion">Confirma que los siguientes campos son correctos</p>

                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input
                            type="text"
                            id="direccion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            placeholder="Dirección"
                            value="{{ old('direccion') }}"
                        >
                        @error('direccion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="urbanizacion">Urbanizacion</label>
                        <input
                            type="text"
                            id="urbanizacion"
                            class="form-control @error('direccion') is-invalid @enderror"
                            placeholder="Urbanizacion"
                            value="{{ old('urbanizacion') }}"
                        >
                        @error('urbanizacion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <input type="hidden" id="lat" name="lat" value="{{old('lat')}}">
                    <input type="hidden" id="lng" name="lng" value="{{old('lng')}}">
                </fieldset>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    
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


    //Geocode Service
    const geocodeService = L.esri.Geocoding.geocodeService();

    // Detectar movimiento del marker
    marker.on('moveend', function(e) {
    const marker = e.target;
    const posicion = marker.getLatLng();
    // Centrar automáticamente
    mapa.panTo(new L.LatLng(posicion.lat, posicion.lng));

    // Reverse Geocoding, cuando el usuario reubica el pin
    geocodeService.reverse().latlng(posicion, 16).run(function(error,resultado) {
        console.log(error);

        console.log(resultado.address);

        marker.bindPopu(resultado.address.longLabel)
        marker.openPopup();

    })
});


});
</script>


<script src="https://unpkg.com/esri-leaflet" defer></script>
<script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
@endsection