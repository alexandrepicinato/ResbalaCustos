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
                            <h3>Produtos Monitorados </h3>
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
                There is not file avaible, create a new one in the <b>"Create new file"</b> button
            </div>
            @endif
            <div class="footer" >
                <p><b> Resbala Custo </b> é um site de publicidade analitica das instituiçoes cadastradas , permitindo uma confirmação de promoçoes ou derivados , assim não é uma loja e não atua prestando serviço de venda de produtos ou serviços aos seus usuarios pois o projeto atua redirecionando a empresa responsavel pela venda do produto .  </p>
                <p> Resbala Custos é uma realização  <a href="https://alexandrepicinato.com"> alexandrepicinato.com</p>
            </div>
</section>