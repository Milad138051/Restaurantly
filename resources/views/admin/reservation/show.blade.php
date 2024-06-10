@extends('admin.layouts.master')

@section('head-tag')
<title>نمایش رزرو ها</title>
@endsection

@section('content')


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش رزرو
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.reservation.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header text-black bg-custom-yellow">
				 {{$reservation->name}}  
				 با کد رزرو : {{$reservation->id}}  
                </section>
				
                <section class="card-body">
                    <h5 class="card-title">موبایل : {{ $reservation->mobile }}</h5>
                    <h5 class="card-title">ایمیل : {{ $reservation->email }}</h5>
                    <h5 class="card-title">تعداد نفر : {{ $reservation->number }}</h5>
                    <h5 class="card-title">ثبت شده برای تاریخ : {{ $reservation->date }}</h5>
                    <p class="card-text">{{$reservation->description}}</p>
                </section>
            </section>

        </section>
    </section>
</section>

@endsection
