

    <!-- Modal -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>Crear Evento</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombres" id="nombres" type="text" class="validate">
                        <label for="nombres">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos" type="text" class="validate">
                        <label for="apellidos">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo" type="text" class="validate">
                        <label for="correo">correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1" type="text" class="validate">
                        <label for="celular1">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input  name="celular2" id="celular2" type="text" class="validate">
                        <label for="celular2">celular2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="programa_academico" id="programa_academico" type="text" class="validate">
                        <label for="programa_academico">programa academico</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="evento" id="evento" type="text" class="validate">
                        <label for="evento">evento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_evento" id="fecha_evento" type="date" class="validate">
                        <label for="fecha_evento">Fecha evento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="autorizo_envio_informacion" id="autorizo_envio_informacion" type="date" class="validate">
                        <label for="autorizo_envio_informacion">autorizo envio informacion</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <textarea id="observacion" name="observacion" class="materialize-textarea"></textarea>
                        <label for="observacion">Observacion</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" >Crear
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>

    <div id="modal_editar" class="modal">
        <form id="form_editar" method="post">
            <input type="hidden" name="id" id="id_evento_editar">
            <div class="modal-content">
                <h4>Editar Evento</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombres" id="nombres_editar" type="text" class="validate">
                        <label for="nombres_edtiar">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos_editar" type="text" class="validate">
                        <label for="apellidos_editar">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo_editar" type="text" class="validate">
                        <label for="correo_editar">correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1_editar" type="text" class="validate">
                        <label for="celular1_editar">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input  name="celular2" id="celular2_editar" type="text" class="validate">
                        <label for="celular2_editar">celular2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="programa_academico" id="programa_academico_editar" type="text" class="validate">
                        <label for="programa_academico_editar">programa academico</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="evento" id="evento_editar" type="text" class="validate">
                        <label for="evento_editar">evento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_evento" id="fecha_evento_editar" type="date" class="validate">
                        <label for="fecha_evento_editar">Fecha evento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="autorizo_envio_informacion" id="autorizo_envio_informacion_editar" type="date" class="validate">
                        <label for="autorizo_envio_informacion_editar">autorizo envio informacion</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <textarea id="observacion_editar" name="observacion" class="materialize-textarea"></textarea>
                        <label for="observacion_editar">Observacion</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" >Editar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>













