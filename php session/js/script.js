//activar listener de baja
document.querySelector("#baja").onclick = baja_personas;

var botones_mod = document.querySelectorAll(".modificar");
botones_mod.forEach(function (item) {
  item.onclick = modificar_personas;
});

function baja_personas() {
  if (confirm("estas seguro?")) {
    // submit del formulario
    document.getElementById("form_baja").submit();
  }
}

function modificar_personas() {
  //situar el la etiqueta tr
  let tr = this.closest("tr");
  //recuperar los datos
  let nif = tr.querySelector(".nif").innerText;
  let nombre = tr.querySelector(".nombre").innerText;
  let direccion = tr.querySelector(".direccion").innerText;

  // alert(nif);

  document.querySelector("[name=nif_mod]").value = nif;
  document.querySelector("[name=nombre_mod]").value = nombre;
  document.querySelector("[name=direccion_mod]").value = direccion;

  // alert(nif + " " + nombre + " " + direccion);
  //submit form
  document.getElementById("form_oculto").submit();
}
