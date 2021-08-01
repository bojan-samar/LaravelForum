<div>
    {{ json_encode($forums) }}

    {{ $name }}

    <button wire:click="$set('name', 'mici')">
        Click
    </button>

</div>