<table>
    <tr>
        <td>Code</td>
        <td>Name</td>
        <td>Quantity</td>
        <td>Price</td>
    </tr>
    @foreach($cartItems as $cartItem)
        <tr>
            <td>{{$cartItem['code']}}</td>
            <td>{{$cartItem['name']}}</td>
            <td>{{$cartItem['quantity']}}</td>
            <td>{{$cartItem['price']}}</td>
        </tr>
    @endforeach
</table>
