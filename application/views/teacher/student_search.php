
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
							<tr>
								<td class="center">2010P0001</td>
								<td class="center">操作系统</td>
								<td class="center">叶佳航</td>
								<td class="center">教室一</td>
								<td class="center">星期一第1,2节，星期五第7,8节</td>
								<td class="center">140</td>
								<td><a href="student_show.html">查看</a></td>
							</tr>
							<tr>
								<td class="center">2010P0002</td>
								<td class="center">计算机网络</td>
								<td class="center">叶佳航</td>
								<td class="center">教室一</td>
								<td class="center">星期一第1,2节，星期五第7,8节</td>
								<td class="center">140</td>
								<td><a href="student_show.html">查看</a></td>
							</tr>
							
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

