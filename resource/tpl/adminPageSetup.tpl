<!-- messagebox -->
<div id="sdk_message_box" class="">
    <p><span></span></p>
</div>

<!--  print Validation Message -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><form id="photo_list_form">
<div class="table_header_area">
    <ul class="row_1">

        <li class="search">
	    	<span><input type="text" title="Filename or title" class="input_text" value="" id="ListKeyword" maxlength="250" /></span>
   		    <span><a href="#" onclick="javascript: window.location.href = '<?php echo usbuilder()->getUrl("adminPageSetup");?>&search=' + $('#ListKeyword').val();" class="btn_nor_01 btn_width_st1" title="Search Photo Gallery">Search</a></span>
		</li>  
		<li class="comment">
		    <a href="<?php echo usbuilder()->getUrl("adminPageSetup");?>" class="all selected" title="Show all images">All(<?php echo $itotal; ?>)</a></li>
    </ul>
	<ul class="row_2">
        <li>
		    <a href="#none" onclick="adminPageSetup.deletePopup();" class="btn_nor_01 btn_width_st1" title="Remove selected images">Remove</a>
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
      
    </colgroup>

    <thead>
	 <tr>
       <th class="chk"><input type="checkbox" class="input_chk chk_all" onchange="javascript: adminPageSetup.checkAll(this);"/></th>
       <th width="10px">No.</th>
       <th width="200px">Thumbnail</th>
       <th><a href="<?php echo usbuilder()->getUrl("adminPageSetup") .'&sortby=image_url&sort='.$catClass1 ;?>" class="<?php echo $filenameClass;?>">Filename</a></th>
       <th width="150px"><a href="<?php echo usbuilder()->getUrl("adminPageSetup") .'&sortby=title&sort='.$catClass1;?>" class="<?php echo $titleClass;?>">Title</a></th>
       <th width="150px"><a href="<?php echo usbuilder()->getUrl("adminPageSetup") .'&sortby=date_created&sort=' .$catClass1;?>" class="<?php echo $dateClass;?>">Date Created</a></th>

    </tr>
    </thead>
    <tbody>
    <?php if(!$aImageList){ ?>
       <tr class="event_mouse_over">
           <td colspan="7" align="center"> No record(s) found.</td>
       </tr>
    <?php }else{ ?>
    <?php $images = ""; foreach($aImageList as $key => $value): ?>
    <?php $images .=  $value['image_url'] . ",";?>
    	<tr class="event_mouse_over"> 
    	   
          <td><input type="checkbox" class="input_chk" name="checkThis" id="checkThis" value="<?php echo $value['idx'];?>" /></td>
          <td><?php echo $value['num']; ?></td>
          <td><div class="thmb_img fancybox.image"><a href="#none" onclick="javascript : adminPageSetup.fancyImage(<?php echo $key?>);" class="fancybox-thumb" rel="fancybox-thumb" ><img width="80px" title="View image" height="80px" src="<?php echo $value['image_url']; ?>" ></a></div></td>
          <td>
          	 <p><?php echo $value['image_url']; ?></p>
	         <p><?php echo $value['image_size']; ?></p>
	      </td>         
          <td><a href="#none" class="modifyThis" onclick="javascript: adminPageSetup.modifyThis(<?php echo $value['idx'];?>);" title="View Image Details"><?php echo $value['title'];?></a></td>
          <td><?php echo $value['date_created'];?></td>
       
    	  <input type="hidden" id="seq" name="seq" value="<?php echo $value['seq']; ?>" />
          <input type="hidden"  name="hidden_id" id="hidden_id_<?php echo $key?>" value="<?php echo $value['idx']; ?>" />
          <input type="hidden"  name="hidden_url" id="hidden_url_<?php echo $key?>"  value="<?php echo $value['image_url']; ?>" />
          <input type="hidden"  name="hidden_size" id="hidden_size_<?php echo $key?>" value="<?php echo $value['image_size']; ?>" />  
          <input type="hidden"  name="hidden_title" id="hidden_title_<?php echo $key?>" value="<?php echo $value['title']; ?>" />  
          <input type="hidden"  name="hidden_width" id="hidden_width_<?php echo $key?>" value="<?php echo $value['width']; ?>" />  
          <input type="hidden"  name="hidden_height" id="hidden_height_<?php echo $key?>" value="<?php echo $value['height']; ?>" />   
          <input type="hidden"  name="hidden_caption" id="hidden_caption_<?php echo $key?>" value="<?php echo $value['caption']; ?>" />   
          <input type="hidden"  name="hidden_date" id="hidden_date_<?php echo $key?>" value="<?php echo $value['date_created']; ?>" />       
        </tr>
            
	<?php endforeach;?>
	
	<?php } ?>

	<input type="hidden"  name="hidden_id" id="hidden_id" value="" />
	<input type="hidden"  name="hidden_images" id="hidden_images" value="<?php echo $images;?>" />
    </tbody>
</table>

    <div class="table_display_set">
    	<a href="#none" onclick="adminPageSetup.deletePopup();" class="btn_nor_01 btn_width_st1" title="Remove selected images">Remove</a>
    </div>
    
    <div class="pagination"><?php echo $sPagination;?></div>
</form>


<!--  
<form id="_photo_list_form" method="post">
    <input type="hidden" name="page" id="insert_page">
    <input type="hidden" name="insert_success" id="insert_success">
</form>
-->
<!-- layer big image
<div id="img_view_contents" class="ly_pht" style="display:none">
    <h4 class="lft" id="img_view_title"></h4>
    <div><img id="img_big" src="" alt="original image"/></div>
</div>
layer big image end -->

<!-- add image layer -->
<div id='fancybox_addimage_popup_contents' style='display:none'>
	<div class="admin_popup_contents">
		<div class="msg_warn_box">
			<p><span>Fill all fields.</span></p>
	    </div>
		   <!--<ul class="popup_nav">
				<li><a href="">From Computer</a></li>
				<li><a href="" class="active">From Media</a></li>
		   </ul>-->
		   <div class="sub_title" style="margin-top:20px;"><span>From Media</span></div>
		   <div class="add_form_wrap" style="margin-top:19px;">
			   <form name="fancybox_add" class="fancybox_add" method="post" enctype="multipart/form-data">
			        <input type="hidden" id="seq" name="seq" value="<?php echo $seq; ?>" />
					<table border="1" cellspacing="0" class="table_input_vr">
						<colgroup>
							<col width="20%" />
							<col width="80%" />
						</colgroup>
						<tr>
							<th>URL</th>
							<td class="move"> <input id="fancybox_imageurl" name="fancybox_imageurl" style="width:20px;" type="text" value="" fw-filter="isFill&isUrl" fw-label="Image_url" />		
							</td>
						</tr>
						<tr>
							<th>Title</th>
							<td class="move"> <input id="fancybox_imagetitle" name="fancybox_imagetitle" style="width:20px;" type="text" value="" fw-filter="isFill&isLengthRange[1][100]" fw-label="Image_title" />		
							</td>
						</tr>
						<tr>
							<th>Image Caption</th>
							<td class="move"><textarea id="fancybox_imagecaption" /></textarea>		
							</td>
						</tr>
						<tr>
							<th>Dimension</th>
							<td>
								<p style="margin-bottom:10px"><label style="width:90px;display:inline-block" for="fancybox_imagewidth">Width</label><input type="text" id="fancybox_imagewidth" name="fancybox_imagewidth" style="width:200px !important;margin-right:10px !important" value="" fw-filter="isFill&isNumber" fw-label="Image_width" /></p>
								<p style=""><label style="width:90px;display:inline-block" for="fancybox_imagewidth">Height</label><input type="text" id="fancybox_imageheight" name="fancybox_imageheight" style="width:200px !important;margin-right:10px !important" value="" fw-filter="isFill&isNumber" fw-label="Image_height" /></p>
							</td>
						</tr>
						
						<tr>
							<td colspan="2" style="text-align:center"><a class="btn_nor_01 btn_width_st1" href="javascript: void(0);" style='cursor:pointer;display:inline-block' title="Add Image" onclick="javascript: adminPageSetup.addImage();"> Add </a></td>
						</tr>
					</table>
			   </form>
		</div>
		<a id="id_close_popup" class="clse" title="popup close" onclick="addonMedia.close()" href="#none">X</a> 		
	</div> 
</div> 

<!-- end of add image layer -->

<!-- delete image layer -->
<div id="validation_message" class="msg_warn_box" style="display:none"></div><div id='fancybox_delete_popup_contents' style='display:none'>
   <div class="admin_popup_contents">
      Are you sure you want to delete this entry?<br /><br />
      <a class="btn_nor_01 btn_width_st1" href="javascript: void(0);" style='cursor:pointer' title="Delete" onclick="javascript: adminPageSetup.deleteCheckedvalues();"> Delete </a>
   </div>
</div>  
    
<!-- delete image layer -->


<!-- modify image layer -->
<div id='fancybox_modifyimage_popup_contents' style='display:none'>
	<div class="admin_popup_contents">
		<div class="msg_warn_box">
			<p><span>Fill all fields.</span></p>
	    </div>
		   <div class="modify_form_wrap">
			   <form name="fancybox_modify" class="fancybox_modify" method="post" enctype="multipart/form-data">
			    <input type="hidden" id="seq" name="seq" value="<?php echo $seq; ?>" />
					<table border="1" cellspacing="0" class="table_input_vr">
						<colgroup>
							<col width="20%" />
							<col width="80%" />
						</colgroup>
						<tr>
							<th>File</th>
							<td class="move">
								<span class="modi_img_wrap" id="realimage" ></span>
								<ul class="image_detail_wrap">
									<li ><p id="imageURL"> </p></li>
									<li id="filetype"></li>
									<li id="upload_date"></li>
									<li id="size"></li>
									<li id="dimension" ></li>
								</ul>
							</td>
						</tr>
						<tr>
							<th>Title</th>
							<td class="move"> <input type="text" id="imagetitle" name="imagetitle" style="width:20px;"  value="" fw-filter="isFill&isLengthRange[1][50]" fw-label="Image_title" />		
							</td>
						</tr>
						<tr>
							<th>Caption</th>
							<td class="move"> <input type="text" id="imagecaption" name="imagecaption" style="width:20px;"  value=""  fw-filter="isFill&isLengthRange[1][50]" fw-label="Image_caption" />		
							</td>
						</tr>
						<tr>
							
							<td colspan="2" style="text-align:center"><input type="hidden" id="hidden_idx" name="hidden_idx" value="" /><a class="btn_nor_01 btn_width_st1 btn_popup_fix" href="javascript: void(0);" style='cursor:pointer' title="Modify Image" onclick="javascript: adminPageSetup.modify();"> Modify </a></td>
						</tr>
					</table>
			   </form>
		</div> 
	</div> 
</div> 


