<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>
                    <a href="https://ibb.co/Qv1TVnH"><img src="https://i.ibb.co/GQb8DkM/logo.png" alt="logo" height="56px" width="150px"></a>
                </h4>
            </div>
            <div class="col-md-6 pt-3">
                <b>Date: <?php echo date("Y-m-d") ?></b><br/>
                <b>Order ID:</b> {{$order->id}}<br>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-6">
                From
                <address>
                    <strong>Luna-ai</strong><br>
                    Address: 795 Folsom Ave, Suite 600<br>
                    Phone: 9800000000<br>
                    Email: luna.ai@furniture.com
                </address>
            </div>

            <div class="col-md-6">
                To
                <address>
                    <strong>{{$order->name}}</strong><br>
                    Address: {{$order->address}}<br>
                    Phone: {{$order->phone}}<br>
                    Email: {{$order->email}}
                </address>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <table>
                    <tr>
                        <th style="padding: 20px">Product</th>
                        <th style="padding: 20px">Image</th>
                        <th style="padding: 20px">Qty</th>
                        <th style="padding: 20px">Price</th>
                    </tr>

                    <tr>
                        <td style="padding: 20px">{{$order->product_title}}</td>
                        <td style="padding: 20px"><img src="<?php echo $image ?>" width="150px" height="150px"></td>
                        <td style="padding: 20px">{{$order->quantity}}</td>
                        <td style="padding: 20px">${{$order->price}}</td>
                    </tr>
                </table>
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <p class="lead">Payment Methods: {{$order->payment_status}}</p>
            </div>

            <div class="col-6">
                <p class="lead">Subtotal: ${{($order->price)}}</p>
            </div>
        </div>
    </div>
</body>

</html>