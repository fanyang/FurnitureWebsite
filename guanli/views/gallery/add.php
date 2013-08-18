
<?php echo form_open_multipart('gallery/do_upload');?>

<input type="file" name="userfile" size=50 /><br />
<input type="text" name="title" style="width: 300px;" /> 图片标题<br />
<input type="submit" name="submit" value="上传" />

</form>

<hr />
<p>图片限制小于10M</p>
<p>系统自动生成400*300缩略图</p>