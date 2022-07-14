<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
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
                height: 500px;
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
                background: green;
                color: white;
                border-radius: 5px;
            }
            input, select {
                padding: 10px;
                width: 300px;
            }
            select{
                text-align: center;
                font-size: 15px
            }
</style>
<body>
    <div class="container">
        <div class="container">
            <div class="card">
                @if (isset($product))
                    <br>
                    <p> nombre:</p>
                    <input type="text" value="{{ $product["name"]}}" name="name" placeholder="Seleccionar nombre producto*">
                    <p> cantidad:</p>
                    <input type="number" value="{{ $product["quantity"]}}" name="quantity" placeholder="Seleccionar cantidad*">
                    <p> marca: </p>
                    <select name="brand" id="brand">
                        <option value="">Seleccionar Marca</option>
                        <option value="{{ $product["brand_id"]}}" selected style="color: green"> {{ $product["brand"]}} </option>
                    </select>
                    <br>
                    <p> marca: </p>
                    <select name="size" id="size">
                        <option value="">Seleccionar Talla</option>
                        <option value="{{ $product["size_id"]}}" selected style="color: green"> {{ $product["size"]}} </option>
                    </select>
                    <br><br>
                    <a href="{{ route('products.form_update', ['id'  =>  $product["id"] ]) }}">Actualizar</a>
                    <button>Eliminar</button>
                @else
                    <span>No existe producto...</span>
                @endif    
            </div>
        </div>
    </div>
</body>
</html>