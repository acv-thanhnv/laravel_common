
@extends('layouts.dev')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">initialization project function</div>

                    <div class="card-body form-group">
                        <div class="col-md-12 row">
                            <div class="col-md-10">
                                - Import translate file (.\resources\lang\.*) to DB <br>
                                <span class="text-warning font-weight-bold">Warning: read all file in .\resources\lang\.* and insert to Database</span>
                            </div>
                            <div class="col-md-2"><button class="btn-primary btn">Execute</button></div>
                        </div>
                        <hr>
                        <div class="col-md-12  row">
                            <div class="col-md-10">
                                - Insert all module, controller, action to screens table in Database
                            </div>
                            <div class="col-md-2"><button class="btn-primary btn">Execute</button></div>
                        </div>
                        <hr>
                        <div class="col-md-12  row">
                            <div class="col-md-10">
                                - Generation Role Data, insert to DB: get all screen -> insert screen to DB, update DB to set active all for administrator role initialization<br>
                                - Generation Acl config file : .\config\acl.php<br>
                                - Generation translate file :  .\resources\lang\.* <br>
                                <span class="text-warning font-weight-bold">Warning: rewrite file in .\resources\lang\.* from Database, old data in file will be remove</span>
                            </div>
                            <div class="col-md-2"><button class="btn-primary btn">Execute</button></div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
