<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>授業を登録 | POSSE大学</title>
	<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100 text-slate-800">
	<header class="bg-[#1f3a5f] text-white">
		<div class="mx-auto max-w-3xl px-4 py-4">
			<p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
			<h1 class="mt-1 text-xl font-bold">授業を登録する</h1>
		</div>
	</header>

	<main class="mx-auto max-w-3xl px-4 py-6">
		<a href="{{ url('/entries') }}" class="text-sm text-blue-800 underline">時間割一覧に戻る</a>

		<form action="{{ url('/entries') }}" method="POST" class="mt-4 space-y-5 rounded-lg border border-slate-200 bg-white p-5">
			@csrf

			@if ($errors->any())
				<div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800" role="alert">
					<p class="font-bold">入力内容を確認してください。</p>
					<ul class="mt-2 list-inside list-disc">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div>
				<label for="day" class="mb-1 block text-sm font-medium">曜日</label>
				<select id="day" name="day" required class="w-full rounded-md border border-slate-300 px-3 py-2">
					<option value="">曜日を選択してください</option>
					@foreach ([1 => '月曜日', 2 => '火曜日', 3 => '水曜日', 4 => '木曜日', 5 => '金曜日'] as $value => $label)
						<option value="{{ $value }}" @selected(old('day') == $value)>{{ $label }}</option>
					@endforeach
				</select>
			</div>

			<div>
				<label for="period" class="mb-1 block text-sm font-medium">時限</label>
				<select id="period" name="period" required class="w-full rounded-md border border-slate-300 px-3 py-2">
					<option value="">時限を選択してください</option>
					@foreach (range(1, 6) as $period)
						<option value="{{ $period }}" @selected(old('period') == $period)>{{ $period }}限</option>
					@endforeach
				</select>
			</div>

			<div>
				<label for="title" class="mb-1 block text-sm font-medium">授業名</label>
				<input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="255" class="w-full rounded-md border border-slate-300 px-3 py-2">
			</div>

			<div>
				<label for="room" class="mb-1 block text-sm font-medium">教室（任意）</label>
				<input id="room" name="room" type="text" value="{{ old('room') }}" maxlength="255" class="w-full rounded-md border border-slate-300 px-3 py-2">
			</div>

			<button type="submit" class="rounded-lg bg-[#1f3a5f] px-4 py-2 font-medium text-white hover:bg-slate-700">登録する</button>
		</form>
	</main>

	<footer class="mx-auto max-w-3xl px-4 pb-8 text-xs text-slate-500">POSSE大学 学務課</footer>
</body>
</html>
