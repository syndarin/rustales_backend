<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>Авторизация</title>
	</head>

	<body>
		<div class="container">
			<form method="POST" action="admin">
				<legend>Авторизация</legend>
				<table>
					<tr>
						<td class="cell">Логин</td>
						<td><input type="text" size="15" name="login"/></td>
					</tr>
					<tr>
						<td class="cell">Пароль</td>
						<td><input type="password" size="15" name="password"/></td>
					</tr>
					<tr>
						<td colspan="2" class="cell_center_align"><button class="btn btn-primary">Войти</button></td>
					</tr>
				</table>

			</form>
		</div>

	</body>
</html>