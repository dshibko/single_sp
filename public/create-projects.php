<?php

$db = "scorepredictor";

$source_db="tpl_sp";

mysql_connect("localhost","root","123");
mysql_select_db($db);

$result=mysql_query("SELECT * FROM `projects` WHERE `created` = 1");

$optaFeedsArray = array('F1', 'F2', 'F7', 'F40');

$projects=array();
while($row=mysql_fetch_array($result)){
    $projects[]=$row;
}
if (!empty($projects)) {
    mysql_select_db($source_db);

    $result=mysql_query("show tables");

    $table_names=array();
    while($row=mysql_fetch_array($result)){
        $table_names[]=$row[0];
    }

    foreach ($projects as $project) {
        $new_db = $project['prefix']."_scorepredictor";
        mysql_query("CREATE DATABASE IF NOT EXISTS `".$new_db."`");

        mysql_select_db($new_db);
        foreach ($table_names as $table) {
            //mysql_query("CREATE TABLE `".$table."` LIKE `$source_db`.`".$table."`");
            //mysql_query("INSERT INTO `".$table."` SELECT * FROM `$source_db`.`".$table."`");
        }

        $config = file_get_contents('config_template.txt');

        $config = str_replace('{#app_club#}', $project['app_club'], $config);
        $config = str_replace('{#project_url#}', $project['project_url'], $config);
        $config = str_replace('{#project_db#}', $new_db, $config);
        $config = str_replace('{#facebook_app_id#}', $project['facebook_app_id'], $config);
        $config = str_replace('{#facebook_app_secret#}', $project['facebook_app_secret'], $config);
        $config = str_replace('{#facebook_canvas_app_url#}', $poject['facebook_canvas_app_url'], $config);
        $config = str_replace('{#styles_postfix#}', !empty($project['custom_styles']) ? $project['prefix'] : '', $config);
        $config = str_replace('{#prefix#}', $project['prefix'], $config);

        file_put_contents('assets/'.$project['project_url'].'.local.php', '<?php'.PHP_EOL.$config);

        if (!empty($project['custom_styles'])) {
            file_put_contents('assets/'.$project['prefix'].'-styles.css', $project['custom_styles']);
        }

        mysql_select_db($db);

        $sourcePath = '/home/dmitryshibko/public_html/sp.hiqo-solutions.loc/';
        $cron = '10 10 * * * cd /var/virtualhosts/sp/chelsea/; php public/index.php opta F1 '.$project['project_url'].PHP_EOL.
                '0 0,12 * * * cd /var/virtualhosts/sp/chelsea/; php public/index.php opta F40 '.$project['project_url'].PHP_EOL.
                '*/5 * * * * cd /var/virtualhosts/sp/chelsea/; php public/index.php opta F7 '.$project['project_url'].PHP_EOL.
                '0 10 * * * cd /var/virtualhosts/sp/chelsea/; php public/index.php opta F2 '.$project['project_url'].PHP_EOL;

        file_put_contents('assets/crontab', $cron, FILE_APPEND);

        mysql_query("UPDATE `projects` SET `created` = 1 WHERE `id` = ".$project['id']);
    }
}

