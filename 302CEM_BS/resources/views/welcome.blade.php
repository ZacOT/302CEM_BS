@include('header')

 <title>Homepage @yield('title')</title>

        <?php 

        if(Auth::user()){
        $username = Auth::user()->username;

        echo"<h3><center> Welcome Back, $username </h3><center> ";
        }
        ?> 
    
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

                <?php 
                if(Auth::user()){
                    echo" <button> Add To Cart </button> ";
                }
                ?> 
                    </center>          
                </div>

                @endforeach
        </div>
@include('footer')
