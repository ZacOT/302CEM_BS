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
   	   	<h3 class='Heading'>Order Page</h3>
		<a href="/cart">Back To Cart</a>
   	   </div>


		@php $grandTotal = 0; @endphp
		@php $totalQuantity = 0; @endphp

		@foreach($carts as $cart)

			@php 
				$curisbn = $cart->ISBN_13; 
				$curqty = $cart->book_quantity;
			@endphp

			@foreach($books->where('ISBN_13', $curisbn) as $book)

				@if($username = Auth::user()->username)
					<div class='Cart-Items'>
						<div class='image-box'>
								<img src="images/{{ $book->book_cover_img }}" height='175' width='125'/>
						</div>
						<div class='about'>
								<h1 class='title'>{{ $book->book_title }}</h1>
								<h3 class='subtitle'>{{ $book->book_description }}</h3>
						</div>
						<div class='counter'>
								<div class='count'>{{ $curqty }}</div>
						</div>
						<div class='prices'>
							@php $subTotal = $curqty * $book->retail_price; @endphp
								<div class='amount'>@php echo "$subTotal"; @endphp</div>
								<br/><br/><br/><br/><br/>
						</div>
					</div>

					@php $grandTotal += $subTotal; @endphp
					@php $totalQuantity += $cart->book_quantity; @endphp
				@endif

			@endforeach
			@endforeach
    
	<hr>
	<br><br>

	<div class='checkout'>
	<div class='total'>
	<div>
		<div class='Subtotal'>Sub-Total</div>
		<div class='items'>@php echo "$totalQuantity"; @endphp items</div>
	</div>
	<div class='total-amount'>@php echo "$grandTotal"; @endphp</div>
	<div><form action="{{ route('createOrder') }}" method="post">
		@csrf
		<input type="hidden" id="username" name="username" value="{{ $username }}">
		<div><button type="submit" class='button'>Confirm Order</button></div>
	</form></div>
	
</div>
</body>
</html> 