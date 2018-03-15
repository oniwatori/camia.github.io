<style>
.ct {padding: 3px 10px;}
.act {}
.filters {width: 90% !important;}
.ButtonAdd:before{
  content:url(../public/images/icons/add.png);
  margin-right: 5px;
  top: 3px;
  position: relative;
  vertical-align: middle;
}

tbody tr td {
    padding: 10px 5px;
    vertical-align: middle;
    text-align: left;
}
tbody tr td img {
    margin: 5px;
    vertical-align: middle;
}
tbody tr td .Button{margin: 10px 5px !important;}

div#slider-modal-add{
    width: 80%;
    height: 80%;
    border: 3px solid #ffffff;
    position: absolute;
    z-index: 9000;
    background-color: #ffffff;
    display: none;
    overflow-y: auto;
}

div a.lb-close{
    display: block;
    text-decoration:none;
    top: 0px;
    right: 0px;
    position: absolute;
    padding: 5px 10px;
    width: auto;
    margin: 0px;
    margin-top: 5px;
    margin-right: 5px;
    background-color: rgba(205, 205, 205, 0.3);
    z-index: 9999;
}

div#gray{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 8888;
    background-color: rgba(0, 0, 0, 0.8);
    display: none;
    cursor: pointer;
    text-align: center;
}

.Button {
    display: inline-block;
    background-color: rgba(0, 77, 255, .7) !important;
    padding: 5px 10px;
    margin: 10px 0;
    color: rgba(255, 255, 255, .9);
    font-family: 'Comic Sans MS', cursive;
    font-weight: bold;
    vertical-align: middle;
    animation: .5s ease;
    transition:  .5s ease;
    -webkit-transition: .5s ease;
    -moz-transition: .5s ease;
    -o-transition: .5 ease;
}

.Button:hover {
    color: rgba(255, 0, 0, .7);
    font-weight: bold;
}

</style>

<h4 style="width: 90%; margin: auto; margin-top: 10px;">Danh sách sản phẩm</h4>
<div class="table" id="main-data">
    <script>
        var canAddSlider = true;
        $(document).ready(function(){

            $("body").prepend('<div id="slider-modal-add"><a href="javascript:void(0)" title="Close" class="lb-close">x</a></div>');
            $("body").prepend('<div id="gray"></div>');
            $("#slider-modal-add").css("marginLeft", ($("body").width() - $("#slider-modal-add").width())/2);
            console.log($("body").height());
            console.log($("#slider-modal-add").height());
            $("#slider-modal-add").css("marginTop", ($("body").height() - $("#slider-modal-add").height())/2);
            $("a#slider-btn-add").click(function(event) {
                event.preventDefault();
                if(!canAddSlider) {return;}
                canAddSlider = false;
                $("#slider-modal-add").html("");
                $("#slider-modal-add").append('<a href="javascript:void(0)" title="Close" class="lb-close">x</a>');
                $("#slider-modal-add").find("a.lb-close").click(function(){
                    $("#slider-modal-add").hide("fast");
                    $("#slider-modal-add").html("");
                    $("#gray").fadeOut("fast", "linear");
                    canAddSlider = true;
                });

                __autoloadAjax($("#slider-modal-add"), "", '<?=FwBase::$baseUrl."/slider/add.html"?>');

                $("#slider-modal-add").show("fast");
                $("#gray").show("fast");
            });
            
        });

        function toggle(source) {
            checkboxes = document.getElementsByName('cbk');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function __autoloadAjax(el, attach, url){

            var request = $.ajax({
                url: url,
                method: "POST",
                data: {alias:attach},
                dataType: "html"
            });

            request.done(function( data ) {
                el.append( data );
                $('html, body').animate({
                    scrollTop: $(el).offset().top
                }, '100');
            });
            request.fail(function( jqXHR, textStatus ) {
                if(jqXHR.status == 403) {
                    $("#slider-modal-add").hide('fast', function() {
                        $("#gray").fadeOut("fast", "linear");
                        //alert( "Slider was have max items..." );
                    });;
                } else {
                    alert( "Request failed: " + textStatus );
                }

            });
        }

    </script>
    <div style="width: 90%; margin:auto; text-align:right;">
        <?php if(sizeof($this->models) < 8): ?><a href="javascript:void(0)" class="Button ButtonAdd" id="slider-btn-add" >New Slider</a><?php endif; ?>
    </div>
    <form id="main-form-slider" action="" method="get" name="SearchFrm" autocomplete="false">
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
    </form>

</div>