<div class="msg_warn_box">
			<p><span>Fill all fields.</span></p>
	    </div>
		   <!--<ul class="popup_nav">
				<li><a href="">From Computer</a></li>
				<li><a href="" class="active">From Media</a></li>
		   </ul>-->
		   <div class="sub_title"><span>From Media</span></div>
		   <div class="add_form_wrap">
			   <form name="fancybox_add" class="fancybox_add" method="post" enctype="multipart/form-data">
					<table border="1" cellspacing="0" class="table_input_vr">
						<colgroup>
								<col width="115px" />
								<col width="*" />
						</colgroup>
						<tr>
							<th>URL</th>
							<td class="move"> <input id="text" name="fancybox_imagerul" style="width:20px;" type="text" maxlength="2" value="" fw-filter="isFill&isUrl" fw-label="Image_url" />		
							</td>
						</tr>
						<tr>
							<th>Title</th>
							<td class="move"> <input id="text" name="fancybox_imagertitle" style="width:20px;" type="text" maxlength="2" value="" fw-filter="isFill&isLengthRange[1][50]" fw-label="Image_title" />		
							</td>
						</tr>
						<tr>
							<th>Image Caption</th>
							<td class="move"> <input id="text" name="fancybox_imagercaption" style="width:20px;" type="text" maxlength="2" value="" fw-filter="isFill" fw-label="Image_caption" />		
							</td>
						</tr>
						<tr>
							<td colspan="2" style="border:1px solid red"><a class="btn_nor_01 btn_width_st1" href="javascript: void(0);" style='cursor:pointer' title="Add Image" onclick="javascript: adminPageSetup.addImage();"> Add </a></td>
						</tr>
					</table>
			   </form>
		</div> 