<x-app-layout>

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rs.{{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" />
                    </td>
                    <td data-th="Subtotal" class="text-center">Rs.{{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
{{--                        <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fa fa-refresh"></i></button>--}}
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total Rs.{{ $total }}</strong></td>
        </tr>
        <tr>
{{--            <td><a href="{{ route('drone') }}" class="btn btn-secondary"><i class="fa fa-angle-right"></i> Proceed to Drones</a></td>--}}
            <td><a href="{{ route('shops') }}" class="btn btn-warning"><i class="fa fa-angle-right"></i> Continue to Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rs.{{ $total }}</strong></td>
            <td><a href="" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
        </tr>
    </table>




    @section('scripts')
        <script type="text/javascript">
            $(".update-cart").click(function (e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update_cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });


            $(".cart_remove").click(function (e) {
                e.preventDefault();

                var ele = $(this);



                if(confirm("Do you really want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    @endsection
</x-app-layout>
