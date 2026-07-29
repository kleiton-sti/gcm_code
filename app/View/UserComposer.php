<?php

namespace App\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserComposer
{
    public function compose(View $view): void
    {
        $view->with('usuarioEmail', Auth::user()?->email);
    }
}