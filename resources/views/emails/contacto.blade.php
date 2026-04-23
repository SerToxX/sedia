<h2>Nuevo mensaje de proyecto</h2>

<p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
<p><strong>Empresa:</strong> {{ $data['empresa'] ?? '-' }}</p>
<p><strong>Teléfono:</strong> {{ $data['telefono'] ?? '-' }}</p>
<p><strong>DNI/RUC:</strong> {{ $data['documento'] ?? '-' }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>

<p><strong>Mensaje:</strong></p>
<p>{{ $data['mensaje'] }}</p>