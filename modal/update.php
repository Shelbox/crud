<div class="modal fade" id="update_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">


 <!--MODAL HEADER-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Modifier les données
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
                          "<input type='text' id='".$column."' class='form-control' value='".$column."'>".
                        "</div>".
                "</div>";
          }
          ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
        <button type="button" class="btn btn-primary" onclick="submit_update_data()">Modifier</button>
      </div>


    </div>
  </div>
</div>
