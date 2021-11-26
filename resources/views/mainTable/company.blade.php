@extends('layouts.mainTable')

@section('content')

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search">
					<form action="{{ route('search') }}" method="GET">

						<div class="form-row">
							<div class="form-group col-md-4">
								<input type="text" name="search" value="{{ old('search') }}" class="form-control" placeholder="Search property" />
								<p class="help-block"></p>
								@if($errors->has('name'))
									<p class="help-block">
										{{ $errors->first('name') }}
									</p>
								@endif
							</div>
							<div class="form-group col-md-3">
								<select name="categories" class="form-control form-control-lg" placeholder="Category">
									@foreach ($search_categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
									@endforeach
								</select>
								<p class="help-block"></p>
								@if($errors->has('categories'))
									<p class="help-block">
										{{ $errors->first('categories') }}
									</p>
								@endif
							</div>
							<div class="form-group col-md-3">
								<select name="city_id" class="form-control form-control-lg" placeholder="City">
									@foreach ($search_cities as $city)
										<option value="{{ $city->id }}">{{ $city->name }}</option>
									@endforeach
								</select>
								<p class="help-block"></p>
								@if($errors->has('city_id'))
									<p class="help-block">
										{{ $errors->first('city_id') }}
									</p>
								@endif
							</div>

							<div class="form-group col-md-2">
								<button type="submit"
										class="btn btn-main">
									Search Now
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">{{ $company->name }}</h1>
					<div class="product-meta">
						<ul class="list-inline">
                            @foreach ($company->categories as $singleCategories)
                                <li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="{{ route('category', [$singleCategories->id]) }}">
                                        <span class="label label-info label-many">{{ $singleCategories->name }}</span>
                                </a></li>
                            @endforeach
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="{{ route('search', ['city_id' => $company->city->id]) }}">{{ $company->city->name }}</a></li>
						</ul>
					</div>
                    <br>
                    <div class="col-md-4">
                        @if($company->logo)
							<a href="{{ asset('storage/'.$company->logo->id.'/'.$company->logo->file_name) }}" target="_blank">
								<img src="{{ asset('storage/'.$company->logo->id.'/'.$company->logo->file_name) }}" width="200">
							</a>
						@endif
                    </div>
					<div class="content">
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">About this property</h3>
								<p>{{ $company->description}}</p>
							</div>
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Where to find</h3>
								<p>{{ $company->address}}</p>
							</div>
						</div>
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-4">
                                    <h4 class="text-center">
                                        <img src="https://img.icons8.com/fluency-systems-regular/20/000000/bed.png"/> <span class="bed font-weight-bold">{{ $company->bedrooms }}</span>
                                        <br>
                                        Bedrooms
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-center">
                                        <img src="https://img.icons8.com/ios/20/000000/bath.png"/> <span class="bath font-weight-bold">{{ $company->bathrooms }}</span>
                                        <br>
                                        Bathrooms
                                    </h4>
                                </div>
                                <div class="col-4">
                                    <h4 class="text-center">
                                        <img src="/images/icons/selection.png"/> <span class="area font-weight-bold">{{ $company->area }}m<sup>2</sup></span>
                                        <br>
                                        Living Area
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <a href="https://api.whatsapp.com/send?phone={{ $company->phone }}&text=Saya%20tertarik%20untuk%20membeli%20{{ $company->name }}%20yang%20beralamat%20di%20{{ $company->address }}%20dengan%20harga%20Rp{{ $company->price }}%20ini%20segera." class="btn btn-success mx-auto mt-5" target="_blank"><i class="fab fa-whatsapp-square"></i> WhatsApp</a>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<!-- User Profile widget -->
					<div class="widget user">
						<h4>Other properties in this category</h4>
                        @foreach ($company->categories as $singleCategories)
                            @foreach ($singleCategories->companies->shuffle()->take(10) as $singleCompany)
                            <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name }}</a></li>
                            @endforeach
                        @endforeach
					</div>
					<!-- Map Widget -->
				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
</section>

@stop
