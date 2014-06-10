
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">专业课程管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">添加班级</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>课程班级添加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/class_add'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">课程编号：</label>
							  <div class="controls">
								<?php echo $course_info[0]['c_id']; ?>
								<input type="hidden" name="ct_course_id" value="<?php echo $course_info[0]['c_id']; ?>" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">课程名称：</label>
							  <div class="controls">
								<?php echo $course_info[0]['c_coursename']; ?>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">教师姓名：</label>
							  <div class="controls">
									 <select id="selectError3" name="ct_teacher_id">
									<?php foreach($teacher_list as $item){ ?>
										<option value="<?php echo $item['t_id']; ?>"><?php echo $item['t_username']; ?></option>
									<?php } ?>
								  </select>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">上课地点：</label>
							  <div class="controls">
								  <select id="selectError3" name="ct_classroom_id">
									<?php foreach($classroom_list as $item){ ?>
										<option value="<?php echo $item['cl_id']; ?>"><?php echo $item['cl_classroomname']; ?></option>
									<?php } ?>
								  </select>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">上课时间：</label>
							   	<div class="controls">
									  <select name="ct_week">
										<?php foreach($week_list as $key=>$value){ ?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php } ?>
									  </select>
								</div>
							</div>
							
							
						
							<div class="control-group">
							  <label class="control-label" for="typeahead"></label>
							   <div class="controls">
								  <select name="ct_time_id">
									<?php foreach($time_list as $item){ ?>
										<option value="<?php echo $item['ti_id']; ?>">第<?php echo $item['ti_jie']; ?>节</option>
									<?php } ?>
								  </select>
								</div>
							</div>
							
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">班级容量：</label>
							  <div class="controls">
									<input type="text" class="span6 typeahead" name="ct_number" value="60">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">添加</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->   
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->



