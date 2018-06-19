
@extends('layouts.dev')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-12">
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
                    <div class="ref">
                        <b>Refer: </b><a href="http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/" target="_blank">http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/</a>
                    </div>
                </div>
            </div>
        </div>

@endsection
