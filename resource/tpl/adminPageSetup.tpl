                <!-- messagebox -->
                <div id="message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><form id="photo_list_form">
<div class="table_header_area">
    <ul class="row_1">

        <li class="search">
	    	<input type="text" title="Filename or title" class="input_text" value="" id="ListKeyword" maxlength="250" />
   		    <a href="javascript:addonLists.listSearchButton();" class="btn_nor_01 btn_width_st1" title="Search Photo Gallery">Search</a>
		</li>  
		<li class="comment">
		    <a href="/admin/sub/?module=PhotogalleryPageSeqImages&seq=1&status=all&order_index=photo_appearance&order_type=asc" class="all selected" title="Show all images">All(4)</a></li>
    </ul>
	<ul class="row_2">
        <li>
		    <a href="#none" onclick="modulePhotogallerySeqImages.deletePopup();" class="btn_nor_01 btn_width_st1" title="Remove selected images">Remove</a></li>                <li class="show">
		    <label for="show_row">Show Rows</label>
		    <select id="show_row">
		        <option value="10">10</option>
		        <option value="20">20</option>
		        <option value="30">30</option>
		
		        <option value="50">50</option>
		        <option value="100">100</option>
		    </select>
		</li>                		   
    </ul>
</div>
<!-- table horizontal -->
<table border="0" cellpadding="0" cellspacing="0" class="table_hor_02 photo_list">
    <colgroup>
        <col width="44px" />

        <col width="44px" />
        <col width="128px" />
        <col width="200px" />
        <col />
        <col width="120px" />
        <col width="125px" />
    </colgroup>

    <thead>

    <tr>
        <th class="chk"><input type="checkbox" title="" class="input_chk" onclick="modulePhotogalleryGallery.checkbox(this)" /></th>
        <th>No.</th>
        <th>Thumbnail</th>
        <th><a href="#" id="photo_file" >Filename</a></th>
        <th><a href="#" id="photo_title"  >Title</a></th>
        <th><a href="#" id="photo_created">Created</a></th>

        <th><a href="#" id="photo_appearance">Appearance</a></th>
    </tr>
    </thead>
    <tbody>
	    <tr onmouseover="this.className='over'" onmouseout="this.className=''"  >
	        <td><input type="checkbox" title="" value="5" name="aListCheck[]"  class="input_chk"/></td>
	        <td>4</td>
	        <td><div class="thmb_img"><a href="#none"><img width="80px" title="View image" height="80px" src="/_attach/2011/11/18/media/image/5563abec5bc05a26ad493b7e6177b3fbf04c0b48_thumb.png" onclick="modulePhotogalleryGallery.larger('/_attach/2011/11/18/media/image/5563abec5bc05a26ad493b7e6177b3fbf04c0b48.jpg','The Road Taken','749 x 524')"></a></div></td>
	
	        <td class="table_subtitle">
	            <p>outside1.jpg</p>
	            <p>749 x 524</p>
	        </td>
	        <td class="table_subtitle">
	            <a href="#none" title="Edit image" onclick="modulePhotogalleryGallery.edit('58','5')">The Road Taken</a>
	                    </td>
	
	        <td>11/18/2011</td>
	        <td>1</td>
	    </tr>
    </tbody>
</table>
<div class="table_display_set">
    <a href="#none" onclick="modulePhotogallerySeqImages.deletePopup();" class="btn_nor_01 btn_width_st1" title="Remove selected images">Remove</a></div><div class="tbl_btom_rgt">
    <a href="#none" onclick="modulePhotogallerySeqImages.Change();" class="btn_nor_01 btn_width_st2" title="Rearrange images">Rearrange</a></div><div class="pagination"><span title="Previous">prev</span>&nbsp;<a href="/admin/sub/?module=PhotogalleryPageSeqImages&seq=1&page=1" style="" class="current" title="">1</a>&nbsp;<span title="Next">next</span></div></form>

<form id="_photo_list_form" method="post">
    <input type="hidden" name="page" id="insert_page">
    <input type="hidden" name="insert_success" id="insert_success">
</form>

<!-- layer big image -->
<div id="img_view_contents" class="ly_pht" style="display:none">
    <h4 class="lft" id="img_view_title"></h4>
    <div><img id="img_big" src="" alt="original image"/></div>
</div>
<!-- layer big image end -->

<!-- add image layer -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><div id='fancybox_addimage_popup_contents' style='display:none'>
	<div class="admin_popup_contents">
       <form class="espnnews_save" name="espnnews_save" id="espnnews_save" method="POST">
        <table border="1" cellspacing="0" class="table_input_vr">
        <colgroup>
                <col width="115px" />
                <col width="*" />
        </colgroup>
        <tr>
			<th>URL</th>
			<td class="move"> <input id="text" name="pg_espn_display_limit" style="width:20px;" type="text" maxlength="2" value="" />		
			</td>
        </tr>
		<tr>
			<th>Title</th>
			<td class="move"> <input id="text" name="pg_espn_display_limit" style="width:20px;" type="text" maxlength="2" value="" />		
			</td>
        </tr>
		<tr>
			<th>Image Caption</th>
			<td class="move"> <input id="text" name="pg_espn_display_limit" style="width:20px;" type="text" maxlength="2" value="" />		
			</td>
        </tr>
        </table>
       <a class="btn_nor_01 btn_width_st1" href="javascript: void(0);" style='cursor:pointer' title="Delete" onclick="javascript: adminPageSetup.addImage();"> Delete </a>
     </div>
</div> 










