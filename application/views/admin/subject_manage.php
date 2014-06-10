
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">专业管理</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>专业管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>专业名</th>								  
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  
						  <?php foreach($subject_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['su_id']; ?></td>
								<td class="center"><?php echo $item['su_subjectname']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/subject_change/'.$item['su_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/subject_delete/'.$item['su_id']); ?>" onclick="return confirm('确认删除？');">删除</a>
								</td>
							</tr>
						<?php } ?>
							
						  </tbody>
					  </table>  

						<p class="center">
							<a href="<?php echo site_url('admin/main/subject_add'); ?>" class="btn btn-large btn-primary visible-desktop" style="float:left;margin-bottom:20px;">专业添加</a>
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

