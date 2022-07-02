@include('header')

<form action="">
    <table align='center'>
        <tr>
            <th>Order Page</th>
        </tr>
        <tr>
            <td></br><b>NAME:</b> @php if(Auth::user()){$name = Auth::user()->name; echo "$name";} @endphp</td>
        </tr>
        <tr>
            <td></br><b>ADDRESS:</b> @php  if(Auth::user()){$address = Auth::user()->address; echo "$address";} @endphp</td>
        </tr>
        <tr>
            <td></br><b>BOOKS:</b></td>
            <td></br><b>Quantity:</b></td>
        </tr>
            @foreach ($getcarts as $cart)
                <tr>
                    @php $book = DB::table('books')->where('ISBN_13', $cart->ISBN_13)->first(); @endphp
                    <td>{{ $book->book_title }}</td>
                    <td align="center">{{ $cart->book_quantity }}</td>
                    <input type="hidden" id="ISBN_13" name="ISBN_13" value="{{ $cart->ISBN_13 }}">
                </tr>
            @endforeach
        <tr>
            <input type="hidden" id="name" name="name" value="{{ $name }}">
            <td></br><input type="submit" value="Order"/>
        </tr>
    </table>
</form>
@include('footer')