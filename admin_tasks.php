<?php
	include_once 'dbhinc.php';
	$sqlTotalUser = "Select count(*) From Customer;";
	$sqlTotalBookCat = "Select cat_name, count(isbn)
							From books natural join category
							Group By cat_name
							Order BY count(isbn) DESC;";
	$sqlMonthlySale = "Select order_month, avg(order_total)
						From Orders
						Where order_year = 2020
						Group By order_month;";
	$sqlBookReview = "Select title, count(*)
						From books natural Right Outer Join reviews
						Group By isbn;";
						
	$totalUsers = mysqli_query($conn, $sqlTotalUser);
	$checkTU = mysqli_num_rows($totalUsers);
	
	$totalBookCat = mysqli_query($conn, $sqlTotalBookCat);
	$checkBC = mysqli_num_rows($totalBookCat);
	
	$monthlySales = mysqli_query($conn, $sqlMonthlySale);
	$checkMS = mysqli_num_rows($monthlySales);
	
	$bookTitles = mysqli_query($conn, $sqlBookReview);
	$checkBT = mysqli_num_rows($bookTitles);
?>
<!DOCTYPE HTML>
<head>
	<title>ADMIN TASKS</title>
</head>
<body>
	<table align="center" style="border:2px solid blue;">
		<tr>
			<form action="manage_bookstorecatalog.php" method="post" id="catalog">
			<td align="center">
				<input type="submit" name="bookstore_catalog" id="bookstore_catalog" value="Manage Bookstore Catalog" style="width:200px;">
			</td>
			</form>
		</tr>
		<tr>
			<form action=" " method="post" id="orders">
			<td align="center">
				<input type="submit" name="place_orders" id="place_orders" value="Place Orders" style="width:200px;">
			</td>
			</form>
		</tr>
		<tr>
			<form action="reports.php" method="post" id="reports">
			<td align="center">
				<input type="submit" name="gen_reports" id="gen_reports" value="Generate Reports" style="width:200px;">
			</td>
			</form>
		</tr>
		<tr>
			<form action="update_adminprofile.php" method="post" id="update">
			<td align="center">
				<input type="submit" name="update_profile" id="update_profile" value="Update Admin Profile" style="width:200px;">
			</td>
			</form>
		</tr>
		<tr>
		<td>&nbsp</td>
		</tr>
		<tr>
			<form action="index.php" method="post" id="exit">
			<td align="center">
				<input type="submit" name="cancel" id="cancel" value="EXIT 3-B.com[Admin]" style="width:200px;">
			</td>
			</form>
		</tr>
	</table>
	
	
	<?php
		if($checkTU > 0)
		{
			$row = mysqli_fetch_array($totalUsers);
			echo "Members: " . $row[0] . "<br>
						<p>_______________________________________________</p> <br>";
		}
		
		if($checkBC > 0)
		{
			while ($row = mysqli_fetch_array($totalBookCat))
			{
				echo "{$row[0]}: {$row[1]}<br>";
			}
			echo "<p>_______________________________________________</p> <br>";
		}
		
		if($checkMS > 0)
		{
			while ($row = mysqli_fetch_array($monthlySales))
			{
				echo "{$row[0]}: \${$row[1]}<br>";
			}
			echo "<p>_______________________________________________</p> <br>";
		}
		
		if($checkBT > 0)
		{
			while ($row = mysqli_fetch_array($bookTitles))
			{
				echo "{$row[0]}: {$row[1]} Reviews<br>";
			}
			echo "<p>_______________________________________________</p> <br>";
		}
	?>
</body>


</html>