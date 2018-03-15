<style>
.form { margin-top: 50px;}
.controls:before {clear: both;}
.controls {width: 80%; margin: 20px auto; line-height: 1.428571429 !important;}
.label { float: left !important; width: 10% !important; display: inline-block !important; margin-left: 5% !important; color: #777 !important; line-height: 1.428571429 !important; text-align: left; padding: 10px; height: 32px;}
.input {width: 70% !important; display: inline-block; margin-right: 5%;}
.input input:before {clear: both;}
.input input[type="text"] {width:60%; float:left;}
.input textarea {width:100%; float:left;}
.input select {width:60%; float:left;}
.input .error {width: 40%; display: inline-block; padding-left: 15px;}
.ImageThumb {
    position: absolute;
    margin-left: 20px;
    width: 200px;
    height: 200px;
    z-index:1000;
}
.Button {
    display: inline-block;
    background-color: rgba(0, 230, 255, 0.8);
    text-align: center;
    padding: 5px 10px;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    color: rgba(255, 254, 254, .95);
    font-weight: bold;
    margin-right: 2%;
    border: none;
}
</style>

<div class="form">
    <form method="post" enctype="multipart/form-data" onsubmit="btn.disabled = true; return true;">
        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('title')?></label>
            </div>
            <div class="input">
                <input type="text" id="AliasCv" name="News[title]" class="txt-form" value="<?=htmlspecialchars($this->model->title)?>" />
                <?php if($this->model->getError('title')):?>
                    <div class="error"><?=$this->model->getError('title')?></div>
                <?php endif; ?>
            </div>
        </div>
         
        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('alias')?></label>
            </div>
            <div class="input">
                <input type="text" id="Alias" name="News[alias]" class="txt-form" value="<?=$this->model->alias?>" />
                <?php if($this->model->getError('alias')):?>
                    <div class="error"><?=$this->model->getError('alias')?></div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('cate_id')?></label>
            </div>
            <div class="input">
                <select name="News[cate_id]" class="sel-form">
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
                <?php if($this->model->getError('cate_id')):?>
                    <div class="error"><?=$this->model->getError('cate_id')?></div>
                <?php endif; ?>
            </div>
        </div> 
        
        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('image')?></label>
            </div>
            <div class="input">
                <a href="javascript:chooseImage()" id="ButtonUpload" class="Button" style="margin-left: 0px; width: 20%; float: left;">Choose image</a>
                <img id="ImageUpload" />
                <input type="text" id="ImageFilename" name="News[image]" class="txt-form" value="<?=$this->model->image?>" disabled="disabled" style="border: 0px !important; width: 38%; padding: 5px;" />
                <input id="ChooseFile" name="ImageUpload" type="file" style="display: none;" />
                <?php if($this->model->getError('ImageUpload')):?>
                    <div class="error"><?=$this->model->getError('ImageUpload')?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('source')?></label>
            </div>
            <div class="input">
                <input type="text" name="News[source]" class="txt-form" value="<?=htmlspecialchars($this->model->source)?>" />
                <?php if($this->model->getError('source')):?>
                    <div class="error"><?=$this->model->getError('source')?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('rate')?></label>
            </div>
            <div class="input">
                <select name="News[rate]" class="sel-form">
                    <?php foreach(Constant::$rate as $key => $value):?>
                        <option value="<?=$key?>" <?=$this->model->rate == $key ? 'selected="selected"' : ''?>>
                            <?=$value?>
                        </option>
                    <?php endforeach;?>
                </select>
                <?php if($this->model->getError('rate')):?>
                    <div class="error"><?=$this->model->getError('rate')?></div>
                <?php endif; ?>
            </div>
        </div>
         
        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('status')?></label>
            </div>
            <div class="input">
                <select name="News[status]" class="sel-form">
                    <?php foreach(Constant::$status as $key => $value):?>
                        <option value="<?=$key?>" <?=$this->model->status == $key ? 'selected="selected"' : ''?>>
                            <?=$value?>
                        </option>
                    <?php endforeach;?>
                </select>
                <?php if($this->model->getError('status')):?>
                    <div class="error"><?=$this->model->getError('status')?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('tags')?></label>
            </div>
            <div class="input">
                <textarea rows="3" class="txtare-form" name="News[tags]"><?=htmlspecialchars($this->model->tags)?></textarea>
                <?php if($this->model->getError('tags')):?>
                    <div class="error"><?=$this->model->getError('tags')?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('description')?></label>
            </div>
            <div class="input">
                <textarea rows="5" class="txtare-form" name="News[description]"><?=htmlspecialchars($this->model->description)?></textarea>
                <?php if($this->model->getError('description')):?>
                    <div class="error"><?=$this->model->getError('description')?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="controls">
            <div class="label">
                <label class="lbl-form" for=""><?=$this->model->getLabel('summary')?></label>
            </div>
            <div class="input">
                <textarea id="ckeditor" class="ckeditor txtare-form" name="News[summary]"><?=htmlspecialchars($this->model->summary)?></textarea>
                <?php if($this->model->getError('summary')):?>
                    <div class="error"><?=$this->model->getError('summary')?></div>
                <?php endif; ?>
            </div>
        </div>
                
        <div class="controls">
            <div class="label">&nbsp;</div>
            <div class="input">
                <input type="submit" class="Button" name="btn" value="Save" />
                <a href="<?=Fw::$baseUrl."/".Fw::$controller?>" class="Button">Back</a>
            </div>
        </div>
    </form>
    <script src="<?=FwBase::$baseUrl?>/../public/js/app.js"></script>
    <script src="<?=FwBase::$baseUrl?>/../public/js/ip.js"></script>
</div>