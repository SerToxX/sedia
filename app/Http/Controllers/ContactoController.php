<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactoService;
use Illuminate\Validation\ValidationException;

class ContactoController extends Controller
{
    public function __construct(protected ContactoService $contactoService) {}

    public function index()
    {
        return view('pages.contacto.contacto');
    }

    public function enviarContactanos(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombres'   => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'correo'    => 'required|email|max:255',
                'mensaje'   => 'required|string',
                'celular'   => 'nullable|string|max:50',
                'asunto'    => 'nullable|string|max:255',
            ], [
                'nombres.required'   => 'El campo Nombres es obligatorio.',
                'apellidos.required' => 'El campo Apellidos es obligatorio.',
                'correo.required'    => 'El campo Correo electrónico es obligatorio.',
                'correo.email'       => 'El Correo electrónico no tiene un formato válido.',
                'mensaje.required'   => 'El campo Mensaje es obligatorio.',
            ]);

            $this->contactoService->enviarDesdeContactanos($validated);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Mensaje enviado correctamente']);
            }
            return back()->with('success', 'Mensaje enviado correctamente');

        } catch (ValidationException $e) {
            return $this->handleValidationException($e, $request, [
                'nombres'   => 'Nombres',
                'apellidos' => 'Apellidos',
                'correo'    => 'Correo electrónico',
                'mensaje'   => 'Mensaje',
            ], ['nombres', 'apellidos', 'correo', 'mensaje']);

        } catch (\Throwable $e) {
            return $this->handleUnexpectedException($e, $request);
        }
    }

    public function enviar(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre'     => 'required|string|max:255',
                'email'      => 'required|email|max:255',
                'mensaje'    => 'required|string',
                'empresa'    => 'nullable|string|max:255',
                'telefono'   => 'nullable|string|max:255',
                'documento'  => 'nullable|string|max:255',
                'archivos'   => 'nullable|array|max:20',
                'archivos.*' => 'nullable|file|mimes:jpg,jpeg,png,gif,pdf,doc,docx,xls,xlsx,zip,rar',
            ], [
                'nombre.required'  => 'El campo Nombres y Apellidos es obligatorio.',
                'email.required'   => 'El campo Email es obligatorio.',
                'email.email'      => 'El Email no tiene un formato válido.',
                'mensaje.required' => 'El campo Comentanos de tu proyecto es obligatorio.',
                'archivos.array'   => 'El formato de archivos es inválido.',
                'archivos.max'     => 'Solo se permiten hasta 20 archivos.',
                'archivos.*.file'  => 'Uno de los archivos no es válido.',
                'archivos.*.mimes' => 'Tipo no permitido. Permitidos: jpg, jpeg, png, gif, pdf, doc, docx, xls, xlsx, zip, rar.',
            ]);

            $archivos   = $request->file('archivos') ?? [];
            $totalBytes = array_reduce($archivos, fn($carry, $f) => $carry + $f->getSize(), 0);

            if ($totalBytes > 15 * 1024 * 1024) {
                $totalMb = round($totalBytes / (1024 * 1024), 2);
                $mensaje = "El total de archivos excede 15MB (actual: {$totalMb}MB).";

                if ($request->ajax()) {
                    return response()->json([
                        'success'        => false,
                        'message'        => $mensaje,
                        'errors'         => ['archivos' => [$mensaje]],
                        'missing_fields' => [],
                    ], 422);
                }
                return back()->withErrors(['archivos' => $mensaje])->withInput();
            }

            $this->contactoService->enviarCorreo($validated, $archivos);

            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'Mensaje enviado correctamente']);
            }
            return back()->with('success', 'Mensaje enviado correctamente');

        } catch (ValidationException $e) {
            return $this->handleValidationException($e, $request, [
                'nombre'    => 'Nombres y Apellidos',
                'email'     => 'Email',
                'mensaje'   => 'Comentanos de tu proyecto',
                'empresa'   => 'Empresa',
                'telefono'  => 'Teléfono / Celular',
                'documento' => 'DNI / RUC',
                'archivos'  => 'Archivos',
            ], ['nombre', 'email', 'mensaje']);

        } catch (\Throwable $e) {
            return $this->handleUnexpectedException($e, $request);
        }
    }

    private function handleValidationException(
        ValidationException $e,
        Request $request,
        array $fieldLabels,
        array $requiredFields
    ) {
        $errors        = $e->errors();
        $missingFields = array_values(array_filter(
            array_map(fn($f) => isset($errors[$f]) ? ($fieldLabels[$f] ?? $f) : null, $requiredFields)
        ));

        if ($request->ajax()) {
            return response()->json([
                'success'        => false,
                'message'        => 'Por favor corrige los campos marcados.',
                'errors'         => $errors,
                'missing_fields' => $missingFields,
            ], 422);
        }

        throw $e;
    }

    private function handleUnexpectedException(\Throwable $e, Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error inesperado al enviar el mensaje. Intenta nuevamente.',
            ], 500);
        }

        throw $e;
    }
}
