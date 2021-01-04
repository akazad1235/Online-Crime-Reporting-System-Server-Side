<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .mail-body{
            width: 600px;
            height: 400px;
            background-color: #dddd; 
            padding: 10px;
        }
        .mail-body h2{
            font-weight: bold;
            margin-bottom:10px;
            padding:10px; 
            text-align: center;
            margin: 0 auto;

        }
        .mail-body a{
            
        }
        span{
            color: goldenrod
        }
        .code{
            color:red;
        }
    </style>
</head>
<body>
    <div class="mail-body">
        <h2>Hello, <span> {{$name}}</span></h2>
        <p>Thank you for registration our web site</p>
        <p>Your verification code is: <span class='code'>{{$varification_code}}</span></p>
        {{-- <a href="{{route('verify-code',[$varification_code])}}">token code: {{$varification_code}}</a> --}}
        <h4>Best regards,</h4>
        <h5>Crime Reporting Team</h5>
    </div>
    
</body>
</html>