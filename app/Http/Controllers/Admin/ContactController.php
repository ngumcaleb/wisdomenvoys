<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $contacts = Contact::when($request->boolean('unread'), fn ($q) => $q->unread())
            ->latest()
            ->paginate(20);

        return response()->json($contacts);
    }

    public function show(Contact $contact): JsonResponse
    {
        $contact->update(['is_read' => true]);

        return response()->json($contact);
    }

    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json([
            'message' => 'Contact message deleted successfully.',
        ]);
    }
}
