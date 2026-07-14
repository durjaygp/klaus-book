<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmationMail;
use Illuminate\Support\Facades\Log;

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

    public function sendConfirmationEmail()
    {
        if ($this->viewingContact) {
            try {
                Mail::to($this->viewingContact->email)->send(new ContactConfirmationMail($this->viewingContact));
                session()->flash('message', 'Confirmation email sent successfully!');
            } catch (\Exception $e) {
                Log::error('Mail sending failed: ' . $e->getMessage());
                session()->flash('error', 'Failed to send email. Ensure SMTP is configured correctly.');
            }
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
