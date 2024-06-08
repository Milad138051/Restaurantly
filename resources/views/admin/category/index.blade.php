@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی ها</title>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دسته بندی ها</h3>
                    <a href="{{ route('admin.category.create') }}" class="btn btn-info btn-sm"> ایجاد </a>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>وضعیت</th>
                                <th style="width: 258px">tools</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $key => $i)
                            <tr>
                                <th>{{$key + 1}}</th>
                                <td>{{$i->name ?? '-'}}</td>

                                   
                                   <td>
                                       <label>
                                           <input id="{{ $i->id }}-status" onchange="changeStatus({{ $i->id }})" data-url="{{ route('admin.category.status', $i->id) }}" type="checkbox" @if ($i->status === 1)
                                           checked
                                                   @endif>
                                       </label>
                                   </td>
                                   
                               <td class="width-22-rem text-left">
                                   <a href="{{route('admin.category.edit',$i)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline" action="{{route('admin.category.destroy',$i)}}" method="post">
                                           @csrf
                                           {{ method_field('delete') }}
                                           <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                   </form>
                               </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
                <section class="col-12">
                    <section class="my-4 d-flex justify-content-center">
                        <nav>
                            {{ $categories->links('pagination::bootstrap-5') }}
                        </nav>
                    </section>
                </section>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        function sweetalertStatusSuccess(msg) {
            $(document).ready(function() {
                Swal.fire({
                    title: msg,
                    text: 'عملیات با موفقیت ذخیره شد',
                    icon: 'success',
                    confirmButtonText: 'باشه',
                });
            });
        }

        function sweetalertStatusError(msg) {
            $(document).ready(function() {
                Swal.fire({
                    title: msg,
                    text: 'هنگام ویرایش مشکلی بوجود امده است',
                    icon: 'error',
                    confirmButtonText: 'باشه',
                });
            });
        }
    </script>

    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id + '-status')
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            // successToast('ایتم با موفقیت فعال شد')
                            sweetalertStatusSuccess('ایتم با موفقیت فعال شد')

                        } else {
                            element.prop('checked', false);
                            // successToast('ایتم با موفقیت غیر فعال شد')
                            sweetalertStatusSuccess('ایتم با موفقیت غیر فعال شد')

                        }
                    } else {
                        element.prop('checked', elementValue);
                        // errorToast('هنگام ویرایش مشکلی بوجود امده است')
                        sweetalertStatusError('هنگام ویرایش مشکلی بوجود امده است')

                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    // errorToast('ارتباط برقرار نشد')
                    sweetalertStatusError('ارتباط برقرار نشد')

                }
            });

            function sweetalertStatusSuccess(msg) {
                $(document).ready(function() {
                    Swal.fire({
                        title: msg,
                        text: 'عملیات با موفقیت ذخیره شد',
                        icon: 'success',
                        confirmButtonText: 'باشه',
                    });
                });
            }

            function sweetalertStatusError(msg) {
                $(document).ready(function() {
                    Swal.fire({
                        title: msg,
                        text: 'هنگام ویرایش مشکلی بوجود امده است',
                        icon: 'error',
                        confirmButtonText: 'باشه',
                    });
                });
            }

        }
    </script>



    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
