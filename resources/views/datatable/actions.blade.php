<x-button.dropdown>
    @foreach ($data['action'] as $action)
    @if ($action['type'] == 'delete')
    <a href="javascript:;" onclick="hapus(`{{ $action['route'] }}`)" class="dropdown-item"><i class="{{ $action['icon'] }}"></i> {{ $action['title'] }}</a>
    @else
    <a href="{{ $action['route'] }}" class="dropdown-item"><i class="{{ $action['icon'] }}"></i> {{ $action['title'] }}</a>
    @endif
    @endforeach
</x-button.dropdown>