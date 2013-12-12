<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    Users
                </h3>
            </div>
            <div class="row-fluid">
                <div class="">
                    <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="clearfix">
                                <div class="actions">
                                    <? if (Yii::app()->user->role == 1) : ?><a href="/users/add/" class="btn green"><i class="icon-plus"></i> Add New</a><? endif; ?>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class=""></i> Display Name</th>
                                    <th><i class=""></i> Email</th>
                                    <th><i class=""></i> Role</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if (!empty($users)) : ?>
                                    <? foreach ($users as $user) :?>
                                        <tr>
                                            <td class="hidden-phone"><?=$user->display_name;?></td>
                                            <td class="hidden-phone"><?=$user->email;?></td>
                                            <td class="hidden-phone"><?=$user->role->name;?></td>
                                            <td>
                                                <? if (Yii::app()->user->role == 1) : ?>
                                                    <a href="/users/edit/<?=$user->id;?>" class="btn mini purple"><i class="icon-edit"></i> Edit</a>
                                                <? endif; ?>
                                                <a href="/users/view/<?=$user->id;?>" class="btn mini blue-stripe">View</a>
                                            </td>
                                        </tr>
                                    <? endforeach; ?>
                                <? endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
</div>