<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h3 {
            color: #165FFB;
            margin-bottom: 20px;
        }
        h4 {
            color: #DD7539;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .data-row {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .label {
            font-weight: bold;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>El siguiente usuario generó una cotización en el portal, si no te ha contactado, sus datos fueron los siguientes:</h3>

        <h4>Datos de Contacto:</h4>
        <div class="data-row">
            <span class="label">Nombre:</span> {{ $formData['firstName'] }} {{ $formData['lastName'] }}
        </div>
        <div class="data-row">
            <span class="label">Email:</span> {{ $formData['email'] }}
        </div>
        <div class="data-row">
            <span class="label">Teléfono:</span> {{ $formData['movil'] }}
        </div>

        <h4>Información Adicional:</h4>
        <div class="data-row">
            <span class="label">Edad:</span> {{ $formData['edad'] }}
        </div>
        <div class="data-row">
            <span class="label">Código Postal:</span> {{ $formData['codigoPostal'] }}
        </div>
    </div>
</body>
</html>
