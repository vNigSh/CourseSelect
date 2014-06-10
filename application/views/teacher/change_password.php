
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">资料修改</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">修改密码</a>
					</li>
				</ul>
			</div>
			
<style>
.controls{display:inline;}
.box-content{text-align:center;}
.form-horizontal .control-label{float:none;}
.form-horizontal .controls{margin-left:20px;}
.form-horizontal .form-actions{padding-left:0;}
.form-horizontal .form-actions{text-align:center;}
label{display:inline;}
</style>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>修改密码</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('teacher/main/change_password'); ?>" method="post">
							<fieldset>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">请输入原密码</label>
								<div class="controls">
								  <input type="password" id="inputWarning" name="old_password">
								  <span class="help-inline"></span>
								</div>
							  </div>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">请输入新密码</label>
								<div class="controls">
								  <input type="password" id="inputWarning" name="new_password">
								  <span class="help-inline"></span>
								</div>
							  </div>
							  <div class="control-group warning">
								<label class="control-label" for="inputWarning">请确认新密码</label>
								<div class="controls">
								  <input type="password" id="inputWarning" name="new_password2">
								  <span class="help-inline"></span>
								</div>
							  </div>
							  
							</fieldset>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">提交</button>
							  </div>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			

    
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

