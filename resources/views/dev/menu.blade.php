@extends('layouts.dev')

@section('content')
    <style>
        .treeview .list-group-item {
            cursor: pointer
        }

        .treeview span.indent {
            margin-left: 10px;
            margin-right: 20px
        }

        .treeview span.icon {
            width: 12px;
            margin-right: 5px
        }

        .treeview .node-disabled {
            color: silver;
            cursor: not-allowed
        }

        .node-treeview6 {
            color: #428bca;
            width: 100%;
        }

        .node-treeview6:not(.node-disabled):hover {
            background-color: #F5F5F5;
        }
        .menu-item,.group-menu-item{
            list-style-type: none;
        }
        .width-200{
            width: 200px;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">Menu</div>
                <h4>Basic</h4>
                <div class="card-body form-group basic-menu">
                    <ul class="basic">
                        <?php
                        $prevLevel = 0;
                        $count = count($dataCategory);
                        for($i = 0;$i < $count ; $i++){
                        if($dataCategory[$i]->level_value == $prevLevel){?>
                        <li class="menu-item" data-level="<?php echo $dataCategory[$i]->level_value; ?>"><a href="#0"><?php echo $dataCategory[$i]->name; ?></a></li>
                        <?php }else if($dataCategory[$i]->level_value > $prevLevel){?>
                        <ul class="group-menu-item">
                            <li data-level="<?php echo $dataCategory[$i]->level_value; ?>"><a href="#0"><?php echo $dataCategory[$i]->name; ?></a></li>
                            <?php }else{?>
                            <?php for($j = $dataCategory[$i]->level_value;$j<$prevLevel;$j++){ ?>
                                </ul>
                            <?php } ?>
                            <li data-level="<?php echo $dataCategory[$i]->level_value; ?>"><a href="#0"><?php echo $dataCategory[$i]->name; ?></a></li>
                        <?php }?>
                        <?php
                        $prevLevel = $dataCategory[$i]->level_value;
                        }
                        ?>
                    </ul>
                </div>
                <br>
                <br>
                <h4>Tree type</h4>
                <div class="card-body form-group boostrap-tree treeview">
                    <ul class="list-group">
                        <?php
                        $count = count($dataCategory);
                        for($i = 0;$i < $count ; $i++){?>
                        <li class="list-group-item node-treeview6" >
                        <?php for($j = 1;$j <= $dataCategory[$i]->level_value;$j++){ ?>
                        <span class="indent"></span>
                        <?php } ?>
                            <span class="icon glyphicon"></span>
                            <span class="icon node-icon glyphicon glyphicon-user"></span>
                            <?php echo $dataCategory[$i]->name; ?>
                            <span class=" glyphicon glyphicon-trash pull-right"></span>
                            <span data-level="<?php echo $dataCategory[$i]->level_value; ?>" data-id="<?php echo $dataCategory[$i]->id; ?>" class="add-cate glyphicon glyphicon-plus pull-right"></span>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="ref">
                    <b>Refer: </b><a href="http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/"
                                     target="_blank">http://mikehillyer.com/articles/managing-hierarchical-data-in-mysql/</a>
                </div>
            </div>
        </div>
    </div>
        <li id="item-temp" class="list-group-item node-treeview6" style="display: inline-flex;">
            <span class="icon glyphicon"></span>
            <span class="icon node-icon glyphicon glyphicon-user"></span>
            <input type="text" name="new-cate" class="form-control width-200">
            <span class=" glyphicon glyphicon-trash pull-right"></span>
        </li>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.add-cate', function () {
                var item = $('#item-temp').clone();
                var level =  $(this).data('level');
                for(var i=0;i<=level;i++){
                    $(item).prepend('<span class="indent"></span>');
                }
                $(item).insertAfter($(this).parent('li'));
            });
        });

    </script>

@endsection
