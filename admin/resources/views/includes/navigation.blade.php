<?php
$json = json_decode(file_get_contents('http://champion.logoinn.me/champions/wp-json/wp-api-menus/v2/menus/2'), true);
//var_dump($json['items']);

?>
@if(count($json) > 0)
    @if(count($json['items']) > 0)
        <div class="header-menu">
            <div class="menu-header-menu-container">
                <ul id="primaryid" class="primary-menu">
                    @foreach($json['items'] as $item)

                        <li id="menu-item-{{ $item['id'] }}"
                            class="menu-item menu-item-type-custom menu-item-object-custom {{ ((isset($item['children']))?"menu-item-has-children": "") }} menu-item-{{ $item['id'] }}">
                            <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                            @if(isset($item['children']))
                                <ul class="sub-menu">
                                    @foreach($item['children'] as $subItem)
                                        <li id="menu-item-{{ $subItem['id'] }}"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-{{ $subItem['id'] }}">
                                            <a href="{{ $subItem['url'] }}">{{ $subItem['title'] }}</a></li>


                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>



    @endif
@endif
