//activar el listener del boton del formulatio
document.querySelector("#enviar").onclick = enviar_peticion_ajax;

//funcion para realizar la peticion ajax
function enviar_peticion_ajax() {
  //recuperar los datos
  let nombre2 = document.querySelector("#nombre").value.trim();
  let apellidos = document.querySelector("#apellidos").value.trim();

  //limpiar el span de errorres
  document.querySelector("#mensaje").innerText = "";

  //opcionalmente: validr los datos

  //montar la peticion ajax jQuery ($.post, $.get)
  let datos_peticion = {
    nombre3: nombre2,
    apellidos: apellidos,
  };
  let servicio = "web_services/ajax_form.php";

  let tipo_peticion = "post";

  //enviar la peticion ($.post, $.get)
  $.ajax({
    url: servicio,
    type: tipo_peticion,
    data: datos_peticion,

    success: function (respuesta) {
      //codigo a ejecutar quendo se reciba la respuesta
      document.querySelector("#mensaje").innerText = "";
      respuesta_servidor(respuesta);
    },
    error: function (error) {
      //codigo a ejecutar si se produce un error en la peticion
      console.log(error);
      alert("Algo ha ido mal");
    },
    complete: function () {
      //codigo a ejecutarcuando la peticion se completa, tanto si hay error como si no hay
      // alert("Peticion completada");
    },
    beforeSend: function () {
      //codgo a ejecutar antes de enviar la peticion
      document.querySelector("#mensaje").innerHTML =
        "<img src='images/bird.gif'>";
    },
  });
}

//recoger la respuesta del servidor
function respuesta_servidor(respuesta) {
  // alert(respuesta)
  //extraer de la respuesta codigo y mensaje (si tipo texto)
  // let codigo_respuesta = respuesta.substring(0, 2);
  // let mensaje = respuesta.substring(2);

  //extraer de la respuesta codigo y mensaje (si tipo json)

  //1. convertir json a array
  let array_respuesta = JSON.parse(respuesta);

  //2. extraer los datos e array
  let codigo_respuesta = array_respuesta[0];
  let mensaje = array_respuesta[1];

  if (codigo_respuesta == "00") {
    //enviar mensaje a textarea
    document.querySelector("#texto").value = mensaje;
  } else {
    //enviar mensaje al span
    document.querySelector("#mensaje").innerText = mensaje;
  }
}
