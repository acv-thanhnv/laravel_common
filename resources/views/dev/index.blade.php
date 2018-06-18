
@extends('layouts.dev')
@section('content')
        <style>
            .table-bordered{
                padding: 10px;
            }
            .font-weight-bold{
                font-weight: bold;
            }
            .text-warning{
                color: orange;
            }
        </style>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">initialization project function</div>
                    <div class="card-body">
                        <div class="col-md-12 table-bordered">
                            <div class="col-md-10">
                                - Import translate file (.\resources\lang\.*) to DB <br>
                                <span class="text-warning font-weight-bold">Warning: read all file in .\resources\lang\.* and insert to Database</span>
                            </div>
                            <div class="col-md-2 text-right"><button class="btn-primary btn">Execute</button></div>
                        </div>
                        <div class="col-md-12 table-bordered">
                            <div class="col-md-10">
                                - Insert all module, controller, action to screens table in Database
                            </div>
                            <div class="col-md-2 text-right"><button class="btn-primary btn">Execute</button></div>
                        </div>

                        <div class="col-md-12 table-bordered">
                            <div class="col-md-10">
                                - Generation Role Data, insert to DB: get all screen -> insert screen to DB, update DB to set active all for administrator role initialization<br>
                                - Generation Acl config file : .\config\acl.php<br>
                                - Generation translate file :  .\resources\lang\.* <br>
                                <span class="text-warning font-weight-bold">Warning: rewrite file in .\resources\lang\.* from Database, old data in file will be remove</span>
                            </div>
                            <div class="col-md-2 text-right"><button class="btn-primary btn">Execute</button></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

@endsection
