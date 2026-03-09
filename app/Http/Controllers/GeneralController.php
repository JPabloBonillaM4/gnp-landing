<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GeneralController extends Controller
{
    /**
     * Display the home page.
     */
    public function index() {
        return view('index');
    }

    /**
     * Handle form submission and send email.
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
            // Send email
            Mail::to(config('app.correo_destino'))->send(new FormSubmissionMail($validated));

            return response()->json([
                'success' => true,
                'message' => 'Formulario enviado correctamente'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el formulario: ' . $e->getMessage()
            ], 500);
        }
    }
}
