<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    Projects
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
                                    <a href="/projects/add/" class="btn green"><i class="icon-plus"></i> Add New</a>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class=""></i> Project URL</th>
                                    <th class=""><i class=""></i> Home Club</th>
                                    <th><i class=""></i> Prefix</th>
                                    <th><i class=""></i> Custom Styles</th>
                                    <th><i class=""></i> Facebook App ID</th>
                                    <th><i class=""></i> Facebook App Secret</th>
                                    <th><i class=""></i> Facebook Canvas App URL</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if (!empty($projects)) : ?>
                                    <? foreach ($projects as $project) :?>
                                        <tr>
                                            <td class="highlight">
                                                <div class="<?=$project->created == 1 ? 'success' : 'important';?>"></div>
                                                <a href="http://<?=$project->project_url;?>"><?=$project->project_url;?></a>
                                            </td>
                                            <td class="hidden-phone"><?=$project->appClub->display_name;?></td>
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
                    <!-- END SAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
</div>