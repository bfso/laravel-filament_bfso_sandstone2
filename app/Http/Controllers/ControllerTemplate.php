<?php

namespace App\Http\Controllers;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Http\Request;
use App\Filament\Resources\TemplateResource;
use League\Uri\UriTemplate\Template;
use Filament\Forms\Contracts\HasForms;

class ControllerTemplate extends Controller
{
    
    public function form(Form $form): Form
    {
    return $form
        ->schema([
            TextInput::make('title'),
            TextInput::make('slug'),
            RichEditor::make('content'),
        ]);
    }

    public function show_form()
    {
        return TemplateResource::forms(new Form(new HasForms()));
        
    }
}
