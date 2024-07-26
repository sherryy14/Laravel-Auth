@extends('web.layout.app')
@section('title')
    SYNCVOGUE - Product Detail
@endsection
@section('content')
    <!-- product-details -->
    <section class="product-details product-details-3">
        <div class="auto-container">
            @php
                $description = $product->description;
                $position = strpos($description, ' -');
                $trimmedDescription = $position !== false ? substr($description, 0, $position) : $description;
                $title = $product->mill_name . ' ' . $product->style_code . ' ' . $trimmedDescription;
                $slug = strtolower($selectedColor->mill_name) . '-' . strtolower($selectedColor->style_code);
                $discountPercentage = 50;
                $originalPrice = $selectedColor->piece_price * 2;
                $discountAmount = $originalPrice * ($discountPercentage / 100);
                $discountedPrice = $originalPrice - $discountAmount;
            @endphp
            <div class="product-details-content">
                <div class="row clearfix">
                    <!-- left image container  -->
                    <div class="col-lg-4 col-md-12 col-sm-12 content-column">
                        <img src="{{ $selectedColor->domain }}{{ $selectedColor->front_of_image_name }}"
                            alt="{{ $title }}" class="w-100 rounded" id="main-image" />
                        <div class="row mt-4">
                            <div class="col px-3"><img
                                    src="{{ $selectedColor->domain }}{{ $selectedColor->front_of_image_name }}"
                                    alt="" class="w-100 img" onmouseenter="changeImage(this.src)"></div>
                            <div class="col px-3"><img
                                    src="{{ $selectedColor->domain }}{{ $selectedColor->back_of_image_name }}"
                                    alt="" class="w-100 img" onmouseenter="changeImage(this.src)"></div>
                            <div class="col px-3"><img
                                    src="{{ $selectedColor->domain }}{{ $selectedColor->side_of_image_name }}"
                                    alt="" class="w-100 img" onmouseenter="changeImage(this.src)"></div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-12 col-sm-12 content-column">
                        <div class="product-info">


                            <h1>{{ $title }}</h1>

                            <div class="color-box">
                                <div class="d-flex justify-content-between align-items-center">

                                    <h5 class="my-3">
                                        {{ count($hexCodeCounts) }} Available Colors
                                        - Color Selected: <span id="selectedColor">
                                            @if (isset($selectedColor))
                                            {{ $selectedColor->color_name }}
                                            @endif
                                        </span>
                                    </h5>
                                    <h5 class="style-code">Style Code: <span>{{$product->style_code}}</span></h5>
                                </div>
                                <hr>
                                <div class="d-flex my-3">

                                    <p class="single-price">
                                        <span class="discount-price">${{ number_format($discountedPrice, 2) }}</span>
                                        <span class="original-price">${{ number_format($originalPrice, 2) }}</span>
                                    </p>
                                    <div class="Savings_tag">
                                        <div class="Savings_Txt">
                                            <i class="fas fa-tag"></i>
                                            <span class="Price_savings">{{$discountPercentage}}%</span>
                                            <span>Savings</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="color-container">
                                    @foreach ($hexCodeCounts as $hexCodeCount)
                                        @php
                                            $hexColors = explode(',', $hexCodeCount->hex_code);
                                            $numColors = count($hexColors);
                                            $widthPercentage = 100 / $numColors;
                                        @endphp

                                        <div class="innerColorContainer">
                                            <div class="colorOuter" title="{{ $hexCodeCount->color_name }}">
                                                <a href="{{ route('product.color_detail', ['id' => $slug, 'color' => $hexColors[0]]) }}"
                                                    class="txtLight" data-mzoom="mzoom"
                                                    data-desc="{{ $hexCodeCount->color_name }}">
                                                    <span class="colorText">{{ $hexCodeCount->color_name }}</span>
                                                    <div class="colorInnerWrap">
                                                        @foreach ($hexColors as $index => $hexColor)
                                                            <div style="background-color: #{{ $hexColor }}; width: {{ $widthPercentage }}%;"
                                                                class="colorInner colorInner{{ $index + 1 }}"
                                                                data-color="#{{ $hexColor }}">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <form action="{{ route('cart.add') }}" method="POST">
                                <div class="add-to-cart-container">
                                    @if (session('error'))
                                        <div class="alert alert-danger" id="error-message">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @csrf
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="product-name-detail">
                                                    @if (isset($selectedColor))
                                                        @php
                                                            $singleHexColor = explode(',', $selectedColor->hex_code);
                                                            $singleNumColors = count($singleHexColor);
                                                            $singleWidthPercentage = 100 / $singleNumColors;
                                                        @endphp
                                                        <div class="table-color-box">
                                                            @foreach ($singleHexColor as $index => $hexColor)
                                                                <div
                                                                    style="background-color:#{{ $hexColor }}; width: {{ $singleWidthPercentage }}%;">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <h5>{{ $selectedColor->color_name }}</h5>
                                                    @elseif(count($hexCodeCounts) > 0)
                                                        @php
                                                            $firstColor = $hexCodeCounts[0];
                                                            $firstHexColors = explode(',', $firstColor->hex_code);
                                                            $firstNumColors = count($firstHexColors);
                                                            $firstWidthPercentage = 100 / $firstNumColors;
                                                        @endphp
                                                        <div class="table-color-box">
                                                            @foreach ($firstHexColors as $index => $hexColor)
                                                                <div
                                                                    style="background-color:#{{ $hexColor }}; width: {{ $firstWidthPercentage }}%;">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <h5>{{ $firstColor->color_name }}</h5>
                                                    @else
                                                        <h5>No Colors Available</h5>
                                                    @endif
                                                </th>
                                                @foreach ($sizePrices as $sizePrice)
                                                    <th><span class="per-size"> {{ $sizePrice->size_name }}</span> <br> <span class="per-price"> ${{ $sizePrice->piece_price }} </span>
                                                    </th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="product-warehouse"></td>
                                                @if ($sizePrices->isNotEmpty())
                                                    @foreach ($sizePrices as $item)
                                                        <td>
                                                            <div class="product-quantity">
                                                                <input type="number"
                                                                    name="quantities[{{ $item->sku }}]" min="0"
                                                                    max="10"
                                                                    @if ($item->pack_qty <= 0) readonly @endif>

                                                                <input type="hidden" name="prices[{{ $item->sku }}]"
                                                                    value="{{ $item->piece_price }}">
                                                                <input type="hidden" name="sizes[{{ $item->sku }}]"
                                                                    value="{{ $item->size_name }}">
                                                                <input type="hidden" name="sku[]"
                                                                    value="{{ $item->sku }}">


                                                                <p><strong>{{ $item->pack_qty }}</strong></p>
                                                            </div>
                                                        </td>
                                                    @endforeach
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                {{-- hidden details --}}
                                <input type="hidden" name="image"
                                    value="{{ $selectedColor->domain }}{{ $selectedColor->front_of_image_name }}">
                                <input type="hidden" name="description" value="{{ $product->description }}">
                                <input type="hidden" name="color" value="{{ $selectedColor->color_name }}">

                                <div class="othre-options clearfix">
                                    <div class="btn-box"><button type="submit" class="theme-btn-two">Add to cart</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-discription">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Description</li>

                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">

                            {{-- {{ $product->features}} --}}

                            @php
                                $featuresArray = array_filter(array_map('trim', explode(';', $product->features)));

                                $materials = array_slice($featuresArray, 0, 2);
                                $featureItems = array_slice($featuresArray, 2);
                            @endphp
                            <div class="text my-2">
                                <h4><strong>Material:</strong></h4>
                                <ul style="padding-left: 38px;">
                                    @foreach ($materials as $material)
                                        <li style="list-style: disc">{{ $material }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="text my-2">
                                <h4><strong>Feature:</strong></h4>
                                <ul style="padding-left: 38px;">
                                    @foreach ($featureItems as $feature)
                                        <li style="list-style: disc">{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- product-details end -->

    <script>
        // Color name display
        document.addEventListener('DOMContentLoaded', function() {
            // Get the initially selected color name, if any
            var initiallySelectedColor = document.getElementById('selectedColor').textContent;

            document.querySelectorAll('.colorOuter a').forEach(function(element) {
                element.addEventListener('mouseenter', function(event) {
                    var colorName = element.querySelector('.colorText').textContent;
                    document.getElementById('selectedColor').textContent = colorName;
                });

                element.addEventListener('mouseleave', function(event) {
                    document.getElementById('selectedColor').textContent = initiallySelectedColor;
                });

                element.addEventListener('click', function(event) {
                    initiallySelectedColor = element.querySelector('.colorText').textContent;
                    document.getElementById('selectedColor').textContent = initiallySelectedColor;
                });
            });
        });

        // Text color combinations
        document.addEventListener('DOMContentLoaded', function() {
            function hexToRgb(hex) {
                var r = 0,
                    g = 0,
                    b = 0;
                // 3 digits
                if (hex.length === 4) {
                    r = parseInt(hex[1] + hex[1], 16);
                    g = parseInt(hex[2] + hex[2], 16);
                    b = parseInt(hex[3] + hex[3], 16);
                }
                // 6 digits
                else if (hex.length === 7) {
                    r = parseInt(hex[1] + hex[2], 16);
                    g = parseInt(hex[3] + hex[4], 16);
                    b = parseInt(hex[5] + hex[6], 16);
                }
                return [r, g, b];
            }

            function getContrastColor(r, g, b) {
                // Using luminance formula to determine contrast
                var luminance = (0.2126 * r + 0.7152 * g + 0.0722 * b) / 255;
                return luminance > 0.5 ? 'black' : 'white';
            }

            document.querySelectorAll('.colorInner').forEach(function(element) {
                var color = element.getAttribute('data-color');
                var [r, g, b] = hexToRgb(color);
                var textColor = getContrastColor(r, g, b);
                element.closest('.colorOuter').querySelector('.colorText').style.color = textColor;
            });
        });

        // Change Image
        function changeImage(source) {
            var image = document.getElementById('main-image');
            image.src = source;
        }

        // Hide error msg
        window.onload = function() {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.opacity = '0';
                    setTimeout(() => {
                        errorMessage.style.display = 'none';
                    }, 500);
                }, 3000);
            }
        }
    </script>
    <!-- shop-page-section end -->
@endsection
