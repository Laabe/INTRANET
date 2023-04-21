<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DarkModeToggle extends Component
{
    public bool $isDarkMode = false;

    public function mount()
    {
        $preferances = DB::table('user_preferences')->where('user_id', auth()->user()->id)->first();
        $this->isDarkMode = $preferances->theme === 'dark';
    }

    public function toggleDarkMode()
    {
        $this->isDarkMode = !$this->isDarkMode;
        $this->updateUserPreferences();
    }

    private function updateUserPreferences() {
        DB::table('user_preferences')->where('user_id', auth()->user()->id)->update(['theme' => $this->isDarkMode ? 'dark' : 'light']);
    }

    public function render()
    {
        return view('livewire.dark-mode-toggle');
    }
}
