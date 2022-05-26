@include('header')

 <title>Homepage @yield('title')</title>
 <script src="{{url('js/cart.js')}}"></script>
    
        <!-- Content Section -->

        <h1 style="text-align: center;">Books</h1>
        <br/>

        <div class="wrapper-bookrow">
        
                @foreach($books as $book)

                <div>
<<<<<<< Updated upstream
                    <center>
                    <a href="book_cover"><img src=images/{{$book->book_cover_img}} height='250' width='150'></a>
                    <h4> {{ $book->book_title }} </h4>              
                    <h4>Price: {{ $book->retail_price }} </h4>


                    <button onclick="addToCart(item1)> Add To Cart </button>
                     
=======
                        <center>
                        <a href="book_cover"><img src=images/{{$book->book_cover_img}} height='250' width='150'></a>
                        <h4> {{ $book->book_title }} </h4>              
                        <h4>Price: {{ $book->retail_price }} </h4>


                        <form action = "{{route('insertCart')}}" method = "post" class="form-group" enctype="multipart/form-data" align='center'>
                                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                
                                <input type="text" class="form-control" name="username" value="admin">
                                <input type="text" class="form-control" name="ISBN_13" value="BS1001">
                                <input type="text" class="form-control" name="book_quantity" value="1">
                                <input type="text" class="form-control" name="subtotal" value="5">
                                
                                <button type='submit'>Add To Cart</button>
                        </form>
>>>>>>> Stashed changes
                    </center>          
                </div>

                @endforeach
                
        </div>
</html>
<<<<<<< Updated upstream

@include('footer')
=======
>>>>>>> Stashed changes
