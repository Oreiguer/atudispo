AOS.init({
  duration: 700,
  easing: 'slide',
  once: true
});


$("#btn-clientes").click(function(){
  $("#ModalLoginClientes").modal("show");
});


$("#btn-tecnicos").click(function(){
  $("#ModalLoginTecnicos").modal("show");

});

$("#btn-tec-datos-pers").click(function(){
  $("#modal-tec-datos").modal("show");

});

$(obtener_registros_alumnos());

function obtener_registros_alumnos(alumnos){
  
  $.ajax({
    url: 'public/busqueda_evaluacion.php',
    type: 'POST',
    dataType: 'html',
    data: {alumnos: alumnos},  
  })

  .done(function(resultado){
    $("#tabla_resultado").html(resultado);
  })
}

$(document).on('keyup', '#busqueda', function(){
  var valorBusqueda=$(this).val();
  if(valorBusqueda!=""){
    obtener_registros_alumnos(valorBusqueda);
  }else{
    obtener_registros_alumnos();
  }
});

function compruebaPass (){
  var pass = $("#pass").val();  
  var repass = $("#repass").val();

  if(pass !== repass){
    alert('Las contraseñas no coinsiden!!');
    $("#repass").select();
  }
}


function confirma_eliminar (){
    $confirmar = confirm("Desea eliminar el registro?");
    if($confirmar== true){
      return true;
    }else{
      return false;
    }
}

function confirma_salir (){
    $confirmar = confirm("Desea cerrar sesion?");
    if($confirmar== true){
      return true;
    }else{
      return false;
    }
}

function cambio_contrasena (){
  $confirmar = confirm("Desea cambiar la contraseña?");
  if($confirmar== true){
    return true;
  }else{
    return false;
  }
}

function validar_solo_numeros(e){

  key = e.keycode || e.which;
  teclado = String.fromCharCode(key);
  numeros = "1234567890";
  especiales = "8-37-38-46";
  teclado_especial=false;
  for(var i in especiales){
    if(key==especiales[i]){
      teclado_especial=true;
    }
  }
  if(numeros.indexOf(teclado) == -1 && !teclado_especial){
    alert('Ingrese solo numeros');
    return false;
  }
}

function validar_solo_letras(e){
  key = e.keycode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  especiales = [8, 13];
  tecla_especial = false;
  for(var i in especiales){
    if(key == especiales[i]){
    tecla_especial = true;
    break;
    }
  }
  if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert('Ingrese solo letras');
    return false;
  }
}

function validar_contrasena_login(e){
  key = e.keycode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890";
  especiales = [8, 13];
  tecla_especial = false;
  for(var i in especiales){
    if(key == especiales[i]){
    tecla_especial = true;
    break;
    }
  }
  if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert('Ingrese solo letras');
    return false;
  }
}

function validar_solo_letras_con_espacio(e){
  key = e.keycode || e.which;
  tecla = String.fromCharCode(key).toString();
  letras = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
  especiales = [8, 13, 32];
  tecla_especial = false;
  for(var i in especiales){
    if(key == especiales[i]){
    tecla_especial = true;
    break;
    }
  }
  if(letras.indexOf(tecla) == -1 && !tecla_especial){
    alert('Ingrese solo letras');
    return false;
  }
}
