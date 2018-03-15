<style>
    .MainContent {margin-top:20px;padding: 0px; margin-right: 20px;}
    .title {font-family: sans-serif, cursive !important; font-weight: bold; font-size: 16px; background: #999; padding: 10px 10px;}
    .detail { padding-left: 10px; font-family: comic sans ms,sans-serif;}
    .detail .item-info { margin-top: 5px;}
    .detail .item-info .user-detail { font-weight: bold; color: #777;}
    .detail .item-info .time-detail { font-weight: bold; color: #777;}
    .detail .description {margin-top : 10px; font-weight: bold;}
    .detail .content {margin-top : 10px;}
    
</style>
<div class="MainContent">
    <div class="title">
        <?=$this->item->title?>
    </div>
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
</div>
