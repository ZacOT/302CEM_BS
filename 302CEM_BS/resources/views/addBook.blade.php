@include('header')

<link rel="stylesheet" href="<?php echo asset('css/register.css')?>" type="text/css"> 

<title>Add Book @yield('title')</title>

<h1 style="text-align: center;">Books</h1>

<form action = "{{route('insertBook')}}" method = "post" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

  <center>

  <input type="text" class="form-control" placeholder="Book Title" name="book_title">

  <p><input type="text" class="form-control" placeholder="Book Author" name="book_author"></p>

  <p><input type="date" id="start" name="publication_date" value="2020-01-01"
       min="2020-01-01" max="2022-12-31"></p>

  <input type="text" class="form-control" placeholder="ISBN_13" name="ISBN_13">

  <input type="text" class="form-control" placeholder="Description" name="book_description">

  <input type="text" class="form-control" placeholder="Trade Price" name="trade_price">

  <input type="text" class="form-control" placeholder="Retail Price" name="retail_price">

  <input type="text" class="form-control" placeholder="Stock" name="book_stock">

  <p><label for="img">Select image:</label>
  <input type="file" id="img" name="book_cover_img" accept="image/*"></p>

  <br><br>

  <button type="submit"  value = "add book" class="btn btn-primary">Submit</button>

  <br><br>

</form>

</center>