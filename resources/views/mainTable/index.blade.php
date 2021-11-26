@extends('layouts.mainTable')

@section('content')

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Find Your Best Property </h1>
					<p>Easy to buy & sell your property with our Finderland, <br>Top Class Property</p>
				</div>
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
	<!-- Container End -->
</section>


<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>All Categories</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eaque nostrum illum sequi facere quas!</p>
				</div>
                <div class="row">
                    @foreach ($categories_all->take(8) as $category_all)
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                            <div class="category-block">
                                {{-- <div class="top-image">
                                    <img src="/images/home/bg.jpg" alt="" class="img img-fluid">
                                </div> --}}
                                <div class="header">
                                    <i class="{{ $category_all->icon }} icon-bg-{{ $category_all->id }}"></i>
                                    <h4>
                                        <a href="{{ route('category', [$category_all->id]) }}">{{ $category_all->name }} <p style="display: inline">({{ $category_all->companies->count() }})</p></a>

                                    </h4>
                                </div>
                                <ul class="category-list">
                                    @foreach ( $category_all->companies->shuffle()->take(4) as $singleCompany)
                                        <li><a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> <!-- /Category List -->
                    @endforeach
                </div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--==========================================
=            Property Section            =
===========================================-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section title -->
				<div class="section-title">
					<h2>Latest Property For Sale</h2>
					<p>Proprietary technology, latest market data and strong real <br> estate expertise allow us to reach potential buyers and present <br> tem with a well-priced.</p>
				</div>
                <div class="row">
                    @foreach ($company as $key => $c)
                    <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-1 col-sm-12 col-12">
                        <a href="{{ route('company', [$c->id]) }}">
                            <div class="card property-block">
                                <div class="card-top">
                                    <img src="{{ asset('storage/'.$c->logo->id.'/'.$c->logo->file_name) }}" alt="" class="img img-fluid">
                                    @if($c->logo)

                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="price">{{ $c->name }}</h5>
                                    <p class="address">{{ $c->address }}</p>
                                </div>
                                <div class="card-footer pt-3 pb-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <h4 class="text-center">
                                                <img src="https://img.icons8.com/fluency-systems-regular/20/000000/bed.png"/> <span class="bed font-weight-bold">{{ $c->bedrooms }}</span>
                                                <br>
                                                Bedrooms
                                            </h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-center">
                                                <img src="https://img.icons8.com/ios/20/000000/bath.png"/> <span class="bath font-weight-bold">{{ $c->bathrooms }}</span>
                                                <br>
                                                Bathrooms
                                            </h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-center">
                                                <img src="/images/icons/selection.png"/> <span class="area font-weight-bold">{{ $c->area }}m<sup>2</sup></span>
                                                <br>
                                                Living Area
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


@stop
