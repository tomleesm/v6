<form action="/user/bar" method="post" accept-charset="utf-8">
    <input type="text" value="{{ old('products.0.name') }}" name="products[0][name]" />
    <input type="text" value="{{ old('products.1.name') }}" name="products[1][name]" /><br>

    <label for="on">On<input id="notify" type="radio" value="on" name="notify" /><br>
    <label for="off">Off<input id="notify" type="radio" value="off" name="notify" /><br>

    <input type="hidden" value="{{ csrf_token() }}" name="_token" />
    <button type="submit">Submit</button>
</form>
