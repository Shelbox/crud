<?php 
include_once ('header/header.php'); 

//Get column table
$select_bdd = $_GET['bdd'];
$select_table = $_GET['table'];

$bdd = mysqli_connect("localhost", "root","",$select_bdd);

$sql_get_columns = "SHOW COLUMNS FROM $select_table";
$getData = mysqli_query($bdd,$sql_get_columns);

while ($row = mysqli_fetch_assoc($getData))
{
	$array_header[] = $row['Field'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<table id="tab" class="table table-striped table-bordered" style="width:100%">
	<thead>
	<?php 
	foreach ($array_header as $column) 
	{ ?>
		<th>
			<?=$column;?>
		</th>
<?php } ?>
		<th>
			Modifier
		</th>
		<th>
			Supprimer
		</th>
	</thead>
	<tbody>
		<?php
		//Get data table
		$sql_get_data = "SELECT * FROM $select_table LIMIT 100";
		$getData = mysqli_query($bdd,$sql_get_data);

		while($row = mysqli_fetch_assoc($getData))
		{ ?>
			<tr>
	<?php	$trigger_to_get_id = 0;
			foreach ($row as $key => $value) 
			{

				if($trigger_to_get_id == 0)
				{
					$name_column_id = $key;
					$id_value = $value;
					$trigger_to_get_id = 1;
				}?>
							
							<td><?=$value;?></td>

				<?php
				//Prepare param JS
				$ligne_data_js = '"'.join("\",\"",$row).'"'; 

				?>
			
	<?php	} 
		
	?>	
				<td>
						<button class="btn btn-primary btn-xs" onclick='GetModalFieldsDynamique(<?=$ligne_data_js?>);'> 
							<span class="glyphicon glyphicon-pencil"></span>
						</button>
				</td>
   				 <td>
   				 		<button id="delete_button" class="btn btn-danger btn-xs" value="<?=$id_value?>" onclick='GetModalDelete(<?=$ligne_data_js?>);'>
   				 			<span class="glyphicon glyphicon-trash"></span>
   				 		</button>
   				 	</p>
   				 </td>
    

			</tr>
<?php } 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
	</tbody> 
</table>
<button class="btn btn-primary btn-md" onclick='GetModalCreate(<?=$ligne_data_js?>);'>Ajouter
							<span class="glyphicon glyphicon-plus"></span>
</button>

<?php 
include ('modal/update.php'); 
include ('modal/delete.php'); 
include ('modal/success.php'); 
include ('modal/create.php'); 
?>

<script type="text/javascript">
	
	function GetModalFieldsDynamique(<? echo join(",",$array_header); ?>)
	{
		 <?php
		 //Replace value of dynamic modal
		 foreach ($array_header as $column) 
		 {
		 	echo '$("[id=\''.$column.'\']").val('.$column.');';
		 	echo '$("[id=\''.$column.'\']").text('.$column.');';
		 }
		 ?>
		 //Readonly first field to protect ID
		 var fields = <?php echo json_encode($array_header); ?>;
		 $("#"+fields[0]).attr('readonly', true);

		 $('#update_modal').modal();

	}

	function GetModalDelete(<? echo join(",",$array_header); ?>)
	{
		 var fields = <?php echo json_encode($array_header); ?>;

		 <?php
		 //Replace value of dynamic modal
		 foreach ($array_header as $column) 
		 {
		 	echo '$("[id=\''.$column.'\']").val('.$column.');';
		 	echo '$("[id=\''.$column.'\']").text('.$column.');';
		 }
		 ?>
		 //Readonly first field to protect ID
		 $("#"+fields[0]).attr('readonly', true);

		 $('#delete_modal').modal();

	}

	function GetModalCreate()
	{
		 $('#create_modal').modal();
	}

	//Create sql request => Ajax update
	function submit_update_data()
	{
		var bdd = "<?=$select_bdd?>";
		console.log(bdd);
		var fields = <?php echo json_encode($array_header); ?>;
		var sql = "UPDATE <?=$select_table?> "
					+"SET ";

		var i = 0;
		while (i < fields.length)
		{

			var value = $("[id='"+fields[i]+"']").val();
			sql = sql+fields[i]+"='"+value+"', ";
			i++;
		}

		//Delete char "," for sql
		sql = sql.slice(0, -2);
		value = $("[id='"+fields[0]+"']").val();
		sql = sql+" WHERE "+fields[0]+" ='"+value+"';";

		console.log(sql);
			
	     $.ajax({
      	url: "controller/mod_data.php",
	      method:"POST",
	      data:{ 
	      	sql : sql,
	      	bdd : bdd
	      },
	      cache:false,
	      success:function(data)
	      {
	      	$('#update_modal').modal('toggle');
	        $('#success_modal').modal();
	     
	      },
	      error: function()
	      {
	      	//TODO Error modal
	        console.log("ajax_error");
	      }

	     });

	}

	//Create sql request => Ajax update
	function submit_delete_data()
	{
		var bdd = "<?=$select_bdd?>";	
		var fields = <?php echo json_encode($array_header); ?>;
		var id_value = $("[id='"+fields[0]+"']").val();
		console.log(bdd);
		var sql = "DELETE FROM <?=$select_table?> "
					+"WHERE "
					+fields[0]+" ='"+id_value+"'";

		console.log(sql);
			
	     $.ajax({
      	url: "controller/mod_data.php",
	      method:"POST",
	      data:{ 
	      	sql : sql,
	      	bdd : bdd
	      },
	      cache:false,
	      success:function(data)
	      {
	      	$('#delete_modal').modal('toggle');
	        $('#success_modal').modal();
	     
	      },
	      error: function()
	      {
	      	//TODO Error modal
	        console.log("ajax_error");
	      }

	     });

	}

	//Create sql request => Ajax update
	function submit_insert_data()
	{

		var fields = <?php echo json_encode($array_header); ?>;

		var bdd = "<?=$select_bdd?>";	
		console.log(bdd);
		var sql = "INSERT INTO <?=$select_table?> VALUES(";

		var i = 0;
		while (i < fields.length)
		{

			var value = $("[name='"+fields[i]+"']").val();
			sql = sql+"'"+value+"', ";
			i++;
		}
		//Delete char "," for sql
		sql = sql.slice(0, -2);
		sql = sql+");";

		console.log(sql);
			
	     $.ajax({
      	url: "controller/mod_data.php",
	      method:"POST",
	      data:{ 
	      	sql : sql,
	      	bdd : bdd
	      },
	      cache:false,
	      success:function(data)
	      {
	      	$('#create_modal').modal('toggle');
	        $('#success_modal').modal();
	     
	      },
	      error: function()
	      {
	      	//TODO Error modal
	      	$('#create_modal').modal('toggle');
	        $('#error_modal').modal();
	        console.log("ajax_error");
	      }

	     });

	}

$(document).ready(function () {

    $('#tab').DataTable();

});
</script>


<?php


function getFields($array_info_column)
{

	$sql_get_columns = "SHOW COLUMNS FROM $select_table";
	$getData = mysqli_query($bdd,$sql_get_columns);

	while ($row = mysqli_fetch_assoc($getData))
	{
		$array_info_column[] = $row;
	}

	 foreach($array_info_column as $row => $innerArray)
    {
        foreach($innerArray as $innerRow => $value)
        {
         
           if ($innerRow == "Field")
           {
				$id_input = $value;
           } 
           if ($innerRow == "Type") 
           {
           		$input_type = substr($value, 0, 3);
           		if($input_type == "int" || $input_type == "flo")
           		{
           			$input_type = "number";
           		}
           		elseif($input_type == "var" || $input_type == "cha")
           		{
           			$input_type = "text";
           		}
           		elseif($input_type == "dat" || $input_type == "tim")
           		{
           			$input_type = "date";
           		}

           }
           if ($innerRow == "Key")
           {
           		if ($value == "PRI") 
           		{
           			$readonly = "readonly";
           		}
			}
        
			echo "<div class='form-group row>'". 
	                  "<label class='control-label col-sm-5' for='".$id_input."'>".$id_input."</label>".
    	                    "<div class='col-sm-6'>".
	    	                      "<input type='".$input_type."' name='".$id_input."' class='form-control ".$readonly."'>".
	                       "</div>".
        	    "</div>";    
		}
    }

}

















