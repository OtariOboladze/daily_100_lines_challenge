//activar listener de baja
document.querySelector('#baja').onclick = baja_personas;

function baja_personas() {
  if (confirm("estas seguro?")) {
    //submit del formulario
    document.querySelector('#form_baja').submit();
  }
}
