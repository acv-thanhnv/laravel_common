@extends('layouts.dev')
@section('content')
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 44px;
            height: 24px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            display: none;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 13px;
            width: 13px;
            left: 2px;
            bottom: 6px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .table th {
            text-align: center;
        }

        .function {
            padding-bottom: 10px;
        }
    </style>
    @csrf

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">ACL</div>
                <div class="function text-right">
                    <button id="import" class="btn btn-primary">Import config file to Database <span
                            class="glyphicon glyphicon-oil"></span></button>
                    <button id="generation" class="btn btn-primary">Generate to config file <span
                            class="glyphicon glyphicon-file"></span></button>

                </div>
                <div class="card-body form-group">
                    <table class="table-bordered table table-hover w-100">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Role name</th>
                            <th>Module</th>
                            <th>Controller</th>
                            <th>Action</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $index = 0; ?>
                        <?php if(!empty($dataAcl[1])){
                        foreach ($dataAcl[1] as $item){
                        $index++;
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $index; ?></td>
                            <td><?php echo $item->role_name; ?></td>
                            <td><?php echo $item->module; ?></td>
                            <td><?php echo $item->controller; ?></td>
                            <td><?php echo $item->action; ?></td>
                            <td class="text-center">
                                <?php
                                $selected = '';
                                if ($item->is_active == 1) {
                                    $selected = "checked";
                                }
                                ?>
                                <label class="switch">
                                    <input type="checkbox" class="change-active" <?php echo $selected; ?>
                                    data-role_map_id="<?php echo $item->role_map_id;?>">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        </tr>
                        <?php }
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change', '.change-active', function () {
                var data = {
                    active: $(this).prop('checked'),
                    role_map_id: $(this).data('role_map_id')
                };
                $.ajax({
                    data: data,
                    type: 'Post',
                    dataType: 'json',
                    url: "<?php echo @route('updateAclActive')?>",
                    success: function (result) {
                        alert('OK');
                    }
                });
            });
        });
        $(document).on('click', '#generation', function () {
            $.ajax({
                type: 'Post',
                url: "<?php echo @route('generationAclFile')?>",
                success: function (result) {
                    $.alert(
                        {
                            title: 'Alert!',
                            content: 'Gennerated!',
                        }
                    );
                }
            });
        });
        $(document).on('click', '#import', function () {
            $.alert(
                {
                    title: 'Alert!',
                    content: 'Comming soon!',
                }
            );
        });
    </script>

@endsection


