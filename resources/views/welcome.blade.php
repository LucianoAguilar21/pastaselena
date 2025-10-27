<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastas Elena</title>
    <link rel="icon" type="image/png" href="https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/492026431_1199091521653362_742366505237670123_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFfAbBKUcuiao66nH1-S7y4UmjSdaDQ_hFSaNJ1oND-EWJJ__jLBMKTbsoQbaqKbFB9jToDKcRau92vXFc-slzl&_nc_ohc=8MaHIFZYa-AQ7kNvwFThU9N&_nc_oc=Adn0x2Od-wkNpaE2ewrkP25WWhomqhTvQcVD8DmMh5oKv-BChN7yHfrO6hb9AIJKOds&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=Qdl3NPs_FbrGVqJkIcxlxA&oh=00_AfdDTWChfen-c7gNIFgLnPVKUl77j1GJG9DGaJJaz_N9IA&oe=68FF7A8E"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html {
            scroll-behavior: smooth;
            }
    </style>
</head>
<body class="bg-[#fff8f7] text-gray-800 font-sans scroll-smooth">

    <!-- NAVBAR -->
    
    <!-- HERO / BANNER -->
    {{-- <section class="bg-gradient-to-b from-[#fde2e4] to-[#fff8f7] h-screen bg-cover bg-center bg-fixed"> --}}
        <section class="relative lg:bg-gradient-to-b from-[#fde2e4] to-[#fff8f7] bg-[url('https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/558108284_1321623926066787_2690651145465470394_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHpUG0JfvqGNlY-o3i2pC5fHhzBRDExbVseHMFEMTFtW67DEfDIcmWqAS8sLXnFiZTlIw6wmG5aGhr38dAoT392&_nc_ohc=Y5wxUjiTMa0Q7kNvwHbsf7M&_nc_oc=AdkLj6hYdy_0cOuBvjcm0nD8NG_rjFzvxnq3cvWXCFeqq8txWwL6q9bT3tsD8k94Kto&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=QX3Z0blzDLX2wZR_jFMADQ&oh=00_AffmDjPaPV-rxklBBUPzvJko8bWnrV-7dz6qkoiDV-qXTQ&oe=68FF5B54')] bg-cover bg-center bg-fixed h-screen">
            <nav class=" shadow-md sticky top-0 z-50 w-full">
                <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between lg:justify center items-center">
                    <div class="flex items-center">
                        <img class="w-24 rounded-full" src="https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/492026431_1199091521653362_742366505237670123_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFfAbBKUcuiao66nH1-S7y4UmjSdaDQ_hFSaNJ1oND-EWJJ__jLBMKTbsoQbaqKbFB9jToDKcRau92vXFc-slzl&_nc_ohc=8MaHIFZYa-AQ7kNvwFThU9N&_nc_oc=Adn0x2Od-wkNpaE2ewrkP25WWhomqhTvQcVD8DmMh5oKv-BChN7yHfrO6hb9AIJKOds&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=YSHKe--3qG5jV3Vt201bdg&oh=00_AfcRtOrgV3Cwx0l0YjM_lR14530qJStxEQKMibitixh5eQ&oe=68FED1CE" alt="">                
                    </div>
        
                    <!-- Desktop menu -->
                    <ul class="hidden md:flex space-x-6 text-[#8b5e83] lg:mx-auto font-semibold">
                        <li><a href="#productos" class="hover:text-[#d291bc] transition">Productos</a></li>
                        <li><a href="#nosotros" class="hover:text-[#d291bc] transition">Quiénes Somos</a></li>
                        <li><a href="#ubicacion" class="hover:text-[#d291bc] transition">Ubicación</a></li>
                        <li><a href="#contacto" class="hover:text-[#d291bc] transition">Contacto</a></li>
                    </ul>
        
                    <!-- Mobile menu button -->
                    <button data-collapse-toggle="navbar-menu" type="button" class="md:hidden text-pink-500 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                </div>
        
                <!-- Mobile menu -->
                <div class="md:hidden hidden" id="navbar-menu">
                    <ul class="flex flex-col items-center bg-[#fde2e4]/40 text-white space-y-3 py-4">
                        <li><a href="#productos" class="hover:text-[#d291bc] font-semibold">Productos</a></li>
                        <li><a href="#nosotros" class="hover:text-[#d291bc] font-semibold">Quiénes Somos</a></li>
                        <li><a href="#ubicacion" class="hover:text-[#d291bc] font-semibold">Ubicación</a></li>
                        <li><a href="#contacto" class="hover:text-[#d291bc] font-semibold">Contacto</a></li>
                    </ul>
                </div>
            </nav>

    <!-- Overlay oscuro -->
    <div class="absolute inset-0 lg:bg-gradient-to-b from-[#fde2e4] to-[#fff8f7] bg-black/40"></div>

    <!-- Contenido -->
    <div class="relative max-w-7xl mx-auto px-6 text-center flex flex-col justify-center h-full items-center">
        <h2 class="text-4xl md:text-6xl font-extrabold mb-6 text-white drop-shadow-lg">SABORES QUE ABRAZAN EL ALMA</h2>
        <p class="text-2xl md:text-xl text-gray-100 mb-8 font-semibold">Pastas frescas, salsas caseras y amor en cada bocado.</p>
        <a href="#productos" class="bg-[#f7cad0]/90 hover:bg-[#f4a7b9] text-[#8b5e83] px-8 py-3 rounded-full shadow-md font-semibold transition">Ver productos</a>
    </div>
</section>

    <!-- NUESTROS PRODUCTOS -->
    <section id="productos" class="max-w-7xl mx-auto px-6 py-16">
        <h3 class="text-3xl font-bold text-center text-[#8b5e83] mb-12">Nuestros Productos</h3>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Producto -->
            @php
                $productos = [
                    [
                        'Pastas',
                        'https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/548210516_1307274447501735_7510874154970885136_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHi9PSfBpKS4uNNU7ps9hyNEc0meRfdD4URzSZ5F90PhfsvHhs75mUMWSVzs1hKD_ECdi5XdryECbP2BK45t-7p&_nc_ohc=4aThio63LP8Q7kNvwFnhXAc&_nc_oc=Adksu8EjCRlJKjFb54i4N-NAct88HEXpeu2lLWIyFKiLELu5QnOeIc6TL4r1nuzWqAQ&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=s6su1atusDtyDaBDu_gtzg&oh=00_Afcru9HX3KsTu_NfHFJCsa8iRSwk7v6BamGITEj7ahnu9w&oe=68FED537',
                        'Raviones, fideos, ñoquis. Todo con masa fresca artesanal.'],
                    [
                        'Todo para el mate',
                        'https://scontent.faep9-1.fna.fbcdn.net/v/t39.30808-6/541791127_1298636788365501_3908833385186430014_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEbqVPMh83YbJFW_qIO6er8-BEn8a20aAb4ESfxrbRoBubuisPOvUEiaUQyIvqr8QvmZKjDSs8UkUZRPdhGIDQm&_nc_ohc=9pjOwip7cuAQ7kNvwHyvbAM&_nc_oc=AdkO-fLGiubpY-djPVaRBnf__QWgO-51kfkZ1Zt6bGZxWeH8LH-zjfAfj0tv0Nw7jAQ&_nc_zt=23&_nc_ht=scontent.faep9-1.fna&_nc_gid=MXMM2FbFwFFLp5LI0RVokQ&oh=00_AfePAoURD8JByDBPsHMAPuDdikCqaM8uTMy00dAWj3JZhQ&oe=68FED1BE',
                         'Rosquitas, bizcochuelos, bolas de fraile y más.'],
                    [
                        'Rotiseria',
                        'https://scontent.faep9-3.fna.fbcdn.net/v/t39.30808-6/548289400_1306343820928131_7767088861880860830_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeHgsQUuVd3qE0VQwDGicZZsIze9sfMZizEjN72x8xmLMTgNzWPbzQB04VdtbRfFvNGzdbBD43TgtICQHjHEDlKl&_nc_ohc=2m6HnvbHa1AQ7kNvwHGuqFs&_nc_oc=Adn4fTISsoqCFGVU8tfUg1dE4PdVDLoi-jYUpgpesFKQCyPbHDmppf9HYVv3vOjoiR4&_nc_zt=23&_nc_ht=scontent.faep9-3.fna&_nc_gid=DL23ndT03PRH-k8m9dHDWg&oh=00_Afea_f_S6pXZsYJagjHX-kah8bOZomWwrAMoaZuJiOkKoA&oe=68FEA986',
                        'Pizzas, Empanadas, Hamburguesas y más.']
                ];
            @endphp

            @foreach ($productos as $producto)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">
                    <img src="{{ $producto[1] }}" alt="{{ $producto[0] }}" class="w-full h-56 object-cover">
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-semibold mb-2 text-[#8b5e83]">{{ $producto[0] }}</h4>
                        <p class="text-gray-600">{{ $producto[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- QUIÉNES SOMOS -->
    <section id="nosotros" class="bg-[#fde2e4] py-16">
        <div class="lg:w-full max-w-6xl mx-auto px-6 grid md:grid-cols-2 justify-center items-center">
            <img src="https://scontent.faep9-2.fna.fbcdn.net/v/t39.30808-6/492026431_1199091521653362_742366505237670123_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFfAbBKUcuiao66nH1-S7y4UmjSdaDQ_hFSaNJ1oND-EWJJ__jLBMKTbsoQbaqKbFB9jToDKcRau92vXFc-slzl&_nc_ohc=8MaHIFZYa-AQ7kNvwFThU9N&_nc_oc=Adn0x2Od-wkNpaE2ewrkP25WWhomqhTvQcVD8DmMh5oKv-BChN7yHfrO6hb9AIJKOds&_nc_zt=23&_nc_ht=scontent.faep9-2.fna&_nc_gid=YSHKe--3qG5jV3Vt201bdg&oh=00_AfcRtOrgV3Cwx0l0YjM_lR14530qJStxEQKMibitixh5eQ&oe=68FED1CE" alt="Cocina Pastas Elena" class="rounded-full shadow-md object-cover w-80 h-86 mx-auto mb-8 md:mb-0">
            <div class="">
                <h3 class="text-3xl font-bold text-[#8b5e83] mb-4 lg:text-left text-center">Quiénes Somos</h3>
                <p class="text-gray-700 leading-relaxed lg:text-left text-justify">
                    En <strong>Pastas Elena</strong> elaboramos pastas y comidas caseras desde 2019.
                    Nos inspira la tradición familiar y el sabor de lo hecho en casa.
                    Usamos ingredientes naturales, cuidando cada detalle para que disfrutes una experiencia única.
                </p>
            </div>
        </div>
    </section>

    <!-- UBICACIÓN -->
    <section id="ubicacion" class="max-w-7xl mx-auto px-6 py-16 text-center">
        <h3 class="text-3xl font-bold text-[#8b5e83] mb-6">Dónde Encontrarnos</h3>
        <p class="text-gray-700 mb-8">📍 Concordia, Entre Ríos, Argentina</p>
        <iframe class="mx-auto w-full md:w-3/4 h-64 rounded-2xl shadow-md"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d585.6194782365417!2d-58.03701487840743!3d-31.38322408857044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95ade9daa4cfdae9%3A0x9c9c18bcf36dadcc!2s%22Pastas%20Elena%22!5e0!3m2!1ses!2sar!4v1761145611844!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" loading="lazy" allowfullscreen>
        </iframe>
    </section>

    <!-- CONTACTO -->
    <section id="contacto" class="bg-[#f7cad0] py-16">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-[#8b5e83] mb-8">Contáctanos</h3>
            <form class="grid md:grid-cols-2 gap-6">
                <input type="text" placeholder="Nombre" class="p-3 rounded-md border border-gray-300 focus:ring-[#d291bc] focus:border-[#d291bc]">
                <input type="email" placeholder="Correo electrónico" class="p-3 rounded-md border border-gray-300 focus:ring-[#d291bc] focus:border-[#d291bc]">
                <textarea placeholder="Mensaje" class="md:col-span-2 p-3 rounded-md border border-gray-300 focus:ring-[#d291bc] focus:border-[#d291bc]"></textarea>
                <button type="submit" class="md:col-span-2 bg-[#d291bc] hover:bg-[#c97fa8] text-white py-3 rounded-full shadow-md transition">Enviar mensaje</button>
            </form>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#8b5e83] text-[#fde2e4] py-6 text-center">
        <p>&copy; {{ date('Y') }} Pastas Elena. Todos los derechos reservados.</p>
        <p class="text-sm mt-2">By <span class="underline">Lucianon Aguilar</span></p>
    </footer>

    <script>
        // Toggle menú móvil con Flowbite
        const btn = document.querySelector('[data-collapse-toggle]');
        const menu = document.getElementById('navbar-menu');
        btn.addEventListener('click', () => menu.classList.toggle('hidden'));
    </script>
</body>
</html>
