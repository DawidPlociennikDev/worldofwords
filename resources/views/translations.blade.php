<h1>Tłumaczenia:</h1>

<ul>
    @foreach($words as $word)
        <li>
            <strong>{{ $word->english_word }}</strong> - {{ $word->translation }}
        </li>
    @endforeach
</ul>
