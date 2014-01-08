<?php

$db = "scorepredictor";

$source_db="tpl_sp";

mysql_connect("10.14.43.7","spadmin","d&%7PC6/g938j=4TKeW=");
mysql_select_db($db);

$result=mysql_query("SELECT * FROM `projects` INNER JOIN `team` ON `app_club` = `team`.id WHERE `created` = 0 LIMIT 5");

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
            mysql_query("CREATE TABLE `".$table."` LIKE `$source_db`.`".$table."`");
            mysql_query("INSERT INTO `".$table."` SELECT * FROM `$source_db`.`".$table."`");
        }

        $config = file_get_contents('config_template.txt');

        $config = str_replace('{#app_club#}', $project['app_club'], $config);
        $config = str_replace('{#project_url#}', $project['project_url'], $config);
        $config = str_replace('{#project_db#}', $new_db, $config);
        $config = str_replace('{#facebook_app_id#}', $project['facebook_app_id'], $config);
        $config = str_replace('{#facebook_app_secret#}', $project['facebook_app_secret'], $config);
        $config = str_replace('{#facebook_canvas_app_url#}', $project['facebook_canvas_app_url'], $config);
        $config = str_replace('{#styles_postfix#}', !empty($project['custom_styles']) ? $project['prefix'] : '', $config);
        $config = str_replace('{#prefix#}', $project['prefix'], $config);
        $config = str_replace('{#app_name#}', $project['app_name'], $config);
        $config = str_replace('{#short_name#}', $project['short_name'], $config);
        $config = str_replace('{#club_name#}', $project['display_name'], $config);

        file_put_contents('assets/'.$project['project_url'].'.local.php', '<?php'.PHP_EOL.$config);

        if (!empty($project['custom_styles'])) {
            file_put_contents('assets/'.$project['prefix'].'-styles.css', $project['custom_styles']);
        }

        mysql_select_db($db);

        $sourcePath = '/var/virtualhosts/sp/clone/';
        $cron = '10 10 * * * cd /var/virtualhosts/sp/clone/; php public/index.php opta F1 '.$project['project_url'].PHP_EOL.
                '0 0,12 * * * cd /var/virtualhosts/sp/clone/; php public/index.php opta F40 '.$project['project_url'].PHP_EOL.
                '*/5 * * * * cd /var/virtualhosts/sp/clone/; php public/index.php opta F7 '.$project['project_url'].PHP_EOL.
                '0 10 * * * cd /var/virtualhosts/sp/clone/; php public/index.php opta F2 '.$project['project_url'].PHP_EOL;

        file_put_contents('assets/crontab', $cron, FILE_APPEND);

        system("mkdir ".$sourcePath."module/Application/language/".$project['prefix']);
        system("cp ".$sourcePath."module/Application/language/en_EN.po ".$sourcePath."module/Application/language/".$project['prefix']."/en_EN.po");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']);

        system("cp ".$sourcePath."public/img/* ".$sourcePath."public/img/".$project['prefix']);
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar/big");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar/medium");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar/original");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar/small");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/avatar/tiny");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/award");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/club");
        system("cp -r ".$sourcePath."public/img/club ".$sourcePath."public/img/".$project['prefix']."/club");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/content");
        system("cp -r ".$sourcePath."public/img/flags ".$sourcePath."public/img/".$project['prefix']."/flags");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/howtoplay");
        system("cp -r ".$sourcePath."public/img/icons ".$sourcePath."public/img/".$project['prefix']."/icons");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/league");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/logotype");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/other");
        system("cp -r ".$sourcePath."public/img/player ".$sourcePath."public/img/".$project['prefix']."/player");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/prizes");
        system("mkdir ".$sourcePath."public/img/".$project['prefix']."/report");
        system("cp -r ".$sourcePath."public/img/themes ".$sourcePath."public/img/".$project['prefix']."/themes");

        system("cp ".$sourcePath."public/img/avatar/big/user_default_1.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/big/user_default_1.jpg");
        system("cp ".$sourcePath."public/img/avatar/big/user_default_2.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/big/user_default_2.jpg");
        system("cp ".$sourcePath."public/img/avatar/big/user_default_3.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/big/user_default_3.jpg");
        system("cp ".$sourcePath."public/img/avatar/big/user_default_4.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/big/user_default_4.jpg");
        system("cp ".$sourcePath."public/img/avatar/medium/user_default_1.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/medium/user_default_1.jpg");
        system("cp ".$sourcePath."public/img/avatar/medium/user_default_2.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/medium/user_default_2.jpg");
        system("cp ".$sourcePath."public/img/avatar/medium/user_default_3.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/medium/user_default_3.jpg");
        system("cp ".$sourcePath."public/img/avatar/medium/user_default_4.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/medium/user_default_4.jpg");
        system("cp ".$sourcePath."public/img/avatar/small/user_default_1.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/small/user_default_1.jpg");
        system("cp ".$sourcePath."public/img/avatar/small/user_default_2.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/small/user_default_2.jpg");
        system("cp ".$sourcePath."public/img/avatar/small/user_default_3.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/small/user_default_3.jpg");
        system("cp ".$sourcePath."public/img/avatar/small/user_default_4.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/small/user_default_4.jpg");
        system("cp ".$sourcePath."public/img/avatar/original/user_default_1.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/original/user_default_1.jpg");
        system("cp ".$sourcePath."public/img/avatar/original/user_default_2.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/original/user_default_2.jpg");
        system("cp ".$sourcePath."public/img/avatar/original/user_default_3.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/original/user_default_3.jpg");
        system("cp ".$sourcePath."public/img/avatar/original/user_default_4.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/original/user_default_4.jpg");
        system("cp ".$sourcePath."public/img/avatar/tiny/user_default_1.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/tiny/user_default_1.jpg");
        system("cp ".$sourcePath."public/img/avatar/tiny/user_default_2.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/tiny/user_default_2.jpg");
        system("cp ".$sourcePath."public/img/avatar/tiny/user_default_3.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/tiny/user_default_3.jpg");
        system("cp ".$sourcePath."public/img/avatar/tiny/user_default_4.jpg ".$sourcePath."public/img/".$project['prefix']."/avatar/tiny/user_default_4.jpg");

        system("chmod -R 777 ".$sourcePath."public/img/".$project['prefix']);
	system("chmod -R 777 ".$sourcePath."module/Application/language/".$project['prefix']);	

        system("bash copy_files.sh");

        mysql_query("UPDATE `projects` SET `created` = 1 WHERE `id` = ".$project[0]);
    }
}

