@extends('app')

<ol>
@foreach($users as $user)
    <li>{{ $user->name }}</li>
@endforeach
</ol>

{{ $users->links() }}
