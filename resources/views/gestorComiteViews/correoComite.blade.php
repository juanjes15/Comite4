

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #000; /* Cambiado a negro */
        }

        h1 {
            font-size: 24px;
            color: #000; 
        }

        h2 {
            font-size: 20px;
            font-weight: bold; /* Negrita */
            color: #000; 
            margin-top: 0; 
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 16px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>{{ $details['title'] }}</h1>

    <ul>
        <li>{{ $details['body'] }}</li>
        
        <li>Hora: {{ $details['hora'] }}</li>
        <li>Lugar: {{ $details['lugar'] }}</li>
    </ul>

</body>
</html>
