<h1>Hello</h1>

<form action = "{{route('insertUser')}}" method = "post" class="form-group" action="/addBook" enctype="multipart/form-data">

<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

  <label class="form-group"> Name:</label>
  <input type="text" class="form-control" placeholder="Book Titile" name="book_title">

  <input type="text" class="form-control" placeholder="Description" name="book_description">

  <input type="text" class="form-control" placeholder="Price" name="book_price">

  <input type="text" class="form-control" placeholder="Stock" name="book_stock">

  <label for="img">Select image:</label>
  <input type="file" id="img" name="book_cover_img" accept="image/*">

  <button type="submit"  value = "Add student" class="btn btn-primary">Submit</button>
</form>