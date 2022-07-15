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

        table{
            margin: 10% auto;
            border: 1px solid #000;
            background: #fff
        }
        
        

        button{
            padding: 10px;
            border: none;
            color: #fff;
            cursor: pointer;
        }
        input{
            padding: 5px;
            text-align: center;
            
        }

        input:disabled{
            opacity: 0.5;
        }

        a{
            padding: 8px;
            background: red;
            color: white
        }
</style>
<body>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Marca</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <form action="{{route('brands.update_data')}} " method="post" onsubmit="handleSubmit()">
                @csrf
                @foreach ($brands as $index => $brand)
                <tr>
                    <td> {{ $index }} </td>
                    <td> 
                        <input type="text" disabled id="{{ $brand['id'] }}" name="{{ $brand['id'] }}" value="{{ $brand["brand"] }}" > </td>
                    <td> 
                        <a href=" {{ route('brands.delete_data', ['id' => $brand['id'] ])}} " >Eliminar</a>
                        <button style="background: #57595e" onclick="enableModification({{ $brand['id'] }})" type="button">Modificar</button>
                    </td>
                </tr>
                <button style="background: green" id="btnUpdate" hidden onclick="enableModification(event)" type="submit">Actualizar</button>        
                @endforeach
            </form>
            
        </tbody>
    </table>
    
</body>
<script>
    const enableModification = (brand_id) => {
        const brandInput = document.getElementById(brand_id)
        const btnUpdate = document.getElementById('btnUpdate').hidden = false;
        brandInput.disabled = false
    } 

    const handleSubmit = (e) => {
        console.log(e.target)
    }
</script>
</html>