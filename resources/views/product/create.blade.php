<x-app-layout title="محصول جدید">

    <div class="container col-11 col-sm-8 mt-4 ">

        @if ($errors->any())
            <div class="alert bg-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-center fw-lighter">محصول جدید</h1>

        <form method="POST" id="productForm" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group input-a">
                <label for="code">کد محصول</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}"
                    required>
            </div>

            <div class="form-group input-a">
                <label for="name">عنوان</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                    required>
            </div>

            <div class="form-group input-a">
                <label for="brand">برند</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}"
                    list="brand-names" required>

                <datalist id="brand-names">
                    <option value="پاناسونیک">پاناسونیک</option>
                    <option value="زیمنس">زیمنس</option>
                </datalist>
            </div>

            <div class="form-group input-a">
                <label for="model">شماره مدل</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ old('model') }}">
            </div>
            
            <div class="form-group input-a">
                <label for="made_in">ساخت</label>
                <input type="text" class="form-control" id="made_in" name="made_in" value="{{ old('made_in') }}">
            </div>

            <div class="form-group input-a">
                <label for="price">قیمت</label>
                <input type="text" class="form-control" id="price" name="formatted_price" value="{{number_format(old('price'), 0, '.', '،')}}" required>

                <input type="hidden" id="hidden-price" name="price" value="{{number_format(old('price'), 0, '.', '')}}" required>
            </div>

            <div class="form-group input-a">
                <label for="stock_status">موجودی</label>
                <select class="form-control" id="stock_status" name="stock_status" required>
                    <option value="in-stock">موجود</option>
                    <option value="out-of-stock">ناموجود</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="stock_quantity">تعداد موجودی</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                    value="{{ old('stock_quantity') }}" min="0" max="50">
            </div>

            <div class="form-group input-a">
                <label for="type">نوع</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="cordless">بیسیم</option>
                    <option value="corded">رومیزی</option>
                    <option value="hybrid">ترکیبی</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="handsets">تعداد گوشی</label>
                <select class="form-control" id="handsets" name="handsets" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="answer_system">منشی دار</label>
                <input type="checkbox" id="answer_system" name="answer_system">
            </div>

            <div class="form-group input-a">
                <label for="base_dial_pad">پایه شماره گیر</label>
                <input type="checkbox" id="base_dial_pad" name="base_dial_pad">
            </div>

            <div class="form-group input-a">
                <label for="has_persian">منو فارسی</label>
                <input type="checkbox" id="has_persian" name="has_persian">
            </div>

            <div class="form-group input-a">
                <label for="bluetooth">بلوتوث</label>
                <input type="checkbox" id="bluetooth" name="bluetooth">
            </div>

            <div class="form-group input-a">
                <label for="lines">تعداد خط</label>
                <select class="form-control" id="lines" name="lines" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="is_second_hand">وضعیت محصول</label>
                <select class="form-control" id="is_second_hand" name="is_second_hand" required>
                    <option value="1">کارکرده</option>
                    <option value="0">نو</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="box">کارتن</label>
                <input type="checkbox" id="box" name="box">
            </div>

            <div class="form-group input-a">
                <label for="condition">سلامت کالا</label>
                <select class="form-control" id="condition" name="condition">
                    <option value="سالم">سالم</option>
                    <option value="خراب">خراب</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="grade">گرید</label>
                <select class="form-control" id="grade" name="grade">
                    <option value=""></option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="description">توضیحات</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            </div>


            <div class="form-group input-a">
                <label for="image">عکس</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn mt-4 w-100 button-a">ثبت</button>
        </form>

        <!-- JavaScript code to format price input -->
        <script>
            $(document).ready(function() {
                // Select the price input field
                var priceInput = $('#price');
                // Select the hidden input field
                var hiddenPriceInput = $('#hidden-price');

                // Listen for input events on the price input field
                priceInput.on('input', function() {
                    // Get the current value of the price input field
                    var value = $(this).val();

                    // Remove any non-digit characters from the value
                    var numericValue = value.replace(/\D/g, '');

                    // Format the numeric value with thousand separator
                    var formattedValue = numericValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "،");

                    // Update the value of the price input field with the formatted value
                    $(this).val(formattedValue);
                    // Update the value of the hidden input field with the raw numeric value
                    hiddenPriceInput.val(numericValue);
                });
            });
        </script>

    </div>
</x-app-layout>