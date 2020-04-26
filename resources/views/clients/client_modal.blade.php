<div class="modal" id="clients_modal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <a type="a" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col">
                  <input type="text" class="form-control"name="name" id="name" placeholder="Ingrese El nombre"  required>
                  <span id="error_name"></span>
                </div>
                <br><br>
                <div class="col">
                  <input type="number" class="form-control"name="identification" id="identification" placeholder="Ingrese La Indentificacion" required>
                  <span id="error_identification"></span>
                </div>
                
            </div>
            <div class="row">
              <div class="col">
                  <input type="email" class="form-control"name="mail" id="mail" placeholder="Ingrese el Correo Electronico" required>
                  <span id="error_mail"></span>
                </div>
                <br><br>
                <div class="col">
                  <input type="text" class="form-control"name="address" id="address" placeholder="Ingrese La Direccion" required>
                  <span id="error_address"></span>
                </div>
                
            </div>


      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-secondary" id="cancel"data-dismiss="modal">Cancel</a>
        <a type="button" class="btn btn-primary" id="save">Save</a>
      </div>
    </div>
  </div>
</div>