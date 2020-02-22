<form action="/user/profile" method="post" accept-charset="utf-8">
    @csrf
    <input type="text" value="{{ old('name') }}" name="name" id="name"/>
    <button type="submit">Submit</button>
</form>
