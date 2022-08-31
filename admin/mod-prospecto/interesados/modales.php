

    <!-- Modal -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>Crear Interesado</h4>
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
                        <input required name="correo" id="correo" type="text" class="validate">
                        <label for="correo">correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1" type="text" class="validate">
                        <label for="celular1">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="programa_interes" id="programa_interes" type="text" class="validate">
                        <label for="programa_interes">Programa interes</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion" type="text" class="validate">
                        <label for="direccion">Direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="asesor" id="asesor" type="text" class="validate">
                        <label for="asesor">Asesor</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input required name="fecha1" id="fecha1" type="date" class="validate">
                        <label for="fecha1">Fecha 1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="1_contacto_seguimiento" id="1_contacto_seguimiento" type="text" class="validate">
                        <label for="1_contacto_seguimiento">1 seguimiento</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input name="fecha2" id="fecha2" type="date" class="validate">
                        <label for="fecha2">Fecha 2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="2_contacto_seguimiento" id="2_contacto_seguimiento" type="text" class="validate">
                        <label for="2_contacto_seguimiento">2 seguimiento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha3" id="fecha3" type="date" class="validate">
                        <label for="fecha3">Fecha 3</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="3_contacto_seguimiento" id="3_contacto_seguimiento" type="text" class="validate">
                        <label for="3_contacto_seguimiento">3 seguimiento</label>
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
            <input type="hidden" id="id_editar_interesado" name="id">
            <div class="modal-content">
                <h4>Editar Interesado</h4>
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
                        <input required name="correo" id="correo_editar" type="text" class="validate">
                        <label for="correo_editar">correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="celular1" id="celular1_editar" type="text" class="validate">
                        <label for="celular1_editar">celular1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input  required name="programa_interes" id="programa_interes_editar" type="text" class="validate">
                        <label for="programa_interes_editar">Programa interes</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="direccion" id="direccion_editar" type="text" class="validate">
                        <label for="direccion_editar">Direccion</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="asesor" id="asesor_editar" type="text" class="validate">
                        <label for="asesor_editar">Asesor</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input required name="fecha1" id="fecha1_editar" type="date" class="validate">
                        <label for="fecha1_editar">Fecha 1</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="1_contacto_seguimiento" id="1_contacto_seguimiento_editar" type="text" class="validate">
                        <label for="1_contacto_seguimiento_editar">1 seguimiento</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input name="fecha2" id="fecha2_editar" type="date" class="validate">
                        <label for="fecha2_editar">Fecha 2</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="2_contacto_seguimiento" id="2_contacto_seguimiento_editar" type="text" class="validate">
                        <label for="2_contacto_seguimiento_editar">2 seguimiento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="fecha3" id="fecha3_editar" type="date" class="validate">
                        <label for="fecha3_editar">Fecha 3</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input name="3_contacto_seguimiento" id="3_contacto_seguimiento_editar" type="text" class="validate">
                        <label for="3_contacto_seguimiento_editar">3 seguimiento</label>
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















