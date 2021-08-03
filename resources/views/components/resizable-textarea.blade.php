@props(['disabled' => false])
<textarea 
x-data="{
    resize(){
        $el.style.height = '64px'
        $el.style.height = $el.scrollHeight + 5 + 'px'
    }
}"
x-init="resize"
x-on:input="resize"
{{ $disabled ? 'disabled' : '' }} 
{!! $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}></textarea>
