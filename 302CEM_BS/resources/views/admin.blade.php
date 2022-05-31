@include('header')

<title>Admin Control Panel @yield('title')</title>
<link rel="stylesheet" href="<?php echo asset('css/admin.css')?>" type="text/css"> 

<center>

    <h1>Admin Control Panel</h1>

    <table text-alig:center width='1000px' style='padding:150px'>

        <tr align='center'>
            <td width='500px'>
                <a href='/addBook'><img src='/images/add_logo.png'  height='65' width='65'></a>
                <h1>Add Stock</h1>
            </td>

            <td width='500px'>
                <a href='/'><img src='/images/stock_logo.png'  height='65' width='65'></a>
                <h1>Stock Level</h1>
            </td>

            <td width='500px'>
                <a href='/logout'><img src='/images/logout_logo.png'  height='65' width='65'></a>
                <h1>Logout</h1>
            </td>
        </tr>

    </table>
</center>


@include('footer')
