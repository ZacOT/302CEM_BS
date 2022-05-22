@include('header')

<title>Add Book @yield('title')</title>

<h1>Add a Book</h1>

<form action = "{{route('insertUser')}}" method = "post" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

  <label class="form-group"> Name:</label>
  <input type="text" class="form-control" placeholder="Book Titile" name="book_title">

  <input type="text" class="form-control" placeholder="Book Author" name="book_author">

  <input type="date" id="start" name="publication_date" value="2020-01-01"
       min="2020-01-01" max="2022-12-31">

  <input type="text" class="form-control" placeholder="ISBN_13" name="ISBN_13">

  <input type="text" class="form-control" placeholder="Description" name="book_description">

  <input type="text" class="form-control" placeholder="Trade Price" name="trade_price">

  <input type="text" class="form-control" placeholder="Retail Price" name="retail_price">

  <input type="text" class="form-control" placeholder="Stock" name="book_stock">

  <label for="img">Select image:</label>
  <input type="file" id="img" name="book_cover_img" accept="image/*">

  <button type="submit"  value = "add book" class="btn btn-primary">Submit</button>
</form>