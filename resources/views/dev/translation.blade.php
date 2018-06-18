@extends('layouts.dev')
<style>
    .edit, .save,.delete{
        cursor: pointer;
    }
    .table th{
        text-align: center;
    }
    .table td{
        vertical-align: middle;
    }
    .save, #save-all{
        color: green;
    }
    .function{
        padding-bottom: 10px;
    }
    .btn{
        cursor: pointer;
    }
</style>
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">Translation management form</div>
                    <fieldset class="border">
                        <legend>Filter:</legend>
                        <div class="col-md-12 filter">
                            <div class="col-md-1">Language</div>
                            <div class="col-md-4">
                                <select id="trans-lang" class="lang form-control">
                                    <option value="">---</option>
                                    <?php foreach ($langList as $langItem){?>
                                    <option value="<?php echo $langItem->code;?>"><?php echo $langItem->name?></option>
                                    <?php   } ?>
                                </select>
                            </div>
                        </div>

                    </fieldset>

                    <div class="function col-md-12">
                        <button id="add" class="btn btn-primary pull-left glyphicon-plus" title="Add new text"></button>
                        <button id="generation" class="btn btn-primary pull-right glyphicon glyphicon-save-file" title="Generate to translate file"></button>
                    </div>
                    <div class="card-body">
                        <table class="table-bordered table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Language code</th>
                                    <th>Type</th>
                                    <th>Key</th>
                                    <th>Type Input</th>
                                    <th style="min-width: 408px;">Text translated</th>
                                    <th>
                                        <span id="edit-all" class="glyphicon glyphicon-edit btn"></span>
                                        <span id="save-all" class="glyphicon glyphicon-floppy-saved btn display-none"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $index = 0; ?>
                            <?php if(!empty($dataTrans)){
                            foreach ($dataTrans as $item){
                            $index++;
                            ?>
                            <tr class="trans-record">
                                <td class="text-center"><?php echo $index; ?></td>
                                <td><?php echo $item->lang_code; ?></td>
                                <td><?php echo $item->translate_type_code; ?></td>
                                <td><?php echo $item->code; ?></td>
                                <td><?php echo $item->type_code; ?></td>
                                <td><input class="form-control text-trans" readonly value="<?php echo $item->text; ?>" /></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <span class="edit glyphicon glyphicon-edit"></span>
                                    <span class="save glyphicon glyphicon-floppy-saved display-none" data-id="<?php echo $item->id; ?>"></span>
                                    <span class="delete glyphicon glyphicon-trash" data-id="<?php echo $item->id; ?>"></span>
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
            $(document).on('click', '.edit', function () {
                var record = $(this).parents('tr.trans-record');
                $(record).find('.text-trans').prop('readonly', false).select();
                $(record).find('.save').removeClass('display-none');
                $(this).addClass('display-none');
            });
            $(document).on('click', '#edit-all', function () {
                $('.text-trans').prop('readonly', false);
                $('.save').removeClass('display-none');
                $('.edit').addClass('display-none');
                $(this).addClass('display-none');
                $('#save-all').removeClass('display-none');
            });
            $(document).on('click', '.save', function () {
                var record = $(this).parents('tr.trans-record');
                var text = $(record).find('.text-trans').val();
                var data = {
                    id: $(this).data('id'),
                    text: text
                };

                $.ajax({
                    type: 'Post',
                    data: data,
                    url: "<?php echo @route('updateTranslate')?>",
                    success: function (result) {
                        $(record).find('.save').addClass('display-none');
                        $(record).find('.edit').removeClass('display-none');
                        $(record).find('.text-trans').prop('readonly', true);
                    }
                });
            });
            $(document).on('click', '#generation', function () {
                $.ajax({
                    type: 'Post',
                    url: "<?php echo @route('generationLanguageFiles')?>",
                    success: function (result) {
                        alert('OK');
                    }
                });
            });
            $(document).on('click', '#add', function () {
                $.confirm({
                    title: 'New text translation',
                    Width: '80%',
                    useBootstrap: false,
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: "<?php echo @route('newTextTrans')?>",
                        }).done(function (response) {
                            self.setContent(response);
                        }).fail(function () {
                            self.setContent('');
                        });
                    },
                    buttons: {
                        Save: {
                            text: '<span class="glyphicon glyphicon-floppy-disk"></span> Save',
                            btnClass: 'btn btn-primary',
                            action: function () {
                                $.alert('save the user!');
                            }
                        },
                        cancel: {
                            text: ' Cancel',
                            btnClass: 'btn btn-default',
                            action: function () {
                                close();
                            }
                        }
                    }


                });

            });
        });
    </script>

@endsection
