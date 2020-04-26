<div class="modal" id="users_modal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title_modal"></h5>
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
            </div>
            <br>
            <div class="row">
              
                <div class="col">
                  <input type="email" class="form-control"name="email" id="email" placeholder="Ingrese El Correo" required>
                  <span id="error_email"></span>
                </div>
            </div>
            <br>
            <div class="row">
              
                <div class="col">
                  <input type="password" class="form-control"name="password" id="password" placeholder="Ingrese La Password" required>
                  <span id="error_password"></span>
                </div>
            </div>
            <br>
            <div class="row">
              
                <div class="col">
                  <select name="role" id="role" class="form-control">
                    <option value="">seleccionar</option>
                    <option value="Admin">Administrado</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                  <span id="error_role"></span>
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