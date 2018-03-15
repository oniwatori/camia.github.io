<script>
    $(document).ready(function(){
        var dataDiv = $("div#main-data");
        var pagelnk = $("a.page-link");
        pagelnk.click(function(e){
            e.preventDefault();
            var page = $(this).data("page-number");
            var request = $.ajax({
                url: '<?=FwBase::$baseUrl."/news/search"?>',
                method: "POST",
                data:{'page':page,'News[id]' : $('input#id').val(),'News[title]':$('input#title').val()
                         },dataType: "html"});
            request.done(function( data ) {
                dataDiv.html( data );
            });
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });

        $("form[name=SearchFrm]").submit(function(e){
            e.preventDefault();
            var request = $.ajax({
                url: '<?=FwBase::$baseUrl."/news/search"?>',
                method: "POST",
                data: { 
                    'page' : 1,
                    'News[id]' : $('input#id').val(),
                    'News[title]' : $('input#title').val()
                     },
                dataType: "html"
            });

            request.done(function( data ) {
                $("div#main-data").html( data );
            });

            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });            
        });
    });

    function toggle(source) {
        checkboxes = document.getElementsByName('cbk');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>

<div style="width: 90%; margin:auto;">
    <a href="<?=Fw::$baseUrl."/".Fw::$controller."/add"?>" class="Button Link ButtonAdd" >New Product</a>
    <a href="<?=Fw::$baseUrl."/".Fw::$controller."/add"?>" class="Button Link ButtonDel" >Delete Product</a>
</div>
<form action="" method="get" name="SearchFrm">
    <table id="main-data" class="items TableRecords" style="margin: auto;">
        <thead class="TableRecords_Header">
            <tr>
                <th class="checkbox-column">&nbsp;</th>
                <th style="max-width: 50px;"><a class="sort-link" href="javascript:false">ID</a></th>
                <th><a class="sort-link" href="javascript:false">Title</a></th>
                <th><a class="sort-link" href="javascript:false">Image</a></th>
                <th><a class="sort-link" href="javascript:false">Status</a></th>
                <th><a class="sort-link" href="javascript:false">Updated</a></th>
                <th><a class="sort-link" href="javascript:false">Inserter</a></th>
                <th class="button-column"></th>
            </tr>
            <tr class="filters">
                <th><input type="checkbox" value="1" name="ids_all" id="ids_all" onclick="toggle(this)" /></th>
                <th style="max-width: 50px;"><input id="id" name="News[id]" type="text" value="<?=$this->model->id?>" style="width: 40px;" /></th>
                <th><input id="title" name="News[title]" type="text" value="<?=$this->model->title?>" /></th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th><input type="submit" style="display: none;" /></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            <?php foreach($this->models as $item): ?>
            <tr>
                <td class="ct"><input value="1" type="checkbox" name="cbk" /></td>
                <td class="ct id" style="max-width: 50px; text-align: center;"><?=$item->id?></td>
                <td><a target="_blank" href="<?=Fw::$baseUrl?>/../<?=$item->alias?>.html"><?=$item->title?></a></td>
                <td class="ct"><img src="<?=Fw::$resourceUrl?>/images/news/thumbs/<?=$item->image?>" width="50" height="50" /></td>
                <td class="ct"><a href="<?=Fw::$baseUrl?>/<?=Fw::$controller?>/status/<?=$item->id?>" class="status <?=$item->status != 0 ? 'enable' : ''?>"><?=$item->status != 0 ? 'enable' : 'Disable'?></a></td>
                <td class="ct"><?=date_format(date_create($item->updated),"d/m/Y")?></td>
                <td class="ct"><a href=""><?=Users::model()->find("id = :id", array(":id" => $item->inserter))->username?></a></td>
                <td class="ct act">
                    <a href="<?=Fw::$baseUrl?>/<?=Fw::$controller?>/edit/<?=$item->id?>" class="Button Link" style="background: transparent; display: inline-block; border-color: blue;"><i>Edit</i></a>
                    <a href="<?=Fw::$baseUrl?>/<?=Fw::$controller?>/delete/<?=$item->id?>" class="Button Link" style="background: transparent; display: inline-block; border-color: blue;" ><i>Delete</i></a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table> 
</form>

<div style="width: 90%; margin: auto;">
    <nav>
      <ul class="pagination pagination-sm">
        <?php foreach($this->paging as $p) : ?>
            <li class="page-item"><a class="page-link" href="javascript:void(0);" data-page-number="<?=$p?>" ><?=Fw_Helper::getPageValue($p, $this->paging)?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>   
</div>