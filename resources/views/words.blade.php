<h1>Wylosowane słowa:</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('translations') }}">
    @csrf
    <ul>
        @foreach($words as $word)
            <li>
                {{ $word->english_word }}
                @if($word->translation)
                    (Translation: {{ $word->translation }})
                @else 
                    <input type="text" name="translations[]" style="width: 100%; margin-top: 10px;" required>
                @endif
                <br>
                <br>
            </li>
        @endforeach
    </ul>
    <button type="submit">Tłumacz</button>
</form>
