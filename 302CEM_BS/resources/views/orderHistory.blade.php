@include('header')

<title>Order History @yield('title')</title>

<body>
    <h1 style="text-align:center;">Order History</h1>



        <table style="table-layout: fixed; width: 75%; border: 1px solid; margin-left: auto; margin-right: auto;">
            <tr style="outline: thin solid">
                <th style="text-align: left">Order ID</th>
                <th style="text-align: left">Order Item</th>
                <th style="text-align: left">Subtotal</th>
            </tr>
            @foreach ($orders as $order)
            @php
                $curorderid = $order->order_id;
            @endphp
            <tr>
            </tr>
            <tr style="outline: thin solid">
                <td>{{ $order->order_id }}</td>
                <td>
                    @foreach ($orderitems->where('order_id', $curorderid) as $orderitem)
                        {{ $orderitem->ISBN_13 }} x {{ $orderitem->orderitem_qty }}</br>
                    @endforeach
                </td>
                <td>{{ $order->subtotal}} </td>
            </tr>
            @endforeach
         </table>
    
</body>
@include('footer')