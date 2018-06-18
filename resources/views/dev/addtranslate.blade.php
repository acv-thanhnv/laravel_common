@extends('layouts.dev')

@section('content')
    <style>
        .lang {
            height: 35px !important;
        }

        .form-row {
            margin-top: 5px;
        }
        .form-title{
            padding-top: 7px;
        }
    </style>
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body form-group">
                    <div class="col-md-12 form-row">
                        <div class="col-md-3 form-title">Translate type</div>
                        <div class="col-md-4">
                            <select id="trans-lang" class="lang form-control">
                                <?php foreach ($comboList[1] as $transType){?>
                                <option value="<?php echo $transType->id;?>"><?php echo $transType->code?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 form-row">
                        <div class="col-md-3 form-title">Validate Input Type</div>
                        <div class="col-md-4">
                            <select id="trans-lang" class="lang form-control">
                                <option value="">---</option>
                                <?php foreach ($comboList[0] as $inputType){?>
                                <option value="<?php echo $inputType->type_code;?>"><?php echo $inputType->type_name;?></option>
                                <?php   } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 form-row">
                        <div class="col-md-3 form-title">Code</div>
                        <div class="col-md-9">
                            <input type="text" id="trans-code" class="form-control"/>
                        </div>
                    </div>

                    <?php foreach ($langList as $langItem){?>
                    <div class="col-md-12 form-row">
                        <div class="col-md-3 form-title">Text translate to <?php echo $langItem->name;?></div>
                        <div class="col-md-9">
                            <input type="text" data-lang="<?php echo $langItem->code;?>" id="trans-text" class="form-control"/>
                        </div>
                    </div>
                    <?php   } ?>
                </div>
            </div>
        </div>
    </div>

@endsection
