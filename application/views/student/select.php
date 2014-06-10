
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">本专业选课</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">选择课程</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>操作系统 课程信息</h2>
					</div>
					<div class="box-content">
					<form class="form-horizontal" action="<?php echo site_url('student/main/select'); ?>" method="post">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>课程编号</th>
								  <th>课程名称</th>
								  <th>教师姓名</th>
								  <th>上课地点</th>
								  <th>上课时间</th>
								  <th>可选余量</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($courseteacher_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['c_id']; ?></td>
								<td class="center"><?php echo $item['c_coursename']; ?></td>
								<td class="center"><?php echo $item['t_username']; ?></td>
								<td class="center"><?php echo $item['cl_classroomname']; ?></td>
								<td class="center"><?php echo $item['ct_week']; ?>第<?php echo $item['ti_jie']; ?>节</td>
								<td class="center"><?php echo $item['rest']; ?></td>
								<td class="center">
									<label>
										<input type="radio" name="ch_courseteacher" id="optionsRadios2" value="<?php echo $item['ct_id']; ?>" checked>
									</label>
								</td>
							</tr>
							<?php } ?>
						
						  </tbody>
					  </table>
					  <div class="form-actions">
						<button type="submit" class="btn btn-primary" style="float:right;">提交</button>
					 </div>	
					</form>
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

