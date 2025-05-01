<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Minha App</title>
    @livewireStyles
</head>
<body>
    <div class="container mx-auto p-4">
        {{ $slot }}
    </div>
    @livewireScripts
</body>
</html>
