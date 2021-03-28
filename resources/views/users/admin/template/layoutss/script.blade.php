@foreach ($scripts as $script)
<script src="{{ asset("themes/$themeName/js/$script") }}"></script>
@endforeach
