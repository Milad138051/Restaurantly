@extends('admin.layouts.master')

@section('head-tag')
    <title>پنل مدیریت</title>
@endsection

@section('content')
    <div class="container-fluid">
{{-- 
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $allUsers }}<sup style="font-size: 20px"></sup></h3>

                        <p>کاربران ثبت شده</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $adminUsers }}<sup style="font-size: 20px"></sup></h3>

                        <p>ادمین های ثبت شده</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $normalUsers }}</h3>

                        <p>کاربران عادی ثبت شده</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $allOrders }}</h3>

                        <p>تمام سفارشات</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $allPosts }}</h3>

                        <p>تمام پست ها</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $onlinePayments }}</h3>

                        <p>پرداخت های انلاین</p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $inProgressOrders }}<sup style="font-size: 20px"></sup></h3>

                        <p>سفارشات در اتظار تایید</p>
                    </div>
                </div>
            </div>


            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $submitedOrders }}<sup style="font-size: 20px"></sup></h3>

                        <p>سفارشات تایید شده</p>
                    </div>
                </div>
            </div>

            <!-- ./col -->
        </div> --}}
        <!-- /.row -->
        {{-- <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $allCategoriesPost }}<sup style="font-size: 20px"></sup></h3>

                        <p>تمام دسته بندی های پست ها</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $allCategoriesProducts }}</h3>

                        <p>تمام دسته بندی های محصولات</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $allProducts }}<sup style="font-size: 20px"></sup></h3>

                        <p>تمام محصولات</p>
                    </div>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $allPayments }}</h3>

                        <p>پرداخت های ثبت شده</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $allOrders }}</h3>

                        <p>تمام سفارشات</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $normalUsers }}</h3>

                        <p>کاربران عادی ثبت شده</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $adminUsers }}<sup style="font-size: 20px"></sup></h3>

                        <p>ادمین های ثبت شده</p>
                    </div>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $allUsers }}<sup style="font-size: 20px"></sup></h3>

                        <p>کاربران ثبت شده</p>
                    </div>
                </div>
            </div>

            <!-- ./col -->
        </div> --}}
        <!-- /.row -->


        {{-- //latest orders --}}
        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">جدید ترین سفارشات ثبت شده</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>کد سفارش</th>
                                    <th>مجموع مبلغ سفارش (بدون تخفیف)</th>
                                    <th>مبلغ نهایی</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>شیوه پرداخت</th>
                                    <th>وضعیت سفارش</th>
                                    <th>تاریخ ثبت سفارش</th>
                                </tr>
                                @foreach ($latestOrders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_final_amount }} تومان</td>
                                        <td>{{ $order->order_final_amount - $order->order_discount_amount }} تومان</td>
                                        <td>{{ $order->delivery->name }}</td>
                                        <td>{{ $order->payment_type_value }}</td>
                                        <td>{{ $order->order_status_value }}</td>
                                        <td>{{ jalaliDate($order->created_at) }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div> --}}

        {{-- <div class="row"> --}}
          {{-- //latest users --}}
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-header no-border">
                        <h3 class="card-title">جدید ترین کاربران ثبت شده</h3>
                        <div class="card-tools">
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fa fa-download"></i>
                            </a>
                            <a href="#" class="btn btn-tool btn-sm">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>ایمیل</th>
                                    <th>شماره تلفن</th>
                                    <th>تاریخ ثبت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestUsers as $user)
                                    <tr>
                                        <td>{{ $user->email ?? '-' }}</td>
                                        <td>{{ $user->mobile ?? '-' }}</td>
                                        <td>{{ jalaliDate($user->created_at) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            {{-- //latest products --}}
            {{-- <div class="col-lg-6">
              <div class="card">
                  <div class="card-header no-border">
                      <h3 class="card-title">جدید ترین محصولات ثبت شده</h3>
                      <div class="card-tools">
                          <a href="#" class="btn btn-tool btn-sm">
                              <i class="fa fa-download"></i>
                          </a>
                          <a href="#" class="btn btn-tool btn-sm">
                              <i class="fa fa-bars"></i>
                          </a>
                      </div>
                  </div>
                  <div class="card-body p-0">
                      <table class="table table-striped table-valign-middle">
                          <thead>
                              <tr>
                                  <th>نام کالا</th>
                                  <th>نام دسته</th>
                                  <th>تصویر کالا</th>
                                  <th>تاریخ ثبت کالا</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($latestProducts as $product)
                                  <tr>
                                      <td>{{ $product->name ?? '-' }}</td>
                                      <td>{{ $product->category->name ?? '-' }}</td>
                                      <td>
                                          <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                              width="100" height="115">
                                      </td>
                                      <td>{{ jalaliDate($product->created_at) }}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div> --}}



    </div>
@endsection
