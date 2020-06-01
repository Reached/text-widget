@if($widgetFound)@auth<div data-editable data-id="{{ $widget->id }}" class="group" data-type="text"><span contenteditable="true" class="text-span outline-none">@endauth{!! $widget->text !!}@auth</span><button class="bg-blue-500 invisible group-hover:visible transition duration-250 ease-in-out hover:bg-blue-700 text-xs text-white font-bold py-1 px-2 ml-4 rounded focus:outline-none">{{ __('cms::text-widget.Update text') }}</button></div>@endauth
@else
    <p style="color: red;">{{ __('This widget was not found, make sure that you spelled the name correctly.') }} <strong>{{ __('Name') }}: {{ $name }}</strong> Type: TextWidget</p>
@endif
