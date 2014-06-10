
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">专业课程管理</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>课程编辑</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/course_change'); ?>" method="post">
						  <fieldset>
						  <!--
							<div class="control-group">
							  <label class="control-label" for="typeahead">课程编号：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" >
							  </div>
							</div>
							-->
							<div class="control-group">
							  <label class="control-label" for="typeahead">课程名称：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="c_coursename" value="<?php echo $course_info[0]['c_coursename']; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">学分：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="c_credit" value="<?php echo $course_info[0]['c_credit']; ?>">
							  </div>
							</div>
							<!--
							<div class="control-group">
							  <label class="control-label" for="typeahead">学期：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" >
							  </div>
							</div>
							-->
							  <div class="control-group">
								<label class="control-label" for="selectError3">专业：</label>
								<div class="controls">
								  <select id="selectError3" name="c_subject">
									<?php foreach($subject_list as $item){ ?>
										<?php if($item['su_id']==$course_info[0]['c_subject']){ ?>
										<option value="<?php echo $item['su_id']; ?>" selected="selected"><?php echo $item['su_subjectname']; ?></option>
										<?php }else{ ?>
										<option value="<?php echo $item['su_id']; ?>"><?php echo $item['su_subjectname']; ?></option>
										<?php } ?>
									<?php } ?>
								  </select>
								</div>
							  </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">课程描述：</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="c_describe"><?php echo $course_info[0]['c_describe']; ?></textarea>
							  </div>
							</div>
							<div class="form-actions">
								<input type="hidden" name="c_id" value="<?php echo $course_info[0]['c_id']; ?>">
							  <button type="submit" class="btn btn-primary">修改</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->   
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->



