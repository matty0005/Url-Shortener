<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        function copyToClipboard(id) {
            const elem = document.createElement('textarea');
            elem.value = id;
            document.body.appendChild(elem);
            elem.select();
            document.execCommand('copy');
            document.body.removeChild(elem);

        }
    </script>
</head>

<body>
    <div>
        <div class="flex h-screen bg-gray-50">
            <div class="m-auto">
                <form method="POST" action="{{ route('shorten') }}">
                    @csrf
                    <div class="flex flex-col">
                        <label for="url" class="text-gray-700 my-2 @error('code') is-invalid @enderror">URL:</label>
                        <div class="flex flex-row  items-center align-middle ">
                            <input class="border rounded-lg text-2xl p-2" type="text" id="url" name="url">
                            <button type="submit" class="btn mx-3 px-4 py-2 bg-lime-500 text-white rounded-lg text-xl ">Submit</button>

                        </div>
                        @error('url')
                        <span class="invalid-feedback text-red-600" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </form>

                @if ($shortURL)
                <div class="bg-lime-50 ring-lime-400 text-lime-900 ring-2 rounded-lg mt-4 p-3 flex flex-row justify-between mr-2">
                    <div class="select-all " id="short-url">
                        {{$shortURL}}

                    </div>
                    <button value="copy" onclick="copyToClipboard('{{ $shortURL }}')">Copy</button>
                </div>
                @endif
            </div>
        </div>

    </div>
</body>

</html>