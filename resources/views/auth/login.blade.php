<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Wisdom Envoys Ministry</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --font-sans: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;
            --font-headline: 'Montserrat', ui-sans-serif, system-ui, sans-serif;
            --color-primary: #DC143C;
            --color-primary-container: #E8192C;
            --color-on-primary: #ffffff;
            --color-surface: #ffffff;
            --color-surface-container: #f8f9fa;
            --color-on-surface: #1a1a2e;
            --color-on-surface-variant: #555770;
            --color-outline-variant: #e0e0e8;
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <div class="text-center mb-10">
            <img src="/images/wisdom-envoys-logo.png" alt="Wisdom Envoys Ministry" class="h-16 mx-auto mb-4">
            <p class="text-on-surface-variant mt-2 text-sm">Admin Dashboard Login</p>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8">
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-full mb-6 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Email Address</label>
                    <input name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="w-full border border-outline-variant bg-surface p-4 focus:ring-2 focus:ring-primary outline-none rounded-full text-base"
                        placeholder="admin@covenantoflife.com">
                </div>

                <div class="mb-6">
                    <label class="font-headline text-xs font-bold uppercase tracking-[0.1em] text-on-surface block mb-2">Password</label>
                    <input name="password" type="password" required
                        class="w-full border border-outline-variant bg-surface p-4 focus:ring-2 focus:ring-primary outline-none rounded-full text-base"
                        placeholder="Enter your password">
                </div>

                <div class="flex items-center mb-6">
                    <input name="remember" type="checkbox" id="remember" class="rounded-full border-outline-variant text-primary focus:ring-primary">
                    <label for="remember" class="ml-2 text-sm text-on-surface-variant">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-primary text-on-primary py-4 font-headline text-xs font-bold uppercase tracking-[0.1em] rounded-full hover:bg-primary-container transition-all shadow-md">
                    Sign In
                </button>
            </form>
        </div>

        <p class="text-center mt-6 text-sm text-on-surface-variant opacity-60">
            <a href="{{ route('home') }}" class="hover:text-primary transition-colors">&larr; Back to website</a>
        </p>
    </div>
</body>
</html>
