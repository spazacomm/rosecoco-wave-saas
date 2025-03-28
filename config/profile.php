<?php

use App\Models\Category;
use App\Models\Town;
use App\Models\Service;
use App\Models\Country;
use App\Models\City;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

return [
    'contact_fields' => [
        
        'phone' => [
            'label' => 'Phone Number',
            'type' => 'TextInput',
            'required' => true,
            'placeholder' => '+254712123456',
            // 'rules' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
        ],
       
        'whatsapp' => [
            'label' => 'Whatsapp Number',
            'type' => 'TextInput',
            'placeholder' => '+254712123456',
            'rules' => 'regex:/^\+?[1-9]\d{1,14}$/',
        ],
        'telegram' => [
            'label' => 'Telegram Number',
            'type' => 'TextInput',
            'placeholder' => '+254712123456',
            'rules' => 'regex:/^\+?[1-9]\d{1,14}$/',
        ],
        'address' => [
            'label' => 'Address',
            'type' => 'Textarea',
            'placeholder' => '12 Rose avenue, Breezeville Complex, Langata',
            'columnspan' => '2',
        ],
        
    ],
    'attribute_fields' => [

        'age' => [
            'label' => 'Age',
            'type' => 'TextInput',
            'rules' => 'required'
        ],
        'tel' => [
            'label' => 'Tel Number',
            'type' => 'TextInput',
            // 'required' => false,
            // 'placeholder' => '+254712123456',
            // 'rules' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
        ],
        'languages' => [
            'label' => 'Languages',
            'type' => MultiSelect::class,
            'options' => ['English', 'Swahili', 'Spanish', 'French', 'Italian', 'Portugese', 'Arabic', 'Japanese', 'Chinese', 'German'],
            'rules' => 'required'
        ],
        'body' => [
            'label' => 'Body Type',
            'type' => Select::class,
            'options' => ['Curvy', 'Petite', 'Athletic', 'BBW'],
            'rules' => 'required'
        ],
        
    ],

    'bio_fields' => [
       
        'bio' => [
            'label' => 'Bio',
            'type' => RichEditor::class,
            'rules' => 'required',
            'columnSpan' => 2
        ],
        
        
    ],
    
];
