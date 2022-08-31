

    <!-- Crear -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>Formulario inscripción</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="primer_nombre" id="primer_nombre" type="text" class="validate">
                        <label for="primer_nombre">Primer Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="segundo_nombre" id="segundo_nombre" type="text" class="validate">
                        <label for="segundo_nombre">segundo Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos" type="text" class="validate">
                        <label for="apellidos">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1" type="text" class="validate">
                        <label for="celular1">celular 1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular2" id="celular2" type="text" class="validate">
                        <label for="celular2">celular 2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion" type="text" class="validate">
                        <label for="direccion">direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_entrevista" id="fecha_entrevista" type="date" class="validate">
                        <label for="fecha_entrevista">fecha entrevista</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="municipio" id="municipio" type="text" class="validate">
                        <label for="municipio">Municipio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo" type="email" class="validate">
                        <label for="correo">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="pago_inscrito" id="pago_inscrito" type="email" class="validate">
                        <label for="pago_inscrito">Pago Inscrito</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="estado_documento" id="estado_documento" type="text" class="validate">
                        <label for="estado_documento">Estado documento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="postul_confabeca" id="postul_confabeca" type="text" class="validate">
                        <label for="postul_confabeca">Postula Confabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha_envio_confabeca" id="fecha_envio_confabeca" type="date" class="validate">
                        <label for="fecha_envio_confabeca">Fecha Envio confabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="modalidad_pago" id="modalidad_pago" type="text" class="validate">
                        <label for="modalidad_pago">Modalidad Pago</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="matricula_financiera" id="matricula_financiera" type="text" class="validate">
                        <label for="matricula_financiera">Matricula Financiera</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="matricula_academica" id="matricula_academica" type="text" class="validate">
                        <label for="matricula_academica">Matricula academica</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" >crear
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

    <!-- editar -->
    <div id="modal_editar" class="modal">
        <form id="form_editar" method="post">
            <input type="hidden" id="id_evento_edit" name="id">
            <div class="modal-content">
                <h4>Editar Prospecto</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="primer_nombre" id="primer_nombre_edit" type="text" class="validate">
                        <label for="primer_nombre_edit">Primer Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="segundo_nombre" id="segundo_nombre_edit" type="text" class="validate">
                        <label for="segundo_nombre_edit">segundo Nombre</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos_edit" type="text" class="validate">
                        <label for="apellidos_edit">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1_edit" type="text" class="validate">
                        <label for="celular1_edit">celular 1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular2" id="celular2_edit" type="text" class="validate">
                        <label for="celular2_edit">celular 2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion_edit" type="text" class="validate">
                        <label for="direccion_edit">direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_entrevista" id="fecha_entrevista_edit" type="date" class="validate">
                        <label for="fecha_entrevista_edit">fecha entrevista</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="municipio" id="municipio_edit" type="text" class="validate">
                        <label for="municipio_edit">Municipio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo_edit" type="email" class="validate">
                        <label for="correo_edit">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="pago_inscrito" id="pago_inscrito_edit" type="email" class="validate">
                        <label for="pago_inscrito_edit">Pago Inscrito</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="estado_documento" id="estado_documento_edit" type="text" class="validate">
                        <label for="estado_documento_edit">Estado documento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="postul_confabeca" id="postul_confabeca_edit" type="text" class="validate">
                        <label for="postul_confabeca_edit">Postula Confabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha_envio_confabeca" id="fecha_envio_confabeca_edit" type="date" class="validate">
                        <label for="fecha_envio_confabeca_edit">Fecha Envio confabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="modalidad_pago" id="modalidad_pago_edit" type="text" class="validate">
                        <label for="modalidad_pago_edit">Modalidad Pago</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="matricula_financiera" id="matricula_financiera_edit" type="text" class="validate">
                        <label for="matricula_financiera_edit">Matricula Financiera</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="matricula_academica" id="matricula_academica_edit" type="text" class="validate">
                        <label for="matricula_academica_edit">Matricula academica</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" >crear
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>











