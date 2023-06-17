<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/logos/resbalacustos-logo.svg">
    <link rel="stylesheet" type="text/css" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/css/container.css" media="screen" />

    <style>
    </style>
    <title>RESBALA CUSTOS </title>
</head>
<body>
    <section>
        <div>
            <div class="hero">
                <nav>
                    <a href="/"><h1> <img style="aspect-ratio:16/9;" src= "https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/logos/resbalacustos-logo.png"/> </h1></a>
                </nav>
            </div>
            <div>
                <form class="serashform" method="get" action="/busca/products">
                    <input type="text" class="serashintput" autocomplete="off" id="searsh" name="searsh" />
                    <input style="float: right;" type="submit" class="bt btgreen" value="PESQUISAR" />
                </form>
            </div>
            <div>
                <div class="ProductsContainer">
                    <div alt="ProductsList">
                        <div class="ProductsListTitle">
                            <h3>Resultado da Busca  </h3>
                        </div>
                        <div>
                            <div class="products">
                            @if ($products->count() > 0)
                                <div class="productsRow">
                                @foreach ($products as $item)
                                    <div class="productCard">
                                        <img src="{{ $item->productimage }}" />
                                        <h4>{{ $item->productname }}</h4>
                                        <p>{{ $item->name }}</p>
                                        <a  class="bt btgreen" href="/consultoria/products/{{ $item->id }}">
                                            Conferir Preços 
                                        </a>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-info" role="alert">
                <p>Nenhum produto encontrado com sua busca </p>
            </div>
            @endif
</section>