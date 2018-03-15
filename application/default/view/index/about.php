<style>
.MainContent {
    margin-top: 30px;    
}
.Image_rounded {
    margin: 20px;
}
.ImageThumb {
    width: 200px;
    height: 200px;
}
</style>
<div class="MainContent">
    <div class="Image_rounded">
        <a href="javascript:chooseImage()" id="ButtonUpload" class="Button ButtonDefault">Choose image</a>
        <img id="ImageUpload" />
    </div>
    <form>
        <input id="ChooseFile" type="file" style="display: none;" />
        <input type="submit" value="Upload" class="Button ButtonDefault" />

        <input type="radio" name="aa" />
        <input type="radio" name="aa" checked="checked" />
        <input type="radio" name="aa" checked="checked" />
    </form>
    <script src="<?=FwBase::$baseUrl?>/public/js/ip.js"></script>
</div>