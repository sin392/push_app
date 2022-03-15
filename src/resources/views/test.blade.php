<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <body>
         <!-- @foreach ($message_array as $id => $message)
           <p> {{$id}}: {{$message}}</p>;
        @endforeach -->

        <?php
            forreach ($message_array as $item) {
                echo $item->id.':'.$item->message.'';
            }
        ?>
    </body>

</html>