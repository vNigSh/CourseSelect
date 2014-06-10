
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">教师账号管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">添加教师账号</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>教师账号添加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/teacher_add'); ?>" method="post">
						  <fieldset>
						  <!--
							<div class="control-group">
							  <label class="control-label" for="typeahead">学号：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" >
							  </div>
							</div>
							-->
							<div class="control-group">
							  <label class="control-label" for="typeahead">姓名：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="t_username">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">专业：</label>
							  <div class="controls">
								  <select id="selectError3" name="t_subject">
									<?php foreach($subject_list as $item){ ?>
										<option value="<?php echo $item['su_id']; ?>"><?php echo $item['su_subjectname']; ?></option>
									<?php } ?>
								  </select>
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




