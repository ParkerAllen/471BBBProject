<?php
	include_once 'dbhinc.php';
	$sql_u = "SELECT * FROM customer_reg WHERE status=1 ";
	$cust = 0;//mysqli_query($conn, $sql_u);
	
	$s = "Select isbn, title, author, publisher, count(isbn), price FROM shopping_cart Natural Join books WHERE id = {$cust};";
	$results = mysqli_query($conn, $s);
	$resultCheck = mysqli_num_rows($results);
?>

<!DOCTYPE HTML>
<head>
	<title>Shopping Cart</title>
	<script>
	//remove from cart
	function del(isbn){
		window.location.href="shopping_cart.php?delIsbn="+ isbn;
	}
	</script>
</head>
<body>
	<table align="center" style="border:2px solid blue;">
		<tr>
			<td align="center">
				<form id="checkout" action="confirm_order.php" method="get">
					<input type="submit" name="checkout_submit" id="checkout_submit" value="Proceed to Checkout">
				</form>
			</td>
			<td align="center">
				<form id="new_search" action="screen2.php" method="post">
					<input type="submit" name="search" id="search" value="New Search">
				</form>								
			</td>
			<td align="center">
				<form id="exit" action="index.php" method="post">
					<input type="submit" name="exit" id="exit" value="EXIT 3-B.com">
				</form>					
			</td>
		</tr>
		<tr>
				<form id="recalculate" name="recalculate" action="" method="post">
			<td  colspan="3">
				<div id="bookdetails" style="overflow:scroll;height:180px;width:400px;border:1px solid black;">
					<table align="center" BORDER="2" CELLPADDING="2" CELLSPACING="2" WIDTH="100%">
						<th width='10%'>Remove</th><th width='60%'>Book Description</th><th width='10%'>Qty</th><th width='10%'>Price</th>
						
						<?php
							if($resultCheck > 0)
							{
								while ($row = mysqli_fetch_assoc($results))
								{
									echo "
										<tr><td><button name='delete' id='delete' onClick='del(\"". $row['isbn'] . "\");return false;'>Delete Item</button></td>
										<td>{$row['title']}</br><b>By</b> {$row['author']}</br><b>Publisher:</b> {$row['publisher']}</td>
										<td><input id='txt123441' name='txt123441' value='2' size='1' /></td><td>{$row['price']}</td></tr>
										";
								}
							}
						?>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td align="center">				
					<input type="submit" name="recalculate_payment" id="recalculate_payment" value="Recalculate Payment">
				</form>
			</td>
			<td align="center">
				&nbsp;
			</td>
			<td align="center">			
				Subtotal:  $12.99			</td>
		</tr>
	</table>
</body>
