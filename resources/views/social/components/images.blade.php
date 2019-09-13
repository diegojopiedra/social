
<custom-galery
    :photos="{{ $photos->map(function ($e){ return  Storage::url($e->url);}) }}"
/>