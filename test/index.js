var botones_mod = document.querySelectorAll(".modificar");
botones_mod.forEach(function (item) {
  item.onclick = modificar_personas;
});

function modificar_personas() {
  document.getElementById("form_oculto").submit();
}
