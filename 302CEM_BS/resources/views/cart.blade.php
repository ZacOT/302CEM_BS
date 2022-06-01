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


		@foreach($carts as $cart)
			@php $books = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->first(); @endphp
			@if($username = Auth::user()->username)

				@if($cart->username === $username)
					<?php $curisbn = $cart->ISBN_13; ?>
				<div class='Cart-Items'>
					<div class='image-box'>
							<img src="images/{{ $books->book_cover_img }}" height='175' width='125'/>
					</div>
					<div class='about'>
							<h1 class='title'>{{ $books->book_title }}</h1>
							<h3 class='subtitle'>{{ $books->book_description }}</h3>
					</div>
					<div class='counter'>
							<div class='count'>{{ $cart->book_quantity }}</div>
					</div>
					<div class='prices'>
						@php $subtotal = $cart->book_quantity * $books->retail_price; @endphp
							<div class='amount'>@php echo "$subtotal"; @endphp</div>
							<br/><br/><br/><br/><br/>
							<div class='remove'><u>Remove</u></div>
					</div>
				</div>
 
				@endif
			@endif

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