
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">查看名单</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>查看名单</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>学生学号</th>
								  <th>学生姓名</th>
								  <th>专业</th>
								  <th>年级</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($chooseinfo_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['s_id']; ?></td>
								<td class="center"><?php echo $item['s_username']; ?></td>
								<td class="center"><?php echo $item['su_subjectname']; ?></td>
								<td class="center"><?php echo $item['s_grade']; ?>级<?php echo $item['s_class']; ?>班</td>
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

