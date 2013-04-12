<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript" src="../js/panel_validation.js"></script>
		<title>Панель управления</title>
	</head>

	<body>
	<div class="container">
		<a href="main/logoff"><p class="text-right">Завершить работу</p></a>
	<div class="row">
		
		<div class="span5">
			<form enctype="multipart/form-data" action="main/addRecord" method="POST">
		    	<fieldset>
		    		<legend>
					        Создание новой книги в каталоге:
					</legend>

					<table>
						<tr>
							<td class="cell">Название книги</td>
							<td><input type="text" size="60" name="title"/></td>
						</tr>
						<tr>
							<td class="cell">Описание</td>
							<td><textarea rows="10" cols="60" name="desc"></textarea></td>
						</tr>
						<tr>
							<td class="cell">Ссылка Google Play</td>
							<td><input type="text" size="60" name="download_url"/></td>
						</tr>
						<tr>
							<td class="cell">Иконка</td>
							<td>
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />    		     
				    			<input name="userfile" type="file" />
							</td>
						</tr>
						<tr>
							<td class="cell">Имя пакета приложения</td>
							<td><input type="text" size="60" name="process"/></td>
						</tr>

						<tr>
							<td colspan="2">
								<button type="submit" class="btn btn-primary" id="add_book">Добавить книгу в каталог</button>
							</td>
						</tr>
					</table>
				    
			    </fieldset>
			</form>
		</div>

		<div class="span7">
			
		</div>
	</div>

	<h4>Сейчас в каталоге:</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Название</th>
						<th>Описание</th>
						<th>Ссылка Google Play</th>
						<th>Имя пакета</th>
						<th>Иконка</th>
						<th> </th>
					</tr>
					<?php
						foreach ($books as $key => $value) {
							echo "<tr>";
							echo "<td>".$value->title."</td>";
							echo "<td>".$value->desc."</td>";
							echo "<td>".$value->download_url."</td>";
							echo "<td>".$value->process."</td>";
							echo "<td><img src='".$value->picture."' class='img-rounded'/></td>";
							echo "<td><button class='btn btn-danger' id='".$value->id."'>Удалить</button></td>";
							echo "</tr>";
						}
					?>
				</thead>
			</table>

	</div>

	</body>

</html>