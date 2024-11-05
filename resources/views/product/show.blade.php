<x-app-layout title="جزئیات محصول">

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

        <h1 class="text-center fw-lighter">{{ $product->name }}</h1>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-11 col-sm-6">
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

        <div class="input-a">
            <label>کد محصول :</label>
            {{ $product->code }}
        </div>

        <div class="input-a">
            <label>برند :</label>
            {{ $product->brand }}
        </div>

        <div class="input-a">
            <label>مدل :</label>
            {{ $product->model }}
        </div>

        <div class="input-a">
            <label>ساخت :</label>
            {{ $product->made_in }}
        </div>

        <div class="input-a">
            <label>قیمت :</label>
            {{ number_format($product->price, 0, '.', '،') }}
            تومن
        </div>

        <div class="input-a">
            <label>موجودی :</label>
            {{ $product->stock_status == 'in-stock' ? 'موجود' : 'ناموجود' }}
        </div>

        <div class="input-a">
            <label>تعداد موجودی :</label>
            {{ $product->stock_quantity }}
        </div>

        @php
            $type = [
                '' => '',
                'corded' => 'رومیزی',
                'cordless' => 'بی‌سیم',
                'hybrid' => 'ترکیبی',
            ];
        @endphp
        <div class="input-a">
            <label>نوع :</label>
            {{ $type[$product->type] }}
        </div>

        @php
            $handsets = [
                '' => '',
                '1' => 'تک',
                '2' => 'دو',
                '3' => 'سه',
                '4' => 'چهار',
                '5' => 'پنج',
                '6' => 'شش',
            ];
        @endphp
        <div class="input-a">
            <label>تعداد گوشی :</label>
            {{ $handsets[$product->handsets] }}
            گوشی
        </div>

        @php
            $answer_system = [
                '' => '',
                '0' => 'بدون منشی',
                '1' => 'منشی دار',
            ];
        @endphp
        <div class="input-a">
            <label>منشی :</label>
            {{ $answer_system[$product->answer_system] }}
        </div>

        @php
            $boolean = [
                '' => '',
                '0' => 'خیر',
                '1' => 'بله',
            ];
        @endphp
        <div class="input-a">
            <label>پایه شماره گیر :</label>
            {{ $boolean[$product->base_dial_pad] }}
        </div>

        <div class="input-a">
            <label>منو فارسی :</label>
            {{ $boolean[$product->has_persian] }}
        </div>

        <div class="input-a">
            <label>بلوتوث :</label>
            {{ $boolean[$product->bluetooth] }}
        </div>

        <div class="input-a">
            <label>تعداد خط :</label>
            {{ $product->lines }}
        </div>

        @php
            $is_second_hand = [
                '' => '',
                '0' => 'نو',
                '1' => 'کارکرده',
            ];
        @endphp
        <div class="input-a">
            <label>وضعیت :</label>
            {{ $is_second_hand[$product->is_second_hand] }}
        </div>

        @php
            $box = [
                '' => '',
                '0' => 'ندارد',
                '1' => 'دارد',
            ];
        @endphp
        <div class="input-a">
            <label>کارتن :</label>
            {{ $box[$product->box] }}
        </div>

        <div class="input-a">
            <label>سلامت :</label>
            {{ $product->condition }}
        </div>

        <div class="input-a">
            <label>گرید :</label>
            {{ $product->grade }}
        </div>

        <div class="input-a">
            <label>توضیحات :</label>
            {{ $product->description }}
        </div>

        <hr/>
        <a class="btn btn-info w-100" href="{{ route('products.edit', ['product'=> $product]) }}">ویرایش</a>
        {{-- <a class="btn btn-danger w-100 mt-3" href="{{ route('products.delete', ['product'=> $product]) }}">حذف</a> --}}

        <a class="btn btn-danger w-100 mt-3" href="{{ route('products.destroy', ['id' => $product->id]) }}"
            onclick="event.preventDefault(); if (confirm('محصول حذف شود؟')) { document.getElementById('delete-product-{{ $product->id }}').submit(); }">
             حذف
         </a>
         
         <form id="delete-product-{{ $product->id }}" action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST" style="display: none;">
             @csrf
             @method('DELETE')
         </form>
         
    </div>
</x-app-layout>
