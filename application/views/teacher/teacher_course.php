
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">教师课表</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>教师课表</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>课程编号</th>
								  <th>课程名称</th>
								  <th>教师姓名</th>
								  <th>上课地点</th>
								  <th>上课时间</th>
								  <th>课程容量</th>
								  <th>查看名单</th>
							  </tr>
						  </thead>  
						  
						  <tbody>
						  
						  <?php foreach($teachercourse_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['c_id']; ?></td>
								<td class="center"><?php echo $item['c_coursename']; ?></td>
								<td class="center"><?php echo $item['t_username']; ?></td>
								<td class="center"><?php echo $item['cl_classroomname']; ?></td>
								<td class="center"><?php echo $item['ct_week']; ?>第<?php echo $item['ti_jie']; ?>节</td>
								<td class="center"><a href="javascript:;"><?php echo $item['ct_number']; ?></a></td>
								<td class="center"><a href="<?php echo site_url('teacher/main/student_show/'.$item['ct_id']); ?>">查看名单</a></td>
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

