
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">教师账号管理</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>教师信息管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>工号</th>
								  <th>姓名</th>
								  <th>专业</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($teacher_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['t_id']; ?></td>
								<td class="center"><?php echo $item['t_username']; ?></td>
								<td class="center"><?php echo $item['su_subjectname']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/teacher_change/'.$item['t_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/teacher_delete/'.$item['t_id']); ?>" onclick="return confirm('确认删除？');">删除</a>
								</td>
							</tr>
							<?php } ?>
							
						  </tbody>
					  </table>  

						<p class="center">
							<a href="<?php echo site_url('admin/main/teacher_add'); ?>" class="btn btn-large btn-primary visible-desktop" style="float:left;margin-bottom:20px;">教师账号添加</a>
						</p>						  

						<div class="my_pagination">
					<?php echo $page_links; ?>
					</div>
					</div>
				</div>
			</div>
			 
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
		<hr>

