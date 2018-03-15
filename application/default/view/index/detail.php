<style>
   
</style>
<section class="news-detail">
    <h3><span><?=$this->item->title?></span></h3>
    <div class="detail">
        <div class="item-info">
            Bởi 
            <span class="user-detail"><?=$this->owned ? $this->owned->username : "" ?> </span>
            vào
            <span class="time-detail"><?=$this->item->updated ?></span>
        </div>
        <div class="description">
            <?=$this->item->description?>
        </div>
        <div class="content">
            <?=$this->item->summary?>
        </div>
        <div class="shared">
            <!-- For tag, source and share -->
        </div>
        <div class="comment">
            <!-- For comment -->
        </div>
    </div>
</section>
