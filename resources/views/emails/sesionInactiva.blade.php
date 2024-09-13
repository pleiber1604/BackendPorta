<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            color: #333;
        }
        .footer {
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Recordatorio Importante</h1>
        </div>
        <div class="content">
            <h1>Hola, {{ $user->name }}</h1>
            <p>Este es un recordatorio sobre tu actividad programada. Asegúrate de estar preparado para el evento.</p>
            <p><strong>Fecha y Hora:</strong> {{ $currentDate }}</p>
            <p>Si tienes alguna pregunta, no dudes en <a href="mailto:support@example.com">contactarnos</a>.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Porta. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>