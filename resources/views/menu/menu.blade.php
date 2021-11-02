<!-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<li class="nav-item">
    <a href="pages/gallery.html" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Gallery
        </p>
    </a>
</li>
</ul> -->
@if(!isset($innerLoop))
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
@else
<ul class="nav nav-treeview">
@endif

@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

@foreach ($items as $item)
    @php
        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $listItemClass = 'nav-item';
        $linkAttributes =  'class="nav-link"';
        $dropdownitem = 'class="menu-open"';
        $styles = null;
        $icon = '<i class="nav-icon fas fa-book"></i>';
        $caret = null;

        // With Children Attributes
        if(!$originalItem->children->isEmpty()) {
            $linkAttributes =  'class="nav-link active" data-toggle="dropdown"';
            $caret = '<span class="caret"></span>';

            if(url($item->link()) == url()->current()){
                $listItemClass = 'nav-item active';
            }else{
                $listItemClass = 'nav-item';
            }
        }

        // Set Icon
        if(isset($options->icon) && $options->icon == true){
            $icon = '<i class="nav-icon fas fa-book"></i>';
        }
    @endphp
    <li class="{{ $listItemClass }}">
        <a href="{{ url($item->link()) }}" target="{{ $item->target }}" {!! $linkAttributes ?? 'class="nav-link"' !!}>
            {!! $icon !!}
            <p>{{ $item->title }}</p>
            {!! $caret !!}
        </a>
        @if(!$originalItem->children->isEmpty())
            @include('voyager::menu.bootstrap', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
        @endif
    </li>
@endforeach

</ul>