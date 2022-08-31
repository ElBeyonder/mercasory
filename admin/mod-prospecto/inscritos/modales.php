

    <!-- Modal -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>Crear Inscrito</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombres" id="nombres" type="text" class="validate">
                        <label for="nombres">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos" type="text" class="validate">
                        <label for="apellidos">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input required name="programa_interes" id="programa_interes" type="text" class="validate">
                        <label for="programa_interes">Programa interes</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="identificacion" id="identificacion" type="text" class="validate">
                        <label for="identificacion">Identificacion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1" type="text" class="validate">
                        <label for="celular1">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular2" id="celular2" type="text" class="validate">
                        <label for="celular2">celular2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_entevista" id="fecha_entevista" type="date" class="validate">
                        <label for="fecha_entevista">Fecha entrevista</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion" type="text" class="validate">
                        <label for="direccion">Direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="municipio" id="municipio" type="text" class="validate">
                        <label for="municipio">Municipio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="estado" id="estado">
                            <option value="" disabled selected>Opciones....</option>
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select>
                        <label>Estado</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="correo" id="correo" type="text" class="validate">
                        <label for="correo">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="pago_inscrito" id="pago_inscrito" type="text" class="validate">
                        <label for="pago_inscrito">Pago inscrito</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select <input name="estado_documento" id="estado_documento">
                            <option value="" disabled selected>Opciones....</option>
                            <option value="ENVIADO">ENVIADO</option>
                            <option value="NO_ENVIADO">NO ENVIADO</option>
                        </select>
                        <label>Estado documento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="postula_comfabeca" id="postula_comfabeca">
                            <option value="" disabled selected>Opciones....</option>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                        <label>Postula comfabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha_envio_comfabeca" id="fecha_envio_comfabeca" type="date" class="validate">
                        <label for="fecha_envio_comfabeca">Fecha envio comfabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="modalidad_pago" id="modalidad_pago" type="text" class="validate">
                        <label for="modalidad_pago">Modalidad pago</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="matricula_financiera" id="matricula_financiera" type="text" class="validate">
                        <label for="matricula_financiera">Matricula financiera</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="matricula_academica" id="matricula_academica" type="text" class="validate">
                        <label for="matricula_academica">Matricula Academica</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="convenio" id="convenio" type="text" class="validate">
                        <label for="convenio">Convenio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="como_entero" id="como_entero" type="text" class="validate">
                        <label for="como_entero">Como se entero?</label>
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
            <input type="hidden" id="id_inscrito_editar" name="id">
            <div class="modal-content">
                <h4>Editar Inscrito</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombres" id="nombres_editar" type="text" class="validate">
                        <label for="nombres_editar">Nombres</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="apellidos" id="apellidos_editar" type="text" class="validate">
                        <label for="apellidos_editar">Apellidos</label>
                    </div>
                    <div class="input-field col s12 m12">
                        <input required name="programa_interes" id="programa_interes_editar" type="text" class="validate">
                        <label for="programa_interes_editar">Programa interes</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="identificacion" id="identificacion_editar" type="text" class="validate">
                        <label for="identificacion_editar">Identificacion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1_editar" type="text" class="validate">
                        <label for="celular1_editar">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular2" id="celular2_editar" type="text" class="validate">
                        <label for="celular2_editar">celular2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="fecha_entevista" id="fecha_entevista_editar" type="date" class="validate">
                        <label for="fecha_entevista_editar">Fecha entrevista</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion_editar" type="text" class="validate">
                        <label for="direccion_editar">Direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="municipio" id="municipio_editar" type="text" class="validate">
                        <label for="municipio_editar">Municipio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="estado" id="estado_editar" type="text" class="validate">
                        <label for="estado_editar">Estado</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="correo" id="correo_editar" type="text" class="validate">
                        <label for="correo_editar">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="pago_inscrito" id="pago_inscrito_editar" type="date" class="validate">
                        <label for="pago_inscrito_editar">Pago inscrito</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="estado_documento" id="estado_documento_editar" type="text" class="validate">
                        <label for="estado_documento_editar">Estado documento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="postula_comfabeca" id="postula_comfabeca_editar" type="text" class="validate">
                        <label for="postula_comfabeca_editar">Postula comfabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha_envio_comfabeca" id="fecha_envio_comfabeca_editar" type="text" class="validate">
                        <label for="fecha_envio_comfabeca_editar">Fecha envio comfabeca</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="modalidad_pago" id="modalidad_pago_editar" type="text" class="validate">
                        <label for="modalidad_pago_editar">Modalidad pago</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="matricula_financiera" id="matricula_financiera_editar" type="text" class="validate">
                        <label for="matricula_financiera_editar">Matricula financiera</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="matricula_academica" id="matricula_academica_editar" type="text" class="validate">
                        <label for="matricula_academica_editar">Matricula Academica</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="convenio" id="convenio_editar" type="text" class="validate">
                        <label for="convenio_editar">Convenio</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="como_entero" id="como_entero_editar" type="text" class="validate">
                        <label for="como_entero_editar">Como se entero?</label>
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
















