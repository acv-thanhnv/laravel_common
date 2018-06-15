@extends('layouts.dev')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Translation management form</div>

                    <div class="card-body">
                        <table>
                            <thead>

                            </thead>
                            <tbody>
                            <?php $index = 0; ?>
                            <?php if(!empty($dataTrans)){
                            foreach ($dataTrans as $item){
                            $index++;
                            ?>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $item->lang_code; ?></td>
                            <td><?php echo $item->type_code; ?></td>
                            <td><?php echo $item->code; ?></td>
                            <td><?php echo $item->text; ?></td>
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
