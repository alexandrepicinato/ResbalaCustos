<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/css/container.css" media="screen" />
    <link rel="shortcut icon" href="https://cdn.unifiquetelecom.s4br1n4.lj4.alexandrepicinato.com/projetos/logos/resbalacustos-logo.svg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=""></script>
    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/historyData.js') }}"></script>
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
                            {{$productData [0]-> productname}}
                        </h2>
                        <img src="{{$productData[0] -> productimage}}" />
                    </div>
                </div>
                <div style="color: rgb(0, 26, 255);">
                    <h2>Preços Capturados </h2>
                    <h3> </h3>

                </div>
                <div>
                    <canvas id="graphic"> </canvas>
                </div>
                <div>
                    <table class="table">
                        <tbody id="tableHistory">
                        </tbody>
                    </table>
                </div>
                <div>
                    <div>            

                    </div>
                <div>
            </div>
        </div>
    </section>
</body>
</html>