
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">专业管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">专业信息编辑</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>专业信息编辑</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/subject_change'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">专业名：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="su_subjectname" value="<?php echo $subject_info[0]['su_subjectname']; ?>">
								<input type="hidden" name="su_id" value="<?php echo $subject_info[0]['su_id']; ?>">
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




