<x-button.dropdown>
    @foreach ($data['action'] as $action)
    <a href="{{ $action['route'] }}" class="dropdown-item"><i class="{{ $action['icon'] }}"></i> {{ $action['title'] }}</a>
    @endforeach
</x-button.dropdown>