<?php

namespace App\Http\Controllers;

use App\Document;
use App\Mail\ApprovalDocumentMail;
use App\Mail\ShareDocumentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function SendShareDocumentEmail($id, Request $request)
    {
        $document = Document::find($id);
        $data = [
            'subject' => 'Share Document',
            'title' => 'Share Document',
            'body' => 'Body',
            'document_id' => $document->id,
            'document_name' => $document->name,
            'file_name' => $document->name,
        ];

        Mail::to($request->email)->send(new ShareDocumentMail($data));

        return redirect($request->curent_link);
    }

    public function SendApprovalDocumentEmail($id, Request $request)
    {
        $document = Document::find($id);
        $data = [
            'subject' => 'Share Document',
            'title' => 'Approval Document',
            'body' => 'Body',
            'document_id' => $document->id,
            'document_name' => $document->name,
            'file_name' => $document->name,
            'resolution' => $request->resolution,
        ];

        Mail::to($request->email)->send(new ApprovalDocumentMail($data));

        return redirect($request->curent_link);
    }
}
