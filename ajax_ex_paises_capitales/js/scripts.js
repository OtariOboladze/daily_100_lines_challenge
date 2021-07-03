//cargar combo de capitles

consultar_capitales();

//activar listener para combo
document.querySelector("#capitales").onchange = consultar_pais;

function consultar_capitales() {
  //parametros de la peticion
  let servicio = "web_services/consulta_capitales.php";
  let tipo = "get";
  let parametros = {
    method: tipo,
  };

  llamada_ajax(servicio, parametros, tipo);
}

function consultar_pais() {
  // recuperar la capital seleccionada
  let capital = document.querySelector("#capitales").value;

  //parametros de la peticion
  let servicio = "web_services/consulta_pais.php?capital=" + capital;
  let tipo = "get";
  let parametros = {
    method: tipo,
  };
  let pais = llamada_ajax(servicio, parametros, tipo);
  document.querySelector("#capitales").value = pais;
}

async function llamada_ajax(servicio, parametros, tipo_respuesta) {
  //petition ajax
  fetch(servicio, parametros)
    .then((respuesta) => {
      if (respuesta.ok) {
        switch (tipo_respuesta) {
          case "json":
            return respuesta.json();
          case "text":
            return respuesta.text();
          case "blob":
            return respuesta.blob();
          default:
            throw "tipo de respuesta no valida";
        }
      } else {
        console.log(respuesta);
        throw "algo ha ido mal en la peticion";
      }
    })
    .then((mensaje) => {
      return mensaje;
    })
    .catch((error) => {
      console.log(error);
    });
}
