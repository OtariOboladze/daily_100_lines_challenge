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

  try {
    if (nombre2 == "") {
      throw "Nombre obligatorio";
    }
    if (apellidos == "") {
      throw "Apellidos obligatorio";
    }

    //datos la peticion ajax : Fetch
    //1.1 encapsular los datos en un objeto formData
    // let datos = new FormData();
    // datos.append("nombre", nombre2);
    // datos.append("apellidos", apellidos);

    //1.2 crear un objeto formData enviando formulario un bloque como parametro
    let form = document.querySelector("#formulario");

    let datos = new FormData(form);

    //2.servicio a consumir
    let servicio = "web_services/ajax_form.php";

    //3.tipo de peticion
    let peticion = "post";

    //4.montar los parametros de la peticion
    let parametros = {
      method: peticion,
      body: datos,
    };

    //5.envio de la peticion
    fetch(servicio, parametros)
      .then((respuesta) => {
        if (respuesta.ok) {
          // tipo de respuesta: json(), text(), blob()
          return respuesta.json();
        } else {
          console.log(respuesta);
          throw "Algo ha ido mal en la peticion";
        }
      })
      .then((mensaje) => {
        //recibir el mensaje de respuesta del servidor
        // console.log(mensaje);
        respuesta_servidor(mensaje);
      })
      .catch((error) => {
        alert(error);
      });
  } catch (error) {
    document.querySelector("#mensaje").innerText = error;
  }
}

//recoger la respuesta del servidor
function respuesta_servidor(respuesta) {
  // alert(respuesta)
  //extraer de la respuesta codigo y mensaje (si tipo texto)
  // let codigo_respuesta = respuesta.substring(0, 2);
  // let mensaje = respuesta.substring(2);

  //extraer los datos e array
  let codigo_respuesta = respuesta[0];
  let mensaje = respuesta[1];

  if (codigo_respuesta == "00") {
    //enviar mensaje a textarea
    document.querySelector("#texto").value = mensaje;
  } else {
    //enviar mensaje al span
    document.querySelector("#mensaje").innerText = mensaje;
  }
}
