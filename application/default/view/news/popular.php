<script>
    $(document).ready(function(){
        var nels = $("article#main-content section.content-item div.content-detail a.item-url");
        nels.click(function(e){
            e.preventDefault();
            __autoloadAjax($("article#main-content"), $(this).data('item-alias'), 'news.html', "");
        })
    })
</script>
<h3><span>Popular near week</span></h3>
<?php foreach ($this->news as $n) : ?>
 <section class="content-item" >
    <div class="content-detail">
        <h4><a href="javascript:void(0)" data-item-alias="<?=$n->alias?>" title="<?=$n->title?>" class="item-url"><?=$n->title?></a></h4>
        <details>
            <summary>Detail</summary>
            <p class="item-update"><?=$n->updated?></p>
            <p class="user-update"><?=Fw_Helper::getActivedUsername($n->updater)?></p>
        </details>
        <div class="item-detail">
            <?=$n->description?>
        </div>
        <h6><a href="javascript:void(0)" data-item-alias="<?=$n->alias?>" title="<?=$n->title?>">Read more ... </a></h6>
    </div>
    <figure class="item-image">
        <img src="<?=FwBase::$baseUrl?>/public/images/news/<?=$n->image?>" alt="<?=$n->title?>" />
    </figure>
 </section>
<?php endforeach; ?>