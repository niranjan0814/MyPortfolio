<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-D1xDxkGKfQ3FtA4iO7QdZq6r8N2IoT2EKHFXPhprYyLq4zHTGv7Ew2AZZT1jK8ZCKy9v6gRXH8tK2+gFqM6PlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Custom styles to enhance the white background design */
        body {
            background-color: #ffffff;
            color: #333333;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Subtle section dividers */
        section {
            border-bottom: 1px solid #f0f0f0;
        }
        
        section:last-of-type {
            border-bottom: none;
        }
    </style>
</head>

<body class="bg-white text-gray-800 font-sans">
    <x-header />
    <x-hero />
    <x-about />
    <x-projects />
    <x-skills />
    <x-experience />
    <x-education />
    <x-contact />
    <x-footer />
</body>

</html>