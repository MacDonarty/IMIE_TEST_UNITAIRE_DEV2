<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    @if(!empty($alert['message']))
    <div class="alert alert-{{ $alert['type'] }}" role="alert">
        @lang($alert['message'])
    </div>
    @endif


    <form  action="{{ action('MemberController@create') }}" method="post">
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" name="{{ \App\Models\Member::EMAIL }}">
        </div>

        <input type="hidden" name="id" value="">

        <button class="btn btn-primary">@lang('members.index.send')</button>
    </form>
</div>

</body>
</html>