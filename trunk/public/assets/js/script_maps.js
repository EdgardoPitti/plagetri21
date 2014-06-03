jQuery(document).ready(function($){ 
    var coordenada; //utilizada para las coordenadas de las provincias,distritos y corregimientos
    var infowindow = null; //para las ventanas de informacion de google map
    var marker = null;
    $("#id_prov").change(function(){
        $.get("http://localhost/plagetri21/public/distrito", 
        { provincia: $(this).val() }, 
        function(data){
            var campo = $('#id_dist');
            var campo1 = $('#id_correg');
            var posdist = [];
            campo.empty();
            campo1.empty();
            campo.append("<option value='0'>SELECCIONE DISTRITO</option>");
            campo1.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");
            $.each(data, function(index,element) {
                campo.append("<option value='"+ element.id_distrito +","+ element.latitud +","+ element.longitud +"'>" + element.distrito + "</option>");
            });
        });
        
        coordenada = $(this).find(':selected').val().split(',');   
        if(coordenada[0] == 0){
            initialize();
        }else{
            //Inicializamos la función de google maps una vez el DOM este cargado                  
            coordenadas(coordenada, 8);             
        }
       // cargadistrito(coordenada, 8);
    });      
   /* function cargadistrito(distrito, zoom){
        $.get("http://localhost/plagetri21/public/distrito", 
        { provincia: distrito[0] }, 
        function(data){
            $.each(data, function(index, elemento){
                alert(index);
                var latlng = new google.maps.LatLng(elemento.latitud, elemento.longitud);   
                var myOptions = {
                  center: latlng,            
                  zoom: zoom,
                  mapTypeId: google.maps.MapTypeId.ROADMAP              
                };
                map = new google.maps.Map(document.getElementById("map-canvas"),myOptions);              
                //creamos el marcador en el mapa
                marker = new google.maps.Marker({
                    map: map,//el mapa creado en el paso anterior
                    position: latlng//objeto con latitud y longitud
                });
                //marker.push();
                google.maps.event.addListener(marker, 'click', function(){                 
                    infowindow = new google.maps.InfoWindow({
                        content: 'Distrito: ' + elemento.distrito 
                    });
                    infowindow.open(map,marker);                
                });
            });
        });
    }*/
    $("#id_dist").change(function(){
        $.get("http://localhost/plagetri21/public/corregimiento", 
        { distrito: $(this).val() }, 
        function(data){
            var campo = $('#id_correg');            
            campo.empty();
            campo.append("<option value='0'>SELECCIONE CORREGIMIENTO</option>");
            $.each(data, function(index,element) {
                campo.append("<option value='"+ element.id_corregimiento +","+ element.latitud +","+ element.longitud +"'>" + element.corregimiento + "</option>");
            });
        });
        coordenada = $("#id_dist").find(':selected').val().split(',');                      
        //Inicializamos la función de google maps una vez el DOM este cargado                  
        coordenadas(coordenada, 10);            
    });  

    $('#id_correg').change(function(){
        coordenada = $("#id_correg").find(':selected').val().split(',');                      
        //Inicializamos la función de google maps una vez el DOM este cargado                  
        coordenadas(coordenada, 14);
    });

    var map = null;
    function initialize() {                  
        var myOptions = {
          center: new google.maps.LatLng(8.51516, -79.986131),            
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP              
        };
        map = new google.maps.Map(document.getElementById("map-canvas"),myOptions);        
        //Obtener todos los marcadores en cada provincia y comarca extraidos del XML
        $.get('http://localhost/plagetri21/public/assets/marcadores.xml',function(data) {  
            $(data).find('marca').each(function(){
                var lat    = $(this).attr('latitud');  
                var lng    = $(this).attr('longitud');  
                var html   = $(this).attr('provincia');
                var point  = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));  //Posicion de cada provincia
                
                infowindow = new google.maps.InfoWindow({
                    content: ''
                })
                marker = new google.maps.Marker({
                    position: point,
                    map:map,
                    html: html
                });  
                google.maps.event.addListener(marker, "click", function () {                                    
                    infowindow.setContent(this.html);                   
                    infowindow.open(map, this);
                });
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    

    //Funcion para posicionar las provincias, distritos y corregimientos cuando se seleccionan
    var coordinate = null;
    var latlng = null;
    var marker = null;
    function coordenadas(coordinate, zoom){
        latlng = new google.maps.LatLng(coordinate[1], coordinate[2]);   
        var myOptions = {
          center: latlng,            
          zoom: zoom,
          mapTypeId: google.maps.MapTypeId.ROADMAP              
        };
        map = new google.maps.Map(document.getElementById("map-canvas"),myOptions);              
        infowindow = new google.maps.InfoWindow({
            content: ''
        })
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latlng//objeto con latitud y longitud
        });
        google.maps.event.addListener(marker, 'click', function(){                 
            infowindow.setContent('Latitud: ' + coordinate[1] + '<br>Longitud: ' + coordinate[2]); 
            infowindow.open(map,marker);                
        });
    }   
});    
        