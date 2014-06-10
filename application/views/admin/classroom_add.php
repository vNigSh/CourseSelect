
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">课室管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">添加课室</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>课室添加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/classroom_add'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">课室名：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="cl_classroomname" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">课室容量：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="cl_seat" >
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




