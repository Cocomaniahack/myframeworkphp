

       
  //var $body = document.querySelector('body');
  //var body = new Hammer($body);


  //var $botton = document.querySelector(".icon-th-menu");
  //var botton = new Hammer($botton)

(function(){
    $('.sing-up').click(function(){
    var nombre = $('.username').val();
    var email = $('.email').val();
    var pasc = $('.confirm-password').val();
    /*var clase  = $('.error-message').attr('id');*/
    var ps = $('.password').val();
    /*var cps = $('.confirm-password').val();*/

if(nombre <= 1){

   $('.username').css({ "border": "2px solid red"});
   $('.username').focus();
   $('.error-message').attr('class', 'error-message ');
   return false;

}else if(email <= 1){

   $('.email').focus();
   $('.email').css({ "border": "2px solid red"});
   $('.error-message').attr('class', 'error-message ');
   return false;

}else if(ps <= 1 ){

   $('.password').focus();
   $('.password').css({ "border": "2px solid red"});
   $('.error-message').attr('class', 'error-message ');
   return false;

}else if(ps.length <= 1){

   $('.password').focus();
   $('.form-message').css({ "color": "red"});
   return false;

}else if(pasc <= 1){
   
   $('.confirm-password').focus();
   $('.confirm-password').css({ "border": "2px solid red"});
   $('.error-message').attr('class', 'error-message ');
   return false;
}else if(ps !== pasc){

   $('.confirm-password').focus();
   $('.confirm-password').css({ "border": "2px solid red"});
   return false;


}else{

   $('.error-message').attr('class', 'error-message off_active');
 

}




});

$('.text-form').keyup(function(){
      $(this).css({ "border": "2px solid #CCCCCC"});
 });

  $(".icon-th-menu").click( function (){
       $('#collapse').toggleClass('no_active is_active');
   });

    // botton.on('tap', function(){
      //   $('#collapse').toggleClass('no_active is_active') ;

        ///console.log('ha sucedido un pan ');
     //});
    //botton.on('press', function(){
        // $('#collapse').toggleClass('no_active is_active') ;
      //  $('#collapse').toggleClass('no_active is_active') ;
        //console.log('has mantenido pulsado');
   //  });
  

  })();


  (function(){
    var cont = 0;
$('#Shifter-limg').click(function(){
  var cant = cont++;
  if(cant >= 1){
      console.log('se ejecuto mas de una vez ');
  
  }else{
    var next = $(this).children().attr('class','ico-geo');
  console.log("cliak temo"+cant);
   $(this).attr('id','' );
    var API_WEATHER_KEY = "76cd7ff9f4b72ba8655a21ddc5a1a2bd";
    var API_WEATHER_URL = "http://api.openweathermap.org/data/2.5/weather?APPID="+API_WEATHER_KEY+"&";
    
    var cityWeather ={};
        navigator.geolocation.getCurrentPosition(getCoords, ErrorFound);

      function ErrorFound(err){
               console.log('Error numero: '+err )
          };

      function getCoords(position){ 
           var lat = position.coords.latitude; 
           var lon = position.coords.longitude;
           

        $.getJSON(API_WEATHER_URL + "lat=" + lat + "&lon=" + lon,  function getCurrentWeather(data){
              var temperatura = cityWeather.zone = data.main.temp - 273.15;
              var ciudad = cityWeather.zone = data.name ;
              var tem_Max = cityWeather.zone = data.main.temp_max - 273.15;
              var temp_min = cityWeather.zone = data.main.temp_min  - 273.15;
              renderTemplate();
        });

           
        };

      function activateTemplate(id){
          var t = document.querySelector(id);
          return document.importNode(t.content, true);

        }
      function renderTemplate(){
           var clone = activateTemplate("#template--Temp");
            //console.log(clone);
           clone.querySelector("[data-temp]").innerHTML = cityWeather.zone.toFixed(1);
            $("#ico-geo").attr('class','ico-geo display_none');
           $(".Shifter-limg").append(clone);
           
         }
      };  
    });
  
  })();

   
   
