<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Feedback form</title>
</head>
	<style>
		.cont{
					height:auto;
					width:auto;
					display: flex;
					justify-content: center;
					align-items: center;
		}
		.cont1{
						border:2px solid black;
						border-radius:15px;
						height:400px;
						width:30%;
						justify-content: center;
						align-items: center;
						background-color:orange ;
						padding-left:55px;
		}
		
	</style>
<body>

<div class="cont">
    <div class="cont1">
  <form method="post" align="left" >
    <h1>Feedback Form</h1>
    <br><br>
    Email<br>
    <input type="email" name="mail" placeholder="name@example.com" size="52">
    <br><br>
    Feedback<br>
    <textarea name="feedback" cols="50" rows="5"></textarea><br><br>
    <button type="submit" style="width:389px; background-color:">Submit</button>
  </form>

	</div>
 </div>  
</body>
</html>
