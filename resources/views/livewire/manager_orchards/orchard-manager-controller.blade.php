<!--<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
  /**
   * @license
   * Copyright 2019 Google LLC. All Rights Reserved.
   * SPDX-License-Identifier: Apache-2.0
   */
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 8,
      center: {
        lat: 19.169934938511595,
        lng: -100.12769729634527,
      },
    });
    const geocoder = new google.maps.Geocoder();
    const infowindow = new google.maps.InfoWindow();

    document.getElementById("submit").addEventListener("click", () => {
      geocodeLatLng(geocoder, map, infowindow);
    });
  }




  function geocodeLatLng(geocoder, map, infowindow) {
    const input = document.getElementById("latlng").value;
    const latlngStr = input.split(",", 2);
    const latlng = {
      lat: parseFloat(latlngStr[0]),
      lng: parseFloat(latlngStr[1]),
    };
    geocoder
      .geocode({
        location: latlng
      })
      .then((response) => {
        if (response.results[0]) {
          map.setZoom(11);

          const marker = new google.maps.Marker({
            position: latlng,
            map: map,
          });
          infowindow.setContent(response.results[0].formatted_address);
          infowindow.open(map, marker);
        } else {
          window.alert("No results found");
        }
      })
      .catch((e) => window.alert("Geocoder failed due to: " + e));
  }

  //AUTOEJECUTAR
  //SINTAXIS
  //(function foo(){} ());

  window.initMap = initMap;
</script>
<style>
  /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
  /*
       * Always set the map height explicitly to define the size of the div element
       * that contains the map.
       */
  #map {
    height: 100%;
    margin: 10px 3px 10px 5px;
    /* 10px arriba, 3px derecha, 30px abajo, 5px izquierda */
    ;
  }

  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #latlng {
    width: 225px;
  }
</style>

-->

<div>
  @include('livewire.orchards.acciones_huerto')

  <script>
    show_nav(), info()
  </script>

  <section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto border border-indigo-400 " style="background-image: {{asset('/images/aguacater.jpg')}}">
      <div class="flex justify-center">
        <div class="mt-6 lg:w-2/3 lg:mt-0 lg:mx-6 bg-gray-100 rounded-xl items-center grid justify-items-center">

          <P class=" mt-4 text-2xl font-semibold text-gray-800  dark:text-white ">
            Información del Huerto
          </P>

          <div class="xl:shrink-0 py-2">
            <img class=" h-48 w-full object-cover rounded-lg" src="{{url("storage/".$datos_orchard->path_image)}}" alt="Image no vista">
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 w-full divide-y divide-x ">
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Tipo de Aguacate:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->type_avo->type_avocado}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Tipo de topografia:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->type_topo->type_topography}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Tipo de Suelo:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->type_soi->type_soil}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Tipo de Clima:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->climate_typ->climate_type}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Ubicación del Huerto:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->location_orchard}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Altitud:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->altitude}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Superficie:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->surface}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Estado:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->state}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Año de Creación:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->creation_year}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Densidad de plantacion:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->planting_density}}</div>
            </div>
            <div class="flex justify-between my-3">
              <div class=" font-bold w-1/2 text-left pr-4">Riego:</div>
              <div class="text-left w-1/2 font-semibold text-center">{{$datos_orchard->irrigation}}</div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!--

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
  /**
   * @license
   * Copyright 2019 Google LLC. All Rights Reserved.
   * SPDX-License-Identifier: Apache-2.0
   */
  // This example creates a simple polygon representing the Bermuda Triangle.
  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 5,
      center: {
        lat: 24.886,
        lng: -70.268
      },
      mapTypeId: "terrain",
    });
    // Define the LatLng coordinates for the polygon's path.
    const triangleCoords = [{
        lat: 25.774,
        lng: -80.19
      },
      {
        lat: 18.466,
        lng: -66.118
      },
      {
        lat: 32.321,
        lng: -64.757
      },
      {
        lat: 25.774,
        lng: -80.19
      },
    ];
    // Construct the polygon.
    const bermudaTriangle = new google.maps.Polygon({
      paths: triangleCoords,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: "#FF0000",
      fillOpacity: 0.35,
    });

    bermudaTriangle.setMap(map);
  }

  window.initMap = initMap;
</script>
<style>
  /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
  /**
       * Always set the map height explicitly to define the size of the div element
       * that contains the map.
       */
  #map {
    height: 100%;
  }

  /* Optional: Makes the sample page fill the window. */
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>

<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMb67_ULC5BeRZD2T75ES111lCpbrfhnc&callback=initMap&v=weekly" defer></script>

-->

<!--RESPALDO DE GEOCODING -->
<!--
<div>
  <style>
    #map {
      height: 100%;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    input[type=text] {
      background-color: #fff;
      border: 0;
      border-radius: 2px;
      box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
      margin: 10px;
      padding: 0 0.5em;
      font: 400 18px Roboto, Arial, sans-serif;
      overflow: hidden;
      line-height: 40px;
      margin-right: 0;
      min-width: 25%;
    }

    input[type=button] {
      background-color: #fff;
      border: 0;
      border-radius: 2px;
      box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
      margin: 10px;
      padding: 0 0.5em;
      font: 400 18px Roboto, Arial, sans-serif;
      overflow: hidden;
      height: 40px;
      cursor: pointer;
      margin-left: 5px;
    }

    input[type=button]:hover {
      background: rgb(235, 235, 235);
    }

    input[type=button].button-primary {
      background-color: #1a73e8;
      color: white;
    }

    input[type=button].button-primary:hover {
      background-color: #1765cc;
    }

    input[type=button].button-secondary {
      background-color: white;
      color: #1a73e8;
    }

    input[type=button].button-secondary:hover {
      background-color: #d2e3fc;
    }

    #response-container {
      background-color: #fff;
      border: 0;
      border-radius: 2px;
      box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
      margin: 10px;
      padding: 0 0.5em;
      font: 400 18px Roboto, Arial, sans-serif;
      overflow: hidden;
      overflow: auto;
      max-height: 50%;
      max-width: 90%;
      background-color: rgba(255, 255, 255, 0.95);
      font-size: small;
    }

    #instructions {
      background-color: #fff;
      border: 0;
      border-radius: 2px;
      box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
      margin: 10px;
      padding: 0 0.5em;
      font: 400 18px Roboto, Arial, sans-serif;
      overflow: hidden;
      padding: 1rem;
      font-size: medium;
    }
  </style>

  <script>
    // @ts-nocheck TODO remove when fixed
    let map;
    let marker;
    let geocoder;
    let responseDiv;
    let response;

    function initMap() {
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 8,
        center: {
          lat: -34.397,
          lng: 150.644
        },
        mapTypeControl: false,
      });
      geocoder = new google.maps.Geocoder();
      const card = document.getElementById("pac-card");
      const input = document.getElementById("pac-input");
      const options = {
        fields: ["formatted_address", "geometry", "name"],
        strictBounds: false,
        types: ["establishment"],
      };
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);
      const autocomplete = new google.maps.places.Autocomplete(input, options);
      autocomplete.bindTo("bounds", map);
      const infowindow = new google.maps.InfoWindow();
      const infowindowContent = document.getElementById("infowindow-content");
      infowindow.setContent(infowindowContent);


      response = document.getElementById("pre");
      responseDiv = document.createElement("div");
      responseDiv.id = "response-container";
      responseDiv.appendChild(response);

      map.controls[google.maps.ControlPosition.LEFT_TOP].push(responseDiv);
      marker = new google.maps.Marker({
        map,
      });
      map.addListener("click", (e) => {
        geocode({
          location: e.latLng
        });
      });

      autocomplete.addListener("place_changed", () => {
        infowindow.close();
        marker.setVisible(false);
        geocode({
          address: input.value
        })
        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
          // User entered the name of a Place that was not suggested and
          // pressed the Enter key, or the Place Details request failed.
          window.alert("No details available for input: '" + place.name + "'");
          return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent =
          place.formatted_address;
        infowindow.open(map, marker);
      });
    }

    function setupClickListener(id, types) {
      const radioButton = document.getElementById(id);

      radioButton.addEventListener("click", () => {
        autocomplete.setTypes(types);
        input.value = "";
      });
    }
    setupClickListener("changetype-all", []);
    biasInputElement.addEventListener("change", () => {
      if (biasInputElement.checked) {
        autocomplete.bindTo("bounds", map);
      } else {
        // User wants to turn off location bias, so three things need to happen:
        // 1. Unbind from map
        // 2. Reset the bounds to whole world
        // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
        autocomplete.unbind("bounds");
        autocomplete.setBounds({
          east: 180,
          west: -180,
          north: 90,
          south: -90
        });
        strictBoundsInputElement.checked = biasInputElement.checked;
      }

      input.value = "";
    });

    function geocode(request) {

      geocoder
        .geocode(request)
        .then((result) => {
          const {
            results
          } = result;

          map.setCenter(results[0].geometry.location);
          marker.setPosition(results[0].geometry.location);
          marker.setMap(map);
          responseDiv.style.display = "block";
          response.innerText = JSON.stringify(result, null, 2);
          return results;
        })
        .catch((e) => {
          alert("Geocode was not successful for the following reason: " + e);
        });
    }
    window.initMap = initMap;
  </script>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  <script>
    const process = {
      env: {}
    };
    process.env.GOOGLE_MAPS_API_KEY =
      "AIzaSyAMb67_ULC5BeRZD2T75ES111lCpbrfhnc";
  </script>

  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script type="module" src="./index.js"></script>

  <div>

    <div id="map" style="width:900px; height: 480px;"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMb67_ULC5BeRZD2T75ES111lCpbrfhnc&callback=initMap&v=weekly" defer></script>
  </div>

  <div>
    <div class="pac-card p-1" id="pac-card">
      <div>
        <div id="title">Autocomplete search</div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location" />
      </div>
      <div class="pac-card " id="pac-card">
        <div id="pac-container">
          <textarea id="pre" rows="15" cols="25" readonly>…</textarea>
        </div>
      </div>
    </div>
    <div id="map" style="width:900px; height: 480px;"></div>
    <div class="p-10" id="infowindow-content">
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMb67_ULC5BeRZD2T75ES111lCpbrfhnc&callback=initMap&libraries=places&v=weekly" defer></script>

  </div>


</div>
-->
