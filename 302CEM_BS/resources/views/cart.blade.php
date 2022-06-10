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
   	   	<!-- <h5 class='Action'>Remove all</h5> -->
   	   </div>


		@php $grandTotal = 0; @endphp
		@php $totalQuantity = 0; @endphp

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
						<form action = {{route("updateCart")}} method ='post' class='form-group' enctype='multipart/form-data'>
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
                    	<input type="hidden" class="form-control" name="ISBN_13" value="{{$books->ISBN_13}}">
                    	<input type="hidden" class="form-control" name="book_quantity" value="{{ $cart->book_quantity }}">
						<input type="hidden" class="form-control" name="quantity" value=1>
						<button type="submit">+</button>
						</form>

						<div class='count'>{{ $cart->book_quantity }}</div>

						<form action = {{route("updateCart")}} method ='post' class='form-group' enctype='multipart/form-data'>
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
                    	<input type="hidden" class="form-control" name="ISBN_13" value="{{$books->ISBN_13}}">
                    	<input type="hidden" class="form-control" name="book_quantity" value="{{ $cart->book_quantity }}">
                    	<input type="hidden" class="form-control" name="quantity" value=-1>
						<button type="submit">-</button>
						</form>
					</div>
					<div class='prices'>
						@php $subTotal = $cart->book_quantity * $books->retail_price; @endphp
							<!-- Make Amount adjustable -->
							<div class='amount'>@php echo "$subTotal"; @endphp</div>
							<br/><br/><br/><br/><br/>
							<!-- Make Remove functional -->
							<form action = "{{route('deleteCart')}}" method='GET' class='form-group' action='/' enctype='multipart/form-data'>
							<input type = 'hidden' name = '_token' value = '<?php echo csrf_token(); ?>'>
							<input type="hidden" class="form-control" name="username" value="{{Auth::user()->username}}">
							<input type ='hidden' name ='delete_isbn13' value="{{ $books->ISBN_13 }}">
							
							<button type='submit'>Remove</button>
							</form>
					</div>
				</div>

				@php $grandTotal += $subTotal; @endphp
				@php $totalQuantity += $cart->book_quantity; @endphp
 
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

		<?php 
		Session::put('totalPrice', $grandTotal);
		Session::put('totalQuantity', $totalQuantity);
		?>
	</div>
	<div class='total-amount'>@php echo "$grandTotal"; @endphp</div>

	</div>
	<a href="/order">
		<div><button class='button'>Checkout</button></div>
	</a>
</form>
</div>
</body>
</html>