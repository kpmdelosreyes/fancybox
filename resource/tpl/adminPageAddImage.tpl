<div class="ly_set ly_noti_wid" id="photo_delete_popup_contents" style="display:none">
    <form method="post" action="<?php echo usbuilder()->getUrl("adminPageAddImage");?>" id="photogallery_delete_form">
    <input type="hidden" name="photogallery_delete_list" value="">
    <input type="hidden" name="seq" value="1">
        <p>You selected <span id="photo_del_num"></span> image(s).</p>
        <p>Are you sure<br /> you want to delete the image(s)?</p>

        <div class="ly_cnt_btn"><a href="javascript:modulePhotogallerySeqImages.Del('photogallery_delete_form')" class="btn_ly" title="Remove">Remove</a></div>
    </form>
</div>