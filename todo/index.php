<?php 
	$errors = "";
	$db = mysqli_connect('localhost','root','','todo');

	if (isset($_POST['submit'])) {
		$task = $_POST['task'];
		if(empty($task)) {
			$errors = "You must enter some task";
		}else {
			mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
			header('location: index.php');
		}
	}

	$tasks = mysqli_query($db,"SELECT * FROM tasks");



?>
<!DOCTYPE html>
<html>
<head>
	<title>Todo List Application with PHP and MySql</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class = "heading">
		<h2>Todo List Application with PHP and MySql</h2>
	</div>

	<form method="POST" action="index.php">
		<?php if (isset($errors)) { ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" class="add_btn" name="submit">Add Task</button>
	</form>
	
	<table>
		<thread> 
			<tr>
				<th>N</th>
				<th>Task</th>
				<th>Action</th>
			</tr>
		</thread>
		
		<tbody>
		<?php while($row = mysqli_fetch_array($tasks))  { ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td class="task"><?php echo $row['task']; ?></td>
				<td class="delete">
					<a href="#">X</a>
				</td>
			</tr>

		<?php } ?>
		</tbody>

	</table>
</body>
</html>