<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>授業を編集</title>
</head>
<body>
    <h1>授業を編集</h1>

    <form action="/entries/{{ $entry->id }}" method="POST">
        @csrf
        @method('PUT')
    	@if ($errors->any())
				<div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
					<p class="font-bold">授業名を入力してください。</p>
					<ul class="mt-2 list-inside list-disc">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

        <label for="title">授業名</label>
        <input type="text" id="title" name="title" value="{{ old('title', $entry->title) }}">

        <label for="room">教室名</label>
        <input type="text" id="room" name="room" value="{{ old('room', $entry->room) }}">

        <button type="submit">保存</button>
    </form>
</body>
</html>