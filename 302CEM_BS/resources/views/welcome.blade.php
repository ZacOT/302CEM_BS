@include('header')

 <title>Homepage @yield('title')</title>
 <script src="{{url('js/cart.js')}}"></script>
    
        <!-- Content Section -->

        <h1 style="text-align: center;">Books</h1>
        <br/>

        <div class="wrapper-bookrow">
        
                @foreach($books as $book)

                <div>
                    <center>
                    <a href="book_cover"><img src=images/{{$book->book_cover_img}} height='250' width='150'></a>
                    <h4> {{ $book->book_title }} </h4>              
                    <h4>Price: {{ $book->retail_price }} </h4>

                    </center>          

                @if(Auth::user())

                    <form action = {{route("insertCart")}} method ='post' class='form-group' enctype='multipart/form-data' align='center'>
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                    <input type="hide" class="form-control" name="username" value="{{Auth::user()->username}}">
                    <input type="hide" class="form-control" name="ISBN_13" value="{{$book->ISBN_13}}">
                    <input type="hide" class="form-control" name="book_quantity" value="1">

                    <button type="submit">Add To Cart</button>
                    </form>

                    </center>
                </div>

                @endif

                @endforeach
                
        </div>
</html>

@include('footer')
