<x-app-layout title="ویرایش">

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

        <h1 class="text-center fw-lighter">ویرایش محصول</h1>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8 col-sm-6">
                <!-- Square Image -->
                @if ($product->image_path)
                    <img src="{{ asset('/images/products/' . $product->image_path) }}" class="img-fluid rounded-square"
                        alt="Product Image">
                @else
                    <!-- Placeholder Image -->
                    <img src="https://placehold.co/400" class="img-fluid rounded-square" alt="Placeholder Image">
                @endif
            </div>
        </div>

        <form method="POST" id="productForm" action="{{ route('products.update', ['product'=>$product]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group input-a">
                <label for="code">کد</label>
                <input type="text" class="form-control" id="code" name="code" value="{{ $product->code }}"
                    required>
            </div>

            <div class="form-group input-a">
                <label for="name">عنوان</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"
                    required>
            </div>

            <div class="form-group input-a">
                <label for="brand">برند</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand }}"
                    list="brand-names" required>

                <datalist id="brand-names">
                    <option value="پاناسونیک">پاناسونیک</option>
                    <option value="زیمنس">زیمنس</option>
                </datalist>
            </div>

            <div class="form-group input-a">
                <label for="model">شماره مدل</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $product->model }}">
            </div>

            <div class="form-group input-a">
                <label for="made_in">ساخت</label>
                <input type="text" class="form-control" id="made_in" name="made_in" value="{{ $product->made_in }}">
            </div>

            <div class="form-group input-a">
                <label for="price">قیمت</label>
                <input type="text" class="form-control" id="price"  name="formatted_price" value="{{number_format($product->price, 0, '.', '،')}}" required>

                <input type="hidden" id="hidden-price" name="price" value="{{number_format($product->price, 0, '.', '')}}" required>
            </div>

            <div class="form-group input-a">
                <label for="stock_status">موجودی</label>
                <select class="form-control" id="stock_status" name="stock_status" required>
                    <option value="in-stock" {{ $product->stock_status == 'in-stock' ? 'selected' : '' }}>موجود</option>
                    <option value="out-of-stock" {{ $product->stock_status == 'out-of-stock' ? 'selected' : '' }}>ناموجود</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="stock_quantity">تعداد موجودی</label>
                <input type="number" class="form-control" id="stock_quantity" name="stock_quantity"
                    value="{{ $product->stock_quantity }}" min="0" max="50">
            </div>

            <div class="form-group input-a">
                <label for="type">نوع</label>
                <select class="form-control" id="type" name="type" required>
                    <option value="cordless" {{ $product->type == 'cordless' ? 'selected' : '' }} >بیسیم</option>
                    <option value="corded" {{ $product->type == 'corded' ? 'selected' : '' }} >رومیزی</option>
                    <option value="hybrid" {{ $product->type == 'hybrid' ? 'selected' : '' }} >ترکیبی</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="handsets">تعداد گوشی</label>
                <select class="form-control" id="handsets" name="handsets" required>
                    <option value="1" {{ $product->handsets == '1' ? 'selected' : '' }} >1</option>
                    <option value="2" {{ $product->handsets == '2' ? 'selected' : '' }} >2</option>
                    <option value="3" {{ $product->handsets == '3' ? 'selected' : '' }} >3</option>
                    <option value="4" {{ $product->handsets == '4' ? 'selected' : '' }} >4</option>
                    <option value="5" {{ $product->handsets == '5' ? 'selected' : '' }} >5</option>
                    <option value="6" {{ $product->handsets == '6' ? 'selected' : '' }} >6</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="answer_system">منشی دار</label>
                <input type="checkbox" id="answer_system" name="answer_system" {{ $product->answer_system == '1' ? 'checked' : '' }} >
            </div>

            <div class="form-group input-a">
                <label for="base_dial_pad">پایه شماره گیر</label>
                <input type="checkbox" id="base_dial_pad" name="base_dial_pad" {{ $product->base_dial_pad == '1' ? 'checked' : '' }} >
            </div>

            <div class="form-group input-a">
                <label for="has_persian">منو فارسی</label>
                <input type="checkbox" id="has_persian" name="has_persian" {{ $product->has_persian == '1' ? 'checked' : '' }} >
            </div>

            <div class="form-group input-a">
                <label for="bluetooth">بلوتوث</label>
                <input type="checkbox" id="bluetooth" name="bluetooth" {{ $product->bluetooth == '1' ? 'checked' : '' }} >
            </div>

            <div class="form-group input-a">
                <label for="lines">تعداد خط</label>
                <select class="form-control" id="lines" name="lines" required>
                    <option value="1" {{ $product->lines == '1' ? 'selected' : '' }} >1</option>
                    <option value="2" {{ $product->lines == '2' ? 'selected' : '' }} >2</option>
                    <option value="3" {{ $product->lines == '3' ? 'selected' : '' }} >3</option>
                    <option value="4" {{ $product->lines == '4' ? 'selected' : '' }} >4</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="is_second_hand">وضعیت محصول</label>
                <select class="form-control" id="is_second_hand" name="is_second_hand" required>
                    <option value="1" {{ $product->is_second_hand == '1' ? 'selected' : '' }} >کارکرده</option>
                    <option value="0" {{ $product->is_second_hand == '0' ? 'selected' : '' }}>نو</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="box">کارتن</label>
                <input type="checkbox" id="box" name="box" {{ $product->box == '1' ? 'checked' : '' }} >
            </div>

            <div class="form-group input-a">
                <label for="condition">سلامت کالا</label>
                <select class="form-control" id="condition" name="condition">
                    <option value="سالم" {{ $product->condition == 'سالم' ? 'selected' : '' }}>سالم</option>
                    <option value="خراب" {{ $product->condition == 'خراب' ? 'selected' : '' }}>خراب</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="grade">گرید</label>
                <select class="form-control" id="grade" name="grade">
                    <option value=""></option>
                    <option value="A+" {{ $product->grade == 'A+' ? 'selected' : '' }} >A+</option>
                    <option value="A" {{ $product->grade == 'A' ? 'selected' : '' }} >A</option>
                    <option value="B" {{ $product->grade == 'B' ? 'selected' : '' }} >B</option>
                    <option value="C" {{ $product->grade == 'C' ? 'selected' : '' }} >C</option>
                </select>
            </div>

            <div class="form-group input-a">
                <label for="description">توضیحات</label>
                <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
            </div>


            <div class="form-group input-a">
                <label for="image">عکس</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn mt-4 w-100 button-a">بروز رسانی</button>
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