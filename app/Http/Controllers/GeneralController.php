<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class GeneralController extends Controller
{
    /**
     * Display the home page.
     */
    public function index() {
        return view('index');
    }

    /**
     * Handle form submission and send email using PHP mail().
     */
    public function submitForm(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'movil' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'edad' => 'required|string|max:3',
            'codigoPostal' => 'required|string|max:10',
        ]);

        try {
            // Preparar datos
            $nombre = $validated['firstName'] . ' ' . $validated['lastName'];
            $email = $validated['email'];
            $telefono = $validated['movil'];
            $edad = $validated['edad'];
            $codigoPostal = $validated['codigoPostal'];

            // Configurar PHPMailer
            $mail = new PHPMailer(true);

            try {
                // MODO DEBUG - Ver detalles del envío (quitar en producción)
                $mail->SMTPDebug = 0; // 0 = sin debug, 2 = debug completo
                $mail->Debugoutput = function($str, $level) {
                    error_log("PHPMailer: $str");
                };

                // Remitente
                $mail->setFrom('ventas@gnpgastosmedicos.com.mx', 'Contacto - Seguro GNP GMM');

                // Destinatario
                $mail->addAddress(config('app.correo_destino'));

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Solicitud de cotización - Seguro GNP GMM';
                $mail->Body = '
                    <h3>El siguiente usuario generó una cotización en el portal, si no te ha contactado, sus datos fueron los siguientes:</h3>               
                    <h4>Datos de Contacto:</h4>
                    <b>Nombre:</b> ' . htmlspecialchars($nombre) . '<br>
                    <b>Email:</b> ' . htmlspecialchars($email) . '<br>
                    <b>Móvil:</b> ' . htmlspecialchars($telefono) . '<br>
                    <b>Edad:</b> ' . htmlspecialchars($edad) . '<br>
                    <b>Código Postal:</b> ' . htmlspecialchars($codigoPostal) . '<br>';

                // Enviar
                $enviado = $mail->send();

                // Log para verificar envío
                Log::info("Correo enviado a: " . config('app.correo_destino') . " - Nombre: $nombre - Email: $email - Tel: $telefono");

                return response()->json([
                    'success' => true,
                    'message' => 'Formulario enviado correctamente'
                ], 200);

            } catch (Exception $e) {
                // Log del error
                Log::info("ERROR al enviar correo: " . $mail->ErrorInfo);

                return response()->json([
                    'success' => false,
                    'message' => 'Error al enviar el correo: ' . $mail->ErrorInfo
                ], 500);
            }
        } catch (\Exception $e) {
            // Log del error general
            Log::info("ERROR en submitForm: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el formulario: ' . $e->getMessage()
            ], 500);
        }
    }
}
