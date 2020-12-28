$(function(){

	$('#nuevo_alumno').on('click',function(){
		$('#formulario_admision')[0].reset();
		$('#pro').val('Registro');
		$('#editaAlumno').hide();
		$('#reg').show();
		$('#registra-alumno').modal({
			show:true,
			backdrop:'static'
		});
	});

  $('#nuevo_docente').on('click',function(){
    $('#form_docente')[0].reset();
    $('#proPerfilCat').val('Registro');
    $('#ediPerfilCat').hide();
    $('#regPerfilCat').show();
    $('#registra-alumno').modal({
      show:true,
      backdrop:'static'
    });
  });


    $('#nueva_clase').on('click',function(){
    $('#formulario_clase')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#link').hide();
    $('#registra-clase').modal({
      show:true,
      backdrop:'static'
    });
  });


    $('#nueva_tarea').on('click',function(){
    $('#formulario_tarea')[0].reset();
    $('#pro2').val('Registro');
    $('#edi2').hide();
    $('#reg2').show();
    $('#registra-tarea').modal({
      show:true,
      backdrop:'static'
    });
  });    
 

    $('#nueva_lectura').on('click',function(){
    $('#formulario_lectura')[0].reset();
    $('#proLec').val('Registro');
    $('#ediLec').hide();
    $('#regLec').show();
    $('#registra-lectura').modal({
      show:true,
      backdrop:'static'
    });
  });


    $('#nuevo_docenteDatos').on('click',function(){
    $('#formulario_docenteDatos')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show(); 
    $('#registra-docenteDatos').modal({
      show:true,
      backdrop:'static'
    });
  });

    $('#nuevo_contacto').on('click',function(){
    $('#formulario_Directorio')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show(); 
            $('#ENVIO').val('NO');

    $('#registra-directorio').modal({
      show:true,
      backdrop:'static'
    });
  });
		});


function pago_nuevo_estudiante(idOrden, idAlumno){
    $('#formulario_pago')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#lb_num_pago').hide();
    $('#num_pago').hide();
    $('#alumno').val(idAlumno);
    $('#idAlumno').val(idAlumno);
    $('#idOrden').val(idOrden);
    $('#registra-pago').modal({
      show:true,
      backdrop:'static'
    });
}
function pago_nuevo(idOrden, idAlumno){
    $('#formulario_pago')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#lb_num_pago').hide();
    $('#num_pago').hide();
    $('#alumno').val(idAlumno);
    $('#idAlumno').val(idAlumno);
    $('#idOrden').val(idOrden);
    $('#registra-pago').modal({
      show:true,
      backdrop:'static'
    });
}
function pago_nuevo_diferencia(idOrden, idAlumno, diferencia){
    $('#formulario_pago_dif')[0].reset();
    $('#pro_dif').val('Registro');
    $('#edi_dif').hide();
    $('#reg_dif').show();
    $('#lb_num_pago_dif').hide();
    $('#num_pago_dif').hide();
    $('#alumno_dif').val(idAlumno);
    $('#idAlumno_dif').val(idAlumno);
    $('#pago_dif').val(diferencia);
    $('#idOrden_dif').val(idOrden);
    //$('#pago_dif').prop('readonly', true);

    $('#registra-pago-dif').modal({
      show:true,
      backdrop:'static'
    });
}
function pago_nuevo_excedente(idOrden, idAlumno, diferencia){
    $('#formulario_pago_exc')[0].reset();
    $('#pro_exc').val('Registro');
    $('#edi_exc').hide();
    $('#reg_exc').show();
    $('#lb_num_pago_exc').hide();
    $('#num_pago_exc').hide();
    $('#alumno_exc').val(idAlumno);
    $('#idAlumno_exc').val(idAlumno);
    $('#pago_exc').val(diferencia);
    $('#idOrden_exc').val(idOrden);
    //$('#pago_dif').prop('readonly', true);

    $('#registra-pago-exc').modal({
      show:true,
      backdrop:'static'
    });
}
function comentario(id){
      var url = 'php/accion/edita_comentario.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id='+id,
        success: function(valores){
            var datos = eval(valores);
            $('#input_comentario').val(datos[0]);
            $('#modal_comentario').modal({
              show:true,
              backdrop:'static'
            });
          return false;
        }
      });
      return false;
}
function comentarioDoc(id){
      var url = 'php/accion/edita_comentario.php';
        $.ajax({
        type:'POST',
        url:url,
        data:'id='+id,
        success: function(valores){
            var datos = eval(valores);
            $('#input_comentario').val(datos[1]);
            $('#modal_comentario').modal({
              show:true,
              backdrop:'static'
            });
          return false;
        }
      });
      return false;
}
 function nueva_asistencia(idAlumno,idSesion, idMateria){
    $('#formulario_asistencia')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idAlumno').val(idAlumno);
    $('#idSesion').val(idSesion);
    $('#idMateria').val(idMateria);
    $('#registra-asistencia').modal({
      show:true,
      backdrop:'static'
    });
}
 function nueva_observacion(idTarea,idAlumno){
    $('#formulario_observacion')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idTarea').val(idTarea);
    $('#idAlumno').val(idAlumno);
    $('#registra-observacion').modal({
      show:true,
      backdrop:'static'
    });
}
 function nueva_calificacion(idAlumno,idMateria){
    $('#formulario_calificacion')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idAlumno').val(idAlumno);
    $('#idMateria').val(idMateria);
    $('#registra-calificacion').modal({
      show:true,
      backdrop:'static'
    });
}
 function nueva_calificacion_tarea(idAlumno,idTarea, idMateria){
    $('#formulario_calificacion_trabajos')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idAlumnoTrabajo').val(idAlumno);
    $('#idMateriaTrabajo').val(idMateria);
    $('#idTrabajoDetalle').val(idTarea);
    $('#registra-calificacion-trabajos').modal({
      show:true,
      backdrop:'static'
    });
}
 function nuevo_grupoID(id){
    $('#formulario_grupo')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idPosgrado').val(id);
    $('#registra-grupo').modal({
      show:true,
      backdrop:'static'
    });
}

function editarCalendario(id){
    $('#formulario_calendario')[0].reset();
    $('#pro').val('Registro');
    $('#edi').hide();
    $('#reg').show();
    $('#idPosgrado').val(id);
    $('#registra-calendario').modal({
      show:true,
      backdrop:'static'
    });
}

 function asistencias(idAlumno, idSesion, idEstatus){
  var url = 'php/accion/agrega_asistencia.php?idAlumno='+idAlumno+'&idSesion='+idSesion+'&idEstatus='+idEstatus;
  $.ajax({
    type:'POST',
    url:url,
    success: function(registro){
     $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      return false;
    }
  });
  return false; 
}
 function asistencias_diferido(idAlumno, idSesion, idEstatus){
  var url = 'php/accion/agrega_asistencia_diferido.php?idAlumno='+idAlumno+'&idSesion='+idSesion+'&idEstatus='+idEstatus;
  $.ajax({
    type:'POST',
    url:url,
    success: function(registro){
     $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      return false;
    }
  });
  return false; 
}
 function nueva_LecturaID(id,idPosgrado){
    $('#formulario_lectura')[0].reset();
    $('#proLec').val('Registro');
    $('#ediLec').hide();
    $('#regLec').show();
    $('#idSesion').val(id);
    $('#link').hide();
    $('#idPosgrado').val(idPosgrado);
    $('#registra-lectura').modal({
      show:true,
      backdrop:'static'
    });
}
 function nueva_LecturaIDDoc(id,idPosgrado){
    $('#formulario_lectura')[0].reset();
    $('#proLec').val('Registro');
    $('#ediLec').hide();
    $('#regLec').show();
    $('#idSesion').val(id);
    $('#link').hide();
    $('#idPosgrado').val(idPosgrado);
    $('#registra-lectura').modal({
      show:true,
      backdrop:'static'
    });
}
 function nuevo_TrabajoID(id, idPosgrado){
    $('#formulario_tarea')[0].reset();
    $('#pro2').val('Registro');
    $('#edi2').hide();
    $('#reg2').show();
    $('#idSesion').val(id);
    $('#link').hide();
    $('#idPosgrado').val(idPosgrado);
    $('#registra-tarea').modal({
      show:true,
      backdrop:'static'
    });
}
 function Nueva_Evaluacion(idAsignacion, idPosgrado){
    $('#formulario_evaluacion')[0].reset();
    $('#pro2').val('Registro');
    $('#edi2').hide();
    $('#reg2').show();
    $('#idAsignacion').val(idAsignacion);
    $('#link').hide();
    $('#idPosgrado').val(idPosgrado);
    $('#registra-evaluacion').modal({
      show:true,
      backdrop:'static'
    });
}
 function Nueva_PM(idExamen, idAsignacion){
    $('#formulario_evaluacion_PM')[0].reset();
    $('#proPM').val('Registro');
    $('#ediPM').hide();
    $('#regPM').show();
    $('#idExamenPM').val(idExamen);
    $('#idAsignacionPM').val(idAsignacion);

    $('#registra-evaluacion-PM').modal({
      show:true,
      backdrop:'static'
    });
}
 function Nueva_PVF(idExamen, idAsignacion){
    $('#formulario_evaluacion_PV')[0].reset();
    $('#proPV').val('Registro');
    $('#ediPV').hide();
    $('#regPV').show();
    $('#idExamenPV').val(idExamen);
    $('#idAsignacionPV').val(idAsignacion);

    $('#registra-evaluacion-PV').modal({
      show:true,
      backdrop:'static'
    });
}
 function Nueva_PA(idExamen, idAsignacion){
    $('#formulario_evaluacion_PA')[0].reset();
    $('#proPA').val('Registro');
    $('#ediPA').hide();
    $('#regPA').show();
    $('#idExamenPA').val(idExamen);
    $('#idAsignacionPA').val(idAsignacion);
    $('#registra-evaluacion-PA').modal({
      show:true,
      backdrop:'static'
    });
}
 function nuevo_TrabajoIDEstudiante(id, idPosgrado,idSesion, idMateria){
    $('#formulario_tarea_estudiante')[0].reset();
    $('#pro2').val('Registro');
    $('#idSesion2').val(idSesion);
    $('#idMateria2').val(idMateria);
    $('#edi2').hide();
    $('#reg2').show();
    $('#idPosgrado2').val(idPosgrado);
    $('#idTarea2').val(id);
    $('#link').hide();
    $('#registra-tarea-estudiante').modal({
      show:true,
      backdrop:'static'
    });
}
 function nuevo_TrabajoDocente(id, idPosgrado,idSesion, idMateria, idAlumno){
    $('#formulario_tarea_docente')[0].reset();
    $('#pro2').val('Registro');
    $('#idSesion2').val(idSesion);
    $('#idMateria2').val(idMateria);
    $('#edi2').hide();
    $('#reg2').show();
    $('#idPosgrado2').val(idPosgrado);
    $('#idTarea2').val(id);
    $('#idAlumno2').val(idAlumno);
    $('#link').hide();
    $('#registra-tarea-docente').modal({
      show:true,
      backdrop:'static'
    });
}
 function nuevo_TrabajoFinalID(id, idPosgrado){
    $('#formulario_tareafinal')[0].reset();
    $('#pro2').val('Registro');
    $('#edi2').hide();
    $('#reg2').show();
    $('#idSesion').val(id);
    $('#link').hide();
    $('#idPosgrado').val(idPosgrado);
    $('#registra-tareafinal').modal({
      show:true,
      backdrop:'static'
    });
}

function agregaDirectorio(){
  var url = 'php/accion/agrega_contacto.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_Directorio').serialize(),
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_Directorio')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#reg').hide();
            $('#contenido').load("php/listar_crm.php");
      $('#registra-directorio').modal('hide');

      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll

      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#edi').hide();
            $('#contenido').load("php/listar_crm.php");
      $('#registra-directorio').modal('hide');

      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll

      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      return false;
      }
    }
  });
  return false;
}

function agregaAsistenciaCE(){
  var url = 'php/accion/agrega_asistencia_ce.php';
  var postData = new FormData($("#formulario_asistencia")[0]);
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_asistencia')[0].reset();
      
      $('#registra-asistencia').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      $('#formulario_asistencia')[0].reset();
      
      $('#registra-asistencia').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaCalificacionTrabajos(){
  var url = 'php/accion/agrega_calificacion_trabajo.php';
  var postData = new FormData($("#formulario_calificacion_trabajos")[0]);
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#proPerfilCat').val() == 'Registro'){
      $('#formulario_calificacion_trabajos')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
        $('#formulario_calificacion_trabajos')[0].reset();
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaDocente(){
  var url = 'php/accion/agrega_docente.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#form_docente').serialize(),
    success: function(registro){
      if ($('#proPerfilCat').val() == 'Registro'){
      $('#form_docente')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#regPerfilCat').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#ediPerfilCat').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaEvaluacion(){
  var url = 'php/accion/agrega_evaluacion.php';
        $('#reg2').hide();

  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_evaluacion').serialize(),
    success: function(registro){
      if ($('#pro2').val() == 'Registro'){
      $('#formulario_evaluacion')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#reg2').hide();
      $('#agrega-registros').html(registro);

      $('#registra-evaluacion').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#edi2').hide();
      $('#agrega-registros').html(registro);

      $('#registra-evaluacion').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#agrega-registros').html(registro);
      //$('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaEvaluacionPM(){
        $('#regPM').hide();

  var url = 'php/accion/agregaPM.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_evaluacion_PM').serialize(),
    success: function(registro){
      if ($('#proPM').val() == 'Registro'){
        var idExamen = $('#idExamenPM').val();
        var idAsignacion = $('#idAsignacionPM').val();
      $('#formulario_evaluacion_PM')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#agrega-registros').html(registro);

      $('#registra-evaluacion-PM').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#ediPM').hide();
      $('#agrega-registros').html(registro);

      $('#registra-evaluacion-PM').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      //$('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaEvaluacionV(){
        $('#regPM').hide();

  var url = 'php/accion/agregaPV.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_evaluacion_PV').serialize(),
    success: function(registro){
      if ($('#proPV').val() == 'Registro'){
      $('#formulario_evaluacion_PV')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#regPM').hide();
      $('#agrega-registros').html(registro);
      $('#registra-evaluacion-PV').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#ediPM').hide();
      $('#agrega-registros').html(registro);
      $('#registra-evaluacion-PV').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaEvaluacionPA(){
  var url = 'php/accion/agregaPA.php';
        $('#regPA').hide();

  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_evaluacion_PA').serialize(),
    success: function(registro){
      if ($('#proPA').val() == 'Registro'){
      $('#formulario_evaluacion_PA')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#regPA').hide();
      $('#agrega-registros').html(registro);
      $('#registra-evaluacion-PA').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#agrega-registros').html(registro);
      $('#registra-evaluacion-PA').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      //$('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaCalificación(){
        $('#reg').hide();

  var url = 'php/accion/agrega_calificacion.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_calificacion').serialize(),
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_calificacion')[0].reset();
      $('#mensaje').addClass('bien').html('Registro completado con exito').show(250).delay(4000).hide(250);
      $('#registra-calificacion').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').addClass('bien').html('Edición completada con exito').show(250).delay(4000).hide(250);
      $('#registra-calificacion').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}

function agregaClase(){
  var url = 'php/accion/agrega_clase.php';
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var postData = new FormData($("#formulario_clase")[0]);
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
   contentType: false,
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_clase')[0].reset();
      $('#registra-clase').modal('hide');

      $.alert({
              title: 'Grupos!',
              content: 'Información guardada correctamente',
              });
       $('#registra-clase').modal('hide');
      $('#mensaje').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      
      $('#registra-clase').modal('hide');
      $.alert({
              title: 'Grupos!',
              content: 'Información guardada correctamente',
              });
      $('#mensaje').hide();
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      $('$mensaje').hide();
      }
    }
  });
  return false;
}

 

function agregaCalendario(){
  var url = 'php/accion/agrega_calendario.php';
  var postData = new FormData($("#formulario_calendario")[0]);
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,

    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_calendario')[0].reset();
      $('#registra-calendario').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-calendario').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    },
 
  
  });
  return false;
};



function agregaTarea(){
  var url = 'php/accion/agrega_tarea.php';
  var postData = new FormData($("#formulario_tarea")[0]);
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi2').hide();
  $('#reg2').hide();
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,

    success: function(registro){
      if ($('#pro2').val() == 'Registro'){
      $('#formulario_tarea')[0].reset();
      $('#registra-tarea').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-tarea').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#edi2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    },
 
  
  });
  return false;
};

function agregaTareaEstudiante(){
  var url = 'php/accion/agrega_tarea_estudiante.php';
  var postData = new FormData($("#formulario_tarea_estudiante")[0]);
  $('#mensajealumno').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#reg2').hide();
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,

    success: function(registro){
      if ($('#pro2').val() == 'Registro'){
      $('#formulario_tarea_estudiante')[0].reset();
      $('#registra-tarea-estudiante').modal('hide');
      $('#mensajealumno').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-tarea-estudiante').modal('hide');
      $('#mensajealumno').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#edi2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    },
  });
  return false;
};

function agregaTareaDocente(){
  var url = 'php/accion/agrega_tarea_docente.php';
  var postData = new FormData($("#formulario_tarea_docente")[0]);
  $('#mensaje_docente').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi2').hide();
  $('#reg2').hide();
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,

    success: function(registro){
      if ($('#pro2').val() == 'Registro'){
      $('#formulario_tarea_docente')[0].reset();
      $('#registra-tarea-docente').modal('hide');
      $('#mensaje_docente').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg2').show();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-tarea-docente').modal('hide');
      $('#mensaje_docente').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#edi2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    },
 
  
  });
  return false;
};
function agregaTareaFinal(){
  var url = 'php/accion/agrega_tareafinal.php';
  var postData = new FormData($("#formulario_tareafinal")[0]);
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi2').hide();
  $('#reg2').hide();
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,

    success: function(registro){
      if ($('#pro2').val() == 'Registro'){
      $('#formulario_tareafinal')[0].reset();
      $('#registra-tareafinal').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg2').hide();
      $('#agrega-registros').html(registro);
      
      return false;
      }else{
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-tareafinal').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Trabajo!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal

      $('#edi2').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    },
 
  
  });
  return false;
};

function ListarCatedraticos(){
  $('#contenido').load("php/listar_catedraticos.php");       
}; 
function ListarAlumno(){
  $('#contenido').load("php/listar_perfil.php");       
}; 
function agregaDocente(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var url = 'php/accion/agrega_docente.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_docenteDatos').serialize(),
    success: function(registro){
      ListarCatedraticos();
      if ($('#pro').val() == 'Registro'){
      $('#formulario_docenteDatos')[0].reset();
      $('#reg').hide();
      $('#mensaje').hide();
      //$("#registra-grupo").modal('hide').delay(5000);//ocultamos el modal
      $('#registra-docenteDatos').modal('hide');
      $.alert({
              title: 'Docentes!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      
      //$('#agrega-registros').html(registro);
      return false;
      }else{
      $('#mensaje').hide();
      $('#registra-docenteDatos').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $.alert({
              title: 'Docentes!',
              content: 'Información guardada correctamente',
              });

      $('#edi').hide();
      //$('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}

function agregaGrupo(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var url = 'php/accion/agrega_grupo.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_grupo').serialize(),
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_grupo')[0].reset();
      $('#reg').hide();
      $('#mensaje').hide();
      $('#registra-grupo').modal('hide');
      $.alert({
              title: 'Grupos!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#agrega-registros').html(registro);
      return true;
      }else{
      $('#registra-grupo').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#mensaje').hide();
      $.alert({
              title: 'Grupos!',
              content: 'Información guardada correctamente',
              });

      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function agregaCalificacion(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var url = 'php/accion/agrega_calificacion.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_calificacion').serialize(),
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_calificacion')[0].reset();

      $('#registra-calificacion').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      
      $('#mensaje').hide();
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return true;
      }else{
      $('#mensaje').hide();
      $('#edi').hide();

      $('#registra-calificacion').modal('hide');
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}

function agregaLectura(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#ediLec').hide();
  $('#regLec').hide();
  var url = 'php/accion/agrega_lectura.php';
  var postData = new FormData($("#formulario_lectura")[0]);
  
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#proLec').val() == 'Registro'){
      $('#formulario_lectura')[0].reset();
      $('#registra-lectura').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Lecturas!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#regLec').hide();
      $('#agrega-registros').html(registro);
      $('#mensaje').hide();
      $("#cargando").hide();
      return true;
      }else{
      
      $('#registra-lectura').modal('hide');
      $.alert({
              title: 'Lecturas!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#mensaje').hide();
      $('#ediLec').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  
  return false;
}

function agregaPagoDif(){
  $('#mensaje_dif').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi_dif').hide();
  $('#reg_dif').hide();
  var url = 'php/accion/agrega_pago_dif.php';
  var postData = new FormData($("#formulario_pago_dif")[0]);
  
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#pro_dif').val() == 'Registro'){
      $('#formulario_pago_dif')[0].reset();
      $('#registra-pago-dif').modal('hide');
      $('#mensaje_dif').hide();
      $.alert({
              title: 'Pagos!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg_dif').hide();
      $('#agrega-registros').html(registro);
      $('#mensaje_dif').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      
      $.alert({
              title: 'Pagos!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#mensaje').hide();
      $('#edi').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  
  return false;
}
function agregaPago(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var url = 'php/accion/agrega_pago.php';
  var postData = new FormData($("#formulario_pago")[0]);
  
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#pro').val() == 'Registro'){
      $('#formulario_pago')[0].reset();
      $('#registra-pago').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Pagos!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      $('#mensaje').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }else{
      
      $('#registra-lectura').modal('hide');
      $.alert({
              title: 'Pagos!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#mensaje').hide();
      $('#edi').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  
  return false;
}



function agregaLecturaDoc(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#ediLec').hide();
  $('#regLec').hide();
  var url = 'php/accion/agrega_lecturaDoc.php';
  var postData = new FormData($("#formulario_lectura")[0]);
  
  $.ajax({
    type:'POST',
    url:url,
    data:postData,
    processData: false,  // tell jQuery not to process the data
    contentType: false,
    success: function(registro){
      if ($('#proLec').val() == 'Registro'){
      $('#formulario_lectura')[0].reset();
      $('#registra-lectura').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Lecturas!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#regLec').hide();
      $('#agrega-registros').html(registro);
      $('#mensaje').hide();
      $("#cargando").hide();
      return true;
      }else{
      
      $('#registra-lectura').modal('hide');
      $.alert({
              title: 'Lecturas!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#mensaje').hide();
      $('#ediLec').hide();
      $("#cargando").hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  
  return false;
}

function agregaSesion(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#ediSES').hide();
  $('#regSES').hide();
  var url = 'php/accion/agrega_sesion.php';
  $.ajax({
    type:'POST',
    url:url,
    data:$('#formulario_sesion').serialize(),
    success: function(registro){
      if ($('#proSES').val() == 'Registro'){
      $('#formulario_sesion')[0].reset();
      $('#registra-sesion').modal('hide');
      $.alert({
              title: 'Sesión!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#regSES').hide();
      $('#mensaje').hide();
      $('#agrega-registros').html(registro);
      return true;
      }else{
      $('#registra-sesion').modal('hide');
      $('#mensaje').hide();
      $.alert({
              title: 'Sesión!',
              content: 'Información guardada correctamente',
              });
      $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
      $('.modal-backdrop').remove();//eliminamos el backdrop del modal
      $('#ediSES').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}


function agregPagox(){
  $('#mensaje').addClass('').html('<center><div id="cargando" name="cargando"><img src="opciones/cargando.gif" style="  width: 80px; height: auto;"></div></center>').show(250);
  $('#edi').hide();
  $('#reg').hide();
  var file_data = $('#formulario_pago').prop('doc')[0];   
  var form_data = new FormData();                  
  form_data.append('doc', file_data);
  var url = 'php/accion/agrega_pago.php';
  $.ajax({
    type:'POST',
    url:url,
    cache: false,
    contentType: false,
    processData: false,
    data:form_data,
    success: function(registro){
      if ($('#proSES').val() == 'Registro'){
      $('#formulario_pago')[0].reset();
      $('#mensaje').hide();
      $('#reg').hide();
      $('#agrega-registros').html(registro);
      return true;
      }else{
      $('#mensaje').hide();
      $('#edi').hide();
      $('#agrega-registros').html(registro);
      return false;
      }
    }
  });
  return false;
}
function eliminarEvaluacion(id, idAsignacion){

  var url = 'php/accion/elimina_evaluacion.php?id='+id+'&idAsignacion='+idAsignacion;
  var pregunta = confirm('¿Esta seguro de eliminar esta evaluación?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Evaluación eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function eliminarCalificacion(id, idAlumno){

  var url = 'php/accion/elimina_calificacion.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de eliminar esta calificación?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Calificación eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function eliminarPregunta(id, idExamen, idAsignacion){

  var url = 'php/accion/elimina_pregunta.php?idExamen='+idExamen+"&idAsignacion="+idAsignacion;
  var pregunta = confirm('¿Esta seguro de eliminar esta pregunta?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id+'&idExamen='+idExamen+'&idAsignacion='+idAsignacion,
    success: function(registro){
      alert("Pregunta eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function ActivaExamen(idExamen, idAsignacion, Estatus){

  var url = 'php/accion/modifica_examen.php?idExamen='+idExamen+"&idAsignacion="+idAsignacion+"&Estatus="+Estatus;
  var pregunta = confirm('¿Esta seguro de cambiar el estatus del examen?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'idExamen='+idExamen+'&idAsignacion='+idAsignacion+"&Estatus="+Estatus,
    success: function(registro){
      alert("Registro modificado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function validaPago(id, idAlumno){
  var url = 'php/accion/valida_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de validar este pago?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pago validado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function moverExcedente(id, idAlumno){
  var url = 'php/accion/excedente_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de mover este excedente?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pago movido correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function validaPago2(id, idAlumno){
  var url = 'php/accion/valida_pago2.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de exentar este pago?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pago exento correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function activaPago(id, idAlumno){
  var url = 'php/accion/activa_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de activar los pagos');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pagos activos");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function activaPagoI(id, idAlumno){
  var url = 'php/accion/activa_pagoI.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de activar los pagos');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pagos activos");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function desactivaPago(id, idAlumno){
  var url = 'php/accion/desactiva_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de desactivar los pagos?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pagos desactivados");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function activaRecargo(id, idAlumno){
  var url = 'php/accion/recargo_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de aplicar recargo ?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Recargo activo");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_clase(id){

  var url = 'php/accion/elimina_clase.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta asignación?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Asignación eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_trabajo_estudiante(id, idMateria, idSesion){

  var url = 'php/accion/elimina_tarea_estudiante.php?idMateria='+idMateria+'&idSesion='+idSesion;
  var pregunta = confirm('¿Esta seguro de eliminar este trabajo?'); 
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Trabajo eliminado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_trabajo_estudiante_final(id, idMateria, idSesion){

  var url = 'php/accion/elimina_tarea_estudiante_final.php?idMateria='+idMateria+'&idSesion='+idSesion;
  var pregunta = confirm('¿Esta seguro de eliminar este trabajo?'); 
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Trabajo eliminado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_trabajo_docente(id, idMateria, idSesion,idAlumno){

  var url = 'php/accion/elimina_tarea_docente.php?idMateria='+idMateria+'&idSesion='+idSesion+'&idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de eliminar este trabajo?'); 
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Trabajo eliminado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_grupo(id){
  var url = 'php/accion/elimina_grupo.php';
  var pregunta = confirm('¿Esta seguro de eliminar este grupo?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      $('#agrega-registros').html(registro);
      $.alert({
              title: 'Grupos!',
              content: 'Registro eliminado correctamente',
              });      
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_sesion(id){
  var url = 'php/accion/elimina_sesion.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta sesión?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Sesión eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminarContacto(id){
  var url = 'php/accion/elimina_contacto.php';
  var pregunta = confirm('¿Esta seguro de eliminar este contacto?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Contacto eliminado correctamente");
            $('#contenido').load("php/listar_crm.php");
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_lectura(id){
  var url = 'php/accion/elimina_lectura.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta lectura?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Lectura eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function eliminar_calificacion(id){
  var url = 'php/accion/elimina_calificacion.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta calificación?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Calificación eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_tarea(id){
  var url = 'php/accion/elimina_tarea.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta tarea?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Tarea eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_pago(id, idAlumno){
  var url = 'php/accion/elimina_pago.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de eliminar este pago?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pago eliminado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminar_pagoR(id, idAlumno){
  var url = 'php/accion/elimina_pagoR.php?idAlumno='+idAlumno;
  var pregunta = confirm('¿Esta seguro de eliminar este pago?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Pago eliminado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function eliminar_tarea_final(id){
  var url = 'php/accion/elimina_tarea_final.php';
  var pregunta = confirm('¿Esta seguro de eliminar esta tarea?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Tarea eliminada correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function eliminarPerfilCatedratico(id){
  var url = 'php/accion/elimina_catedratico.php';
  var pregunta = confirm('¿Esta seguro de eliminar este cátedratico?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Cátedratico eliminado correctamente");
      //('#contenido').load("php/listar_catedraticos.php");
      ListarCatedraticos();
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}

function eliminarAlumno(id){
  var url = 'php/accion/elimina_alumno.php';
  var pregunta = confirm('¿Esta seguro de bloquear este alumno?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Alumno bloqueado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function activaAlumno(id){
  var url = 'php/accion/elimina_alumno.php';
  var pregunta = confirm('¿Esta seguro de activar este alumno?');
  if(pregunta==true){
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(registro){
      alert("Alumno activado correctamente");
      $('#agrega-registros').html(registro);
      return false;
    }
  });
  return false;
  }else{
    return false;
  }
}
function editarClase(id, idGrupo){
  $('#formulario_clase')[0].reset();
  $('#link').hide();
  var url = 'php/accion/edita_clase.php?idGrupo='+idGrupo;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('Edicion');
        $('#id').val(id);
        $('#posgrado').val(datos[0]);
        $('#catedra').val(datos[1]);
        $('#docente').val(datos[2]);
        $('#idGrupo').val(datos[3]);
        $('#status').val(datos[4]);
        if (datos[5]!== null) {
          $('#archivo').val(datos[6]);
          //$('#link').hide()
        }else{
          //$('#link').hide()
        }
        
        $('#registra-clase').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}

function editarPreguntaPM(id, idAsignacionPM){
  $('#formulario_evaluacion_PM')[0].reset();
  var url = 'php/accion/edita_evaluacion_PM.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#regPM').hide();
        $('#ediPM').show();
        $('#proPM').val('Edicion');
        $('#idAsignacionPM').val(idAsignacionPM);
        $('#idExamenPM').val(datos[8]);
        $('#idPM').val(id);
        $('#PreguntaPM').val(datos[0]);
        $('#ValorPM').val(datos[1]);
        $('#R1').val(datos[2]);
        $('#R2').val(datos[3]);
        $('#R3').val(datos[4]);
        $('#R4').val(datos[5]);
        $('#R5').val(datos[6]);
        if (datos[7]=='Opción 1') {document.getElementById("inlineRadio1").checked = true;}
        if (datos[7]=='Opción 2') {document.getElementById("inlineRadio2").checked = true;}
        if (datos[7]=='Opción 3') {document.getElementById("inlineRadio3").checked = true;}
        if (datos[7]=='Opción 4') {document.getElementById("inlineRadio4").checked = true;}
        if (datos[7]=='Opción 5') {document.getElementById("inlineRadio5").checked = true;}



        $('#registra-evaluacion-PM').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarPreguntaPV(id, idAsignacionPM){
  $('#formulario_evaluacion_PV')[0].reset();
  var url = 'php/accion/edita_evaluacion_PV.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#regPV').hide();
        $('#ediPV').show();
        $('#proPV').val('Edicion');
        $('#idAsignacionPV').val(idAsignacionPM);
        $('#idExamenPV').val(datos[5]);
        $('#idPV').val(id);
        $('#PreguntaPV').val(datos[0]);
        $('#ValorPV').val(datos[1]);
        $('#R1V').val(datos[2]);
        $('#R2V').val(datos[3]);

        if (datos[4]=='Verdadero') {document.getElementById("radioPV1").checked = true;}
        if (datos[4]=='Falso') {document.getElementById("radioPV2").checked = true;}


        $('#registra-evaluacion-PV').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarPreguntaPA(id, idAsignacionPM){
  $('#formulario_evaluacion_PA')[0].reset();
  var url = 'php/accion/edita_evaluacion_PV.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#regPA').hide();
        $('#ediPA').show();
        $('#proPA').val('Edicion');
        $('#idAsignacionPA').val(idAsignacionPM);
        $('#idExamenPA').val(datos[5]);
        $('#idPA').val(id);
        $('#PreguntaPA').val(datos[0]);
        $('#ValorPA').val(datos[1]);
        $('#RespuestaPA').val(datos[4]);


        $('#registra-evaluacion-PA').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarEvaluacion(id){
  $('#formulario_evaluacion')[0].reset();
  var url = 'php/accion/edita_evaluacion.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg2').hide();
        $('#edi2').show();
        $('#pro2').val('Edicion');
        $('#id2').val(id);
        $('#Titulo').val(datos[0]);
        $('#descripcion').val(datos[1]);
        $('#fecha').val(datos[2]);
        $('#idAsignacion').val(datos[3]);
        $('#registra-evaluacion').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarGrupo(id){
  $('#formulario_grupo')[0].reset();
  var url = 'php/accion/edita_grupo.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('Edicion');
        $('#id').val(id);
        $('#Nombre_Grupo').val(datos[1]);
        $('#Periodo').val(datos[2]);
        $('#idPosgrado').val(datos[2]);
        $('#registra-grupo').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}

function editarContacto(id){
  $('#formulario_Directorio')[0].reset();
  var url = 'php/accion/edita_contacto.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('Edicion');
        $('#id').val(id);
        $('#INSTITUCION').val(datos[1]);
        $('#NOMBRE').val(datos[2]);
        $('#CARGO').val(datos[3]);
        $('#CORREO').val(datos[4]);
        if (datos[5]==0) {
          $('#ENVIO').val('NO');
        }else{
          $('#ENVIO').val('SI');          
        }
        $('#registra-directorio').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarCalificacion(id, idMateria){
  $('#formulario_calificacion')[0].reset();
  var url = 'php/accion/edita_calificacion.php?idMateria='+idMateria;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('Edicion');
        $('#id').val(id);
        $('#Asignatura').val(datos[0]);
        $('#Calificacion').val(datos[1]);
        $('#idMateria').val(idMateria);
        //$('#status').val(datos[4]);
        $('#registra-calificacion').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}


function editarCalificacionCE(id){
  $('#formulario_calificacion')[0].reset();
  var url = 'php/accion/edita_calificacion.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#pro').val('Edicion');
        $('#id').val(id);
        $('#Asignatura').val(datos[0]);
        $('#Calificacion').val(datos[4]);
        //$('#fecha_i').val(datos[3]);
        //$('#status').val(datos[4]);
        $('#registra-calificacion').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function editarLectura(id, posgrado){
  $('#formulario_lectura')[0].reset();
  var url = 'php/accion/edita_lectura.php?idPosgrado='+posgrado;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#regLec').hide();
        $('#ediLec').show();
        $('#proLec').val('Edicion');
        $('#idSesion').val(datos[5]);
        $('#idPosgrado').val(datos[4]);
        $('#Liga').val(datos[6]);
        $('#idLec').val(id);
        $('#TituloLec').val(datos[0]);
        $('#descripcionLec').val(datos[1]);
        if (datos[3]!== '') {
          $('#archivo').val(datos[3]);
          $('#link').show()
        }else{
          $('#link').hide()
        }
        
        $('#registra-lectura').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}


function editarPago(id){
  $('#formulario_pago')[0].reset();
  var url = 'php/accion/edita_pago.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg').hide();
        $('#edi').show();
        $('#lb_num_pago').show();
        $('#num_pago').show();

        $('#pro').val('Edicion');
        $('#alumno').val(datos[0]);
        $('#idOrden').val(datos[1]);
        $('#forma_pago').val(datos[2]);
        $('#fecha_pago').val(datos[3]);
        $('#pago').val(datos[4]);
        $('#id').val(id);
        $('#descripcion').val(datos[5]);
        $('#num_pago').val(datos[1]);

        document.getElementById("file_pago").required = false;

        $('#registra-pago').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}



function editarTarea(id, posgrado){
  $('#formulario_tarea')[0].reset();
  var url = 'php/accion/edita_tarea.php?idPosgrado='+posgrado;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg2').hide();
        $('#edi2').show();
        $('#pro2').val('Edicion');
        $('#id2').val(id);
        //$('#materia').val(datos[0]);
        $('#Titulo').val(datos[1]);
        $('#descripcion').val(datos[2]);
        $('#Link').val(datos[3]);
        $('#idSesion').val(datos[6]);
        $('#fecha').val(datos[5]);

        $('#registra-tarea').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}

function editarTareaComun(id, posgrado){
  $('#formulario_tarea')[0].reset();
  var url = 'php/accion/edita_tarea.php?idPosgrado='+posgrado;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg2').hide();
        $('#edi2').show();
        $('#pro2').val('Edicion');
        $('#id2').val(id);
        $('#fecha').attr("readonly","readonly");
        //$('#materia').val(datos[0]);
        $('#Titulo').val(datos[1]);
        $('#descripcion').val(datos[2]);
        $('#Link').val(datos[3]);
        $('#idSesion').val(datos[6]);
        $('#fecha').val(datos[5]);

        $('#registra-tarea').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}

function editarTareaFinal(id, posgrado){
  $('#formulario_tareafinal')[0].reset();
  var url = 'php/accion/edita_tarea.php?idPosgrado='+posgrado;
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#reg2').hide();
        $('#edi2').show();
        $('#pro2').val('Edicion');
        $('#id2').val(id);
        //$('#materia').val(datos[0]);
        $('#Titulo').val(datos[1]);
        $('#descripcion').val(datos[2]);
        $('#Link').val(datos[3]);
        $('#idSesion').val(datos[6]);
        $('#fecha').val(datos[5]);

        $('#registra-tareafinal').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}

function editarSesion(id){
  $('#formulario_sesion')[0].reset();
  var url = 'php/accion/edita_sesion.php';
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
        var datos = eval(valores);
        $('#regSES').hide();
        $('#ediSES').show();
        $('#Diferido').show();
        $('#LinkDiferido').show();
        $('#proSES').val('Edicion');
        $('#idSES').val(id);
        $('#id_materia').val(datos[0]);
        $('#TituloSES').val(datos[1]);
        $('#FechaSES').val(datos[2]);
        $('#HoraI').val(datos[3]);
        $('#HoraF').val(datos[4]);
        $('#Link').val(datos[5]);
        $('#LinkDiferido').val(datos[6]);
        $('#Pass').val(datos[7]);
        $('#registra-sesion').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}
function Nueva_Sesion(id, id_grupo){

    $('#formulario_sesion')[0].reset();
    $('#proSES').val('Registro');
    $('#ediSES').hide();
    $('#Diferido').hide();
    $('#LinkDiferido').hide();
    $('#regSES').show();
    $("#id_grupo").val(id_grupo);
    $("#id_materia").val(id);
    $('#registra-sesion').modal({
      show:true,
      backdrop:'static'
    });
  
}

function editarInteresado(id){
    $('#formulario_admision')[0].reset();
    $('#form_inst')[0].reset();

    var url = 'php/accion/edita_alumno_json.php';

    $('#pro').val('Registro');
    $('#guardarAlumno').hide();
    $('#editaAlumno').show();
    
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
         var datos = eval(valores);

        $('#pro').val('Edicion');
        $('#idPerfil').val(id);
        
        $('#nombre').val(datos[0]);
        $('#primer_ap').val(datos[1]);
        $('#segundo_ap').val(datos[2]);
        $('#fecha_nac').val(datos[6]);
        $('#sexo').val(datos[7]);
        $('#nacionalidad').val(datos[22]);
        $('#curp').val(datos[8]);
        $('#tel_celular').val(datos[9]);
        $('#tel_fijo').val(datos[10]);
        $('#tel_ext').val(datos[11]);
        $('#correo').val(datos[12]);
        $('#posgrado').val(datos[3]);
        $('#calle').val(datos[13]);
        $('#numeroe').val(datos[15]);
        $('#numeroi').val(datos[14]);
        $('#colonia').val(datos[16]);
        $('#ciudad').val(datos[17]);
        $('#estado').val(datos[18]);
        $('#cod_postal').val(datos[20]);
        $('#pais').val(datos[21]);

        $('#email_sis').val(datos[4]);
        $('#pass_sis').val(datos[5]);

        $('#email_Inst').val(datos[4]);
        $('#pass_inst').val(datos[5]);

        var email_sis=datos[12];
        var posgrado=datos[3];

        $('#lic').val(datos[23]);
        $('#lic_universidad').val(datos[24]);
        $('#lic_pais_e').val(datos[25]);
        $('#lic_status_e').val(datos[26]);
        $('#lic_fecha_fin').val(datos[27]);

        $('#mtr').val(datos[28]);
        $('#mtr_universidad').val(datos[29]);
        $('#mtr_pais_e').val(datos[30]);
        $('#mtr_status_e').val(datos[31]);
        $('#mtr_fecha_fin').val(datos[32]);

        $('#doct').val(datos[33]);
        $('#doct_universidad').val(datos[34]);
        $('#doct_pais_e').val(datos[35]);
        $('#doct_status_e').val(datos[36]);
        $('#doct_fecha_fin').val(datos[37]);


        $('#fecha_ingreso').val(datos[39]);
        $('#ultimoPago').val(datos[40]);
        $('#monto_inscripcion').val(datos[43]);
        $('#beca_inscripcion').val(datos[44]);
        $('#monto_mensualidad').val(datos[41]);
        $('#beca_mensualidad').val(datos[42]);

        $('#monto_pagar_inscripcion').val(datos[45]);
        $('#monto_pagado_inscripcion').val(datos[46]);
        $('#fecha_pago_inscripcion').val(datos[47]);
        $('#monto_pagar_mensualidad').val(datos[48]);
        $('#monto_pagado_mensualidad').val(datos[49]);
        $('#fecha_pago_mensualidad').val(datos[50]);
        $('#doc_cv').val(datos[51]);
        $('#doc_cert').val(datos[52]);
       
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                 $.ajax({
                    url: "php/accion/mostrar_archivosinteresado.php",
                    type: "get", //send it through get method
                    data: { 
                      correo: email_sis, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscagrupo.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#grupo').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadocpago.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#select_documento2').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 

                $.ajax({
                    url: "php/accion/mostrar_archivosPag.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosPag").html(respuesta);
                    }
                });
                }
            }); 
                }
            }); 
                    }
                });

                }
            });

 $('#grupo').val(datos[38]);


      $('#registra-alumno').modal({
        show:true,
        backdrop:'static'
      });

      return false;
    }
  });
    

 
      return false;


}


function editarPerfil(id){
    $('#formulario_admision')[0].reset();
    $('#form_inst')[0].reset();

    var url = 'php/accion/edita_alumno_json.php';

    $('#pro').val('Registro');
    $('#guardarAlumno').hide();
    $('#editaAlumno').show();
    
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
         var datos = eval(valores);

        $('#pro').val('Edicion');
        $('#idPerfil').val(id);
        
        $('#nombre').val(datos[0]);
        $('#primer_ap').val(datos[1]);
        $('#segundo_ap').val(datos[2]);
        $('#fecha_nac').val(datos[6]);
        $('#sexo').val(datos[7]);
        $('#nacionalidad').val(datos[22]);
        $('#curp').val(datos[8]);
        $('#tel_celular').val(datos[9]);
        $('#tel_fijo').val(datos[10]);
        $('#tel_ext').val(datos[11]);
        $('#correo').val(datos[12]);
        $('#posgrado').val(datos[3]);
        $('#calle').val(datos[13]);
        $('#numeroe').val(datos[15]);
        $('#numeroi').val(datos[14]);
        $('#colonia').val(datos[16]);
        $('#ciudad').val(datos[17]);
        $('#estado').val(datos[18]);
        $('#cod_postal').val(datos[20]);
        $('#pais').val(datos[21]);

        $('#email_sis').val(datos[4]);
        $('#pass_sis').val(datos[5]);

        $('#email_Inst').val(datos[4]);
        $('#pass_inst').val(datos[5]);

        var email_sis=datos[4];
        var posgrado=datos[3];

        $('#lic').val(datos[23]);
        $('#lic_universidad').val(datos[24]);
        $('#lic_pais_e').val(datos[25]);
        $('#lic_status_e').val(datos[26]);
        $('#lic_fecha_fin').val(datos[27]);

        $('#mtr').val(datos[28]);
        $('#mtr_universidad').val(datos[29]);
        $('#mtr_pais_e').val(datos[30]);
        $('#mtr_status_e').val(datos[31]);
        $('#mtr_fecha_fin').val(datos[32]);

        $('#doct').val(datos[33]);
        $('#doct_universidad').val(datos[34]);
        $('#doct_pais_e').val(datos[35]);
        $('#doct_status_e').val(datos[36]);
        $('#doct_fecha_fin').val(datos[37]);
        $('#grupo').val(datos[38]);


        $('#fecha_ingreso').val(datos[39]);
        $('#ultimoPago').val(datos[40]);
        $('#monto_inscripcion').val(datos[43]);
        $('#beca_inscripcion').val(datos[44]);
        $('#monto_mensualidad').val(datos[41]);
        $('#beca_mensualidad').val(datos[42]);
        var mp =0;
            mp =(datos[45].replace(/\,/g, '')) -(datos[46].replace(/\,/g, ''));

        $('#monto_pagar_inscripcion').val(datos[45]);
        $('#monto_pagado_inscripcion').val(datos[46]);
        $('#monto_diferencia_inscripcion').val((mp));

        $('#fecha_pago_inscripcion').val(datos[47]);
        $('#monto_pagar_mensualidad').val(datos[48]);
        $('#monto_pagado_mensualidad').val(datos[49]);
        var mm=0;
        mm = datos[48].replace(/\,/g, '') -datos[49].replace(/\,/g, '');
        $('#monto_diferencia_mensualidad').val((mm));

        $('#fecha_pago_mensualidad').val(datos[50]);
        $('#doc_cv').val(datos[51]);
        $('#doc_cert').val(datos[52]);
       
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#select_documento').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                 $.ajax({
                    url: "php/accion/mostrar_archivos.php",
                    type: "get", //send it through get method
                    data: { 
                      correo: email_sis, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosDoc").html(respuesta);
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscagrupo.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#grupo').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 
            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadocpago.php',
                data:'posgrado='+posgrado,
                success:function(html){
                    $('#select_documento2').html(html);
                    //$('#grupo').html('<option value="">Select state first</option>'); 

                $.ajax({
                    url: "php/accion/mostrar_archivosPag.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                      posgrado: posgrado,
                    },
                    success: function(respuesta) {
                        $("#archivos_subidosPag").html(respuesta);
                    }
                });
                }
            }); 
                }
            }); 
                    }
                });

                }
            });

 $('#grupo').val(datos[38]);


      $('#registra-alumno').modal({
        show:true,
        backdrop:'static'
      });

      return false;
    }
  });
    

 
      return false;



}

function listar_calificaciones(id){
  $('#contenido').load("php/modal/form_calificaciones.php?id="+id);

}
function listar_calificacionesDocente(id){
  $('#contenido').load("php/modal/form_calificacionesDocente.php?id="+id);
 
}
function editarPerfilCatedratico(id){
  var url = 'php/accion/edita_perfildocente.php?id='+id;
  $('#form_docenteperfil')[0].reset();
    $.ajax({
    type:'POST',
    url:url,
    data:'id='+id,
    success: function(valores){
         var datos = eval(valores);
        $('#regPerfilCat').hide();
        
        $('#ediPerfilCat').show();
        $('#proPerfilCat').val('Edicion');
        $('#idPerfilCat').val(id);
        
        $('#mtro_nombre').val(datos[2]);
        $('#mtro_primer_ap').val(datos[3]);
        $('#mtro_segundo_ap').val(datos[4]);
 
        $('#mtro_sexo').val(datos[36]);
        $('#mtro_fecha_nac').val(datos[7]);
        $('#mtro_nacionalidad').val(datos[5]);
        $('#mtro_curp').val(datos[6]);
        $('#mtro_tel_celular').val(datos[8]);
        $('#mtro_tel_fijo').val(datos[9]);
        $('#mtro_tel_ext').val(datos[10]);
        $('#mtro_correo').val(datos[11]);
        $('#mtro_titulo_doc').val(datos[1]);

        $('#mtro_calle').val(datos[12]);
        $('#mtro_numeroe').val(datos[13]);
        $('#mtro_numeroi').val(datos[14]);
        $('#mtro_colonia').val(datos[15]);
        $('#mtro_ciudad').val(datos[37]);
        $('#mtro_estado').val(datos[17]);
        $('#mtro_cp').val(datos[18]);
        $('#mtro_pais').val(datos[19]);
        

        $('#mtro_lic').val(datos[20]);
        $('#mtro_lic_universidad').val(datos[21]);
        $('#mtro_lic_pais_e').val(datos[22]);
        $('#mtro_status_e').val(datos[23]);
        $('#mtro_lic_fecha_fin').val(datos[24]);

        $('#mtro_mtria').val(datos[25]);
        $('#mtro_mtria_universidad').val(datos[26]);
        $('#mtro_mtria_pais').val(datos[27]);
        $('#mtro_mtria_status_e').val(datos[28]);
        $('#mtro_mtria_fecha_fin').val(datos[29]);

        $('#mtro_doctorado').val(datos[30]);
        $('#mtro_doctorado_uni').val(datos[31]);
        $('#mtro_doctorado_pais_e').val(datos[32]);
        $('#mtro_doctorado_status_e').val(datos[33]);
        $('#mtro_doctorado_fecha_fin').val(datos[34]);

        $('#usuario_correo').val(datos[35]);
        $('#email_sis').val(datos[35]);
        $('#pass_sis').val(datos[38]);
$('#pass_sis2').val(datos[38]);

        var email_sis=datos[35];
        var posgrado=datos[1];

            $.ajax({
                type:'POST',
                url:'php/accion/ajax_buscadoc.php',
                data:'posgrado='+posgrado+'&email_sis='+email_sis,
                success:function(html){
                    $('#mtro_select_documento').html(html);

                $.ajax({
                    url: "php/accion/mostrar_archivosDoc.php",
                    type: "get", //send it through get method
                    data: { 
                      email_sis: email_sis, 
                    },
                    success: function(respuesta) {
                        $("#mtro_archivos_subidosDoc").html(respuesta);
                    }
                });
                      
                  
                    //$('#grupo').html('<option value="">Select state first</option>'); 
                }
            }); 

        $('#registra-docente').modal({
          show:true,
          backdrop:'static'
        });
      return false;
    }
  });
  return false;
}