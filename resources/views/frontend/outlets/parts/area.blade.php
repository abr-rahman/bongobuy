@php
    $locationDisplayed = false;
@endphp
<div class="col-span-1 grid gap-5 items-start">
    @foreach ($outletArea as $outlet)
    @php
        $words = str_word_count($outlet->org_name, 1);
        $secondWord = $words[1];
        if (strlen($secondWord) > 0) {
            $firstLetter = $secondWord[0];
        }
    @endphp
    <div class=" grid gap-5 lg:p-5 max-h-[250px] overflow-auto">
        <div class="flex items-center gap-8 border p-2 shadow cursor-pointer">
            <div class="text-[30px] p-5 inline-block font-bold text-white bg-fave-500 uppercase">sa</div>
            <div class="grid">
                <h2 class="text-lg font-semibold">{{ $outlet->org_name }}</h2>
                <p class="">{{ $outlet->address }}</p>
                <p class="">{{ $outlet->phone }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="col-span-1">
    @if (!$locationDisplayed && !empty($outlet->location))
        <iframe src="{{  $outlet->location  }}" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        @php
            $locationDisplayed = true;
        @endphp
    @endif
</div>
