<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/logos/resbalacustos-logo.svg">
    <link rel="stylesheet" type="text/css" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/css/container.css" media="screen" />
    <script src="{{ asset('js/getPrice.js') }}"></script>

    <style>
    </style>
    <title>RESBALA CUSTO </title>
</head>
<body>
    <section>
        <div class="hero">
            <nav>
                <a href="/"><h1> <img style="aspect-ratio:16/9;" src= "https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/logos/resbalacustos-logo.png"/> </h1></a>
                <div style="">
                </div>
            </nav>
        </div>
        <div class="container">
            <div>
                <div class="productInfo" alt="Product Info ">
                    <div>
                        <h2>
                            {{$productinfo[0]}}
                        </h2>
                        <img src="{{$productinfo[1]}}" />
                    </div>
                </div>
                <div style="color: rgb(0, 26, 255);">
                    <h2>Preços Localizados </h2>
                </div>
                <div>
                    <p id="ultimaCaptura"> </p>
                    <table class="table" id="pricesList">
                        <tbody >
                           
                        </tbody>
                    </table>
                </div>
                <div>
                    <p>Este projeto emula um navegador web e busca pelos valores no site de ambas as companhias listadas , no entanto podem haver divergencias de preço em virtude de programas e clubes das instituiçoes </p>
                <div>
            </div>
        </div>
    </section>
</body>
</html>