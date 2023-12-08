<?php


return [

    // error messages filter default values
    'error.messages' => [

        # default error message for 'required' filter validation
        'required' => 'Please try completing the required fields',

        # default error message for 'string' filter validation
        'is_string' => 'An error occured where only string input values is required',

        # default error message for 'integer' filter validation
        'is_int' => 'An error occured where only integer input values is required',

        # default error message for 'email' filter validation
        'is_email' => 'An error occured where correct email input is required',

        # default error message for 'unique' filter and model validation
        'unique' => '%s already exist in our record, please try again with another %s input',

        # default error message for 'max' filter validation
        'max' => 'An error occured where input value must be lesser than %s characters',

        # default error message for 'min' filter validation
        'min' => 'An error occured where input value must be greater than %s characters',

        # default error message for 'is_image' filter validation
        'is_image' => 'An error occured where input value must be a valid image',
        
        # default error message for 'image' filter validation
        'image' => 'An error occured where input value must be in %s image format',

        # default error message for 'match' filter validation
        'match' => '%s doesn\'t match an expected value'
    ]
];