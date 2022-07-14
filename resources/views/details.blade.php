<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        body {
                font-family: 'Nunito', sans-serif;
                background: #596477;
                margin: 10%;
                display: flex;
                justify-content: center
            }
        .container{
                justify-content: center
            }
            .card{
                text-align: center;
                background: #fff;
                width: 420px;
                height: 300px;
                margin: 10px;
                border-radius: 5%;
                
                justify-content: center
            }
            .card h2{
                margin: 0;
                text-align: center;
            }
            
            button{
                padding: 20px;
                font-size: 20px;
                cursor: pointer;
                background: red;
                color: white;
                border: none
            }
            a{
                width: 30px;
                padding: 5%;
                background: #1a202c;
                color: white;
                border-radius: 5px;
            }
    </style>
    <div class="container">
        <div class="container">
            <div class="card">
                @if (isset($product))
                    <br>
                    {{ $product["id"] }}
                    <h2>{{ $product["name"]}}</h2><br>
                    <p> cantidad: {{ $product["quantity"]}} </p>
                    <a href="{{ route('products.form_update', ['id'  =>  $product["id"] ]) }}">Modificar</a>
                    <button>Eliminar</button>
                @else
                    <span>No existe producto...</span>
                @endif    
            </div>
        </div>
    </div>
</body>
</html>