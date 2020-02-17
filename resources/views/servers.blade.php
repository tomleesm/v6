<form method="POST" action="{{ url('/servers/123') }}">
    @method('DELETE')
    @csrf
    <button type="submit">DELETE</button>
</form>
