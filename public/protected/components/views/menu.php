<ul>
    <? foreach($items as $item) : ?>
        <li class="<?=$item['active'] == 1 ? 'active' : '';?>">
            <a href="<?=$item['url'][0]?>">
                <i class="<?=$item['class'];?>"></i>
                <span class="title">
                    <?=$item['label']?>            </span>
                <?=$item['active'] == 1 ? '<span class="selected"></span>' : '';?>
            </a>
        </li>
    <? endforeach; ?>
</ul>