			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="subject.html">管理员管理</a><span class="divider">/</span>
					</li>
					<li>
						<a href="">添加管理员帐号</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>管理员账号添加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/admin_add'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">姓名：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="a_username" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">密码：</label>
							  <div class="controls">
								<input type="password" class="span6 typeahead" name="a_password" >
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





