<div class="modal fade" id="create_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">


 <!--MODAL HEADER-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Crée une ligne
        </h4>
      </div>

<!--MODAL BODY-->
      <div id="modal_body" class="modal-body">
          <?php
          //Dynamic div generator
          foreach ($array_header as $column) 
          {
            echo "<div class='form-group row>'". 
                      "<label class='control-label col-sm-5' for='".$column."'>".$column."</label>".
                        "<div class='col-sm-6'>".
                          "<input type='text' name='".$column."' class='form-control create_modal'>".
                        "</div>".
                "</div>";
          }
          ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <button type="button" class="btn btn-primary" onclick="submit_insert_data()">Valider</button>
      </div>


    </div>
  </div>
</div>
