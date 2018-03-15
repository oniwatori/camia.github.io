<div>
	<style type="text/css">
		h3 {margin:20px auto; width: 90%;}
		.Button {
		    display: inline-block;
		    background-color: rgba(0, 77, 255, .7) !important;
		    padding: 5px 10px;
		    margin: 10px 0;
		    color: rgba(255, 255, 255, .9);
		    font-family: 'Comic Sans MS', cursive;
		    font-weight: bold;
		    vertical-align: baseline !important;
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
		div.search-box{margin:10px auto; width: 90%;}
		div.search-box select {height: 30px;}
		div.search-box input {height: 30px; min-width: 40%;}
		div.search-box a {height: 30px; margin: 0 !important;}
		div.news-search-result {margin:10px auto;}
	</style>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#news-search-form").submit(function(event) {
				event.preventDefault();
				var request = $.ajax({
                    url: '<?=FwBase::$baseUrl."/slider/add"?>',
                    method: "POST",
                    data: { 
                        'News[cate_id]' : $('.search-box #s_cate_id').val(),
                        'News[title]' : $('.search-box #s_title').val()
                         },
                    dataType: "html"
                });

                request.done(function( data ) {
                	var lb = $("#slider-modal-add");
                	lb.html("");
	                lb.append('<a href="javascript:void(0)" title="Close" class="lb-close">x</a>');
	                lb.find("a.lb-close").click(function(){
	                    lb.hide("fast");
	                    $("#gray").fadeOut("fast", "linear");
                        canAddSlider = true;
	                });

	                lb.append(data);
	                // lb.show("fast");
	                // gray.show("fast");

                });

                request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                });
			
			});
			$("#btn-search-news").click(function(event) {
				/* Act on the event */
				event.preventDefault();
				$("#news-search-form").trigger('submit');
			});

			var itemSlider = $(".news-item-slider");
			itemSlider.click(function(event) {
				event.preventDefault();
                var attach = $(this).data("item-alias");

                var request = $.ajax({
                    url: '<?=FwBase::$baseUrl."/slider/add"?>',
                    method: "POST",
                    data: {alias:attach},
                    dataType: "html"
                });

                request.done(function( data ) {
                    $("#news-search-form").trigger('submit');
                    $("#main-form-slider").trigger('submit');
                    canAddSlider = true;
                });

                request.fail(function( jqXHR, textStatus ) {
                	if(jqXHR.status == 403) {
                        $("#slider-modal-add").hide('fast', function() {
                            $("#gray").fadeOut("fast", "linear");
                            //alert( "Slider was have max items..." );
                        });;
                    } else if(jqXHR.status == 410) {
                    	$("#slider-modal-add").hide('fast', function() {
                    		//alert( "Slider was added success" );
                            $("#gray").fadeOut("fast", "linear");
                        });;
                    }
                    else {
                        alert( "Request failed: " + textStatus );
                    }
                });
                
			});

		});
	</script>

	<h3><span>Select news for slider</span></h3>
	<div class="search-box">
		<form name="news-search-form" id="news-search-form">
			<select name="News[cate_id]" id="s_cate_id" class="sel-form">
				<option value="0">All Category</option>}
				option
                <?php foreach(Cates::model()->findAll('(cate_id is not null or (select count(c.id) from cates c where c.cate_id = cates.id) = 0) and status = 0') as $item):

                ?>
                    <option value="<?=$item->id?>" <?=$this->model->cate_id == $item->id ? 'selected="selected"' : ''?> >
                        <?php
                        $name = $item->name;
                        if($item->cate_id){
                            $c = Cates::model()->find('id=:id and status = 0', array(':id' => $item->cate_id));
                            $name = $c ? $c->name . ' → ' . $name : $name;
                        }
                        echo $name;
                        ?>
                    </option>
                <?php endforeach;?>
            </select>
			<input type="text" id="s_title" value="<?=$this->model->title?>" name="News[title]" placeholder="Search news by title ..." />
			<a href="javascript:void(0)" id="btn-search-news" class="Button"><i class="fa fa-search"></i></a>
		</form>
	</div>
	<div class="news-search-result table">
		<table class="items TableRecords" style="margin: 10px auto; margin-top : 30px;">
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
                        <a href="javascript:void(0)" class="Button Link news-item-slider" data-item-alias="<?=$item->alias?>" style="background: transparent; display: inline-block; border-color: blue;" ><i>Set slider</i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
	</div>
</div>