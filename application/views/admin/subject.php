
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">专业课程管理</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>专业课程管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>课程编号</th>
								  <th>课程名称</th>
								  <th>所属专业</th>
								  <th>课程学分</th>
								  <th>课程介绍</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
							<?php foreach($course_list as $item){ ?>
								<td class="center"><?php echo $item['c_id']; ?></td>
								<td class="center"><?php echo $item['c_coursename']; ?></td>
								<td class="center"><?php echo $item['su_subjectname']; ?></td>
								<td class="center"><?php echo $item['c_credit']; ?></td>							
								<td class="center"><?php echo $item['c_describe']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/course_change/'.$item['c_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/course_delete/'.$item['c_id']); ?>" onclick="return confirm('确认删除?');">删除</a>/<a href="<?php echo site_url('admin/main/class_add/'.$item['c_id']); ?>">添加班级</a>
								</td>
							</tr>
							<?php } ?>
							
						  </tbody>
					  </table>  
						<p class="center">
							<a href="<?php echo site_url('admin/main/course_add'); ?>" class="btn btn-large btn-primary visible-desktop" style="float:left;margin-bottom:20px;">课程添加</a>
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


