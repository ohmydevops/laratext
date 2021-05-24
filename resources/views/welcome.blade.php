<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaraText | لاراتکست</title>
    </head>
    <body>
    <div style="margin: 0 auto; max-width: 412px; margin-top: 200px !important;">
        <p>Click on the "Choose File" button to upload a file:</p>
        <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" id="imageFile" name="imageFile" required autocomplete="off">
            <input type="submit">
        </form>

        @if ($errors->any())
            <hr>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ( Session::has('result') )
            <br>
            <hr>
            <div style="margin-top: 5px;" dir="auto">
                {!! Session::get('result') !!}
            </div>
        @endif
    </div>
    </body>
</html>
