
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">本专业选课</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>本专业课程信息</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>课程编号</th>
								  <th>课程名称</th>
								  <th>课程学分</th>
								  <th>课程介绍</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($course_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['c_id']; ?></td>
								<td class="center"><?php echo $item['c_coursename']; ?></td>
								<td class="center"><?php echo $item['c_credit']; ?></td>
								<td class="center"><?php echo $item['c_describe']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('student/main/select/'.$item['c_id']); ?>">选课</a>/
									<a href="<?php echo site_url('student/main/chooseinfo_delete/'.$item['c_id']); ?>">退选</a>
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

