<script type="text/javascript">
    $("form[name=SearchFrm]").submit(function(e){
        e.preventDefault();
        var request = $.ajax({
            url: '<?=FwBase::$baseUrl."/slider/search"?>',
            method: "POST",
            data: { 
                'page' : 1,
                'News[id]' : $('input#id').val(),
                'News[title]' : $('input#title').val()
                 },
            dataType: "html"
        });

        request.done(function( data ) {
            $("#main-form-slider").html( data );
        });

        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });            
    });
</script>
<table class="items TableRecords" style="margin: auto;">
    <thead class="TableRecords_Header">
        <tr>
            <th class="checkbox-column">&nbsp;</th>
            <th style="max-width: 50px;"><a class="sort-link" href="javascript:false">ID</a></th>
            <th><a class="sort-link" href="javascript:false">Title</a></th>
            <th><a class="sort-link" href="javascript:false">Image</a></th>
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
            <td class="ct"><?=date_format(date_create($item->updated),"d/m/Y")?></td>
            <td class="ct"><a href=""><?=Users::model()->find("id = :id", array(":id" => $item->inserter))->username?></a></td>
            <td class="ct act">
                <a href="<?=Fw::$baseUrl?>/<?=Fw::$controller?>/delete/<?=$item->id?>" class="Button Link" style="background: transparent; display: inline-block; border-color: blue;" ><i>Unslider</i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
