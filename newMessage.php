<!DOCTYPE html>
<html>
	<head>
		<title>Send a new message</title>
	</head>
	<body>
		<form method="post" action="messageValidator.php">
			<label>Email:
				<input type="email" name="email">
			</label><br>

			<label>Subject:
				<input type="text" name="subject" required>
			</label><br>

			<label>Message:
				<textarea type="text" name="content" required></textarea>
			</label><br>

			<input type="submit" value="submit">
		</form>
	</body>
</html>