<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>URL generation</title>
    </head>
    <body>
        <p>url posts/1: {{ url('posts/1') }}</p>
        <p>url(): {{ get_class(url()) }}</p>
        <p>url()->current(): {{ url()->current() }}</p>
        <p>url()->full(): {{ url()->full() }}</p>
        <p>url()->previous(): {{ url()->previous() }}</p>
        <p>route('post.show', [post => 1]): {{ route('post.show', ['post' => 1]) }}</p>
        <?php use App\Post; $post = Post::find(1); ?>
        <p>route('post.show', [post => $post]): {{ route('post.show', ['post' => $post]) }}</p>
        <p>route('comment.show', ['post' => 1, 'comment' => 2]) {{ route('comment.show', ['post' => 1, 'comment' => 2]) }}</p>
        <br>
        <p><a href="{{ route('unsubscribe.user', ['user' => 1]) }}">route unsubscribe.user</a></p>
        <p><a href="{{ URL::signedRoute('unsubscribe.user', ['user' => 1]) }}">sign unsubscribe.user</a></p>
        <p><a href="{{ URL::temporarySignedRoute('unsubscribe.user', now()->addSeconds(10), ['user' => 1]) }}">sign unsubscribe.user in 10 seconds</a></p>
        <br>
        <p><a href="{{ route('unsubscribe') }}">route unsubscribe</a></p>
        <p><a href="{{ URL::signedRoute('unsubscribe') }}">sign unsubscribe</a></p>
        <p><a href="{{ URL::temporarySignedRoute('unsubscribe', now()->addSeconds(10)) }}">sign unsubscribe in 10 seconds</a></p>
        <p>action('HomeController@index', [user => 1]):
           {{ action('HomeController@index', ['user' => 1]) }}</p>
        <?php use App\Http\Controllers\HomeController; ?>
        <p>action([HomeController::class, 'index'], [user => 1]):
           {{ action([HomeController::class, 'index'], ['user' => 1]) }}</p>
    </body>
</html>
