<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Arial', sans-serif; color: #333; line-height: 1.6; margin: 0; padding: 0; background: #f4f4f4; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
        .header { background: #B8C1A8; padding: 28px 32px; }
        .header h1 { margin: 0; color: #fff; font-size: 22px; font-weight: 600; letter-spacing: 0.5px; }
        .header p { margin: 6px 0 0; color: rgba(255,255,255,0.85); font-size: 14px; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 12px; font-weight: 600; color: #888; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 4px; }
        .value { font-size: 15px; color: #222; }
        .message-box { background: #f9f9f9; border-left: 3px solid #B8C1A8; padding: 16px 20px; border-radius: 0 6px 6px 0; }
        .divider { border: none; border-top: 1px solid #eee; margin: 24px 0; }
        .footer { padding: 18px 32px; background: #f9f9f9; font-size: 12px; color: #aaa; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nuevo mensaje de contacto</h1>
            <p>Formulario de Contáctanos — SEDIA</p>
        </div>
        <div class="body">

            <div class="field">
                <div class="label">Nombre</div>
                <div class="value">{{ $data['nombre'] }}</div>
            </div>

            <div class="field">
                <div class="label">Correo electrónico</div>
                <div class="value">{{ $data['email'] }}</div>
            </div>

            @if (!empty($data['telefono']))
            <div class="field">
                <div class="label">Teléfono / Celular</div>
                <div class="value">{{ $data['telefono'] }}</div>
            </div>
            @endif

            @if (!empty($data['empresa']))
            <div class="field">
                <div class="label">Asunto</div>
                <div class="value">{{ $data['empresa'] }}</div>
            </div>
            @endif

            <hr class="divider">

            <div class="field">
                <div class="label">Mensaje</div>
                <div class="message-box value">{{ $data['mensaje'] }}</div>
            </div>

        </div>
        <div class="footer">
            Este mensaje fue enviado desde el formulario de contacto de sedia.pe
        </div>
    </div>
</body>
</html>
