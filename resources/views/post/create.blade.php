<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>新增表單</title>
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
        <form action="{{ url('/post') }}" method="post" accept-charset="utf-8">
            @csrf
            <p>
                <label>title</label>
                <input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control @error('title') is-invalid @enderror"/>
            </p>
            <p>
                <label>author name</label>
                <input type="text" value="{{ old('author.name') }}" name="author[name]" id="author-name"/>
            </p>
            <p>
                <label>author description</label>
                <input type="text" value="{{ old('author.description') }}" name="author[description]" id="author-description"/>
            </p>
            <p>
                <label>body</label>
                <textarea name="body" id="body">{{ old('body') }}</textarea>
            </p>
            <p>
                <label>published date</label>
                <input type="text" value="{{ old('published_date') }}" name="published_date" id="published_date"/>
            </p>
            <p>
                <label>start date</label>
                <input type="text" value="{{ old('start_date') }}" name="start_date" id="start_date"/>
            </p>
            <p>
                <label>E-mail</label>
                <input type="text" value="{{ old('email') }}" name="email" id="email"/>
            </p>
            <p>
                <label>A</label>
                <input type="text" value="{{ old('a') }}" name="a" id="a"/>
            </p>
            <p>
                <label>B</label>
                <input type="text" value="{{ old('b') }}" name="b" id="b"/>
            </p>
            <p>
                <input type="checkbox" value="true" name="accept" id="accept"/>
                <label for="accept">Terms of Service</label>
            </p>
            <p>
                <label>URL</label>
                <input type="text" value="{{ old('url') }}" name="url" id="url"/>
            </p>
            <p>
                <label>QTY</label>
                <input type="text" value="{{ old('qty') }}" name="qty" id="qty"/>
            </p>
            <p>
                <label>password</label>
                <input type="password" value="" name="password" id="password"/>
            </p>
            <p>
                <button type="submit" class="btn btn-primary">submit</button>
            </p>
        </form>
    </body>
</html>
