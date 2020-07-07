<DOCTYPE html>
   <html lang="en-US">
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <h2>Hi, we’re glad you’re here! Following are your account details: <br>
            </h3>
            @if($data['email'])
            <h3>Email: </h3><p>{{$data['email']}}</p>
            @endif

            @if($data['phone'])
            <h3>Phone: </h3><p>{{$data['phone']}}</p>
            @endif
        </body>
    </html>