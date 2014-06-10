
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">学生账号管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">学生信息编辑</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>学生信息编辑</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/student_change'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">学号：</label>
							  <div class="controls">
							  <?php echo $student_info[0]['s_id']; ?>
								<input type="hidden" name="s_id" value="<?php echo $student_info[0]['s_id']; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">姓名：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="s_username" value="<?php echo $student_info[0]['s_username']; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">专业：</label>
							  <div class="controls">
								  <select id="selectError3" name="s_subject">
									<?php foreach($subject_list as $item){ ?>
										<?php if($item['su_id']==$student_info[0]['s_subject']){ ?>
											<option value="<?php echo $item['su_id']; ?>" selected="selected"><?php echo $item['su_subjectname']; ?></option>
										<?php }else{ ?>
											<option value="<?php echo $item['su_id']; ?>"><?php echo $item['su_subjectname']; ?></option>
										<?php } ?>
									<?php } ?>
								  </select>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">年级：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="s_grade" value="<?php echo $student_info[0]['s_grade']; ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">班级：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="s_class" value="<?php echo $student_info[0]['s_class']; ?>">
							  </div>
							</div>
							<div class="form-actions">
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




