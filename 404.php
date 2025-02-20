<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: var(--secondary-brand-color, #2e2e30);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 6rem;
            margin: 0;
            color: var(--brand-color, rgba(0, 144, 155));
        }

        h2 {
            font-size: 2rem;
            margin: 10px 0;
        }

        p {
            font-size: 1.2rem;
            margin: 20px 0;
        }

        a {
            color: var(--brand-color, rgba(0, 144, 155));
            text-decoration: none;
            font-weight: bold;
            border: 2px solid var(--brand-color, rgba(0, 144, 155));
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: var(--brand-color, rgba(0, 144, 155));
            color: var(--secondary-brand-color, #2e2e30);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        h1 {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>404</h1>
        <h2>¡Ups! Página No Encontrada</h2>
        <p>La página que buscas no existe o ha sido movida.</p>
        <a href="/">Volver al Inicio</a>
    </div>
</body>

</html>