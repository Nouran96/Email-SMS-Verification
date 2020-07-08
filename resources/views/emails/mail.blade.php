<DOCTYPE html>
   <html lang="en-US">
        <head>
            <meta charset="utf-8">
        </head>
        <body>
            <h2>Hi, we’re glad you’re here! Following are your account details: <br>
            </h2>
            @if($data['email'])
            <h3>Email: </h3><p>{{$data['email']}}</p>
            @endif

            @if($data['phone'])
            <h3>Phone: </h3><p>{{$data['phone']}}</p>
            @endif

            @if($data['key'])
            <h3>Verification code:</h3><p>{{$data['key']}}</p>
            @endif
        </body>
    </html>