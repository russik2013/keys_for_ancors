<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>File Loader</title>   
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="links">
                    <form method="POST" action="{{route('files_send')}}" enctype="multipart/form-data"> 
                    	{!!csrf_field()!!}
                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
       
                        @endif
                    	<input type="file" name="file">
                    	<button type="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
