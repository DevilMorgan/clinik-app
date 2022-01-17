<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Calendar\Consent;
use App\Models\Tenant\Configuration\Configuration;
use App\Models\Tenant\History_medical\HistoryMedicalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConsentPublicController extends Controller
{
    public function index($token)
    {
        $document = HistoryMedicalDocument::query()
            ->where('remember_token', '=', $token)
            ->where('code', '=', '15')
            ->where('status', 'like', 'draft')
            ->with('consent')
            ->first();

        if (isset($document))
        {
            $config = Configuration::query()->where('modify', '=', 1)->get();
            $config = $config->keyBy('name');
            return view('tenant.operative.consent.digital_signature', compact('document', 'config'));
        }

        abort(404);
    }

    public function confirmation(Request $request)
    {
        $document = HistoryMedicalDocument::query()
            ->where('remember_token', '=', $request->get('token_confirmation'))
            ->where('code', '=', '15')
            ->where('status', 'like', 'draft')
            ->with('consent')
            ->first();

        if (isset($document))
        {
            $directory = app(\Hyn\Tenancy\Website\Directory::class);
            $image = $request->get('image-digital-signature');

            $config = Configuration::query()->where('modify', '=', 1)->get();
            $config = $config->keyBy('name');

            ///dd($document);
            $path = "public/history-medical/{$document->record->reference}/{$document->reference}.pdf";

            $generatePdf = \PDF::loadView('pdfs/consent', compact('document', 'image', 'config'));
            Storage::disk('tenant')->put($path, $generatePdf->output());

            $document->directory = 'tenancy/' . $directory->path($path);
            $document->status = 'original';
            $document->save();

            return "Guardado correctamente <a href='" . asset('$document->directory') . "' target='_blank'>Descargar</a>";
        }
    }
}
