

    <!-- Modal Structure -->
    <div id="modal_crear" class="modal">
        <form id="form_crear" method="post">
            <div class="modal-content">
                <h4>Crear Evento</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombre" id="nombre" type="text" class="validate">
                        <label for="nombre">Nombre Evento</label>
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
            <input type="hidden" id="id_evento_edit" name="id">
            <div class="modal-content">
                <h4>Editar Evento</h4>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input required name="nombre" id="nombre_edit" type="text" class="validate">
                        <label for="nombre_edit">Nombre Evento</label>
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











