<?php

namespace App\Http\Livewire;

use App\Models\UserPreference;
use Livewire\Component;

class LanguageModal extends Component
{    
    public function changeLanguage($lang)
    {
        UserPreference::where('user_id', auth()->user()->id)->update([
            'language' => $lang
        ]);
        app()->setLocale($lang);
        $this->emit('languageChanged', $lang);
    }

    public function render()
    {
        return view('livewire.language-modal');
    }
}
