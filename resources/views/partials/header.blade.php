<style>
    *{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing:border-box; 
    }
    nav{
        position: absolute;
        background:#fff;
        height: 80px;
        width: 100%;
    }
    label.logo {
        color: #596477;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
    }
    nav ul{
        float: right;
        margin-right: 20px;

    }
    nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
    }

    nav ul li a{
        padding: 10px;
       color: #000;
       font-size: 17px;
       text-transform: uppercase; 
       background-color: #596477;
       color: #fff;
    }

    nav ul li a:hover{
        padding: 10px;
       color: #000;
       font-size: 17px;
       text-transform: uppercase; 
       background-color: #616a79;
       color: #fff;
    }
</style>
<nav>
    <label for="logo" class="logo">Productos</label>
    <ul>
        <li> <a href="{{ route('brands.index') }}">Marcas</a> </li>
        <li> <a href="">Tallas</a> </li>
        <li> <a href=" {{ route('products.index') }} ">Productos</a> </li>
    </ul>
</nav>