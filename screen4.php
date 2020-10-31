<?php
	include_once 'dbhinc.php';
	
	$isbn = $_GET['isbn'];
	$title = $_GET['title'];
	
	$sql = "SELECT * FROM reviews Where {$isbn} = isbn;";
	$results = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($results);
	
	$sql2 = "SELECT author FROM books Where {$isbn} = isbn;";
	$author = mysqli_query($conn, $sql2);
	$author = mysqli_fetch_assoc($author);
?>
<!-- screen 4: Book Reviews by Prithviraj Narahari, php coding: Alexander Martens-->
<!DOCTYPE html>
<html>
<head>
<title>Book Reviews - 3-B.com</title>
<style>
.field_set
{
	border-style: inset;
	border-width:4px;
}
</style>
</head>
<body>
	<table align="center" style="border:1px solid blue;">
		<tr>
			<td align="center">
				<h5> Reviews For: <?php echo "$title" . " by {$author['author']}";?></h5>
			</td>
			<td align="left">
				<h5> </h5>
			</td>
		</tr>
			
		<tr>
			<td colspan="2">
			<div id="bookdetails" style="overflow:scroll;height:200px;width:300px;border:1px solid black;">
			<table>
			<?php
				if($resultCheck > 0)
				{
					while ($row = mysqli_fetch_assoc($results))
					{
						echo 	"<tr>
									<td>{$row['text']}</td>
								</tr>
								<tr>
									<td colspan='2'><p>_______________________________________________</p></td>
								</tr>";
					}
				}
			?>
			</table>
			</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<!--<form action="screen2.php" method="post">
					<input type="submit" value="Done">
				</form>-->
				<button type="button" onclick="javascript:history.back()">Done</button>
			</td>
		</tr>
	</table>

</body>

</html>
