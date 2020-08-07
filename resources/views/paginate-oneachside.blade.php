<ol>
    @foreach($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ol>

{{ $users->onEachSide(5)->links() }}
