@extends('admin.layouts.master')


@section('head-tag')
    <title>دسته بندی ها</title>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">ویرایش دسته بندی ها</h3>
                </div>

                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                        <a href="{{ route('admin.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                    </section>

                    <form action="{{route('admin.category.update',$category)}}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="name">نام </label> 
                            <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name',$category->name) }}">
                            @error('name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">توضیحات </label>
                            <textarea type="text" name="description" id="description" class="form-control form-control-sm">{{ old('description',$category->description) }}</textarea>
                            @error('description')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label for="status">وضعیت</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="1" @if(old('status',$category->status) == 1) selected @endif>فعال</option>
                                <option value="0" @if(old('status',$category->status) == 0) selected @endif>غیرفعال</option>
                            </select>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </div>

                        <button type="submit" class="btn btn-success text-white">ثبت</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

<script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('description');
</script>

@endsection

