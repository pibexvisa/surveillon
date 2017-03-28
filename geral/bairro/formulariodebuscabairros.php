<html>
<head><meta charset="utf-8"></head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"> 

		<style>
			.input{color:#ccc;}
			.input:focus{color:#000;}
		</style>
		
		<table border=0>
			<tr>
				<td><input type="text" name="nome" value="Digite sua pesquisa aqui..." class="input" onfocus="this.value=''";/></td>
				<td width=30%><input type="submit" class="btn btn-lg btn-success btn-block" value="Buscar"></td>
			</tr>
		</table>
	</form> 
</body>
</html>
