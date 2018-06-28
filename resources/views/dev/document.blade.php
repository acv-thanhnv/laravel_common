@extends('layouts.dev')

@section('content')
    <style>
        .form-control {
            height: 35px !important;
        }

        .form-row {
            margin-top: 5px;
        }
    </style>
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body form-group">

                    <p>When copy module dev:<br />Source code:<br /><strong>1/Add setting value .env:</strong> <br />- APP_DEBUG=true<br />- DEV_MODE = true<br />- SYSTEM_ADMIN_ROLE_VALUE=1<br />- PUBLIC_ROLE_VALUE=0<br /><strong>2/ Register config/app.php</strong><br />&nbsp;'SYSTEM_ADMIN_ROLE_VALUE'=&gt;env('SYSTEM_ADMIN_ROLE_VALUE', 1),//user to set default role when init project<br /> 'PUBLIC_ROLE_VALUE'=&gt;env('PUBLIC_ROLE_VALUE', 0),//user to set default role when init project<br /> 'DEV_MODE'=&gt;env('DEV_MODE', false),//DEV_MODE allow active Module Dev<br /> <br /> Register for 'providers': add App\Dev\Providers\DevServiceProvider::class</p>
                    <p><strong>3/ RouteServiceProvider.php</strong><br />- Define mapDevRouter</p>
                    <p><br /><strong>4/Middleware/Kernel.php</strong><br />- New group dev , acl, auth....<br /><strong>5/ Add config/acl</strong></p>


                </div>
            </div>
        </div>
    </div>

@endsection
