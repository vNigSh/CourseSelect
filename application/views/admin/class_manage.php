
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">班级管理</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>班级管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>课程编号</th>
								  <th>课程名称</th>
								  <th>所属专业</th>
								  <th>学分</th>
								  <th>上课时间</th>
								  <th>上课地点</th>
								  <th>上课教师</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
							<?php foreach($courseteacher_list as $item){ ?>
								<td class="center"><?php echo $item['c_id']; ?></td>
								<td class="center"><?php echo $item['c_coursename']; ?></td>
								<td class="center"><?php echo $item['su_subjectname']; ?></td>
								<td class="center"><?php echo $item['c_credit']; ?></td>							
								<td class="center"><?php echo $item['ct_week']; ?>第<?php echo $item['ti_jie']; ?>节</td>							
								<td class="center"><?php echo $item['cl_classroomname']; ?></td>							
								<td class="center"><?php echo $item['t_username']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/class_change/'.$item['ct_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/class_delete/'.$item['ct_id']); ?>" onclick="return confirm('确认删除?');">删除</a>
								</td>
							</tr>
							<?php } ?>
							
						  </tbody>
					  </table>  
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


