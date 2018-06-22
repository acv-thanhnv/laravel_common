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
        }

        .node-treeview6:not(.node-disabled):hover {
            background-color: #F5F5F5;
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
                        if($dataCategory[$i]->level == $prevLevel){?>
                        <li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>
                        <?php }else if($dataCategory[$i]->level > $prevLevel){?>
                        <ul>
                            <li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>
                            <?php }else{?>
                        </ul>
                        <li data-level="<?php echo $dataCategory[$i]->level; ?>"><?php echo $dataCategory[$i]->name; ?></li>
                        <?php }?>
                        <?php
                        $prevLevel = $dataCategory[$i]->level;
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
                        <?php for($j = 1;$j <= $dataCategory[$i]->level;$j++){ ?>
                        <span class="indent"></span>
                        <?php } ?>
                            <span class="icon glyphicon"></span>
                            <span class="icon node-icon glyphicon glyphicon-user"></span>
                            <?php echo $dataCategory[$i]->name; ?>
                            <span class="badge">0</span>
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

@endsection
