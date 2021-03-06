<div id="error_modal" class="modal fade">
	<div class="modal-dialog modal-error">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE5CD;</i>
				</div>				
				<h4 class="modal-title">Sorry!</h4>	
			</div>
			<div class="modal-body">
				<p class="text-center">Votre action à échouer</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>     

<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-error {		
		color: #636363;
		width: 325px;
	}
	.modal-error .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-error .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-error h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-error .form-control, .modal-error .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-error .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-error .modal-footer {
		border: none;
		text-align: center;
		border-radius: 5px;
		font-size: 13px;
	}	
	.modal-error .icon-box {
		color: #fff;		
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #ef513a;
		padding: 15px;
		text-align: center;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-error .icon-box i {
		font-size: 56px;
		position: relative;
		top: 4px;
	}
	.modal-error.modal-dialog {
		margin-top: 80px;
	}
    .modal-error .btn {
        color: #fff;
        border-radius: 4px;
		background: #ef513a;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-error .btn:hover, .modal-error .btn:focus {
		background: #da2c12;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>