<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <h2>Rate Us </h2>
    <form action="{{route('rate.store')}}" method="POST">
        @method("POST")
        @csrf
        <input type="hidden" name="customer_id" value="{{$customer->id}}">
        <input type="hidden" name="service_id" value="{{$id}}">

        <div class="form-group">
            <label for="email">{{__('Rate')}}:</label>
            <select name="rate" class="form-control" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">note</label>
            <textarea class="form-control" required id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-block btn-success">Submit</button>
    </form>
</div>

</body>
</html>
