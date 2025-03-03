<?php

use App\Models\EscortType;
use App\Models\Locations;
use App\Models\Services;
use App\Models\Country;
use App\Models\City;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\FileUpload;

return [
	'fields' => [
		'username' => [
			'label' => 'Username',
			'type' => 'TextInput',
			'rules' => 'required'
        ],
		'about' => [
			'label' => 'About',
			'type' => 'MarkdownEditor',
			'rules' => 'required'
        ],
		'phone_number' => [
            'label' => 'phone Number',
            'type' => 'TextInput',
            'rules' => '',
        ],
		'whatsapp_number' => [
            'label' => 'Whatsapp Number',
            'type' => 'TextInput',
            'rules' => ''
        ],
		'country' => [
            'label' => 'Country',
            'type' => 'Select',
            'options' => Country::getCountries(), // Adjust 'name' and 'id' to your model's attributes
            'rules' => ''
        ],
		'city' => [
            'label' => 'City',
            'type' => 'Select',
            'options' => City::getCities(), // Adjust 'name' and 'id' to your model's attributes
            'rules' => ''
        ],
		'address' => [
			'label' => 'Address',
			'type' => 'Textarea',
			'rules' => ''
        ],
		'categories' => [
            'label' => 'Categories',
            'type' => MultiSelect::class,
            'options' => EscortType::getEscortTypes(), // Adjust 'name' and 'id' to your model's attributes
            'rules' => ''
        ],
		'services' => [
            'label' => 'Services',
            'type' => MultiSelect::class,
            'options' => Services::getServices(), // Adjust 'name' and 'id' to your model's attributes
            'rules' => ''
        ],
		'locations' => [
            'label' => 'Locations',
            'type' => MultiSelect::class,
            'options' => Locations::getLocations(), // Adjust 'name' and 'id' to your model's attributes
            'rules' => ''
        ],
		'gallery' => [
            'label' => 'Gallery',
            'type' => FileUpload::class,
            'multiple' => true, // Allow multiple file uploads
			'panelLayout' => 'grid',
            'rules' => '', // Adjust the rules as needed
            'minFiles' => 1,
            'maxFiles' => 5, // Limit the number of files
            'acceptedFileTypes' => [
                'image/jpeg',
                'image/png',
                // Add other accepted file types as needed
            ],
        ],
		'incall' => [
			'label' => 'Incall',
			'type' => 'Toggle',
			'rules' => ''
        ],
		'outcall' => [
			'label' => 'Outcall',
			'type' => 'Toggle',
			'rules' => '',
			'columns' => 2,
        ]
	],
];
