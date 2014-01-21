<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <h3 class="page-title">
                        Users
                    </h3>
                </div>
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box light-grey">

                    <div class="portlet-body">
                        <div class="clearfix">
                            <div class="actions">
                                <? if (Yii::app()->user->role == 1) : ?><a href="/users/add/" class="btn green"><i
                                        class="icon-plus"></i> Add New</a><? endif; ?>
                            </div>
                        </div>
                        <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1"
                                        rowspan="1" colspan="1" style="width: 257px;" aria-sort=""
                                        aria-label="">Display Name
                                    </th>
                                    <th class="hidden-480 sorting" role="columnheader" rowspan="1" colspan="1"
                                        style="width: 471px;" aria-label="">Email
                                    </th>
                                    <th class="hidden-480 sorting" role="columnheader" tabindex="0"
                                        aria-controls="sample_1" rowspan="1" colspan="1" style="width: 163px;"
                                        aria-label="">Role
                                    </th>
                                    <th class="hidden-480 sorting_disabled" role="columnheader" rowspan="1" colspan="1"
                                        style="width: 267px;" aria-label="Joined">
                                    </th>

                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <? if (!empty($users)) : ?>
                                    <? foreach ($users as $user) : ?>
                                <tr class="odd gradeX">
                                    <td class=" sorting_1"><?= $user->display_name; ?></td>
                                    <td class="hidden-480 "><?= $user->email; ?></td>
                                    <td class="hidden-480 "><?= $user->role->name; ?></td>
                                    <td class="center hidden-480 "><? if (Yii::app()->user->role == 1) : ?>
                                            <a href="/users/edit/<?= $user->id; ?>" class="btn mini purple"><i
                                                    class="icon-edit"></i> Edit</a>
                                        <? endif; ?>
                                        <a href="/users/view/<?= $user->id; ?>" class="btn mini blue-stripe">View</a>
                                        <a onclick="return confirm('Are you sure you want to delete this user?')"
                                           href="/users/delete/<?= $user->id; ?>" class="btn mini blue"><i
                                                class="icon-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <? endforeach; ?>
                                <? endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>

    </div>
</div>