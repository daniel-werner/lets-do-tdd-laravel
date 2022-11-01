<form action="/cart/add" method="post">
    @csrf
    <div>
        <label for="">Code</label>
        <input type="text" name="code">
    </div>
    <div>
        <label for="">Name</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Quantity</label>
        <input type="text" name="quantity">
    </div>
    <div>
        <label for="">price</label>
        <input type="text" name="price">
    </div>
    <div>
        <button type="submit">Add</button>
    </div>
</form>
