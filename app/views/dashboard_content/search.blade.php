<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="content-panel search-test-panel">
			<h3 class="text-center profile-text">Registred Companies List</h3>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>company_id</th>
						<th>company_name</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($companies as $company)
						<tr data-link="/company/{{$company["id"]}}">
							<td>
								{{$company["id"]}}
							</td>
							<td>
								{{$company["name"]}}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>