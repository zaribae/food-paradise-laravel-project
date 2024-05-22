<input type="hidden" id="cartTotal" value="{{ cartTotalPrice() }}">
<input type="hidden" id="cartCount" value="{{ count(Cart::content()) }}">

@foreach (Cart::content() as $cartProduct)
    <li>
        <div class="menu_cart_img">
            <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="{{ $cartProduct->name }}"
                class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title"
                href="{{ route('product.show', $cartProduct->options->product_info['slug']) }}">{{ $cartProduct->name }}</a>

            <p class="size">{{ @$cartProduct->options->product_sizes['name'] }}
                {{ @$cartProduct->options->product_sizes['price'] ? '(' . currencyPosition(@$cartProduct->options->product_sizes['price']) . ')' : '' }}
            </p>
            @foreach ($cartProduct->options->product_options as $productOption)
                <span class="extra">{{ @$productOption['name'] }}
                    {{ @$productOption['price'] ? '(' . currencyPosition(@$productOption['price']) . ')' : '' }}
                </span>
            @endforeach
            <p class="price">Quantity : {{ $cartProduct->qty }}</p>
            <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
        </div>
        <span class="del_icon" onclick="removeProductFromCart('{{ $cartProduct->rowId }}')"><i
                class="fal fa-times"></i></span>
    </li>
@endforeach
