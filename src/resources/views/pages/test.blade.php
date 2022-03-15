<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<body>

    @foreach ($message_array as $item)
        @foreach ($item as $key => $value)
            {{ $value . ' ' }}
        @endforeach
        <br>
    @endforeach
</body>

</html>
