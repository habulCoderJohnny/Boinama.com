<?php

namespace App\Http\Controllers;

class SettingsController extends Controller
{
    public function settings()
    {
        return view("admin.layout.settings");
    }
}