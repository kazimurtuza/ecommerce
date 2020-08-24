<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class=" container" style=" backfround:rgb(164, 164, 182)">

        <ul>
            <li> payment_method id  : {{$data['payment_method']}}</li>
            <li> transection id : {{$data['bln_transection']}}</li>
            <li> order id : {{$data['order_id']}}</li>
            <li> tolal : {{$data['total']}} $</li>
        
        </ul>
    </div>
    
</body>
</html>