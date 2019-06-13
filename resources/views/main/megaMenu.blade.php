<div class="col-sm-12 no-padding no-margin" style="background: #9afdd0; margin-top: -0.25em !important;">
	<nav class="navbar navbar-default navbar-static pull-right no-margin">
	    <div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		
		</div>
		
		<div class="collapse navbar-collapse js-navbar-collapse">
			<ul class="nav navbar-nav">
			<li class="dropdown dropdown-large">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting<b class="caret"></b></a>
					
					<ul class="dropdown-menu dropdown-menu-large row col-sm-12"  style="background: #9afdd0; color: #222;">
						<li class="col-sm-3">
							<ul>
                                <li class="dropdown-header">User role & permission</li>
								<li><a href="{{ route('system.user.index') }}" title="create system user">Users</a></li>
								<li>
								  <a href="{{ route('system.role.index') }}" title="create system role">Roles</a>
								 </li>
								<li><a href="{{ route('system.permission.index') }}" title="create access permission">Permission</a></li>

								<li><a href="{{ route('system.staff.index') }}" title="create staff details">staff details</a></li>

								<li><a href="{{ route('system.department.index') }}" title="create department">Department</a></li>
								<li><a href="{{ route('system.designations.index') }}" title="staff Designation post">Designation</a></li>


								<li class="dropdown-header">Main setting</li>
								<li><a href="{{ route('system.country.index') }}" title="create title">
								country</a></li>
								<li>
								   <a href="{{ route('system.provinces.index') }}" title="create provinces details">Provinces</a>
							    </li>
								<li><a href="{{ route('system.company.index') }}">Company</a></li>

								<li><a href="{{ route('system.fiscalYear.index') }}">Fiscal Year</a></li>

								<li><a href="{{ route('system.paymentSattlement.index') }}" title="set payment due days">set payment date</a></li>

								<li>
								   <a href="{{ route('system.vandorType.index') }}">Suppliers Type</a>
							    </li>

								<li>
								   <a href="{{ route('system.customerType.index') }}">Customer Type</a>
							    </li>

							    <li>
								   <a href="{{ route('system.requisitionType.index') }}" title="create requisition type">Requisition Type</a>
							    </li>

							    <li>
								   <a href="{{ route('system.ComVandor.index') }}" title="create list of vandor(Supplier)">Vandor</a>
							    </li>

							     <li>
								   <a href="{{ route('system.customer.index') }}" title="create list of customer">Customer</a>
							    </li>
                                <!-- agent  -->
							</ul>
						</li>
					
						<!--  -->
						<li class="col-sm-3">
							<ul>
								<li class="dropdown-header">Product Item</li>
							    <li>
								   <a href="{{ route('system.productItems.index') }}" title="create product Items">Product Items</a>
							    </li>

							    <li>
								   <a href="{{ route('system.productItems.index') }}" title="create product">Products</a>
							    </li>

							    <li class="dropdown-header">Machine</li>
								<li>
								   <a href="{{ route('system.machineType.index') }}" title="set Machine type">Machine Type</a>
							    </li>

							    <li>
								   <a href="{{ route('system.machine.index') }}" title="create machine">Machine</a>
							    </li>


								<li class="dropdown-header">Materials</li>
								<li>
								   <a href="{{ route('system.materialType.index') }}" title="set materials type">Materials Type</a>
							    </li>

								<li>
								   <a href="{{ route('system.material.index') }}" title="create materials">Materials</a>
							    </li>
                                
								<li class="dropdown-header">QA<small>Quality Assurance</small></li>
								<li>
								   <a href="{{ route('system.qaMaterials.index') }}" title="set QA materials">QA materials</a>
							    </li>
								<li class="dropdown-header">Store</li>
								<li>
								   <a href="{{ route('system.comBranch.index') }}" title="create company branch">Branch</a>
							    </li>
							</ul>
						</li>

						<li class="col-sm-3">
							<ul>
								<li class="dropdown-header">Packaging</li>
                                
                                	<li>
                                	   <a href="{{ route('system.packagingBox.index') }}" title="create packaging box">Box</a>
                                    </li>

								<li>
								   <a href="{{ route('system.packagingUnit.index') }}" title="create Packaging unit">Packaging Unit</a>
							    </li>

							    <li>
								   <a href="#" title="create Packaging">Package</a>
							    </li>

							     <li class="dropdown-header">Transport Details</li>
							     <li>
								   <a href="{{ route('system.courierDetails.index') }}" title="create courier Details">Courier Details</a>
							    </li>
							    <!--  -->

							    <li>
								   <a href="{{ route('system.routeTransport.index') }}" title="define route for import goods">Route</a>
							    </li>

							    <!--  -->
							    <li>
								   <a href="{{ route('system.tankerDetail.index') }}" title="define tanker details">Tanker Details</a>
							    </li>

							</ul>
						</li>

						<li class="col-sm-3">
							<ul>
							    <li class="dropdown-header">Stock Level</li>
                        		<li><a href="{{ route('system.stockLevelType.index') }}" title="create stock level type">Stock level Type</a></li>

                        		<li><a href="{{ route('system.stockLevel.index') }}" title="create all stock level">Stock level</a></li>

								<li class="dropdown-header">Asset</li>

								<li>
								   <a href="{{ route('system.assetType.index') }}" title="create assets type">Asset Type</a>
							    </li>
							</ul>

							<ul>
								<li class="dropdown-header">Unit</li>

								<li>
								   <a href="{{ route('system.sysUnit.index') }}" title="create unit">Define Unit</a>
							    </li>

							    <li>
								   <a href="{{ route('system.conversion.index') }}" title="create unit Conversion">Unit Conversion</a>
							    </li>

							    <li class="dropdown-header">Agent</li>

                        		<li><a href="{{ route('system.agentType.index') }}" title="create agent types">Agent Types</a></li>
                        		
                        		<li><a href="{{ route('system.myAgent.index') }}" title="create agent">Agent</a></li>
                        		
							</ul>
					   </li>
					</ul>
				</li>
				<!--  -->
				<li class="dropdown dropdown-large">
					<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Finances<b class="caret"></b></a>
					
					<ul class="dropdown-menu dropdown-menu-large row" style="background: #9afdd0;">
						<li class="col-sm-6">
							<ul>
								<li class="dropdown-header">Account</li>
									<li>
									   <a href="{{ route('system.accountHead.index') }}" title="create account head">Create Account Head</a>
								    </li>

								    <li>
									   <a href="{{ route('system.accountGroup.index') }}" title="create account group">Create Account Group</a>
								    </li>

								    <li>
									   <a href="{{ route('system.sysAccount.index') }}" title="create accounts">Account</a>
								    </li>

								    <li>
									   <a href="{{ route('system.paymentType.index') }}" title="set payment type either cash credit bank">Payment Type</a>
								    </li>

								    <li>
									   <a href="{{ route('system.expense.index') }}" title="Create Expenses title">Expenses Title</a>
								    </li>

									<li>
									   <a href="{{ route('system.currency.index') }}" title="set different countries currency">Currency</a>
								    </li>

								    <li>
								       <a href="{{ route('system.paymentSattlement.index') }}" title="payment due date">Payment Due Days</a></li>
									<li>
								<li><a href="{{ route('system.vandorType.index') }}">Vandor Type</a></li>
								<li><a href="#">Sales Type</a></li>

							    <li>
								   <a href="{{ route('system.productItems.index') }}">Product Items</a>
							    </li>

								<li>
							       <a href="{{ route('system.tax.index') }}" title="set up tax group">Tax Group</a>
								 </li>

								<li><a href="{{ route('system.salesDiscount.index') }}">Sales Discount Parameter</a></li>
	            
							</ul>
						</li>
						<li class="col-sm-6">
							<ul>
								<li class="dropdown-header">Account Setting</li>
								<li>
								   <a href="{{ route('system.bank.index') }}" title="create Bank Details">Bank</a>
							    </li>
							    
								<li><a href="{{ route('system.purchaseOrder.index') }}" title="List of all purchase order">List</a></li>
								<li><a href="{{ route('system.purchaseOrder.index') }}" title="create new purchase order">Create</a></li>
<!-- 
								<li><a href="#" title="create letter of credit">Create LOC</a></li>
								<li class="divider"></li> -->
							</ul>
						</li>

						
					</ul>
				</li>

				<!--MIS  -->
                 			<li class="dropdown dropdown-large">
                 				<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">MIS / Inventory<b class="caret"></b></a>
                 				
                 				<ul class="dropdown-menu dropdown-menu-large row col-sm-12" style="background: #9afdd0;">
                 					<li class="col-sm-4">
                 						<ul>
                 							<li class="dropdown-header">Packaging</li>
                 							    <li>
                 								   <a href="{{ route('system.dailyPackaging.create') }}" title="Create item daily packaging">Create Daily Packaging</a>
                 							    </li>
                 								<li>
                 								   <a href="{{ route('system.dailyPackaging.index') }}" title="list of all daily packaging">View Daily Packaging</a>
                 							    </li>
                 						</ul>
                 					</li>
                 					<li class="col-sm-4">
                 						<ul>
                 							<li class="dropdown-header">QA<small>Quality Assurance</small></li>
                 							<li><a href="{{ route('system.qualityAssurance.index') }}" title="List of all checked QA Materials">List</a></li>
                 							<li><a href="#" title="create new QA for purchase order">Create</a></li>
                 							<li><a href="#" title="">on panding</a></li>
                 							<li class="dropdown-header">Button dropdowns</li>
                 						</ul>
                 					</li>

                 					<li class="col-sm-4">
                                          <ul>
                                          	<li class="dropdown-header">Panda</li>
                                          	</ul>
                 					</li>
                 				</ul>
                 			</li>
                 <!--  -->
                 <!-- purchase -->
                    			<li class="dropdown dropdown-large">
                    				<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Purchase<b class="caret"></b></a>
                    				
                    				<ul class="dropdown-menu dropdown-menu-large row col-sm-12" style="background: #9afdd0;">
                    					<li class="col-sm-4">
                    						<ul>
                    							<li class="dropdown-header">Purchase Requisition<small>-create views</small></li>
			      						    	<li>
			      						    	   <a href="{{ route('system.purchaseRequisition.index') }}" title="view all requisition">List of all Requisation</a>
			      						        </li>
			          							<li>
			          							   <a href="{{ route('system.purchaseRequisition.create') }}" title="create new purchase requisition">Create Requisation</a>
			          						    </li>


			      						        <li>
			      						    	   <a href="{{ route('system.purchaseRequisition.index') }}" title="view all rejected requisition">Draft Requisation</a>
			      						        </li>

			      						         <li>
			      						    	   <a href="{{ route('system.purchaseRequisition.index') }}" title="check all requisition data">Check Requisation</a>
			      						        </li>

			      						        <li>
			      						    	   <a href="{{ route('system.purchaseRequisition.index') }}" title="All authorized data">Authoirized Requisation</a>
			      						        </li>
                    						</ul>
                    					</li>
                    					<li class="col-sm-4">
                    						<ul>
                    							<li class="dropdown-header">Purchase Order</li>
                    							<li>
                    							     <a href="{{ route('system.purchaseOrder.index') }}" title="list of purchase order">
                    							     List
                    							     <small>Purchase order list</small></a>
                    							</li>

                    							<li><a href="{{ route('system.purchaseOrder.create') }}" title="Create purchase order">
                    							Create 
                    							<small>Create purchase order</small></a></li>

                    							<li class="dropdown-header">Button dropdowns</li>
                    						</ul>
                    					</li>

                    					<li class="col-sm-4">
                                             <ul>
                                             	<li class="dropdown-header">Panda</li>
                                             	</ul>
                    					</li>
                    				</ul>
                    			</li>
                 <!-- purchase -->
          			<li class="dropdown dropdown-large">
          				<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Sales<b class="caret"></b></a>
          				
          				<ul class="dropdown-menu dropdown-menu-large row col-sm-12" style="background: #9afdd0;">
          					<li class="col-sm-4">
          						<ul>
          						

          							<li class="dropdown-header">Sales<small>Sales History</small></li>
          							    <li>
          								   <a href="{{ route('system.salesOrders.index') }}" title="list of sales order">Sales order list</a>
          							    </li>

          							    <li>
          								   <a href="{{ route('system.salesOrders.create') }}" title="create new sales order">Create sales order</a>
          							    </li>

          							     <li>
          								   <a href="{{ route('system.accountGroup.index') }}" title="create account group">Sales invoice</a>
          							    </li>

          							

          							<li><a href="{{ route('system.salesDiscount.index') }}">Sales Discount Parameter</a></li>
                      
          						</ul>
          					</li>
          					<li class="col-sm-4">
          						<ul>
          							<li class="dropdown-header">Sales History</li>
          							<li><a href="{{ route('system.bank.index') }}" title="create bank details">sales notification</a></li>

          							<li><a href="#" title="create letter of credit">Create LOC</a></li>
          							<li class="dropdown-header">Button dropdowns</li>
          						</ul>
          					</li>

          					<li class="col-sm-4">
          						<ul>
          							<li class="dropdown-header">Sales History</li>
          							<li><a href="{{ route('system.bank.index') }}" title="create bank details">sales notification</a></li>

          							<li><a href="#" title="create letter of credit">Create LOC</a></li>
          							<li class="dropdown-header">Button dropdowns</li>
          						</ul>
          					</li>
          				</ul>
          			</li>

	      
	      <li class="dropdown dropdown-large">
			  <a href="{{ route('system.productItems.index') }}" title="items product">Items-<small>Product</small></a>
	      </li>

	      <li class="dropdown dropdown-large">
			  <a href="{{ route('system.productItems.index') }}" title="Purchase order">Purchase order-<small>PO</small></a>
	      </li>

	      <li class="dropdown dropdown-large">
			  <a href="{{ route('system.productItems.index') }}" title="dispatch order">Dispatch order-<small>DO</small></a>
	      </li>
	     

				<li class="dropdown dropdown-large" style="padding-top: 7px;">
				   <button class="btn btn-info" title="Refresh system" onclick="location.reload()">
				    	<i class="fa fa-refresh" aria-hidden="true"></i>
				   </button>
	           </li>

	           <li class="dropdown dropdown-large" style="padding-top: 7px;">
				   <button class="btn btn-success" title="Home page">
				    	 <a href="{{ route('system.admin') }}">
				    	   <i class="fa fa-home" aria-hidden="true"></i>
				    	   </a>
				   </button>
	           </li>

	           <li class="dropdown dropdown-large" style="padding-top: 7px;">
				   <button class="btn btn-danger" title="System logout">
	           <a href="{{ route('system.logout') }}">
				    	<i class="fa fa-sign-out" aria-hidden="true"></i>
			   </a>
				   </button>
	           </li>
	      </ul>
		</div><!-- /.nav-collapse -->
	</nav>
</div>
