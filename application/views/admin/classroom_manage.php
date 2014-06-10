
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">课室管理</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>课室信息管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>课室名</th>
								  <th>课室容量</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($classroom_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['cl_id']; ?></td>
								<td class="center"><?php echo $item['cl_classroomname']; ?></td>
								<td class="center"><?php echo $item['cl_seat']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/classroom_change/'.$item['cl_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/classroom_delete/'.$item['cl_id']); ?>" onclick="return confirm('确定删除？');">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>  

						<p class="center">
							<a href="<?php echo site_url('admin/main/classroom_add'); ?>" class="btn btn-large btn-primary visible-desktop" style="float:left;margin-bottom:20px;">课室添加</a>
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

