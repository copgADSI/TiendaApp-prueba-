@extends('partials.header')
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
                display: flex;
            }
        .container{
                margin: 50px auto;
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
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <br>
                    <span style="color: red">  
                        {{ $error  }}*
                    </span>
                    @endforeach
                @endif
                @if (isset($product))
                    <form action="{{ route('products.update', ['id' =>$product['id'] ] ) }}" method="post">
                        @csrf
                        <br>
                    <p> nombre:</p>
                    <input type="text" value="{{ $product["name"]}}" name="name" placeholder="Seleccionar nombre producto*">
                    <p> cantidad:</p>
                    <input type="number" value="{{ $product["quantity"]}}" name="quantity" placeholder="Seleccionar cantidad*">
                    <p> marca: </p>
                    <select name="brand_id" id="brand">
                        <option value="">Seleccionar Marca</option>
                        <option value="{{ $product["brand_id"]}}" selected style="color: green"> {{ $product["brand"]}} </option>
                        @foreach ($brands as $brand)
                            <option value=" {{ $brand["id"] }} "> {{ $brand["brand"] }} </option>
                        @endforeach
                    </select>
                    <br>
                    <p> marca: </p>
                    <select name="size_id" id="size">
                        <option value="">Seleccionar Talla</option>
                        <option value="{{ $product["size_id"]}}" selected style="color: green"> {{ $product["size"]}} </option>
                        @foreach ($sizes as $size)
                            <option value=" {{ $size["id"] }} "> {{ $size["size"] }} </option>
                        @endforeach
                    </select>
                    <br><br>
                    <p>Detalles:</p>
                    <textarea name="remarks" id="remarks" cols="30" rows="10" style="height: 50px">
                        {{ $product['remarks'] }}
                    </textarea>
                    <br>
                        <p>Fecha despacho:</p>
                        <input type="text" value=" {{$product['date_shipment']}}" name="date_shipment" >
                    <br>
                    <button style="background: green" type="submit">Actualizar</button>
                    <a style="background: red" href="{{ route('products.delete', [ 'id' => $product["id"] ] ) }}">Eliminar</a>
                    <a href="{{ route('products.index') }} ">Volver</a>
                    </form>
                @else
                    <span>No existe producto...</span>
                @endif    
            </div>
        </div>
    </div>
</body>
</html>