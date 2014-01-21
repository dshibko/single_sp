<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    Projects
                </h3>
            </div>
            <div class="portlet box light-grey">

                <div class="portlet-body">
                    <div class="clearfix">
                        <div class="actions">
                            <? if (Yii::app()->user->role == 1) : ?><a href="/projects/add/" class="btn green"><i
                                    class="icon-plus"></i> Add New</a><? endif; ?>
                        </div>
                    </div>
                    <div id="sample_2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <table class="table table-striped table-bordered table-hover table-advance dataTable" id="sample_2" aria-describedby="sample_2_info">
                            <thead>
                            <tr role="row" style="background-color: #fff; ">
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_2"
                                rowspan="1" colspan="1" aria-sort=""
                                aria-label="" style="font-weight: 400;">Project URL
                            </th>
                            <th class="hidden-480 sorting" role="columnheader" rowspan="1" colspan="1"
                                aria-label="" style="font-weight: 400;">Home Club
                            </th>
                            <th style="background-color: #fff; font-weight: 400;"><i class=""></i> Prefix</th>
                            <th style="background-color: #fff; font-weight: 400;"><i class=""></i> Custom Styles</th>
                            <th style="background-color: #fff; font-weight: 400;"><i class=""></i> Facebook App ID</th>
                            <th style="background-color: #fff; font-weight: 400;"><i class=""></i> Facebook App Secret</th>
                            <th style="background-color: #fff; font-weight: 400;"><i class=""></i> Facebook Canvas App URL</th>
                                <th style="background-color: #fff; font-weight: 400;"></th>
</tr>
                            </thead>

                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <? if (!empty($projects)) : ?>
                                <? foreach ($projects as $project) :?>
                                    <tr class="odd gradeX">
                                        <td class="highlight">
                                            <div class="<?=$project->created == 1 ? 'success' : 'important';?>"></div>
                                            <a href="http://<?=$project->project_url;?>"><?=$project->project_url;?></a>
                                        </td>
                                        <td class=" sorting_1"><?= $project->appClub->display_name; ?></td>
                                        <td class="hidden-phone"><?=$project->prefix;?></td>
                                        <td class="hidden-phone"><center><?=!empty($project->custom_styles) ? '<a class="glyphicons no-js ok_2"><i></i></a>' : '<a class="glyphicons no-js remove_2"><i></i></a>';?></center></td>
                                        <td class="hidden-phone"><?=$project->facebook_app_id;?></td>
                                        <td class="hidden-phone"><?=$project->facebook_app_secret;?></td>
                                        <td class="hidden-phone"><?=$project->facebook_canvas_app_url;?></td>
                                        <td><a href="/projects/view/<?=$project->id;?>" class="btn mini blue-stripe">View</a></td>
                                    </tr>
                                <? endforeach; ?>
                            <? endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>