<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data</title>

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


</head>
<body>
	<table class="table" id="users-table" data-link="{!!route('dt_getUsers')!!}">
		<thead>
			<tr>
				<td class="col_table" data-name="apellido">apellido</td>
				<td class="col_table" data-name="nombre">nombre</td>
				<td class="col_table" data-name="legajo">legajo</td>
				<td class="col_table" data-name="email">Email</td>
			</tr>
		</thead>
	</table>

		<script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <!-- App scripts -->
	
<script type="text/javascript">
	
	$(function() {

		cargarTablaba();

	    // $('#users-table').DataTable({
	    //     processing: true,
	    //     serverSide: true,
	    //     ajax: '{!! route('dt_getUsers') !!}',
	    //     columns: [
	    //         { data: 'apellido', name: 'Apellido' },
	    //         { data: 'nombre', name: 'Nombre' },
	    //         { data: 'legajo', name: 'Legajo' }	
	    //     ]
	    // });
	});

	function cargarTablaba(){
		var sum=0;
		$('.table').each(function(){
			sum=sum+1;
			var table_id =$(this).attr('id');
			var link = $(this).data('link');
			var columnas= new Array();

			$('.col_table').each(function(){
				var unaColumna={ data: $(this).data('name'), name: $(this).text()};

				columnas.push(unaColumna);
			});

			$('#'+table_id).DataTable({
				//paging: false,
    			//searching: false,
    			processing: true,
	        	serverSide: true,
		        ajax:link,
		        columns: columnas//columnas
	    	});
		});
	}

</script>


</body>
</html>
