<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>新增回應</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>
    <body>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form accept-charset="utf-8">
            <p>
                <label>comment</label>
                <textarea name="comment" id="comment">{{ old('comment') }}</textarea>
            </p>
            <p>
                <button type="submit" class="btn btn-primary" id="submit">submit</button>
            </p>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit').click(function(event) {
            event.preventDefault();
            $.ajax({
              method: "POST",
              url: "/comment",
              data: {
                  comment: $('#comment').val()
              }
            }).done(function( msg ) {
                  console.log('done');
                  console.log(msg);
              }).fail(function( error ) {
                  console.log('error');
                  // validate fails 時，回傳的物件 error 很大一個，JSON.parse() 無法處理
                  console.log(error.responseJSON.message);
              });
        });
    </script>
</html>
