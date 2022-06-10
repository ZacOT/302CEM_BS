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

		@foreach($orders as $order)
			@php $books = DB::table('books')->where('ISBN_13', $order->ISBN_13)->first(); @endphp
			@if($username = Auth::user()->username)

				@if($order->username === $username)
					<?php $curisbn = $order->ISBN_13; ?>
				<div class='Cart-Items'>
					<div class='image-box'>
							<img src="images/{{ $books->book_cover_img }}" height='175' width='125'/>
					</div>
					<div class='about'>
							<h1 class='title'>{{ $books->book_title }}</h1>
							<h3 class='subtitle'>{{ $books->book_description }}</h3>
					</div>
					<div class='counter'>
							<div class='count'>{{ $order->book_quantity }}</div>
					</div>
					<div class='prices'>
						@php $subTotal = $order->book_quantity * $books->retail_price; @endphp
							<div class='amount'>@php echo "$subTotal"; @endphp</div>
							<br/><br/><br/><br/><br/>
					</div>
				</div>

				@php $grandTotal += $subTotal; @endphp
				@php $totalQuantity += $order->book_quantity; @endphp
 
				@endif
			@endif

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
		</div>
		<button class='button'>Confirm Order</button></div>


</div>
</body>
</html> 