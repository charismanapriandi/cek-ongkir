<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Cek Ongkir
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="/">
                            {{ csrf_field() }}
                            <div class="form-group-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Provinsi Asal</label>
                                        <select name="province_origin" class="form-control">
                                            <option value="">---Provinsi---</option>
                                            @foreach ($provinces as $province->$value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kota Asal</label>
                                        <select name="coty_origin" class="form-control">
                                            <option value="">---Kota---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Provinsi Tujuan</label>
                                        <select name="province_destination" class="form-control">
                                            <option value="">---Provinsi---</option>
                                            @foreach ($provinces as $province->$value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kota Tujuan</label>
                                        <select name="coty_destination" class="form-control">
                                            <option value="">---Kota---</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Kurir</label>
                                        <select name="courier" class="form-control">
                                            @foreach ($couriers as $courier->$value)
                                                <option value="{{ $courier }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Berat (g)</label>
                                        <input type="number" name="weight" class="form-control" value="1000">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="province_origin"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/' + provinceId + '/cities',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="city_origin]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_origin]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="city_origin]').empty();
                }
            })
        })
        $(document).ready(function() {
            $('select[name="province_destination"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/province/' + provinceId + '/cities',
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="city_destination]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="city_destination]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            })
                        }
                    })
                } else {
                    $('select[name="city_destination]').empty();
                }
            })
        })

    </script>
</body>

</html>
