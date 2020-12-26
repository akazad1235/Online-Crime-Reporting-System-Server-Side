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
        }
        .mail-body h2{
            font-weight: bold;
            margin-bottom:10px;
            padding:10px; 
        }
        .mail-body a{
            
        }
    </style>
</head>
<body>
    <div class="mail-body">
        <h2>{{$name}}</h2>
        <a href="{{route('verify-code',[$id, $varification_code])}}">token code: {{$varification_code}}</a>
    </div>
    
</body>
</html>