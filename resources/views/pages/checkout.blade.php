<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 How To Integrate Stripe Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Laravel 10 How To Integrate Stripe Payment Gateway</h1>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Laravel 10 How To Integrate Stripe Payment Gateway
                </div>
                <div class="card-body">
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
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="images/drone1.png" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin">DropMe</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">Rs. 1000</td>
                            <td data-th="Quantity">
                                <input type="number" value="1" class="form-control quantity" />
                            </td>
                            <td data-th="Subtotal" class="text-center">Rs. 1000</td>
                            <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: right;">
                                <h3>Total: Rs. 1000</h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align: right;">
                                <form action="{{ route('checkout') }}" method="POST">
                                    <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="total" value="1000">
{{--                                    <input type="hidden" name="productname" value="DropMe">--}}
                                    <button class="btn btn-success" type="submit" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</button>
                                </form>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
