<!-- Figure 3: Search Result Screen by Prithviraj Narahari, php coding: Alexander Martens -->
<?php
	include_once 'dbhinc.php';
	include_once 'search_book.php';
	include_once 'ShoppingList.php';
	
	if(isset($_GET['cartisbn']))
	{
		$book = $_GET['cartisbn'];
		$sql_u = 0;//"SELECT * FROM customer_reg WHERE status=1 ";
		$cust = mysqli_query($conn, $sql_u);
		
		$sql_in = "Insert Into shopping_cart(id, isbn) Values ( '{$cust}', '{$book}');";
		mysqli_query($conn, $sql_in);
		
		$s = "Select * From shopping_cart;";
		$r = mysqli_query($conn, $s);
	}
	
	$sql = get_sql($_GET['searchfor'], $_GET['searchon'][0], $_GET['category']);
	
	$results = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($results);
?>
<!DOCTYPE html>
<html>
<head>
	<title> Search Result - 3-B.com </title>
	<script>
	//redirect to reviews page
	function review(isbn, title){
		window.location.href="screen4.php?isbn="+ isbn + "&title=" + title;
	}
	//add to cart
	function cart(isbn, searchfor, searchon, category){
		window.location.href="screen3.php?cartisbn="+ isbn + "&searchfor=" + searchfor + "&searchon=" + searchon + "&category=" + category;
	}
	</script>
</head>
<body>
	<table align="center" style="border:1px solid blue;">
		<tr>
			<td align="left">
				
					<h6> <fieldset>Your Shopping Cart has 0 items</fieldset> </h6>
				
			</td>
			<td>
				&nbsp
			</td>
			<td align="right">
				<form action="shopping_cart.php" method="post">
					<input type="submit" value="Manage Shopping Cart">
				</form>
			</td>
		</tr>	
		<tr>
		<td style="width: 350px" colspan="3" align="center">
			<div id="bookdetails" style="overflow:scroll;height:180px;width:400px;border:1px solid black;background-color:LightBlue">
			<table>
			
				<?php
					if($resultCheck > 0)
					{
						while ($row = mysqli_fetch_assoc($results))
						{
							echo "
								<tr>
								<td align='left'><button name='btnCart' id='btnCart' onClick='cart( \"" . $row['isbn'] . "\", \"\", \"Array\", \"all\")'>Add to Cart</button></td>
								<td rowspan='2' align='left'> {$row['title']} </br>By {$row['author']}</br><b>Publisher:</b> {$row['publisher']},</br><b>ISBN:</b> {$row['isbn']}</t> <b>Price:</b> {$row['price']}</td>
								
								</tr>
								<tr>
									<td align='left'><button name='review' id='review' onClick='review(\"" . $row['isbn'] . "\", \"" . $row['title'] . "\")'>Reviews</button></td>
								</tr>
								<tr>
									<td colspan='2'><p>_______________________________________________</p></td>
								</tr>
								";
						}
					}
				?>
			</table>
			
			</div>
			
			</td>
		</tr>
		<tr>
			<td align= "center">
				<form action="confirm_order.php" method="get">
					<input type="submit" value="Proceed To Checkout" id="checkout" name="checkout">
				</form>
			</td>
			<td align="center">
				<form action="screen2.php" method="post">
					<input type="submit" value="New Search">
				</form>
			</td>
			<td align="center">
				<form action="index.php" method="post">
					<input type="submit" name="exit" value="EXIT 3-B.com">
				</form>
			</td>
		</tr>
	</table>
</body>
</html>
