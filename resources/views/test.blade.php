<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <form action="{{ url('ignore') }}" method="post" accept-charset="utf-8">
            <button type="submit">Submit</button>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script charset="utf-8">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
              method: "POST",
              url: "/ajax",
              data: { name: "John", location: "Boston" }
        })
          .done(function( msg ) {
              alert( "Data Saved: " + msg );
          });


    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/ajax', {
        method: 'POST',
        headers: new Headers({
            'X-CSRF-TOKEN': token
        })
    }).then(function( response ) {
       return response.text();
    }).then(function ( text ) {
        alert( "Fetch Data Saved: " + text );
    });
    </script>
</html>
