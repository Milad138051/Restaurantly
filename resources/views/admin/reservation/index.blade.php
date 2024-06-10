@extends('admin.layouts.master')

@section('head-tag')
<title>رزرو شده ها</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> رزرو شده ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    رزرو شده ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="#" class="btn btn-info btn-sm disabled">ایجاد </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
							<th>ایمیل</th>
							<th>نام</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach($rervations as $key => $rervation)

                        <tr>	
                            <th>{{ $key += 1 }}</th>
                            <td>{{$rervation->email}}</td>
                            <td>{{$rervation->name}}</td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.reservation.show',$rervation->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> نمایش</a>
                            </td>
                        </tr>
						@endforeach
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
