		
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a>
					</li>
				</ul>
			</div>
		
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>资讯管理</h2>
					</div>
					<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>发布时间</th>
								  <th>标题</th>
								  <th>发布人</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php foreach($news_list as $item){ ?>
							<tr>
								<td class="center"><?php echo $item['n_id']; ?></td>
								<td class="center"><?php echo date('Y-m-d H:i:s',$item['n_addtime']); ?></td>
								<td class="center"><a href="<?php echo site_url('admin/main/article_detail/'.$item['n_id']); ?>"><?php echo $item['n_title']; ?><a></td>
								<td class="center"><?php echo $item['a_username']; ?></td>
								<td class="center">
									<a href="<?php echo site_url('admin/main/article_change/'.$item['n_id']); ?>">修改</a>/<a href="<?php echo site_url('admin/main/article_delete/'.$item['n_id']); ?>" onclick="return confirm('确定删除？');">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>  
					  	<p class="center">
								<a href="<?php echo site_url('admin/main/article_add'); ?>" class="btn btn-large btn-primary visible-desktop" style="float:left;margin-bottom:20px;">添加</a>
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


