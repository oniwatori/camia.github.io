<style>
.content article.main-content section.news-detail {
    margin-left: 30px;
    height: auto;
    padding-bottom: 10px;
    border-bottom: 1px groove #ddd;
    display: table;
    margin-bottom: 10px;
}

.content article.main-content section.news-detail details {
    color: rgba(90, 86, 86, 0.5);
    font-size: 12px;
    padding-left: 10px;
    padding-bottom: 10px;
}

.content article.main-content section.news-detail details p {
    color: rgba(60, 60, 60, 0.5);
    padding-top: 5px;
    padding-left: 15px;
}

.content article.main-content section.news-detail details summary:focus {
    outline: none;
}

.content article.main-content section.news-detail .content-detail .item-detail {
    font-weight: bold;
    color: rgba(0, 0, 0, 0.8);
}

.content article.main-content section.news-detail .content-detail .item-relate ul {
    margin: 20px 10px;
    list-style: none;
}
.content article.main-content section.news-detail .content-detail .item-relate ul li {
    padding: 3px 0px;
}

.content article.main-content section.news-detail .content-detail .item-relate ul li :before {
    content: "○";
    padding-right: 10px;
    color: rgb(255, 0, 127);
}

.content article.main-content section.news-detail .content-detail .item-relate ul li a {
    text-decoration: none;
    font-weight: bolder;
    color: rgba(0, 0, 255, .8);
    -webkit-transform: .5s ease;
       -moz-transform: .5s ease;
        -ms-transform: .5s ease;
         -o-transform: .5s ease;
            transform: .5s ease;
}

.content article.main-content section.news-detail .content-detail .item-relate ul li a:hover {
    color: rgb(255, 0, 127);
    font-weight: bold;
}

.content article.main-content section.news-detail .item-extend {
    margin-top: 20px;
}

.content article.main-content section.news-detail .item-extend h6.item-source{
    text-align: right;
}

.content article.main-content section.news-detail .item-extend ul.item-tags {
    list-style: none;
    margin-top: 20px;
    display: table;
    width: 100%;
}

.content article.main-content section.news-detail .item-extend ul.item-tags li {
    float: left;
    margin: 5px;
    display: table-column; 
}

.content article.main-content section.news-detail .item-extend ul.item-tags li a {
    padding: 5px 10px;
    display: inline-block;
    background-color: rgba(123, 123, 123, 0.5); 
    text-decoration: none;
    -webkit-transition: all .5s ease;
       -moz-transition: all .5s ease;
        -ms-transition: all .5s ease;
         -o-transition: all .5s ease;
            transition: all .5s ease;
}

.content article.main-content section.news-detail .item-extend ul.item-tags li a:hover {
    background-color: rgba(120, 120, 120, 0.5);
    color: rgb(80, 20, 20);
}

.fb-comments {
    margin-top: 20px;
}

.item-share-button a {
    display: inline-block;
    padding: 5px 10px;
    margin-right: 10px;
    background-color: rgba(80, 20, 20, 0.9);
    color: rgba(255, 0, 154, 0.8);
    text-decoration: none;
}

</style>

<script>

    $(document).ready(function(){
        var nels = $("article#main-content section.news-detail div.item-extend ul.item-tags a");
        var nerl = $("article#main-content section.news-detail div.content-detail div.item-relate a");
        nels.click(function(e){
            e.preventDefault();
            __autoloadAjax($("article#main-content"), $(this).data('item-tag'), 'tag.html', 'tag');
        });
        nerl.click(function(e){
            e.preventDefault();
            __autoloadAjax($("article#main-content"), $(this).data('item-alias'), 'news.html');
        });
    })
    
</script>
<h3><span><?=$this->item->title?></span></h3>
<section class="news-detail">
    <details>
        <summary>Detail</summary>
        <p class="user-update">By <span style="font-weight:bold"><?=Fw_Helper::getActivedUsername($this->item->updater)?></span></p>
        <p class="item-update">At <span style="font-weight:bold"><?=$this->item->updated?></span></p>
    </details>
    <div class="content-detail">        
        <div class="item-detail">
            <?=$this->item->description?>
        </div>
        <div class="item-relate">
            <ul>
                <?php foreach ($this->relates as $r):?>
                    <li><a href="javascript:void(0)" data-item-alias="<?=$r->alias?>" title="<?=$r->title?>" ><?=$r->title?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="item-summary">
        <?=$this->item->summary?>
    </div>
    
    <div class="item-extend">
        <h6 class="item-source"><?=$this->item->source?></h6>
        <div class="item-share-button">
            <span style="padding: 5px; font-weight: bold;">Share : </span>
            <a href="javascript:void(0)" id="fb-shared">Facebook</a>
            <a href="javascript:void(0)" id="gg-plus-shared">Google+</a>
        </div>
        <ul class="item-tags">
            <li style="padding: 5px; font-weight: bold;">Tags : </li>
            <?php foreach(Fw_Helper::getTagsAsArr($this->item->tags) as $t): ?>
                <li><a href="javascript:void(0)" title="<?=$t?>" data-item-tag="<?=Fw_Helper::tagToAlias($t)?>" ><?=ucfirst(trim($t))?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <script type="text/javascript">
        $("#fb-shared").click(function(e){
            window.open("http://www.facebook.com/share.php?u=<?=Fw_Helper::getCurrentUrl()?>&title=<?=$this->title?>&description=<?=$this->description?>",'facebook-share-dialog',"width=525,height=450");
        });
        $("#gg-plus-shared").click(function(e){
            window.open("https://plus.google.com/share?url=<?=Fw_Helper::getCurrentUrl()?>",'google-share-dialog',"width=525,height=450");
        });
    </script>
    <div class="fb-quote"></div>
    <div class="fb-comments" data-width="100%" data-numposts="5"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>    

</section>



