<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <a href="{{ route('login') }}">ចូលប្រើប្រាស់</a>
        </div>
    @endif

    {{--<div class="content">--}}
        {{--<table class="table table-striped">--}}
            {{--<tr>--}}
                {{--<th>id</th>--}}
                {{--<th>name</th>--}}
            {{--</tr>--}}
            {{--@foreach($filter as $item)--}}
                {{--<tr>--}}
                    {{--<td>--}}
                        {{--{{$item->id}}--}}
                    {{--</td>--}}
                    {{--<td>--}}
                        {{--{{$item->type_name}}--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
        {{--</table>--}}

        {{--{{$filter->appends(request()->except('page'))->links()}}--}}
    {{--</div>--}}

    <div class="content">
        <form method="post" action="{{'/test_post'}}">

            {{csrf_field()}}

            <table class="table table-striped">
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Product Total</th>
                    <th>Delete</th>
                </tr>
                <tr>
                    <td>
                        <input name="products[0][name]" title="Product Name" value="Hello">
                    </td>
                    <td>
                        <input name="products[0][price]" title="Product Price" value="Hello">
                    </td>
                    <td>
                        <input name="products[0][qty]" title="Product Quantity" value="Hello">
                    </td>
                    <td>
                        <input name="products[0][total]" title="Product Total" value="Hello">
                    </td>
                    <td>
                        <input type="checkbox" name="products[0][is_delete]" title="Delete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="products[1][name]" title="Product Name">
                    </td>
                    <td>
                        <input name="products[1][price]" title="Product Price">
                    </td>
                    <td>
                        <input name="products[1][qty]" title="Product Quantity">
                    </td>
                    <td>
                        <input name="products[1][total]" title="Product Total">
                    </td>
                    <td>
                        <input type="checkbox" name="products[1][is_delete]" title="Delete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input name="products[2][name]" title="Product Name">
                    </td>
                    <td>
                        <input name="products[2][price]" title="Product Price">
                    </td>
                    <td>
                        <input name="products[2][qty]" title="Product Quantity">
                    </td>
                    <td>
                        <input name="products[2][total]" title="Product Total">
                    </td>
                    <td>
                        <input type="checkbox" name="products[2][is_delete]" title="Delete">
                    </td>
                </tr>
            </table>

            <button type="submit" >Submit</button>
        </form>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" id="getData">Ajax Request</button>

        <div style="color: black">
            {{json_encode($products)}}
        </div>
    </div>
</div>
</body>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#getData').on('click',function () {
//        var obj = {
//                "customer_name": "Johnny (Edited)",
//                "customer_phone": "023211112 (Edited)",
//                "grand_total": 10000,
//                "interests_rate": 7,
//                "new_items": [
//                    {
//                        "item_type_id": 1,
//                        "first_feature": "Honda Dream",
//                        "second_feature": "Black",
//                        "third_feature": "2AH-1035",
//                        "fourth_feature": "Skull Sticker"
//                    }
//                ],
//                "modify_items": [
//                    {
//                        "id": 4,
//                        "item_type_id": 1,
//                        "first_feature": "Honda Dream (Edited)",
//                        "second_feature": "Black (Edited)",
//                        "third_feature": "2AH-1035 (Edited)",
//                        "fourth_feature": "Skull Sticker (Edited)"
//                    },
//                    {
//                        "id": 5,
//                        "item_type_id": 1,
//                        "first_feature": "Honda Dream (Edited)",
//                        "second_feature": "Black (Edited)",
//                        "third_feature": "2AH-1035 (Edited)",
//                        "fourth_feature": "Skull Sticker (Edited)"
//                    }
//                ],
//                "delete_items": [
//                    2,8,6,7,9,10,11,12,13
//                ]
//            };
        var obj = {
            "item_type_name" : "Motor Edited"
        };

        $.ajax({
            type:"PUT",
            url:"api/item_group/3",
            data: obj,
            success:function (response) {
                console.log(response);
            }
        })
    })
</script>
</html>







