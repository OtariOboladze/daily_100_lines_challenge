//activar el listener del boton del formulatio
document.querySelector("#enviar").onclick = enviar_peticion_ajax;

//funcion para realizar la peticion ajax
function enviar_peticion_ajax() {
  //recuperar los datos
  let nombre = document.querySelector("#nombre").value.trim();
  let apellidos = document.querySelector("#apellidos").value.trim();

  //limpiar el span de errorres
  document.querySelector("#mensaje").innerText = "";

  //opcionalmente: validr los datos

  //montar la peticion ajax jQuery
  let datos_peticion = {
    nombre: nombre,
    apellidos: apellidos,
  };
  let servicio = "web_services/ajax_form.php";

  //enviar la peticion ($.post, $.get)
  $.post(servicio, datos_peticion, respuesta_servidor);
}

//recoger la respuesta del servidor
function respuesta_servidor(respuesta) {
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
