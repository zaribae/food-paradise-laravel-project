<div class="tab-pane fade " id="v-pills-messages2" role="tabpanel" aria-labelledby="v-pills-messages-tab2">
    <div class="fp_dashboard_body">
        <h3>wishlist</h3>
        <div class="fp__dashoard_wishlist">

            <div class="row">
                @foreach (@$wishlists as $wishlist)
                    <div class="col-xl-4 col-sm-6 col-lg-6">
                        <div class="fp__menu_item">
                            <div class="fp__menu_item_img">
                                <img src="{{ @$wishlist->product->thumbnail_image }}" alt="menu"
                                    class="img-fluid w-100">
                                <a class="category" href="">{{ @$wishlist->product->productCategory->name }}</a>
                            </div>
                            <div class="fp__menu_item_text">
                                <a class="title"
                                    href="{{ route('product.show', @$wishlist->product->slug) }}">{{ @$wishlist->product->name }}</a>
                                <h5 class="price">
                                    @if (@$wishlist->product->offer_price > 0)
                                        {{ currencyPosition(@$wishlist->product->offer_price) }}
                                        <del>{{ currencyPosition(@$wishlist->product->price) }}</del>
                                    @else
                                        {{ currencyPosition(@$wishlist->product->price) }}
                                    @endif
                                </h5>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a href="javascript:;"
                                            onclick="loadProductModal('{{ @$wishlist->product->id }}')"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li><a href="{{ route('product.show', @$wishlist->product->slug) }}"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (@$wishlists->hasPages())
                <div class="fp__pagination mt_60">
                    <div class="row">
                        <div class="col-12">
                            {{ @$wishlists->links() }}
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
