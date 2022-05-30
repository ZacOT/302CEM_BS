<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
    <link rel="stylesheet" href="<?php echo asset('css/cart.css')?>" type="text/css"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>

<body>
   <div class='CartContainer'>
   	   <div class='Header'>
   	   	<h3 class='Heading'>Shopping Cart</h3>
		<a href="/">Back To Home</a>
   	   	<h5 class='Action'>Remove all</h5>
   	   </div>

		<?php  
			$book_quantity = array("1", "2"); 

			// CSS is not compatible for more than 2 books
		?>

		@foreach($carts as $cart)

		<div class='Cart-Items'>
			<div class='image-box'>
					<img src="images/Book1.jpg" height='175' width='125'/>
			</div>
			<div class='about'>
					<h1 class='title'>13 Reason Why</h1>
					<h3 class='subtitle'>You are the reason why</h3>
			</div>
			<div class='counter'>
					<div class='count'>{{ $cart->book_quantity }}</div>
			</div>
			<div class='prices'>
					<div class='amount'>$11.98</div>
					<br/><br/><br/><br/><br/>
					<div class='remove'><u>Remove</u></div>
			</div>
		</div>

		@endforeach
    
	<hr>
	<br><br>

	<div class='checkout'>
	<div class='total'>
	<div>
		<div class='Subtotal'>Sub-Total</div>
		<div class='items'>2 items</div>
	</div>
	<div class='total-amount'>$11.98</div>
	</div>
	<button class='button'>Checkout</button></div>
</div>
</body>
</html>