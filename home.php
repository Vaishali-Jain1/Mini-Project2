<?php
session_start();

$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'quizdbase');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<br><h1 class="text-center text-primary">WebDevelopers's Quiz</h1><br>
<h2 class="text-center text-success">Welcome</h2><br>
<div class="col-lg-8 col-md-8 col-sm-8 col-xl-8 m-auto d-block">
<div class="card">
	<h3 class="text-center card-header">Welcome, you have to select only out of 4. Best of Luck. ;)</h3>
</div><br>
<form action="check.php" method="post">
<?php

for($i=1;$i<6;$i++){
$q="select * from questions where qid=$i";
$query=mysqli_query($con,$q);
while($rows=mysqli_fetch_array($query)){
	?>
	<div class="card">
		<h4 class="card-header"><?php echo $rows['question']; ?></h4>
<?php
$q="select * from answers where ans_id=$i";
$query=mysqli_query($con,$q);
while($rows=mysqli_fetch_array($query)){
	?>
<div class="card-body">
	<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
	<?php echo $rows['answer']; ?>
</div>

	<?php
}
}
}
?>
<input type="submit" name="submit" value="submit" class="btn btn-success m-auto d-block">
</form>
</div>
</div><br><br>
<div class="m-auto d-block" >
<a href="logout.php" class="btn btn-primary">LogOut</a>
</div><br>
<div>
<h5 class="text-center"> @2020 NotesBog</h5>
</div><br><br>
</div>
</body>
</html>