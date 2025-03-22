<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - PawfectMatch</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-gradient {
            background: linear-gradient(135deg, #D6B89A, #C6A56D);
        }
        
        .logo-font {
            font-family: 'Fredoka One', cursive;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .paw-print {
            position: relative;
            display: inline-block;
            width: 25px;
            height: 25px;
            background: white;
            border-radius: 50%;
            margin-right: 8px;
        }

        .paw-print::before,
        .paw-print::after {
            content: '';
            position: absolute;
            background: white;
            border-radius: 50%;
            width: 12px;
            height: 12px;
        }

        .paw-print::before {
            left: -5px;
            top: 4px;
        }

        .paw-print::after {
            right: -5px;
            top: 4px;
        }

        .btn-adopt {
            background: #ff6b6b;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .btn-adopt:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }

        .auth-btn {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .auth-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-1px);
        }

        .content-wrapper {
            position: relative;
            overflow: hidden;
        }

        .floating-shapes::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .floating-shapes::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            bottom: -75px;
            left: -75px;
        }
    </style>
</head>
<body>
    <div class="relative min-h-screen bg-gradient overflow-hidden">
        <div class="floating-shapes">
            <!-- Header Section -->
            <header class="absolute top-0 left-0 right-0 z-20 flex justify-between items-center p-6">
                <div class="flex items-center">
                    <div class="paw-print"></div>
                    <h1 class="logo-font text-4xl text-white">PawfectMatch</h1>
                </div>
                <nav class="flex space-x-4">
                    <a href="{{ route('login') }}" class="auth-btn px-6 py-2 rounded-full text-white hover:text-white">
                        Sign In
                    </a>
                    <a href="{{ route('register') }}" class="auth-btn px-6 py-2 rounded-full text-white hover:text-white">
                        Sign Up
                    </a>
                </nav>
            </header>

            <!-- Main Content -->
            <div class="content-wrapper flex min-h-screen">
                <!-- Left Content -->
                <div class="relative z-10 w-1/2 flex flex-col justify-center p-16">
                    <h2 class="text-6xl font-bold text-white mb-6 leading-tight">
                        Find Your Perfect <br>
                        Furry Friend
                    </h2>
                    <p class="text-xl text-white opacity-90 mb-8 leading-relaxed">
                        Search our list of adorable dogs and cats waiting for their forever homes. 
                        Your new best friend is just a click away!
                    </p>
                    <a href="#" class="btn-adopt inline-flex items-center justify-center text-white rounded-full px-8 py-4 text-lg font-semibold w-max">
                        Adopt Today!
                    </a>
                </div>

                <!-- Right Image -->
                <div class="absolute right-0 top-0 w-2/3 h-full">
                    <div class="relative h-full w-full">
                        <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#C6A56D] z-10"></div>
                        <img 
                            src="{{ asset('logo/catdog.png') }}"
                            alt="Cat and Dog"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 h-4/5 object-contain"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>