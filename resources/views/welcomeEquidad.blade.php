<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Estudios para la Igualdad de Género y Derechos Humanos - Congreso del Estado de Veracruz</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-primary {
            background-color: #6c143a;
        }
        .text-primary {
            color: #6c143a;
        }
        .border-primary {
            border-color: #6c143a;
        }
        .hover\:bg-primary-dark:hover {
            background-color: #4a0d28;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

    <!-- Contenido principal -->
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full max-w-4xl px-6 py-12">
            <!-- Logo -->
            <div class="flex justify-center mb-12">
                <img src="https://legisver.gob.mx/img/LOGO_LXVII_SLOGAN.jpg" alt="Congreso del Estado de Veracruz" class="h-auto w-1/3">
            </div>

            <!-- Título -->
            <h1 class="text-4xl md:text-5xl font-bold text-center text-primary mb-8">
                Centro de Estudios para la Igualdad de Género y Derechos Humanos</h1>

            <!-- Descripción -->
            <div class="bg-white p-8 rounded-lg shadow-lg mb-12">
                <p class="text-lg text-gray-700 mb-6">
                    Sistema de administración de contenidos
                </p>
                
                <!-- Botones de acción -->
                <div class="flex flex-col sm:flex-row justify-center gap-4 mt-8">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary-dark transition duration-300 text-center">
                                Ir al Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-3 bg-primary text-white font-semibold rounded-lg hover:bg-primary-dark transition duration-300 text-center">
                                Iniciar Sesión
                            </a>
                            @if (Route::has('register'))
                                <!-- <a href="{{ route('register') }}" class="px-6 py-3 border-2 border-primary text-primary font-semibold rounded-lg hover:bg-gray-100 transition duration-300 text-center">
                                    Registrarse
                                </a> -->
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Enlace al sitio oficial -->
            <div class="text-center">
                <a href="https://www.legisver.gob.mx/" target="_blank" class="text-primary hover:underline">
                    Visite el sitio oficial del Congreso del Estado de Veracruz
                </a>
            </div>
        </div>
    </div>
</body>
</html>