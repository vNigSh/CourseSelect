
			
			<div id="content" class="span10">
			<!-- content starts -->
			

			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">/</span>
					</li>
					<li>
						<a href="article_add.html">资讯添加</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2> 添加</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo site_url('admin/main/article_add'); ?>" method="post">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">标题：</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="n_title">
							  </div>
							</div>
       
							<div class="control-group">
							  <label class="control-label" for="textarea2">内容：</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3" name="n_content"></textarea>
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">添加</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->   
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->




