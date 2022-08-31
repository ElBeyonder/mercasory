

    <!-- Modal Structure -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>crear usuario</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombre_completo" id="nombre_completo" type="text" class="validate">
                        <label for="nombre_completo">Nombre completo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo" type="email" class="validate">
                        <label for="correo">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="usuario" id="usuario" type="text" class="validate">
                        <label for="usuario">usuario</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="password" id="password" type="text" class="validate">
                        <label for="password">Contraseña</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="confirm_password" id="confirm_password" type="text" class="validate">
                        <label for="confirm_password">Confirmar contraseña</label>
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
    <div id="modal_editar" class="modal">
        <form id="form_editar" method="post">
            <input type="hidden" id="id_usuario_editar" name="id">
            <div class="modal-content">
                <h4>Editar usuario</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombre_completo" id="nombre_completo_editar" type="text" class="validate">
                        <label for="nombre_completo_editar">Nombre completo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="correo" id="correo_editar" type="email" class="validate">
                        <label for="correo_editar">Correo</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input required name="usuario" id="usuario_editar" type="text" class="validate">
                        <label for="usuario_editar">usuario</label>
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











