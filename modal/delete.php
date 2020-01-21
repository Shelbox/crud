<div id="delete_modal" class="modal fade">
	<div class="modal-dialog modal-delete">
		<div class="modal-content">


			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Suppression</h4></br>
				<h5>Êtes-vous sûrs de vouloir supprimer définitivement cette donnée ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>


			<div class="modal-body">
				<?php
          //Dynamic div generator
          foreach ($array_header as $column) 
          {
            echo "<div class='form-group row>'". 
                      "<label class='control-label col-sm-5' for='".$column."'>".$column."</label>".
                        "<div class='col-sm-6'>".
                          "<input type='text' id='".$column."' class='form-control modal_create' value='".$column."' readonly>".
                        "</div>".
                "</div>";
          }
          ?>
			</div>


			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
				<button type="button" class="btn btn-danger" onclick="submit_delete_data()">Supprimer</button>
			</div>


		</div>
	</div>
</div>

<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-delete {		
		color: #636363;
		width: 400px;
	}
	.modal-delete .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-delete .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-delete h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -10px;
	}
	.modal-delete .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-delete .modal-body {
		color: #999;
	}
	.modal-delete .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-delete .modal-footer a {
		color: #999;
	}		
	.modal-delete .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-delete .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-delete .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-delete .btn-info {
        background: #c1c1c1;
    }
    .modal-delete .btn-info:hover, .modal-delete .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-delete .btn-danger {
        background: #f15e5e;
    }
    .modal-delete .btn-danger:hover, .modal-delete .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>