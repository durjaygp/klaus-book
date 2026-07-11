<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactList extends Component
{
    public $viewingContact = null;

    public function delete($id)
    {
        Contact::find($id)?->delete();
    }

    public function viewContact($id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            $contact->update(['is_read' => true]);
            $this->viewingContact = $contact;
        }
    }

    public function closeView()
    {
        $this->viewingContact = null;
    }

    public function render()
    {
        $contacts = Contact::latest()->get();
        return view('livewire.contact-list', [
            'contacts' => $contacts
        ]);
    }
}
