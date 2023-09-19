@foreach($dataErrors as $key => $error)
    <div class="w-fill text-center pt-4">{!! __('car-search-bar.errors-'.$key) !!}</div>
@endforeach   