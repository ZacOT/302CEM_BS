@include('header')

 <title>Homepage @yield('title')</title>

    
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
                    $role = Auth::user()->role;
                    
                      if($role == 1){
                        echo" <button> Add To Cart </button> ";
                        }
                    }
                                    
 

                ?> 
                    </center>          
                </div>

                @endforeach
        </div>

        <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>

@include('footer')
