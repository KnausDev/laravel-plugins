<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    "directory" => 'plugins',
    'vendor' => [
        'is_active' => true, // TODO: Path Builder
        'name' => 'KnausDev', // TODO: Add to Path Builder as default when dot is not used
    ],

    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        | Customise the paths where the folders will be generated.
        | Setting the generate key to false will not generate that folder
        */
        'generator' => [
            // app/
            'casts' => ['path' => 'app/Casts'],
            'channels' => ['path' => 'app/Broadcasting'],
            'command' => ['path' => 'app/Console'],
            'component-class' => ['path' => 'app/View/Components'],

            'controller' => ['path' => 'app/Http/Controllers'],

            'event' => ['path' => 'app/Events'],
            'exceptions' => ['path' => 'app/Exceptions'],
            'jobs' => ['path' => 'app/Jobs'],
            'listener' => ['path' => 'app/Listeners'],
            'emails' => ['path' => 'app/Emails'],

            'middleware' => ['path' => 'app/Http/Middleware'],

            'model' => ['path' => 'app/Models'],
            'notifications' => ['path' => 'app/Notifications'],
            'observer' => ['path' => 'app/Observers'],
            'policies' => ['path' => 'app/Policies'],
            'provider' => ['path' => 'app/Providers'],
            'resource' => ['path' => 'app/Transformers'],
            'rules' => ['path' => 'app/Rules'],

            'actions' => ['path' => 'app/Actions'],
            'class' => ['path' => 'app/Classes'],
            'enums' => ['path' => 'app/Enums'],
            'helpers' => ['path' => 'app/Helpers'],
            'interfaces' => ['path' => 'app/Interfaces'],
            'repository' => ['path' => 'app/Repositories'],
            'route-provider' => ['path' => 'app/Providers'],
            'services' => ['path' => 'app/Services'],
            'scopes' => ['path' => 'app/Models/Scopes'],
            'traits' => ['path' => 'app/Traits'],

            // app/Http/

            'request' => ['path' => 'app/Http/Requests'],

            // config/
            'config' => ['path' => 'config'],

            // database/
            'factory' => ['path' => 'database/factories'],
            'migration' => ['path' => 'database/migrations'],
            'seeder' => ['path' => 'database/seeders'],

            // lang/
            'lang' => ['path' => 'lang'],

            // resource/
            'assets' => ['path' => 'resources/assets'],
            'component-view' => ['path' => 'resources/views/components'],
            'views' => ['path' => 'resources/views'],

            // routes/
            'routes' => ['path' => 'routes'],

            // tests/
            'test-feature' => ['path' => 'tests/Feature'],
            'test-unit' => ['path' => 'tests/Unit'],
        ],
    ],
];

//make:cache-table              [cache:table] Create a migration for the cache database table
//make:cast                     Create a new custom Eloquent cast class
//make:channel                  Create a new channel class
//make:class                    Create a new class
//make:command                  Create a new Artisan command
//make:component                Create a new view component class
//make:controller               Create a new controller class
//make:enum                     Create a new enum
//make:event                    Create a new event class
//make:exception                Create a new custom exception class
//make:factory                  Create a new model factory
//make:interface                Create a new interface
//make:job                      Create a new job class
//make:listener                 Create a new event listener class
//make:mail                     Create a new email class
//make:middleware               Create a new middleware class
//make:migration                Create a new migration file
//make:model                    Create a new Eloquent model class
//make:notification             Create a new notification class
//make:notifications-table      [notifications:table] Create a migration for the notifications table
//make:observer                 Create a new observer class
//make:policy                   Create a new policy class
//make:provider                 Create a new service provider class
//make:queue-batches-table      [queue:batches-table] Create a migration for the batches database table
//make:queue-failed-table       [queue:failed-table] Create a migration for the failed queue jobs database table
//make:queue-table              [queue:table] Create a migration for the queue jobs database table
//make:request                  Create a new form request class
//make:resource                 Create a new resource
//make:rule                     Create a new validation rule
//make:scope                    Create a new scope class
//make:seeder                   Create a new seeder class
//make:session-table            [session:table] Create a migration for the session database table
//make:test                     Create a new test class
//make:trait                    Create a new trait
//make:view
