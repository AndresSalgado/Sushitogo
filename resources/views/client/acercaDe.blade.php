@extends('layouts.app')

@section('title', 'Acerca De')

@section('content')

    <div class="ui container">
        <div class="ui raised very padded text container segment">
            <h2 class="ui header">¿QUIENES SOMOS?</h2>
            <p>Somos una cadena de restauerantes, que comenzo hace 18 años con un enfoque de comida saludable llevando
                platos de la cultura Japonesa a los hogares.</p>
            <p>Actual Mente contamos con 4 puntos de venta con servicio a domicilio y servicio de mesa, en Sushi To Go
                tambien brindamos eventos para reuniones, festejos.</p>

        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="ui justified container">
        
        <div class="ui segment">

            <div class="texto">
            <h1 class="ui teal label block header">BLOG</h1>
            </div>

            <div class="texto">
                <h2>Como elegir un buen Sushi</h2>
                {{-- <img class="ui small left floated image" src="{{ asset('Img/image.png') }}" alt="Error"> --}}
                <p>
                    Si nunca has comido sushi antes, pero querías probarlo, es perfectamente normal que te intimides por los elementos desconocidos, presentación y tradiciones. El sabor y la experiencia de sushi está influenciada no sólo por cómo se prepara, sino también por cómo lo comes. Estas pautas le ayudarán a saber qué esperar y cómo disfrutar a fondo su primera aventura sushi.</p>
                {{-- <img class="ui small right floated image" src="{{ asset('Img/imagerollo.png') }}" alt="Error"> --}}
            </div>

            <div class="texto">
                <h3>1. Elija un restaurante de SUSHI TO GO</h3>
                <p> Esto es especialmente importante al que come sushi por primera vez.
                    Pescados mal preparados pueden arruinar la experiencia, sobre todo si no eres especialmente aficionado a los mariscos.
                    No asuma que la calidad significa precios. Mientras que comer sushi tiende a ser un poco más caro que
                    comer en otros tipos de restaurantes, usted debería ser capaz de comer sushi de calidad sin tener que gastar $100 dólares por persona.</p>
            </div>

            <div class="texto">
                <h3>2. Aprenda los tipos basicos de Sushi</h3>
                <p>
                    En la mayoría de cada restaurante de sushi, usted debería ser capaz de ordenar sashimi, nigiri, maki y
                    temaki. Maki también se conoce como un "rollo de sushi." Típicamente, maki incluye uno o dos tipos de
                    pescado y
                    verduras con arroz enrollados en una hoja de alga marina asada y cortada en porciones tamaño de un
                    bocado.
                    Este suele ser el mejor punto de partida para las personas que son aprensivos acerca de comer pescado
                    crudo.</p>

                <p>
                    Nigiri refiere a rodajas de pescado crudo sobre una pelota ovalada de arroz. Estos son preparados a la
                    orden por el chef de sushi y típicamente se sazonan ligeramente con una pequeña cantidad de wasabi y salsa de soja antes de que llegue a usted.

                    Sashimi refiere a rodajas de pescado crudo preparado en un plato sin arroz. En general, esta es la forma más básica y más limpio para comer sushi, pero puede no ser apropiado para el principiante.
                    Temaki - Similar a maki, excepto los ingredientes se enrolla en forma de cono que tienes y morder en la forma que lo haría un taco.</p>
            </div>

            <div class="texto">
                <h3>3. Conozca sus condimentos</h3>
                <p>
                    Típicamente, un plato de sushi incluye wasabi, que se parece a una bola verde de pasta. Este condimento
                    picante a veces se incluye en maki y nigiri, zanahoria rayada con limón, jengibre encurtido viene en
                    rebanadas delgadas, de color rosa en el lado de la placa y se utiliza para limpiar el paladar entre
                    bocado y
                    bocado. También tendrá un plato poco profundo para sumergir su sushi en salsa de soja.
                </p>

                <p>
                    Se recomienda sentarse en la barra (sushi bar). Esto le dará la oportunidad de interactuar con el chef
                    de
                    sushi e inspeccionar la calidad del pescado que debe estar en la pantalla, y no debe ser seca o de otra
                    manera indeseable.</p>
            </div>

            <div class="texto">
                <h2>Recomendación</h2>
                <h3>4. Ordenar los artículos de sushi directamente desde el chef si es posible</h3>
                <p>Pregunte lo que se recomienda, si el pescado es crudo, entre más fresco, mejor será su sabor, SUSHI TO GO te garantiza productos frescos.</p>
            </div>

            <br>
            <br>
            <br>
        </div>
    </div>

@endsection
