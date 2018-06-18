
@extends('layouts.dev')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bold">Menu</div>

                    <div class="card-body form-group">
                        <ul>
                        <?php
                            $prevLevel = 0;
                            $count = count($dataCategory);
                            for($i = 0;$i<$count ; $i++){
                                if($dataCategory[$i]->level==$prevLevel){?>
                                    <li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>
                            <?php }else if($dataCategory[$i]->level>$prevLevel){?>
                            <ul>
                                <li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>

                            <?php }else{?>
                                </ul><li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>
                            <?php }?>
                        <?php
                            $prevLevel = $dataCategory[$i]->level;
                            }
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
