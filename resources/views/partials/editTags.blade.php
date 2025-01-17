<section id="view{{ $tag->name }}Mode" class="viewTag">
    <label for="{{ $tag->name }}">
        <a href="{{ route('showTag', ['name' => $tag->name]) }}">{{ $tag->name }}</a>
        @auth
            @if (\App\Models\Admin::where('admin_id', Auth::user()->getAuthIdentifier())->exists())
                <button class="edit_tag_button" data-name="{{ $tag->name }}">Edit</button>
                <form action="{{ route('deleteTag', ['name' => $tag->name]) }}" method="POST">
                    {{ csrf_field() }}
                    <button class="delete_tag_button">Delete</button>
                </form>
            @endif
        @endauth
    </label>
</section>

@auth
    @if (\App\Models\Admin::where('admin_id', Auth::user()->getAuthIdentifier())->exists())
        <section id="edit{{ $tag->name }}Mode" style="display: none">
            <form action="{{ route('editTag', ['name' => $tag->name]) }}" method="POST">
                @csrf
                <input type="text" name="name" id="tag_name_edit" value="{{ $tag->name }}">
                <button type="reset" id="cancelButton" data-name="{{ $tag->name }}">
                    Cancel
                </button>
                <button type="submit" id="applyButton">
                    Apply
                </button>
            </form>
        </section>
    @endif
@endauth
