@extends('layouts.dev')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Translation management form</div>

                    <div class="card-body">
                        <table class="table-bordered table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Language code</th>
                                    <th>Type</th>
                                    <th>Key</th>
                                    <th>Type Input</th>
                                    <th>Text translated</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $index = 0; ?>
                            <?php if(!empty($dataTrans)){
                            foreach ($dataTrans as $item){
                            $index++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $index; ?></td>
                                <td><?php echo $item->lang_code; ?></td>
                                <td><?php echo $item->translate_type_code; ?></td>
                                <td><?php echo $item->code; ?></td>
                                <td><?php echo $item->type_code; ?></td>
                                <td><input class="form-control" value="<?php echo $item->text; ?>" /></td>
                                <td class="text-center"><span class="glyphicon glyphicon-edit"></span></td>
                            </tr>
                            <?php }
                            }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
