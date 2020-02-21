<form action="/request/file" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    @csrf
    <label>select photo to upload</label><br>
    <input type="file" name="photo" id=""/>
    <button type="submit">Upload</button>
</form>

@isset($file)
<ul>
    <li>class of $file: {{ get_class($file) }}</li>
    <li>path(): {{ $file->path() }}</li>
    <li>extension(): {{ $file->extension() }}</li>
    <li>hashName(): {{ $file->hashName() }}</li>
    <li>getClientOriginalName(): {{ $file->getClientOriginalName() }}</li>
    <li>getClientOriginalExtension(): {{ $file->getClientOriginalExtension() }}</li>
    <li>getClientMimeType(): {{ $file->getClientMimeType() }}</li>
    <li>guessClientExtension(): {{ $file->guessClientExtension() }}</li>
    <li>getClientSize(): {{ $file->getClientSize() }} bytes</li>
    <li>SplFileInfo 原來的 getSize(): {{ $file->getSize() }} bytes</li>
    <li>getError(): {{ $file->getError() }}</li>
    <li>isValid(): {{ $file->isValid() ? 'true' : 'false' }}</li>
    <li>php.ini max upload file size getMaxFilesize(): {{ $file->getMaxFilesize() }} bytes</li>
    <li>getErrorMessage(): {{ $file->getErrorMessage() }}</li>
    <li>store(): {{ $result ?? ''}}</li>
</ul>
@endisset
